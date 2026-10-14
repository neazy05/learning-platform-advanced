<?php

namespace App\Http\Controllers;

use App\Chat_messages_global;
use App\Lecture;
use App\Student_assignment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;
use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Tutor;
use App\Role;
use App\Course;
use App\Assignment;
use App\Assignment_attachment;
use App\Helpers\CollectionHelper;


class UsersController extends Controller
{
    public function create()
    {
        Session::forget('success-creation');

        Session::forget('success');
        Session::forget('error');
        Session::forget('warning');

        return view('Admin/create_user')->with('roles', ['Admin', 'Student']);
    }

    public function store(Request $request)
    {
        Session::forget('success-creation');

        Session::forget('success');
        Session::forget('error');
        Session::forget('warning');

        $this->validate($request, [
            'newUserName' => 'required|max:255|min:5',
            'newUserPassword' => 'required|max:128',
            'newUserEmail' => 'required|email',
            'newUserRoles' => 'required'
        ]);

        if (isset($request->newUserMobile)) {

            $user = User::create([
                'name' => $request->newUserName,
                'password' => Hash::make($request->newUserPassword),
                'email' => $request->newUserEmail,
                'mobile' => $request->newUserMobile,

            ]);


        } else {
            $user = User::create([
                'name' => $request->newUserName,
                'password' => Hash::make($request->newUserPassword),
                'email' => $request->newUserEmail,

            ]);
        }

        $roles = array();
        $i = 0;
        foreach ($request->newUserRoles as $title) {
            if ($title == 'Student') {
                $role = Role::where('role_en_name', 'Student')->first();
            } else if ($title == 'Admin') {
                $role = Role::where('role_en_name', 'Admin')->first();
            }
            $roles[$i] = $role->id;
            $i = $i + 1;
        }
        $user->roles()->attach($roles);

        Session::flash('success-creation', 'A new User has been created Successfully.');
        return redirect()->route('all_users');

    }


    public function show($id)
    {

        Session::forget('success');
        Session::forget('error');
        Session::forget('warning');
        $user = User::find($id);

        if (isset($user->isTutor->tutor_cv)) {
            $cvName = preg_split('~/~', $user->isTutor->tutor_cv);
            return view('show_user_profile')->with('user', $user)->with('cvName', $cvName[count($cvName) - 1]);
        } else {
            return view('show_user_profile')->with('user', $user);
        }
    }

    public function edit($id)
    {
        Session::forget('success-creation');
        Session::forget('success');
        Session::forget('error');
        Session::forget('warning');
        if (isset(User::find($id)->isTutor)) {
            if (isset(User::find($id)->isTutor->tutor_cv)) {
                $cvName = preg_split('~/~', User::find($id)->isTutor->tutor_cv);
                return view('edit_user_profile')->with('user', User::find($id))->with('cvName', $cvName[count($cvName) - 1]);
            } else {
                return view('edit_user_profile')->with('user', User::find($id));
            }

        } else {
            return view('edit_user_profile')->with('user', User::find($id))->with('roles', ['Admin', 'Student']);
        }
    }

    public function update(Request $request, $id)
    {
        Session::forget('success-creation');
        Session::forget('success');
        Session::forget('error');
        Session::forget('warning');


        $user = User::find($id);

        if (!isset($user->provider_id)) {
            if (!isset($request->updateUserAvatar)) {
                $this->validate($request, [
                    'updateUserName' => 'required|max:255|min:5',
                    'updateUserPassword' => 'required|max:128',
                    'updateUserEmail' => 'required|email',
                ]);
            } else {
                $this->validate($request, [
                    'updateUserName' => 'required|max:255|min:5',
                    'updateUserPassword' => 'required|max:128',
                    'updateUserEmail' => 'required|email',
                    'updateUserAvatar' => 'image'
                ]);
            }


            $user->name = $request->updateUserName;
            $user->email = $request->updateUserEmail;
            $user->password = Hash::make($request->updateUserPassword);

            if (isset($request->updateUserMobile)) {
                $user->mobile = $request->updateUserMobile;
            }

            if (isset($request->updateUserRoles)) {
                $roles = array();
                $i = 0;
                foreach ($request->updateUserRoles as $title) {
                    if ($title == 'Student') {
                        $role = Role::where('role_en_name', 'Student')->first();
                    } else if ($title == 'Admin') {
                        $role = Role::where('role_en_name', 'Admin')->first();
                    }
                    $roles[$i] = $role->id;
                    $i = $i + 1;
                }
                $user->roles()->sync($roles);
            }

            if (isset($request->updateUserAvatar)) {

                $pathToFolder = public_path('uploads\profiles\\');
                $pathToFolder = $pathToFolder . $id . "\\";

                if (!$this->is_dir_empty($pathToFolder)) {

                    //Get a list of all of the file names in the folder.
                    $files = glob($pathToFolder . '/*');

                    //Loop through the file list.
                    foreach ($files as $file) {
                        //Make sure that this is a file and not a directory.
                        if (is_file($file)) {
                            //Use the unlink function to delete the file.
                            unlink($file);
                        }
                    }

                }

                $pathToFolder = public_path('uploads\profiles\\');
                $pathToFolder = $pathToFolder . $id . "\\";
                if (!file_exists($pathToFolder)) {
                    mkdir($pathToFolder, "0777");
                }
                $upload_dir = $pathToFolder;


                $uploadfile = time() . $request->updateUserAvatar->getClientOriginalName();

                $request->updateUserAvatar->move($upload_dir, $uploadfile);
                $user->avatar = $upload_dir . $uploadfile;

            }
            $user->save();

            if (isset($user->isTutor)) {


                $tutor = Tutor::find($user->isTutor->id);
                if (isset($request->updateTutorDiploma))
                    $tutor->tutor_diploma = $request->updateTutorDiploma;

                if (isset($request->updateTutorCV)) {


                    $pathToFolder = public_path('uploads\CVs\\');
                    $pathToFolder = $pathToFolder . $tutor->id . "\\";

                    if (!$this->is_dir_empty($pathToFolder)) {

                        //Get a list of all of the file names in the folder.
                        $files = glob($pathToFolder . '/*');

                        //Loop through the file list.
                        foreach ($files as $file) {
                            //Make sure that this is a file and not a directory.
                            if (is_file($file)) {
                                //Use the unlink function to delete the file.
                                unlink($file);
                            }
                        }

                    }

                    $pathToFolder = public_path('uploads\CVs\\');
                    $pathToFolder = $pathToFolder . $tutor->id . "\\";
                    if (!file_exists($pathToFolder)) {
                        mkdir($pathToFolder, "0777");
                    }
                    $upload_dir = $pathToFolder;


                    $uploadfile = time() . $request->updateTutorCV->getClientOriginalName();

                    $request->updateTutorCV->move($upload_dir, $uploadfile);
                    $tutor->tutor_cv = $upload_dir . $uploadfile;

                }
                $tutor->save();

                Session::flash('success-creation', "Updated User's information successfully.");
                return redirect()->route('show_user_profile', ['id' => $user->id]);
            } else {
                Session::flash('success-creation', "Updated User's information successfully.");
                return redirect()->route('show_user_profile', ['id' => $user->id]);
            }
        } else if (!isset($user->isTutor) and Auth::user()->roles()->count() == 0) {

            $this->validate($request, [
                'role' => 'required',
            ]);

            if (isset($request->updateUserMobile)) {
                $user->mobile = $request->updateUserMobile;
            }

            $user->save();
            if ($request['role'] == 'Student') {
                $role = Role::where('role_en_name', $request['role'])->first();
                $user->roles()->attach($role);
            } else {
                $t = new Tutor();
                $t->user_id = $user->id;

                if (isset($request->updateTutorDiploma)) {
                    $t->tutor_diploma = $request->updateTutorDiploma;
                }
                if (isset($request->updateTutorCV)) {
                    $pathToFolder = public_path('uploads\CVs\\');
                    $pathToFolder = $pathToFolder . $t->id . "\\";

                    if (!$this->is_dir_empty($pathToFolder)) {

                        //Get a list of all of the file names in the folder.
                        $files = glob($pathToFolder . '/*');

                        //Loop through the file list.
                        foreach ($files as $file) {
                            //Make sure that this is a file and not a directory.
                            if (is_file($file)) {
                                //Use the unlink function to delete the file.
                                unlink($file);
                            }
                        }

                    }

                    $pathToFolder = public_path('uploads\CVs\\');
                    $pathToFolder = $pathToFolder . $t->id . "\\";
                    if (!file_exists($pathToFolder)) {
                        mkdir($pathToFolder, "0777");
                    }
                    $upload_dir = $pathToFolder;


                    $uploadfile = time() . $request->updateTutorCV->getClientOriginalName();

                    $request->updateTutorCV->move($upload_dir, $uploadfile);
                    $t->tutor_cv = $upload_dir . $uploadfile;
                }
                $t->save();
            }

            Session::flash('success-creation', "Updated User's information successfully.");
            return redirect()->route('show_user_profile', ['id' => $user->id]);
        } else {

            $user = Auth::user();
            if (isset($request->updateUserMobile)) {
                $user->mobile = $request->updateUserMobile;
            }

            $user->save();


            if (isset($user->isTutor)) {
                $t = Tutor::where('user_id', $user->id)->first();
                if (isset($request->updateTutorDiploma)) {
                    $t->tutor_diploma = $request->updateTutorDiploma;
                }
                if (isset($request->updateTutorCV)) {
                    $pathToFolder = public_path('uploads\CVs\\');
                    $pathToFolder = $pathToFolder . $t->id . "\\";

                    if (!$this->is_dir_empty($pathToFolder)) {

                        //Get a list of all of the file names in the folder.
                        $files = glob($pathToFolder . '/*');

                        //Loop through the file list.
                        foreach ($files as $file) {
                            //Make sure that this is a file and not a directory.
                            if (is_file($file)) {
                                //Use the unlink function to delete the file.
                                unlink($file);
                            }
                        }

                    }

                    $pathToFolder = public_path('uploads\CVs\\');
                    $pathToFolder = $pathToFolder . $t->id . "\\";
                    if (!file_exists($pathToFolder)) {
                        mkdir($pathToFolder, "0777");
                    }
                    $upload_dir = $pathToFolder;


                    $uploadfile = time() . $request->updateTutorCV->getClientOriginalName();

                    $request->updateTutorCV->move($upload_dir, $uploadfile);

                    $t->tutor_cv = $upload_dir . $uploadfile;
                }
                $t->save();
            }


            Session::flash('success-creation', "Updated User's information successfully.");
            return redirect()->route('show_user_profile', ['id' => $user->id]);

        }


    }

    public function destroy($id)
    {
        Session::forget('success-creation');
        Session::forget('success');
        Session::forget('error');
        Session::forget('warning');
        $u = User::find($id);
        $u->delete();

        Session::flash('warning', 'The User has been successfully deleted.');
        return redirect()->route('all_users');
    }


    public function all_users()
    {

        $users = User::has('isTutor', 'is', null)->get();
        return view('Admin/all_users')->with('users', $users);
    }

    public function show_available_courses()
    {

        Session::forget('success-creation');
        Session::forget('success');
        Session::forget('error');
        Session::forget('warning');

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
        return view('show_available_courses')->with('courses', $courses)
            ->with('recommendations', $recommendations);
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


    public function display_course_content($id)
    {
        Session::forget('success-creation');
        Session::forget('success');
        Session::forget('error');
        Session::forget('warning');


        return view('display_course_content')->with('course', Course::find($id));

    }


    public function view_student_course_lecture($id)
    {
        Session::forget('success-creation');
        Session::forget('success');
        Session::forget('error');
        Session::forget('warning');


        $lecture = Lecture::find($id);
        if (!Str::startsWith($lecture->Lecture_attachments()->first()->path, 'http')) {
            $splits_name = preg_split("/\\\\/", $lecture->lecture_attachments()->first()->path);
            $splits_path = preg_split("/uploads/", $lecture->lecture_attachments()->first()->path);
            $splits_path = preg_replace('[\\\\]', '/', $splits_path);

            return view('view_student_course_lecture')->with('lecture', $lecture)
                ->with('attachName', $splits_name[count($splits_name) - 1])
                ->with('attachPath', $splits_path[count($splits_path) - 1]);

        }
        return view('view_student_course_lecture')->with('lecture', $lecture);
    }


    public function view_student_course_assignment($id)
    {
        Session::forget('success-creation');
        Session::forget('success');
        Session::forget('error');
        Session::forget('warning');


        $assignment = Assignment::find($id);

        $splits_names[] = null;
        foreach ($assignment->assignment_attachments()->get() as $att) {
            $path = preg_split("/\\\\/", $att->path);
            $splits_names[] = $path[count($path) - 1];
        }
        $splits_path = "/uploads/assignments/tutors/" . $assignment->id . "/";


        return view('view_student_course_assignment')->with('assignment', $assignment)
            ->with('attachNames', $splits_names)
            ->with('attachPath', $splits_path);


    }

    public function enter_course($id)
    {

        $c = Course::find($id);

        $myRating = Auth::user()->courses()->where('course_id', $id)->first()->pivot->rating;
        return view('enter_course')->with('course', $c)
            ->with('myRating', $myRating);
    }

    public function add_course_rating(Request $request, $id)
    {
        Session::forget('success-creation');
        Session::forget('success');
        Session::forget('error');
        Session::forget('warning');


        if(Auth::user()->courses()->where('course_id', $id)->first()->pivot->rating==0){//checking that this user hadnt rate this course before
            //add this user rating
            Auth::user()->courses()->updateExistingPivot($id, array('rating' => $request->rating));

            //calculating the new average course rating
            $c = Course::find($id);


            $total_rating = $c->course_rating;
            $total_rating *= 5;
            $total_rating += $request->rating;
            $total_rating /=  5;

            $c->course_rating = $total_rating;
            $c->save();

        }
        else{
            $oldRating=Auth::user()->courses()->where('course_id', $id)->first()->pivot->rating;

            //add this user rating
            Auth::user()->courses()->updateExistingPivot($id, array('rating' => $request->rating));

            //calculating the new average course rating
            $c = Course::find($id);


            $total_rating = $c->course_rating;
            $total_rating *= 5;
            $total_rating -=$oldRating;//sub the old rating
            $total_rating += $request->rating;
            $total_rating /=  5;

            $c->course_rating = $total_rating;
            $c->save();

        }



        Session::flash('success', "Added User's Rate to the course successfully.");
        return redirect()->route('enter_course',['id'=>$id]);
    }


    public function search_courses(Request $request)
    {

        Session::forget('success-creation');
        Session::forget('success');
        Session::forget('error');
        Session::forget('warning');

        $s = $request->searchCourseValue;


        if ($request->searchCourseType == 'title') {

            $res = Course::where('course_en_name', 'LIKE', '%' . $s . '%')
                ->whereDoesntHave('users', function ($query) {
                    $query->where('users.id', Auth::user()->id);
                })->paginate(3);

            $res->appends(['search' => $request->searchCourseValue]);
            return view('show_available_courses')->with('courses', $res)
                ->with('query', $request->all());


        } else if ($request->searchCourseType == 'category') {
            $res = Course::whereHas('category', function ($query) use ($s) {
                $query->where('categories.title', 'like', '%' . $s . '%');
            })->whereDoesntHave('users', function ($query) {
                $query->where('users.id', Auth::user()->id);
            })->paginate(3);

            return view('show_available_courses')->with('courses', $res)
                ->with('query', $request->all());

        }
    }


    public function upload_student_assignment()
    {
        Session::forget('success-creation');
        Session::forget('success');
        Session::forget('error');
        Session::forget('warning');

        $res = Auth::user()->courses()->whereHas('assignments')->get();
        $my_assignments = Auth::user()->student_assignments()->get();
        $final = collect();

        foreach ($res as $r) {
            $search = $my_assignments->firstWhere('course_id', $r->id);

            if ($search == null || Auth::user()->student_assignments()->where('course_id', $r->id)->count() < $r->assignments()->count()) {
                $final->push($r);
            }
        }

        $final = $final->unique();

        return view('upload_student_assignment')->with('courses', $final);
    }


    public function store_student_assignment(Request $request)
    {

        $this->validate($request, [
            'newStudentAssignmentCourse' => 'required',
            'newStudentAssignmentAttachment' => 'required|max:5000',
        ]);


        $assignment = new Student_assignment();
        $assignment->course_id = $request->newStudentAssignmentCourse;
        $assignment->user_id = Auth::user()->id;

        $assignment->save();


        $pathToFolder = public_path('uploads\assignments\students\\');
        $pathToFolder = $pathToFolder . $assignment->id . "\\";
        if (!file_exists($pathToFolder)) {
            mkdir($pathToFolder, "0777");
        }
        $upload_dir = $pathToFolder;


        $uploadfile = time() . $request->newStudentAssignmentAttachment->getClientOriginalName();

        $request->newStudentAssignmentAttachment->move($upload_dir, $uploadfile);


        $assignment->path = $upload_dir . $uploadfile;
        $assignment->save();


        Session::forget('success-creation');
        Session::forget('success');
        Session::forget('error');
        Session::forget('warning');

        Session::flash('success-creation', 'Uploaded a new assignment successfully');
        return redirect()->route('all_student_uploaded_assignments');


    }


    public function all_student_uploaded_assignments()
    {

        $assignments = Student_assignment::where('user_id', Auth::user()->id)->get();

        $attachNames[] = null;
        foreach ($assignments as $assign) {
            $splits_name = preg_split("/\\\\/", $assign->path);
            $attachNames[$assign->id] = $splits_name[count($splits_name) - 1];
        }


        $attachPath = "/uploads/assignments/students/";
        return view('all_student_uploaded_assignments')
            ->with('assignments', Student_assignment::where('user_id', Auth::user()->id)->get())
            ->with('attachNames', $attachNames)->with('attachPath', $attachPath);

    }


    public function edit_student_assignment($id)
    {
        Session::forget('success-creation');
        Session::forget('success');
        Session::forget('error');
        Session::forget('warning');


        $assignment = Student_assignment::find($id);


        $splits_name = preg_split("/\\\\/", $assignment->path);
        $attachName = $splits_name[count($splits_name) - 1];


        $attachPath = "/uploads/assignments/students/" . $id . "/";
        return view('edit_student_assignment')->with('assignment', $assignment)
            ->with('attachPath', $attachPath)
            ->with('attachName', $attachName);
    }


    public function update_student_assignment(Request $request, $id)
    {


        $this->validate($request, [
            'deleteOldAttachments' => 'required',
            'updateStudentAssignmentAttachment' => 'required|max:5000',
        ]);
        $assignment = Student_assignment::find($id);


        $pathToFolder = public_path('uploads\assignments\students\\');
        $pathToFolder = $pathToFolder . $assignment->id . "\\";

        if (!$this->is_dir_empty($pathToFolder)) {

            //Get a list of all of the file names in the folder.
            $files = glob($pathToFolder . '/*');

            //Loop through the file list.
            foreach ($files as $file) {
                //Make sure that this is a file and not a directory.
                if (is_file($file)) {
                    //Use the unlink function to delete the file.
                    unlink($file);
                }
            }

        }

        $pathToFolder = public_path('uploads\assignments\students\\');
        $pathToFolder = $pathToFolder . $assignment->id . "\\";
        if (!file_exists($pathToFolder)) {
            mkdir($pathToFolder, "0777");
        }
        $upload_dir = $pathToFolder;


        $uploadfile = time() . $request->updateStudentAssignmentAttachment->getClientOriginalName();

        $request->updateStudentAssignmentAttachment->move($upload_dir, $uploadfile);


        $assignment->path = $upload_dir . $id . "\\" . $uploadfile;


        $assignment->save();

        Session::forget('success-creation');
        Session::forget('success');
        Session::forget('error');
        Session::forget('warning');

        Session::flash('success-creation', 'The Assignment has been updated Successfully.');
        return redirect()->route('all_student_uploaded_assignments');

    }

    private function is_dir_empty($dir)
    {
        if (!is_readable($dir)) return NULL;
        return (count(scandir($dir)) == 2);
    }


    public function delete_student_assignment($id)
    {
        Session::forget('success-creation');
        Session::forget('success');
        Session::forget('error');
        Session::forget('warning');

        $a = Student_assignment::find($id);
        $pathToFolder = public_path('uploads\assignments\students\\');
        $pathToFolder = $pathToFolder . $a->id . "\\";

        if (!$this->is_dir_empty($pathToFolder)) {

            //Get a list of all of the file names in the folder.
            $files = glob($pathToFolder . '/*');

            //Loop through the file list.
            foreach ($files as $file) {
                //Make sure that this is a file and not a directory.
                if (is_file($file)) {
                    //Use the unlink function to delete the file.
                    unlink($file);
                }
            }

        }

        $a->delete();

        Session::flash('warning', 'The Assignment has been successfully deleted.');
        return redirect()->route('all_student_uploaded_assignments');

    }


    public function all_student_courses()
    {
        Session::forget('success-creation');
        Session::forget('success');
        Session::forget('error');
        Session::forget('warning');


        $courses = $courses = Course::whereHas('users', function ($query) {
            $query->where('users.id', Auth::user()->id);
        })->get();

        return view('all_student_courses')->with('courses', $courses);

    }


}
