<?php

use App\Course;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    broadcast(new \App\Events\GlobalWebSocketEvent('some data'));
    return view('welcome');
})->name('welcome');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/messages','\App\Http\Controllers\ChatsController@getMessages');
Route::post('/messages','\App\Http\Controllers\ChatsController@sendMessage');
Route::get('/clearMessages','\App\Http\Controllers\ChatsController@clearMessages');

Route::middleware("auth")->prefix('Admin')->group(function () {


    Route::get('/messages','\App\Http\Controllers\ChatsController@getMessages');
    Route::post('/messages','\App\Http\Controllers\ChatsController@sendMessage');
    Route::get('/clearMessages','\App\Http\Controllers\ChatsController@clearMessages');


    Route::get('/create_tutor', '\App\Http\Controllers\TutorsController@create')->name('create_tutor');
    Route::get('/create_tutor/messages','\App\Http\Controllers\ChatsController@getMessages');
    Route::post('/create_tutor/messages','\App\Http\Controllers\ChatsController@sendMessage');
    Route::get('/create_tutor/clearMessages','\App\Http\Controllers\ChatsController@clearMessages');


    Route::get('/create_user', '\App\Http\Controllers\UsersController@create')->name('create_user');
    Route::get('/create_user/messages','\App\Http\Controllers\ChatsController@getMessages');
    Route::post('/create_user/messages','\App\Http\Controllers\ChatsController@sendMessage');
    Route::get('/create_user/clearMessages','\App\Http\Controllers\ChatsController@clearMessages');

    Route::post('/store_tutor', '\App\Http\Controllers\TutorsController@store')->name('store_tutor');
    Route::post('/store_user', '\App\Http\Controllers\UsersController@store')->name('store_user');

    Route::get('/delete_user/{id}', '\App\Http\Controllers\UsersController@destroy')->name('delete_user');
    Route::get('/delete_tutor/{id}', '\App\Http\Controllers\TutorsController@destroy')->name('delete_tutor');

    Route::get('/all_users', '\App\Http\Controllers\UsersController@all_users')->name('all_users');
    Route::get('/all_users/messages','\App\Http\Controllers\ChatsController@getMessages');
    Route::post('/all_users/messages','\App\Http\Controllers\ChatsController@sendMessage');
    Route::get('/all_users/clearMessages','\App\Http\Controllers\ChatsController@clearMessages');


    Route::get('/all_tutors', '\App\Http\Controllers\TutorsController@all_tutors')->name('all_tutors');
    Route::get('/all_tutors/messages','\App\Http\Controllers\ChatsController@getMessages');
    Route::post('/all_tutors/messages','\App\Http\Controllers\ChatsController@sendMessage');
    Route::get('/all_tutors/clearMessages','\App\Http\Controllers\ChatsController@clearMessages');


    Route::get('/create_courses_category', '\App\Http\Controllers\HomeController@create_courses_category')->name('create_courses_category');
    Route::get('/create_courses_category/messages','\App\Http\Controllers\ChatsController@getMessages');
    Route::post('/create_courses_category/messages','\App\Http\Controllers\ChatsController@sendMessage');
    Route::get('/create_courses_category/clearMessages','\App\Http\Controllers\ChatsController@clearMessages');


    Route::post('/store_courses_category', '\App\Http\Controllers\HomeController@store_courses_category')->name('store_courses_category');

    Route::get('/all_courses_categories', '\App\Http\Controllers\HomeController@all_courses_categories')->name('all_courses_categories');
    Route::get('/all_courses_categories/messages','\App\Http\Controllers\ChatsController@getMessages');
    Route::post('/all_courses_categories/messages','\App\Http\Controllers\ChatsController@sendMessage');
    Route::get('/all_courses_categories/clearMessages','\App\Http\Controllers\ChatsController@clearMessages');

    Route::get('/delete_courses_category/{id}', '\App\Http\Controllers\HomeController@delete_courses_category')->name('delete_courses_category');

});


Route::middleware("auth")->prefix('Tutor')->group(function () {

    Route::get('/create_course', '\App\Http\Controllers\TutorsController@create_course')->name('create_course');
    Route::get('/create_course/messages','\App\Http\Controllers\ChatsController@getMessages');
    Route::post('/create_course/messages','\App\Http\Controllers\ChatsController@sendMessage');
    Route::get('/create_course/clearMessages','\App\Http\Controllers\ChatsController@clearMessages');

    Route::post('/store_course', '\App\Http\Controllers\TutorsController@store_course')->name('store_course');

    Route::get('/edit_course/{id}', '\App\Http\Controllers\TutorsController@edit_course')->name('edit_course');
    Route::get('/edit_course/{id}/messages','\App\Http\Controllers\ChatsController@getMessages');
    Route::post('/edit_course/{id}/messages','\App\Http\Controllers\ChatsController@sendMessage');
    Route::get('/edit_course/{id}/clearMessages','\App\Http\Controllers\ChatsController@clearMessages');


    Route::post('/update_course/{id}', '\App\Http\Controllers\TutorsController@update_course')->name('update_course');


    Route::get('/delete_course/{id}', '\App\Http\Controllers\TutorsController@delete_course')->name('delete_course');


    Route::get('/all_tutor_courses', '\App\Http\Controllers\TutorsController@all_tutor_courses')->name('all_tutor_courses');
    Route::get('/all_tutor_courses/messages','\App\Http\Controllers\ChatsController@getMessages');
    Route::post('/all_tutor_courses/messages','\App\Http\Controllers\ChatsController@sendMessage');
    Route::get('/all_tutor_courses/clearMessages','\App\Http\Controllers\ChatsController@clearMessages');


    Route::get('/view_tutor_course/{id}', '\App\Http\Controllers\TutorsController@view_tutor_course')->name('view_tutor_course');
    Route::get('/view_tutor_course/{id}/messages','\App\Http\Controllers\ChatsController@getMessages');
    Route::post('/view_tutor_course/{id}/messages','\App\Http\Controllers\ChatsController@sendMessage');
    Route::get('/view_tutor_course/{id}/clearMessages','\App\Http\Controllers\ChatsController@clearMessages');


    Route::get('/all_course_lectures/{id}', '\App\Http\Controllers\TutorsController@all_course_lectures')->name('all_course_lectures');
    Route::get('/all_course_lectures/{id}/messages','\App\Http\Controllers\ChatsController@getMessages');
    Route::post('/all_course_lectures/{id}/messages','\App\Http\Controllers\ChatsController@sendMessage');
    Route::get('/all_course_lectures/{id}/clearMessages','\App\Http\Controllers\ChatsController@clearMessages');


    Route::get('/create_lecture/{id}', '\App\Http\Controllers\TutorsController@create_lecture')->name('create_lecture');
    Route::get('/create_lecture/{id}/messages','\App\Http\Controllers\ChatsController@getMessages');
    Route::post('/create_lecture/{id}/messages','\App\Http\Controllers\ChatsController@sendMessage');
    Route::get('/create_lecture/{id}/clearMessages','\App\Http\Controllers\ChatsController@clearMessages');

    Route::post('/store_lecture', '\App\Http\Controllers\TutorsController@store_lecture')->name('store_lecture');

    Route::get('/view_course_lecture/{id}', '\App\Http\Controllers\TutorsController@view_course_lecture')->name('view_course_lecture');
    Route::get('/view_course_lecture/{id}/messages','\App\Http\Controllers\ChatsController@getMessages');
    Route::post('/view_course_lecture/{id}/messages','\App\Http\Controllers\ChatsController@sendMessage');
    Route::get('/view_course_lecture/{id}/clearMessages','\App\Http\Controllers\ChatsController@clearMessages');


    Route::get('/edit_course_lecture/{id}', '\App\Http\Controllers\TutorsController@edit_course_lecture')->name('edit_course_lecture');
    Route::get('/edit_course_lecture/{id}/messages','\App\Http\Controllers\ChatsController@getMessages');
    Route::post('/edit_course_lecture/{id}/messages','\App\Http\Controllers\ChatsController@sendMessage');
    Route::get('/edit_course_lecture/{id}/clearMessages','\App\Http\Controllers\ChatsController@clearMessages');


    Route::post('/update_course_lecture/{id}', '\App\Http\Controllers\TutorsController@update_course_lecture')->name('update_course_lecture');

    Route::get('/delete_course_lecture/{id}', '\App\Http\Controllers\TutorsController@delete_course_lecture')->name('delete_course_lecture');





    Route::get('/create_assignment/{id}', '\App\Http\Controllers\TutorsController@create_assignment')->name('create_assignment');
    Route::get('/create_assignment/{id}/messages','\App\Http\Controllers\ChatsController@getMessages');
    Route::post('/create_assignment/{id}/messages','\App\Http\Controllers\ChatsController@sendMessage');
    Route::get('/create_assignment/{id}/clearMessages','\App\Http\Controllers\ChatsController@clearMessages');



    Route::post('/store_assignment', '\App\Http\Controllers\TutorsController@store_assignment')->name('store_assignment');


    Route::get('/all_course_assignments/{id}', '\App\Http\Controllers\TutorsController@all_course_assignments')->name('all_course_assignments');
    Route::get('/all_course_assignments/{id}/messages','\App\Http\Controllers\ChatsController@getMessages');
    Route::post('/all_course_assignments/{id}/messages','\App\Http\Controllers\ChatsController@sendMessage');
    Route::get('/all_course_assignments/{id}/clearMessages','\App\Http\Controllers\ChatsController@clearMessages');

    Route::get('/edit_assignment/{id}', '\App\Http\Controllers\TutorsController@edit_assignment')->name('edit_assignment');
    Route::get('/edit_assignment/{id}/messages','\App\Http\Controllers\ChatsController@getMessages');
    Route::post('/edit_assignment/{id}/messages','\App\Http\Controllers\ChatsController@sendMessage');
    Route::get('/edit_assignment/{id}/clearMessages','\App\Http\Controllers\ChatsController@clearMessages');


    Route::post('/update_assignment/{id}', '\App\Http\Controllers\TutorsController@update_assignment')->name('update_assignment');

    Route::get('/delete_assignment/{id}', '\App\Http\Controllers\TutorsController@delete_assignment')->name('delete_assignment');



    Route::get('/all_uploaded_assignments', '\App\Http\Controllers\TutorsController@all_uploaded_assignments')->name('all_uploaded_assignments');
    Route::get('/all_uploaded_assignments/messages','\App\Http\Controllers\ChatsController@getMessages');
    Route::post('/all_uploaded_assignments/messages','\App\Http\Controllers\ChatsController@sendMessage');
    Route::get('/all_uploaded_assignments/clearMessages','\App\Http\Controllers\ChatsController@clearMessages');


    Route::get('/preview_uploaded_assignment/{id}', '\App\Http\Controllers\TutorsController@preview_uploaded_assignment')->name('preview_uploaded_assignment');
    Route::get('/preview_uploaded_assignment/{id}/messages','\App\Http\Controllers\ChatsController@getMessages');
    Route::post('/preview_uploaded_assignment/{id}/messages','\App\Http\Controllers\ChatsController@sendMessage');
    Route::get('/preview_uploaded_assignment/{id}/clearMessages','\App\Http\Controllers\ChatsController@clearMessages');

    Route::post('/grade_student_assignment/{id}', '\App\Http\Controllers\TutorsController@grade_student_assignment')->name('grade_student_assignment');


});
Route::middleware('auth')->group(function () {

    Route::get('/show_user_profile/{id}', '\App\Http\Controllers\UsersController@show')->name('show_user_profile');
    Route::get('/show_user_profile/messages','\App\Http\Controllers\ChatsController@getMessages');
    Route::post('/show_user_profile/messages','\App\Http\Controllers\ChatsController@sendMessage');
    Route::get('/show_user_profile/clearMessages','\App\Http\Controllers\ChatsController@clearMessages');

    Route::get('/edit_user/{id}', '\App\Http\Controllers\UsersController@edit')->name('edit_user');
    Route::get('/edit_user/messages','\App\Http\Controllers\ChatsController@getMessages');
    Route::post('/edit_user/messages','\App\Http\Controllers\ChatsController@sendMessage');
    Route::get('/edit_user/clearMessages','\App\Http\Controllers\ChatsController@clearMessages');


    Route::post('/update_user/{id}', '\App\Http\Controllers\UsersController@update')->name('update_user');

    Route::get('/show_available_courses', '\App\Http\Controllers\UsersController@show_available_courses')->name('show_available_courses');
    Route::get('/show_available_courses/messages','\App\Http\Controllers\ChatsController@getMessages');
    Route::post('/show_available_courses/messages','\App\Http\Controllers\ChatsController@sendMessage');
    Route::get('/show_available_courses/clearMessages','\App\Http\Controllers\ChatsController@clearMessages');


    Route::get('/display_course_content/{id}', '\App\Http\Controllers\UsersController@display_course_content')->name('display_course_content');


    Route::get('/search_courses', '\App\Http\Controllers\UsersController@search_courses')->name('search_courses');


    Route::get('/enroll_course/{id}', function($id){
        $c=App\Course::find($id);
        Auth::user()->courses()->attach($c);
        return redirect()->route('enter_course',['id'=>$id]);
    })->name('enroll_course');


    Route::get('/enter_course/{id}', '\App\Http\Controllers\UsersController@enter_course')->name('enter_course');


    Route::get('/leave_course/{id}', function($id){
        $c=App\Course::find($id);
        Auth::user()->courses()->detach($c);
        Session::flash('warning','Left course successfully');
        return redirect()->route('home');
    })->name('leave_course');


    Route::get('/view_student_course_lecture/{id}', '\App\Http\Controllers\UsersController@view_student_course_lecture')->name('view_student_course_lecture');
    Route::get('/view_student_course_lecture/{id}/messages','\App\Http\Controllers\ChatsController@getMessages');
    Route::post('/view_student_course_lecture/{id}/messages','\App\Http\Controllers\ChatsController@sendMessage');
    Route::get('/view_student_course_lecture/{id}/clearMessages','\App\Http\Controllers\ChatsController@clearMessages');



    Route::get('/view_student_course_assignment/{id}', '\App\Http\Controllers\UsersController@view_student_course_assignment')->name('view_student_course_assignment');
    Route::get('/view_student_course_assignment/{id}/messages','\App\Http\Controllers\ChatsController@getMessages');
    Route::post('/view_student_course_assignment/{id}/messages','\App\Http\Controllers\ChatsController@sendMessage');
    Route::get('/view_student_course_assignment/{id}/clearMessages','\App\Http\Controllers\ChatsController@clearMessages');


    Route::get('/upload_student_assignment', '\App\Http\Controllers\UsersController@upload_student_assignment')->name('upload_student_assignment');
    Route::get('/upload_student_assignment/messages','\App\Http\Controllers\ChatsController@getMessages');
    Route::post('/upload_student_assignment/messages','\App\Http\Controllers\ChatsController@sendMessage');
    Route::get('/upload_student_assignment/clearMessages','\App\Http\Controllers\ChatsController@clearMessages');


    Route::post('/store_student_assignment', '\App\Http\Controllers\UsersController@store_student_assignment')->name('store_student_assignment');



    Route::get('/all_student_uploaded_assignments', '\App\Http\Controllers\UsersController@all_student_uploaded_assignments')->name('all_student_uploaded_assignments');
    Route::get('/all_student_uploaded_assignments/messages','\App\Http\Controllers\ChatsController@getMessages');
    Route::post('/all_student_uploaded_assignments/messages','\App\Http\Controllers\ChatsController@sendMessage');
    Route::get('/all_student_uploaded_assignments/clearMessages','\App\Http\Controllers\ChatsController@clearMessages');


    Route::get('/edit_student_assignment/{id}', '\App\Http\Controllers\UsersController@edit_student_assignment')->name('edit_student_assignment');
    Route::get('/edit_student_assignment/{id}/messages','\App\Http\Controllers\ChatsController@getMessages');
    Route::post('/edit_student_assignment/{id}/messages','\App\Http\Controllers\ChatsController@sendMessage');
    Route::get('/edit_student_assignment/{id}/clearMessages','\App\Http\Controllers\ChatsController@clearMessages');


    Route::post('/update_student_assignment/{id}', '\App\Http\Controllers\UsersController@update_student_assignment')->name('update_student_assignment');

    Route::get('/delete_student_assignment/{id}', '\App\Http\Controllers\UsersController@delete_student_assignment')->name('delete_student_assignment');


    Route::get('/all_student_courses', '\App\Http\Controllers\UsersController@all_student_courses')->name('all_student_courses');
    Route::get('/all_student_courses/messages','\App\Http\Controllers\ChatsController@getMessages');
    Route::post('/all_student_courses/messages','\App\Http\Controllers\ChatsController@sendMessage');
    Route::get('/all_student_courses/clearMessages','\App\Http\Controllers\ChatsController@clearMessages');


    Route::post('/add_course_raing/{id}', '\App\Http\Controllers\UsersController@add_course_rating')->name('add_course_rating');




});



Route::prefix('Front-end')->group(function () {
    Route::get('/index', '\App\Http\Controllers\FrontEndController@index')->name('index');
    Route::get('/about', '\App\Http\Controllers\FrontEndController@about')->name('about');
    Route::get('/courses', '\App\Http\Controllers\FrontEndController@courses')->name('courses');
    Route::get('/contact', '\App\Http\Controllers\FrontEndController@contact')->name('contact');
    Route::get('/tutors', '\App\Http\Controllers\FrontEndController@tutors')->name('tutors');
    Route::get('/single-course/{id}', '\App\Http\Controllers\FrontEndController@single_course')->name('single-course');

    Route::get('/search-courses','\App\Http\Controllers\FrontEndController@search_courses')->name('search_front_end');
});


Route::get('/messages','\App\Http\Controllers\ChatsController@getMessages');
Route::post('/messages','\App\Http\Controllers\ChatsController@sendMessage');
Route::get('/clearMessages','\App\Http\Controllers\ChatsController@clearMessages');


Route::get('auth/social', 'Auth\LoginController@show')->name('social.login');
Route::get('oauth/{driver}', 'Auth\LoginController@redirectToProvider')->name('social.oauth');
Route::get('oauth/{driver}/callback', 'Auth\LoginController@handleProviderCallback')->name('social.callback');