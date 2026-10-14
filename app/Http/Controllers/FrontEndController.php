<?php

namespace App\Http\Controllers;

use App\Category;
use App\Course;
use App\Role;
use App\Tutor;
use App\User;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {

        $categories = Category::all();
        $categoriesWithCount = array();
        foreach ($categories as $c) {
            $categoriesWithCount[$c->title] = $c->courses()->count();
        }
        $categoriesWithCount = collect($categoriesWithCount);


        $featuredCourses = Course::orderBy('created_at', 'DESC')->limit(4)->get();
        $featuredTutors = Tutor::orderBy('created_at')->limit(4)->get();
        $happyStudents = User::withCount('courses')->orderBy('courses_count', 'DESC')->limit(4)->get();

        $users = User::all()->count();
        $students = Role::where('role_en_name', 'student')->first()->users()->count();
        $tutors = Tutor::all()->count();
        $courses = Course::all()->count();

        return view('Front-end.index')->with('categories', $categoriesWithCount)
            ->with('featuredCourses', $featuredCourses)
            ->with('featuredTutors', $featuredTutors)
            ->with('usersCount', $users)
            ->with('studentsCount', $students)
            ->with('tutorsCount', $tutors)
            ->with('coursesCount', $courses)
            ->with('happyStudents', $happyStudents);
    }

    public function about()
    {
        $users = User::all()->count();
        $students = Role::where('role_en_name', 'student')->first()->users()->count();
        $tutors = Tutor::all()->count();
        $courses = Course::all()->count();


        $featuredTutors = Tutor::orderBy('created_at')->limit(4)->get();
        $happyStudents = User::withCount('courses')->orderBy('courses_count', 'DESC')->limit(4)->get();

        return view('Front-end.about')->with('usersCount', $users)
            ->with('studentsCount', $students)
            ->with('tutorsCount', $tutors)
            ->with('coursesCount', $courses)
            ->with('featuredTutors', $featuredTutors)
            ->with('happyStudents', $happyStudents);

    }

    public function contact()
    {
        return view('Front-end.contact');
    }


    public function tutors()
    {
        $tutors = Tutor::orderBy('created_at', 'DESC')->paginate(8);
        return view('Front-end.teachers')->with('tutors', $tutors);
    }

    public function courses()
    {


        if (Auth::check() and Auth::user()->roles()->where('role_en_name', 'student')->count() > 0) {
            $courses = Course::whereDoesntHave('users', function ($query) {
                $query->where('users.id', Auth::user()->id);
            })->paginate(5);

            $cs = Course::all();

            $matrixOfCourses = array();
            foreach ($cs as $c) {
                foreach ($c->users()->get() as $u)
                    $matrixOfCourses[$u->id][$c->id] = $u->courses()->where('course_id', $c->id)->first()->pivot->rating;
            }
            if (!array_key_exists(Auth::user()->id, $matrixOfCourses)) {
                $recommendations = "No Recommendations";
            } else {
                $recommendations = $this->getRecommendations($matrixOfCourses, Auth::user()->id);
                $recommendations = collect($recommendations);

                //$pageSize = 1;
                // $recommendations = CollectionHelper::paginate($recommendations, $pageSize);
            }
            return view('Front-end.courses')->with('courses', $courses)
                ->with('recommendations', $recommendations)->with('coursesCount', Course::count());

        } else {
            $courses = Course::where('id', '>=', 1)->paginate(6);
        }
        return view('Front-end.courses')->with('courses', $courses)->with('coursesCount', Course::count());
    }

    public function single_course($id)
    {

        $course = Course::find($id);
        $relatedCourses = Course::where('category_id', $course->category_id)
            ->where('id', '!=', $course->id)->limit(2)->get();

        return view('Front-end.single-course')->with('course', $course)->with('relatedCourses', $relatedCourses);
    }

    public function search_courses(Request $request)
    {

        $s=$request->keyword;

        if(Auth::check()) {
            $res1 = Course::where([
                ['course_en_name', 'LIKE', '%' . $s . '%'],
                ])
                ->whereDoesntHave('users', function ($query) {
                    $query->where('users.id', Auth::user()->id);
                });


            $res2=Course::whereHas('category', function ($query) use ($s) {
                $query->where('categories.title', 'like', '%' . $s . '%');
            })->whereDoesntHave('users', function ($query) {
                $query->where('users.id', Auth::user()->id);
            })->union($res1);
            $count=$res2->count();
            $res2=$res2->paginate(3);


            return view('Front-end.search-courses')->with('results',$res2)->with('coursesCount',$count);

        }
        else{
            $res1 = Course::where([
                ['course_en_name', 'LIKE', '%' . $s . '%'],
            ]);


            $res2=Course::whereHas('category', function ($query) use ($s) {
                $query->where('categories.title', 'like', '%' . $s . '%');
            })->union($res1);
            $count=$res2->count();
            $res2=$res2->paginate(3);

            return view('Front-end.search-courses')->with('results',$res2)->with('coursesCount',$count);
        }
    }


    private function getRecommendations($matrix, $user_id)
    {

        $total = array();
        $simsums = array();
        $ranks = array();
        foreach ($matrix as $otherUser => $value) {
            if ($otherUser != $user_id) {
                $sim = $this->similarity_distance($matrix, $user_id, $otherUser);


                foreach ($matrix[$otherUser] as $key => $value) {
                    if (!array_key_exists($key, $matrix[$user_id])) {//we need to calculate the predictions on the courses that the user hasn't rated yet

                        if (!array_key_exists($key, $total)) {
                            $total[$key] = 0;//set the initial value for this key(course)
                        }

                        $total[$key] += $matrix[$otherUser][$key] * $sim;//this is the Numerator of the prediction formula

                        if (!array_key_exists($key, $simsums)) {
                            $simsums[$key] = 0;//set the initial value for this key(course)
                        }
                        $simsums[$key] += $sim;//this is the denominator of the prediction formula

                    }
                }
            }
        }


        foreach ($total as $key => $value) {
            $ranks[$key] = $value / $simsums[$key];//the prediction of rating in which this user will give to this key(course)
        }
        arsort($ranks);


        $i = 0;
        $bestFour = array();
        foreach ($ranks as $key => $value) {
            if ($i == 4) {
                break;
            }
            $bestFour[$key] = $value;
            $i++;
        }
        return $bestFour;

    }

    private function similarity_distance($matrix, $user1, $user2)
    {
        $similar = array();
        foreach ($matrix[$user1] as $key => $value) {
            if (array_key_exists($key, $matrix[$user2])) {//the user2 has rated the movie
                $similar[$key] = 1;
            }
        }
        if ($similar == 0) {
            return 0;
        }

        foreach ($matrix[$user1] as $key => $value) {
            //calculation of includian distance
            $sum = 0;
            if (array_key_exists($key, $matrix[$user2])) {
                $sum += pow($value - $matrix[$user2][$key], 2);
            }
        }

        return 1 / (1 + sqrt($sum));//return the normalized value


    }


}
