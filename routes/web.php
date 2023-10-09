<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PersonalDetailController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect(route('login'));
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('user', 'App\Http\Controllers\UserController');

    Route::resource('permission', 'PermissionController');

    Route::get('/profile', 'App\Http\Controllers\UserController@profile')->name('user.profile');

    Route::post('/profile', 'App\Http\Controllers\UserController@postProfile')->name('user.postProfile');

    Route::get('/password/change', 'App\Http\Controllers\UserController@getPassword')->name('userGetPassword');

    Route::post('/password/change', 'App\Http\Controllers\UserController@postPassword')->name('userPostPassword');

    Route::resource('personaldetail', 'App\Http\Controllers\PersonalDetailController');
    Route::resource('documenttype','App\Http\Controllers\DocumentTypeController');


});


Route::get('/search/user', 'UserController@search');

