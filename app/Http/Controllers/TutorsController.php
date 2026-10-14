<?php

namespace App\Http\Controllers;

use App\Assignment;
use App\Assignment_attachment;
use App\Category;
use App\Course;
use App\Lecture_attachment;
use App\Student_assignment;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Hash;
use App\User;
Use App\Tutor;
use App\Lecture;
use Auth;
use Illuminate\Support\Str;


class TutorsController extends Controller
{


    public function create()
    {
        Session::forget('success-creation');
        Session::forget('success');
        Session::forget('error');
        Session::forget('warning');

        return view('Admin/create_tutor');
    }


    public function store(Request $request)
    {
        Session::forget('success-creation');
        Session::forget('success');
        Session::forget('error');
        Session::forget('warning');
        $this->validate($request, [
            'newTutorName' => array(
                'required',
                'min:5',
                'max:255',
                'regex:/(^([a-zA-Z]+)([\d+]|_|-|\s|[a-zA-Z])*$)/u'
            ),
            'newTutorEmail' => 'required|email',
            'newTutorPassword' => 'required',

        ]);

        $u = new User();
        $u->name = $request->newTutorName;
        $u->email = $request->newTutorEmail;
        $u->password = Hash::make($request->newTutorPassword);

        if (isset($request->newTutorMobile))
            $u->mobile = $request->newTutorMobile;

        $u->save();
        $t = new Tutor();

        if (isset($request->newTutorDiploma))
            $t->tutor_diploma = $request->newTutorDiploma;


        $t->user_id = $u->id;
        $t->save();

        Session::flash('success-creation', 'New Tutor has been created Successfully.');
        return redirect()->route('all_tutors');
    }


    public function destroy($id)
    {
        Session::forget('success-creation');
        Session::forget('success');
        Session::forget('error');
        Session::forget('warning');
        $t = Tutor::find($id);
        $t->user->delete();
        $t->delete();

        Session::flash('warning', 'The Tutor has been successfully deleted.');
        return redirect()->route('all_tutors');
    }


    public function all_tutors()
    {
        return view('Admin/all_tutors')->with('tutors', Tutor::all());
    }

    public function create_course()
    {
        Session::forget('success-creation');
        Session::forget('success');
        Session::forget('error');
        Session::forget('warning');

        //$cats=Category::whereNull('parent_id')->get();
        $cats = $this->find_leaves_categories();


        return view('Tutor/create_course')->with('categories', $cats);
    }

    private function find_leaves_categories()
    {
        $cats = Category::all();
        $parentsIDs = collect();
        foreach ($cats as $c) {
            if ($c['parent_id'] !== null) {
                $parentsIDs->push($c['parent_id']);
            }
        }
        $parentsIDs = $parentsIDs->unique();

        $leaves = collect();
        foreach ($cats as $c) {
            if ($parentsIDs->search($c->id) !== false) {
                continue;

            } else {
                $leaves->push($c);
            }
        }
        return $leaves->unique();
    }


    public function store_course(Request $request)
    {
        Session::forget('success-creation');
        Session::forget('success');
        Session::forget('error');
        Session::forget('warning');
        $this->validate($request, [
            'newCourseENName' => 'required|max:255|min:5',
            'newCourseCode' => 'required|alpha_dash',
            'newCourseCategory' => 'required',
            'newCourseImage' => 'required|image',
        ]);


        $course = null;
        if (isset($request->newCourseNickName)) {
            $course = Course::create([
                'course_en_name' => $request->newCourseENName,
                'course_nickname' => $request->newCourseNickName,
                'course_code' => $request->newCourseCode,
                'category_id' => $request->newCourseCategory,
                'tutor_id' => Auth::user()->isTutor()->first()->id
            ]);
        } else {
            $course = Course::create([
                'course_en_name' => $request->newCourseENName,
                'course_code' => $request->newCourseCode,
                'category_id' => $request->newCourseCategory,
                'tutor_id' => Auth::user()->isTutor()->first()->id

            ]);
        }

        $pathToFolder = public_path('uploads\courses\\');
        $pathToFolder = $pathToFolder . $course->id . "\\";

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

        $pathToFolder = public_path('uploads\courses\\');
        $pathToFolder = $pathToFolder . $course->id . "\\";
        if (!file_exists($pathToFolder)) {
            mkdir($pathToFolder, "0777");
        }
        $upload_dir = $pathToFolder;


        $uploadfile = time() . $request->newCourseImage->getClientOriginalName();

        $request->newCourseImage->move($upload_dir, $uploadfile);
        $course->course_image = $upload_dir . $uploadfile;
        $course->save();

        Session::flash('success-creation', 'New Course has been created Successfully.');
        return redirect()->route('all_tutor_courses');
    }


    public function all_tutor_courses()
    {

        return view('Tutor/all_tutor_courses')->with('courses', Course::where('tutor_id',
            Auth::user()->isTutor()->first()->id)->get());

    }

    public function edit_course($id)
    {
        Session::forget('success-creation');
        Session::forget('success');
        Session::forget('error');
        Session::forget('warning');

        $cats = $this->find_leaves_categories();

        return view('Tutor/edit_course')->with('course', Course::find($id))->with('categories', $cats);

    }


    public function update_course(Request $request, $id)
    {
        Session::forget('success-creation');
        Session::forget('success');
        Session::forget('error');
        Session::forget('warning');
        $this->validate($request, [
            'updateCourseENName' => 'required|max:255|min:5',
            'updateCourseCode' => 'required|alpha_dash|min:5|max:255',
            'updateCourseCategory' => 'required',

        ]);


        $course = Course::find($id);
        $course->course_en_name = $request->updateCourseENName;
        $course->course_code = $request->updateCourseCode;
        $course->category_id = $request->updateCourseCategory;

        if (isset($request->updateCourseNickName)) {
            $course->course_nickname = $request->updateCourseNickName;
        }

        if(isset($request->updateCourseImage)){

            $pathToFolder = public_path('uploads\courses\\');
            $pathToFolder = $pathToFolder . $course->id . "\\";

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

            $pathToFolder = public_path('uploads\courses\\');
            $pathToFolder = $pathToFolder . $course->id . "\\";
            if (!file_exists($pathToFolder)) {
                mkdir($pathToFolder, "0777");
            }
            $upload_dir = $pathToFolder;


            $uploadfile = time() . $request->updateCourseImage->getClientOriginalName();

            $request->updateCourseImage->move($upload_dir, $uploadfile);
            $course->course_image = $upload_dir . $uploadfile;

        }


        $course->save();

        Session::flash('success-creation', 'The Course has been updated Successfully.');
        return redirect()->route('all_tutor_courses');


    }


    public function delete_course($id)
    {
        Session::forget('success-creation');
        Session::forget('success');
        Session::forget('error');
        Session::forget('warning');

        foreach (Lecture::where('course_id', $id)->get() as $l) {
            $l->lecture_attachments()->first()->delete();
            $l->delete();
        }
        $c = Course::find($id);

        $pathToFolder = public_path('uploads\courses\\');
        $pathToFolder = $pathToFolder . $c->id . "\\";

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

        $c->delete();

        Session::flash('warning', 'The Course has been successfully deleted.');
        return redirect()->route('all_tutor_courses');
    }


    public function view_tutor_course($id)
    {

        $c = Course::find($id);

        return view('Tutor/view_tutor_course')->with('course', $c);

    }


    public function create_lecture($id)
    {
        Session::forget('success-creation');
        Session::forget('success');
        Session::forget('error');
        Session::forget('warning');


        return view('Tutor/create_lecture')->with('course_id', $id);
    }


    public function store_lecture(Request $request)
    {
        $this->validate($request, [
            'newLectureCourseID' => 'required',
            'newLectureTitle' => array(
                'required',
                'min:5',
                'max:255',
                'regex:/(^([a-zA-Z]+)([\d+]|_|-|\s|[a-zA-Z])*$)/u'
            ),
            'newLectureAttachment' => 'required|max:5000',

        ]);

        if (Str::startsWith($request->newLectureAttachment, 'http')) {
            if (isset($request->newLectureDescription)) {
                $lecture = Lecture::create([
                    'title' => $request->newLectureTitle,
                    'description' => $request->newLectureDescription,
                    'course_id' => $request->newLectureCourseID,
                    'tutor_id' => Auth::user()->isTutor()->first()->id,

                ]);

                Lecture_attachment::create([
                    'path' => $request->newLectureAttachment,
                    'lecture_id' => $lecture->id
                ]);
            } else {
                $lecture = Lecture::create([
                    'title' => $request->newLectureTitle,
                    'course_id' => $request->newLectureCourseID,
                    'tutor_id' => Auth::user()->isTutor()->first()->id,

                ]);
                Lecture_attachment::create([
                    'path' => $request->newLectureAttachment,
                    'lecture_id' => $lecture->id
                ]);
            }
        } else {
            if (isset($request->newLectureDescription)) {
                $lecture = Lecture::create([
                    'title' => $request->newLectureTitle,
                    'description' => $request->newLectureDescription,
                    'course_id' => $request->newLectureCourseID,
                    'tutor_id' => Auth::user()->isTutor()->first()->id,

                ]);
            } else {
                $lecture = Lecture::create([
                    'title' => $request->newLectureTitle,
                    'course_id' => $request->newLectureCourseID,
                    'tutor_id' => Auth::user()->isTutor()->first()->id,

                ]);

            }
            $att = $request->newLectureAttachment;
            $att_name = time() . $att->getClientOriginalName();
            $pathToFolder = public_path('uploads\lectures\\');
            $pathToFolder = $pathToFolder . $lecture->id . "\\";
            if (!file_exists($pathToFolder)) {
                mkdir($pathToFolder, "0777");
            }
            $upload_dir = $pathToFolder;

            $att->move($upload_dir, $att_name);


            Lecture_attachment::create([
                'path' => $upload_dir . $att_name,
                'lecture_id' => $lecture->id
            ]);


        }

        Session::forget('success-creation');
        Session::forget('success');
        Session::forget('error');
        Session::forget('warning');

        Session::flash('success-creation', 'The Lecture has been successfully Added.');
        return redirect()->route('view_tutor_course', ['id' => $request->newLectureCourseID]);

    }


    public function all_course_lectures($id)
    {
        return view('Tutor/all_course_lectures')->with('lectures', Lecture::where('course_id',
            $id)->get());
    }

    public function view_course_lecture($id)
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

            return view('Tutor/view_course_lecture')->with('lecture', $lecture)
                ->with('attachName', $splits_name[count($splits_name) - 1])
                ->with('attachPath', $splits_path[count($splits_path) - 1]);

        }
        return view('Tutor/view_course_lecture')->with('lecture', $lecture);
    }


    public function edit_course_lecture($id)
    {
        Session::forget('success-creation');
        Session::forget('success');
        Session::forget('error');
        Session::forget('warning');

        $lecture = Lecture::find($id);

        if (!Str::startsWith($lecture->lecture_attachments()->first()->path, 'http')) {
            $splits = preg_split("/\\\\/", $lecture->lecture_attachments()->first()->path);
            $splits_path = preg_split("/uploads/", $lecture->lecture_attachments()->first()->path);


            return view('Tutor/edit_course_lecture')
                ->with('lecture', $lecture)->with('attachmentName', $splits[count($splits) - 1])
                ->with('attachPath', $splits_path[count($splits_path) - 1]);

        } else {
            return view('Tutor/edit_course_lecture')->with('lecture', $lecture);

        }
    }


    public function update_course_lecture(Request $request, $id)
    {
        $this->validate($request, [
            'updateLectureTitle' => array(
                'required',
                'min:5',
                'max:255',
                'regex:/(^([a-zA-Z]+)([\d+]|_|-|\s|[a-zA-Z])*$)/u'
            ),

        ]);

        $lecture = Lecture::find($id);
        $lecture->title = $request->updateLectureTitle;
        if (isset($request->updateLectureDescription)) {
            $lecture->description = $request->updateLectureDescription;
        }

        $lecture->save();

        if (isset($request->updateLectureAttachment)) {

            if (Str::startsWith($request->updateLectureAttachment, 'http')) {
                $lecture->lecture_attachments()->first()->delete();
                $pathToFolder = public_path('uploads\lectures\\');
                $pathToFolder = $pathToFolder . $lecture->id . "\\";

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

                Lecture_attachment::create([
                    'path' => $request->updateLectureAttachment,
                    'lecture_id' => $lecture->id
                ]);
            } else {

                $lecture->lecture_attachments()->first()->delete();
                $att = $request->updateLectureAttachment;
                $att_name = time() . $att->getClientOriginalName();
                $pathToFolder = public_path('uploads\lectures\\');
                $pathToFolder = $pathToFolder . $lecture->id . "\\";


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


                if (!file_exists($pathToFolder)) {
                    mkdir($pathToFolder, "0777");
                }
                $upload_dir = $pathToFolder;

                $att->move($upload_dir, $att_name);


                Lecture_attachment::create([
                    'path' => $upload_dir . $att_name,
                    'lecture_id' => $lecture->id
                ]);

            }
        }

        Session::forget('success-creation');
        Session::forget('success');
        Session::forget('error');
        Session::forget('warning');

        Session::flash('success-creation', 'The Lecture has been updated Successfully.');
        return redirect()->route('all_course_lectures');
    }

    private function is_dir_empty($dir)
    {
        if (!is_readable($dir)) return NULL;
        return (count(scandir($dir)) == 2);
    }

    public function delete_course_lecture($id)
    {
        Session::forget('success-creation');
        Session::forget('success');
        Session::forget('error');
        Session::forget('warning');

        $l = Lecture::find($id);

        $pathToFolder = public_path('uploads\lectures\\');
        $pathToFolder = $pathToFolder . $l->id . "\\";

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
        foreach ($l->lecture_attachments()->get() as $a) {

            $a->delete();
        }
        $l->delete();

        Session::flash('warning', 'The Lecture has been successfully deleted.');
        return redirect()->route('all_course_lectures');
    }


    public function create_assignment($id)
    {
        Session::forget('success-creation');
        Session::forget('success');
        Session::forget('error');
        Session::forget('warning');


        return view('Tutor/create_assignment')->with('course_id', $id);
    }


    public function store_assignment(Request $request)
    {

        $this->validate($request, [
            'newAssignmentTitle' => array(
                'required',
                'min:5',
                'max:255',
                'regex:/(^([a-zA-Z]+)([\d+]|_|-|\s|[a-zA-Z])*$)/u'
            ),
            'newAssignmentDescription' => 'required|min:5|max:255',
            'newAssignmentAttachments' => 'required|max:5000',
        ]);


        $assignment = new Assignment();
        $assignment->title = $request->newAssignmentTitle;
        $assignment->description = $request->newAssignmentDescription;

        $assignment->course_id = $request->newAssignmentCourseID;

        $assignment->tutor_id = Auth::user()->isTutor()->first()->id;


        $assignment->save();


        $pathToFolder = public_path('uploads\assignments\tutors\\');
        $pathToFolder = $pathToFolder . $assignment->id . "\\";
        if (!file_exists($pathToFolder)) {
            mkdir($pathToFolder, "0777");
        }
        $upload_dir = $pathToFolder;

        // $att->move($upload_dir, $att_name);

        $length = count($request->newAssignmentAttachments);


        for ($i = 0; $i < $length; $i++) {

            $uploadfile = time() . $request->newAssignmentAttachments[$i]->getClientOriginalName();

            $request->newAssignmentAttachments[$i]->move($upload_dir, $uploadfile);

            Assignment_attachment::create([
                'path' => $upload_dir . $uploadfile,
                'assignment_id' => $assignment->id
            ]);


        }

        Session::forget('success-creation');
        Session::forget('success');
        Session::forget('error');
        Session::forget('warning');

        Session::flash('success-creation', 'created a new assignment successfully');
        return redirect()->route('view_tutor_course');

    }


    public function all_course_assignments($id)
    {

        $assignments = Assignment::where('course_id', $id)->get();
        $attachNames[][] = null;
        foreach ($assignments as $assign) {
            foreach ($assign->assignment_attachments()->get() as $att) {
                $splits_name = preg_split("/\\\\/", $att->path);
                $attachNames[$assign->id] [] = $splits_name[count($splits_name) - 1];
            }
        }


        $attachPath = "/uploads/assignments/tutors/";
        return view('Tutor/all_course_assignments')->with('assignments', $assignments)->with('attachPath', $attachPath)
            ->with('attachNames', $attachNames);

    }

    public function edit_assignment($id)
    {
        Session::forget('success-creation');
        Session::forget('success');
        Session::forget('error');
        Session::forget('warning');


        $assignment = Assignment::find($id);


        $attachNames[][] = null;
        foreach ($assignment->assignment_attachments()->get() as $att) {
            $splits_name = preg_split("/\\\\/", $att->path);
            $attachNames[$assignment->id] [] = $splits_name[count($splits_name) - 1];
        }


        $attachPath = "/uploads/assignments/tutors/" . $id . "/";
        $attachments = Assignment_attachment::where('assignment_id', $id);
        return view('Tutor/edit_assignment')->with('assignment', $assignment)->with('attachments', $attachments)
            ->with('attachPath', $attachPath)
            ->with('attachNames', $attachNames);
    }


    public function update_assignment(Request $request, $id)
    {
        $this->validate($request, [
            'updateAssignmentTitle' => array(
                'required',
                'min:5',
                'max:255',
                'regex:/(^([a-zA-Z]+)([\d+]|_|-|\s|[a-zA-Z])*$)/u'
            ),
            'updateAssignmentDescription' => 'required|max:255|min:5'

        ]);

        $assignment = Assignment::find($id);
        $assignment->title = $request->updateAssignmentTitle;
        $assignment->description = $request->updateAssignmentDescription;


        $assignment->save();

        if (isset($request->deleteOldAttachments) && isset($request->updateAssignmentAttachments)) {


            $pathToFolder = public_path('uploads\assignments\tutors\\');
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
            foreach ($assignment->assignment_attachments()->get() as $att) {
                $att->delete();
            }
            $pathToFolder = public_path('uploads\assignments\tutors\\');
            $pathToFolder = $pathToFolder . $assignment->id . "\\";
            if (!file_exists($pathToFolder)) {
                mkdir($pathToFolder, "0777");
            }
            $upload_dir = $pathToFolder;


            $length = count($request->updateAssignmentAttachments);


            for ($i = 0; $i < $length; $i++) {

                $uploadfile = time() . $request->updateAssignmentAttachments[$i]->getClientOriginalName();

                $request->updateAssignmentAttachments[$i]->move($upload_dir, $uploadfile);

                Assignment_attachment::create([
                    'path' => $upload_dir . $uploadfile,
                    'assignment_id' => $assignment->id
                ]);


            }

        }
        Session::forget('success-creation');
        Session::forget('success');
        Session::forget('error');
        Session::forget('warning');

        Session::flash('success', 'The Assignment has been updated Successfully.');
        return redirect()->route('all_course_assignments');

    }


    public function delete_assignment($id)
    {
        Session::forget('success-creation');
        Session::forget('success');
        Session::forget('error');
        Session::forget('warning');

        $a = Assignment::find($id);
        $pathToFolder = public_path('uploads\assignments\tutors\\');
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
        foreach ($a->assignment_attachments()->get() as $att)
            $att->delete();
        $a->delete();

        Session::flash('warning', 'The Assignment has been successfully deleted.');
        return redirect()->route('all_course_assignments');

    }


    #of students of the tutor's courses to grade them
    public function all_uploaded_assignments()
    {
        Session::forget('success');
        Session::forget('error');
        Session::forget('warning');

        $myCourses = Course::where('tutor_id', Auth::user()->isTutor()->first()->id)->get();

        $assignments = array();
        foreach ($myCourses as $c) {
            $assignments[$c->id] = Student_assignment::where('course_id', $c->id)->get();
        }

        return view('Tutor/all_uploaded_assignments')->with('assignments', $assignments);

    }

    public function preview_uploaded_assignment($id)
    {
        $assign = Student_assignment::find($id);
        $splits_name = preg_split("/\\\\/", $assign->path);
        $attachName = $splits_name[count($splits_name) - 1];


        $attachPath = "/uploads/assignments/students/" . $id . "/";
        return view('Tutor/preview_uploaded_assignment')->with('assignment', $assign)
            ->with('attachPath', $attachPath)
            ->with('attachName', $attachName);
    }


    public function grade_student_assignment(Request $request, $id)
    {

        $this->validate($request, [
            'studentAssignmentGrade' => 'required|numeric|lte:100|gte:0',

        ]);

        if ($request->studentAssignmentGrade > 100 || $request->studentAssignmentGrade < 0) {

        }

        $assignment = Student_assignment::find($id);
        $assignment->grade = $request->studentAssignmentGrade;
        if (isset($request->studentAssignmentFeedback))
            $assignment->feedback = $request->studentAssignmentFeedback;


        $assignment->save();


        Session::forget('success-creation');
        Session::forget('success');
        Session::forget('error');
        Session::forget('warning');

        Session::flash('success-creation', 'Graded student assignment successfully');


        return redirect()->route('all_uploaded_assignments');

    }


}
