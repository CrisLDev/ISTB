<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\UserController;

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

Route::redirect( '/', '/login');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Profile Routes

Route::get( '/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name( 'profile.index' );

Route::get( '/profile/create', [App\Http\Controllers\ProfileController::class, 'create'])->name( 'profile.create' );

Route::get( '/profile/edit/{id}', [App\Http\Controllers\ProfileController::class, 'edit'])->name( 'profile.edit' );

Route::put( '/profile/update/{id}', [App\Http\Controllers\ProfileController::class, 'update'])->name( 'profile.update' );

Route::post( '/profile/form', [App\Http\Controllers\ProfileController::class, 'store'])->name( 'profile.store' );

// User Routes

Route::get( '/users', [App\Http\Controllers\UserController::class, 'index'])->name( 'user.index' )->middleware('isAdmin');

Route::get( '/user/me', [App\Http\Controllers\UserController::class, 'me'])->name( 'user.me' );

Route::get( '/user/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name( 'user.edit' )->middleware('isAdmin');

Route::put( '/user/{id}', [App\Http\Controllers\UserController::class, 'update'])->name( 'user.update' )->middleware('isAdmin');

Route::delete( '/user/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name( 'user.delete' )->middleware('isAdmin');

Route::put( '/user/updateme/{id}', [UserController::class, 'updateme'])->name( 'user.updateme' );


// People Routes

Route::get( '/people', [App\Http\Controllers\PeopleController::class, 'index'])->name( 'people.index' )->middleware('isCoor');

Route::get( '/people/form/administration', [App\Http\Controllers\PeopleController::class, 'create'])->name( 'people.createAdmin' )->middleware('isCoor');

Route::post( '/people/form/administration', [App\Http\Controllers\PeopleController::class, 'storeAdmin'])->name( 'people.storeAdmin' )->middleware('isCoor');

Route::get( '/people/form/administration/edit/{id}', [App\Http\Controllers\PeopleController::class, 'editAdmin'])->name( 'people.editAdmin' )->middleware('isCoor');

Route::put( '/people/form/administration/edit/{id}', [App\Http\Controllers\PeopleController::class, 'updateAdmin'])->name( 'people.updateAdmin' )->middleware('isCoor');

Route::delete( '/people/form/administration/delete/{id}', [App\Http\Controllers\PeopleController::class, 'destroyAdmin'])->name( 'people.deleteAdmin' )->middleware('isCoor');

Route::get( '/people/form/student', [App\Http\Controllers\PeopleController::class, 'create'])->name( 'people.createStudent' )->middleware('isCoor');

Route::post( '/people/form/student', [App\Http\Controllers\PeopleController::class, 'storeStudent'])->name( 'people.storeStudent' )->middleware('isCoor');

Route::get( '/people/form/student/edit/{id}', [App\Http\Controllers\PeopleController::class, 'editStudent'])->name( 'people.editStudent' )->middleware('isCoor');

Route::put( '/people/form/student/edit/{id}', [App\Http\Controllers\PeopleController::class, 'updateStudent'])->name( 'people.updateStudent' )->middleware('isCoor');

Route::delete( '/people/form/student/delete/{id}', [App\Http\Controllers\PeopleController::class, 'destroyStudent'])->name( 'people.deleteStudent' )->middleware('isCoor');

Route::get( '/people/form/teacher', [App\Http\Controllers\PeopleController::class, 'create'])->name( 'people.createTeacher' )->middleware('isCoor');

Route::post( '/people/form/teacher', [App\Http\Controllers\PeopleController::class, 'storeTeacher'])->name( 'people.storeTeacher' )->middleware('isCoor');

Route::get( '/people/form/teacher/edit/{id}', [App\Http\Controllers\PeopleController::class, 'editTeacher'])->name( 'people.editTeacher' )->middleware('isCoor');

Route::put( '/people/form/teacher/edit/{id}', [App\Http\Controllers\PeopleController::class, 'updateTeacher'])->name( 'people.updateTeacher' )->middleware('isCoor');

Route::delete( '/people/form/teacher/delete/{id}', [App\Http\Controllers\PeopleController::class, 'destroyTeacher'])->name( 'people.deleteTeacher' )->middleware('isCoor');

// Another Routes
Route::get( '/other/form', [App\Http\Controllers\OtherController::class, 'form'])->name( 'other.form' )->middleware('isCoor');

Route::get( '/other/all', [App\Http\Controllers\OtherController::class, 'index'])->name( 'other.index' )->middleware('isCoor');

Route::post( '/other/form/activity', [App\Http\Controllers\OtherController::class, 'storeActivity'])->name( 'other.storeActivity' )->middleware('isCoor');

Route::post( '/other/form/course', [App\Http\Controllers\OtherController::class, 'storeCourse'])->name( 'other.storeCourse' )->middleware('isCoor');

Route::get( '/other/form/course/edit/{id}', [App\Http\Controllers\OtherController::class, 'editCourse'])->name( 'other.editCourse' )->middleware('isCoor');

Route::put( '/other/form/course/edit/{id}', [App\Http\Controllers\OtherController::class, 'updateCourse'])->name( 'other.updateCourse' )->middleware('isCoor');

Route::delete( '/other/form/course/delete/{id}', [App\Http\Controllers\OtherController::class, 'destroyCourse'])->name( 'other.deleteCourse' )->middleware('isCoor');

Route::get( '/other/form/activity/edit/{id}', [App\Http\Controllers\OtherController::class, 'editActivity'])->name( 'other.editActivity' )->middleware('isCoor');

Route::put( '/other/form/activity/edit/{id}', [App\Http\Controllers\OtherController::class, 'updateActivity'])->name( 'other.updateActivity' )->middleware('isCoor');

Route::delete( '/other/form/activity/delete/{id}', [App\Http\Controllers\OtherController::class, 'destroyActivity'])->name( 'other.deleteActivity' )->middleware('isCoor');

// Routes Students

Route::get( '/other/students', [App\Http\Controllers\OtherController::class, 'indexStudents'])->name( 'students.indexStudents' )->middleware('isCoor');

Route::get( '/other/students/{id}', [App\Http\Controllers\OtherController::class, 'showStudent'])->name( 'students.showStudent' )->middleware('isCoor');

Route::get( '/other/administration', [App\Http\Controllers\OtherController::class, 'indexAdministration'])->name( 'administration.indexAdministration' )->middleware('isCoor');

Route::get( '/other/teachers', [App\Http\Controllers\OtherController::class, 'indexTeachers'])->name( 'teachers.indexTeachers' )->middleware('isCoor');

// Routes Reports

Route::get( '/other/report/form', [App\Http\Controllers\OtherController::class, 'formReports'])->name( 'reports.index' )->middleware('isCoor');

Route::post( '/other/report/form', [App\Http\Controllers\OtherController::class, 'storeReport'])->name( 'other.storeReport' )->middleware('isCoor');

Route::get( '/other/reports', [App\Http\Controllers\OtherController::class, 'indexReports'])->name( 'reports.indexReports' )->middleware('isCoor');

Route::get( '/other/reports/edit/{id}', [App\Http\Controllers\OtherController::class, 'editReport'])->name( 'reports.editReport' )->middleware('isCoor');

Route::put( '/other/reports/update/{id}', [App\Http\Controllers\OtherController::class, 'updateReport'])->name( 'reports.updateReport' )->middleware('isCoor');

Route::delete( '/other/reports/delete/{id}', [App\Http\Controllers\OtherController::class, 'destroyReport'])->name( 'reports.destroyReport' )->middleware('isCoor');

// Routes Reports

Route::get( '/other/records/form', [App\Http\Controllers\OtherController::class, 'formRecord'])->name( 'records.index' )->middleware('isCoor');

Route::post( '/other/records/form', [App\Http\Controllers\OtherController::class, 'storeRecord'])->name( 'records.storeRecords' )->middleware('isCoor');

Route::get( '/other/records', [App\Http\Controllers\OtherController::class, 'indexRecord'])->name( 'records.indexRecords' )->middleware('isCoor');

Route::get( '/other/records/edit/{id}', [App\Http\Controllers\OtherController::class, 'editRecord'])->name( 'records.editRecords' )->middleware('isCoor');

Route::put( '/other/records/update/{id}', [App\Http\Controllers\OtherController::class, 'updateRecord'])->name( 'records.updateRecords' )->middleware('isCoor');

Route::delete( '/other/records/delete/{id}', [App\Http\Controllers\OtherController::class, 'destroyRecord'])->name( 'records.destroyRecords' )->middleware('isCoor');

// Only Users Views

Route::get( '/consult/{code}', [App\Http\Controllers\UserController::class, 'consult'])->name( 'consult.index' );

Route::post( '/consult', [App\Http\Controllers\UserController::class, 'consultRedirect'])->name( 'consult.redir' );

// Routes Grades

Route::get( '/other/grades/form', [App\Http\Controllers\OtherController::class, 'formGrades'])->name( 'grades.index' )->middleware('isCoor');

Route::post( '/other/grades/form', [App\Http\Controllers\OtherController::class, 'storeGrades'])->name( 'grades.storeGrades' )->middleware('isCoor');

Route::get( '/other/dailyactivity/edit/{id}', [App\Http\Controllers\OtherController::class, 'editDaily'])->name( 'dactivities.editDaily' )->middleware('isCoor');

Route::put( '/other/dailyactivity/update/{id}', [App\Http\Controllers\OtherController::class, 'updateDaily'])->name( 'dactivities.updateDaily' )->middleware('isCoor');

Route::delete( '/other/dailyactivity/delete/{id}', [App\Http\Controllers\OtherController::class, 'destroyDaily'])->name( 'dactivities.destroyDaily' )->middleware('isCoor');

// Assistance

Route::post('/other/assitance/{id}', [App\Http\Controllers\AssistanceController::class, 'store'])->name( 'assitance.create' )->middleware('isCoor');

Route::get('/other/assitance/{id}', [App\Http\Controllers\AssistanceController::class, 'index'])->name( 'assitance.index' )->middleware('isCoor');

Route::get('/other/assitance/edit/{id}', [App\Http\Controllers\AssistanceController::class, 'show'])->name( 'assitance.show' )->middleware('isCoor');

Route::delete('/other/assitance/delete/{id}', [App\Http\Controllers\AssistanceController::class, 'destroy'])->name( 'assitance.delete' )->middleware('isCoor');

Route::put('/other/assitance/{id}', [App\Http\Controllers\AssistanceController::class, 'update'])->name( 'assitance.update' )->middleware('isCoor');