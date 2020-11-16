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

Route::get( '/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name( 'profile.index' )->middleware('isAdmin');

Route::get( '/profile/update', [App\Http\Controllers\ProfileController::class, 'update'])->name( 'profile.update' );

// User Routes

Route::get( '/users/', [App\Http\Controllers\UserController::class, 'index'])->name( 'user.index' );

Route::get( '/user/me', [App\Http\Controllers\UserController::class, 'me'])->name( 'user.me' );

Route::get( '/user/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name( 'user.edit' );

Route::put( '/user/{id}', [App\Http\Controllers\UserController::class, 'update'])->name( 'user.update' );

Route::delete( '/user/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name( 'user.delete' );

Route::put( '/user/updateme/{id}', [UserController::class, 'updateme'])->name( 'user.updateme' );


// People Routes

Route::get( '/people', [App\Http\Controllers\PeopleController::class, 'index'])->name( 'people.index' );

Route::get( '/people/form/administration', [App\Http\Controllers\PeopleController::class, 'create'])->name( 'people.createAdmin' );

Route::post( '/people/form/administration', [App\Http\Controllers\PeopleController::class, 'storeAdmin'])->name( 'people.storeAdmin' );

Route::get( '/people/form/administration/edit/{id}', [App\Http\Controllers\PeopleController::class, 'editAdmin'])->name( 'people.editAdmin' );

Route::put( '/people/form/administration/edit/{id}', [App\Http\Controllers\PeopleController::class, 'updateAdmin'])->name( 'people.updateAdmin' );

Route::delete( '/people/form/administration/delete/{id}', [App\Http\Controllers\PeopleController::class, 'destroyAdmin'])->name( 'people.deleteAdmin' );

Route::get( '/people/form/student', [App\Http\Controllers\PeopleController::class, 'create'])->name( 'people.createStudent' );

Route::post( '/people/form/student', [App\Http\Controllers\PeopleController::class, 'storeStudent'])->name( 'people.storeStudent' );

Route::get( '/people/form/student/edit/{id}', [App\Http\Controllers\PeopleController::class, 'editStudent'])->name( 'people.editStudent' );

Route::put( '/people/form/student/edit/{id}', [App\Http\Controllers\PeopleController::class, 'updateStudent'])->name( 'people.updateStudent' );

Route::delete( '/people/form/student/delete/{id}', [App\Http\Controllers\PeopleController::class, 'destroyStudent'])->name( 'people.deleteStudent' );

Route::get( '/people/form/teacher', [App\Http\Controllers\PeopleController::class, 'create'])->name( 'people.createTeacher' );

Route::post( '/people/form/teacher', [App\Http\Controllers\PeopleController::class, 'storeTeacher'])->name( 'people.storeTeacher' );

Route::get( '/people/form/teacher/edit/{id}', [App\Http\Controllers\PeopleController::class, 'editTeacher'])->name( 'people.editTeacher' );

Route::put( '/people/form/teacher/edit/{id}', [App\Http\Controllers\PeopleController::class, 'updateTeacher'])->name( 'people.updateTeacher' );

Route::delete( '/people/form/teacher/delete/{id}', [App\Http\Controllers\PeopleController::class, 'destroyTeacher'])->name( 'people.deleteTeacher' );

// Another Routes
Route::get( '/other/form', [App\Http\Controllers\OtherController::class, 'index'])->name( 'other.index' );

Route::post( '/other/form/subject', [App\Http\Controllers\OtherController::class, 'storeSubject'])->name( 'other.storeSubject' );

Route::post( '/other/form/course', [App\Http\Controllers\OtherController::class, 'storeCourse'])->name( 'other.storeCourse' );

// Routes Students

Route::get( '/other/students', [App\Http\Controllers\OtherController::class, 'indexStudents'])->name( 'students.indexStudents' );

Route::get( '/other/students/{id}', [App\Http\Controllers\OtherController::class, 'showStudent'])->name( 'students.showStudent' );

Route::get( '/other/administration', [App\Http\Controllers\OtherController::class, 'indexAdministration'])->name( 'administration.indexAdministration' );

Route::get( '/other/teachers', [App\Http\Controllers\OtherController::class, 'indexTeachers'])->name( 'teachers.indexTeachers' );

// Routes Reports

Route::get( '/other/report/form', [App\Http\Controllers\OtherController::class, 'formReports'])->name( 'reports.index' );

Route::post( '/other/report/form', [App\Http\Controllers\OtherController::class, 'storeReport'])->name( 'other.storeReport' );

Route::get( '/other/reports', [App\Http\Controllers\OtherController::class, 'indexReports'])->name( 'reports.indexReports' );

Route::get( '/other/reports/edit/{id}', [App\Http\Controllers\OtherController::class, 'editReport'])->name( 'reports.editReport' );

Route::put( '/other/reports/update/{id}', [App\Http\Controllers\OtherController::class, 'updateReport'])->name( 'reports.updateReport' );

Route::delete( '/other/reports/delete/{id}', [App\Http\Controllers\OtherController::class, 'destroyReport'])->name( 'reports.destroyReport' );

// Routes Grades

Route::get( '/other/grades/form', [App\Http\Controllers\OtherController::class, 'formGrades'])->name( 'grades.index' );

Route::post( '/other/grades/form', [App\Http\Controllers\OtherController::class, 'storeGrade'])->name( 'other.storeGrade' );

Route::get( '/other/grades', [App\Http\Controllers\OtherController::class, 'indexGrades'])->name( 'grades.indexGrades' );

Route::get( '/other/grades/edit/{id}', [App\Http\Controllers\OtherController::class, 'editGrade'])->name( 'grades.editGrade' );

Route::put( '/other/grades/update/{id}', [App\Http\Controllers\OtherController::class, 'updateGrade'])->name( 'grades.updateGrade' );

Route::delete( '/other/grades/delete/{id}', [App\Http\Controllers\OtherController::class, 'destroyGrade'])->name( 'grades.destroyGrade' );