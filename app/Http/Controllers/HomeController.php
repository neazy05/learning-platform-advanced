<?php

namespace App\Http\Controllers;

use App\Assignment;
use App\Role;
use App\Student_assignment;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\Category;
use App\User;
use App\Tutor;
use App\Course;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        Session::forget('success-creation');
        Session::forget('success');
        Session::forget('error');
        Session::forget('warning');

        $users = User::all()->count();
        $tutors = Tutor::all()->count();
        $courses = Course::all()->count();
        $categories = Category::all()->count();

        if (Auth::user()->roles()->where('role_en_name', 'admin')->count() > 0) {

            $newusers = User::whereMonth('created_at', Carbon::now()->subMonth()->month)->get()->count();
            $newtutors = Tutor::whereMonth('created_at', Carbon::now()->subMonth()->month)->count();
            $newcourses = Course::whereMonth('created_at', Carbon::now()->subMonth()->month)->count();
            $newcategories = Category::whereMonth('created_at', Carbon::now()->subMonth()->month)->count();
            return view('home')->with('users', $users)->with('tutors', $tutors)
                ->with('courses', $courses)->with('categories', $categories)
                ->with('newusers', $newusers)->with('newtutors', $newtutors)
                ->with('newcourses', $newcourses)->with('newcategories', $newcategories);

        } else if (Auth::user()->roles()->where('role_en_name', 'student')->count() > 0) {
            $mycourses = User::find(Auth::user()->id)->courses()->count();
            $myuploadedassignments = Student_assignment::where('user_id', Auth::user()->id)->count();
            $allcourses = User::find(Auth::user()->id)->courses()->get();
            $allassignments = 0;
            foreach ($allcourses as $c) {
                $allassignments += $c->assignments()->count();
            }

            return view('home')
                ->with('courses', $courses)->with('assignments', $allassignments)
                ->with('myassignments', $myuploadedassignments)
                ->with('mycourses', $mycourses);
        } else if (Auth::user()->isTutor) {

            $students = Role::where('role_en_name', 'student')->first()->users()->count();
            $mycourses = Course::where('tutor_id', Auth::user()->isTutor()->first()->id)->count();
            $myuploadedassignments = Assignment::where('tutor_id', Auth::user()->isTutor()->first()->id)->count();
            $allcourses = Course::where('tutor_id', Auth::user()->isTutor()->first()->id)->get();
            $totalstudents = 0;
            foreach ($allcourses as $c) {
                $totalstudents += $c->users()->count();
            }
            return view('home')->with('students', $students)->with('tutors', $tutors)
                ->with('courses', $courses)
                ->with('myassignments', $myuploadedassignments)
                ->with('mycourses', $mycourses)->with('mystudents', $totalstudents);


        }
        else{
            return redirect()->route('edit_user',['id'=>Auth::user()->id]);
        }

    }


    public function create_courses_category()
    {
        Session::forget('success-creation');
        Session::forget('success');
        Session::forget('error');
        Session::forget('warning');

        return view('Admin/create_courses_category')->with("categories", Category::all());
    }


    public function store_courses_category(Request $request)
    {
        Session::forget('success-creation');
        Session::forget('success');
        Session::forget('error');
        Session::forget('warning');

        $this->validate($request, [
            'newTitle' => 'required|max:255',

        ]);


        if (isset($request->newParentID)) {
            Category::create([
                'title' => $request->newTitle,
                'parent_id' => $request->newParentID
            ]);

        } else {
            Category::create([
                'title' => $request->newTitle,
            ]);
        }


        Session::flash('success', 'A new Category has been created Successfully.');
        return redirect()->route('all_courses_categories');

    }


    public function all_courses_categories()
    {
        return view('Admin/all_courses_categories')->with('categories', Category::all());
    }


    public function delete_courses_category($id)
    {
        Session::forget('success-creation');
        Session::forget('success');
        Session::forget('error');
        Session::forget('warning');
        $c = Category::find($id);
        $c->delete();

        Session::flash('warning', 'The Category has been successfully deleted.');

        return redirect()->route('all_courses_categories');
    }
}
