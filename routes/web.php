<?php

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
    return view('index');
});

Auth::routes();

Route::get('/user/profile', 'UserController@profile')->name('profile');

Route::get('/login/reviewer', 'Auth\LoginController@showReviewerLoginForm');
Route::get('/register/reviewer', 'Auth\RegisterController@showReviewerRegisterForm');

Route::post('/login/reviewer', 'Auth\LoginController@reviewerLogin')->name('login.reviewer');
Route::post('/register/reviewer', 'Auth\RegisterController@createReviewer')->name('register.reviewer');

Route::get('/reviewers', 'ReviewerController@index')->name('reviewers.index');
Route::get('/reviewers/{reviewer}', 'ReviewerController@show')->name('reviewer.show');
Route::post('/{reviewer}/{comment}/score','ReviewerController@add_score')->name('reviewer.score');
Route::view('/reviewer', 'reviewer')->middleware('auth:reviewer')->name('reviewer');


Route::get('/users','UserController@index')->name('users.index');
Route::get('/users/{user}','UserController@show')->name('user.show');
Route::get('/users/{user}/allow_reviewer/{reviewer}','UserController@allow_reviewer')->name('allow_reviewer');
Route::get('/users/{user}/forbid_reviewer/{reviewer}','UserController@forbid_reviewer')->name('forbid_reviewer');
Route::get('/users/{user}/download_cv/{reviewer}','UserController@download_cv')->name('cv_download');

Route::post('/users/{user}/comment','CommentController@store')->name('comment.store');


Route::get('login/reviewer/{provider}', 'Auth\LoginController@redirectToProvider')->name('linkedin');
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider')->name('google');
Route::get('callback/{provider}', 'Auth\LoginController@handleProviderCallback');