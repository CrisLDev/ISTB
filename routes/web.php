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

Route::get( '/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name( 'profile.index' )->middleware('isAdmin');

Route::get( '/profile/update', [App\Http\Controllers\ProfileController::class, 'update'])->name( 'profile.update' );

Route::get( '/user/me', [App\Http\Controllers\UserController::class, 'me'])->name( 'user.me' );

Route::put( '/user/{id}', [App\Http\Controllers\UserController::class, 'update'])->name( 'user.update' );

Route::put( '/user/updateme/{id}', [UserController::class, 'updateme'])->name( 'user.updateme' );