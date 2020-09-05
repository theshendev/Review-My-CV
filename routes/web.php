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

Route::get('/', 'PageController@index');
Route::get('/about', 'PageController@about');
Route::post('/payment', 'PaymentController@checkout')->name('payment');

Auth::routes(['verify' => true]);

Route::get('/user/profile', 'UserController@profile')->name('user.profile')->middleware('verified');
Route::put('/users/{user}/update', 'UserController@update')->name('user.update');

Route::get('/login/reviewer', 'Auth\LoginController@showReviewerLoginForm');
Route::get('/register/reviewer', 'Auth\RegisterController@showReviewerRegisterForm');
Route::get('/register/reviewer/p2', 'Auth\RegisterController@showSecondRegisterForm');
Route::get('/register/p2', 'Auth\RegisterController@showSecondRegisterForm');

Route::post('/register', 'Auth\RegisterController@setData');

Route::post('/login/reviewer', 'Auth\LoginController@reviewerLogin')->name('login.reviewer');
Route::post('/register/reviewer', 'Auth\RegisterController@createReviewer')->name('register.reviewer');

Route::get('/reviewers', 'ReviewerController@index')->name('reviewers.index');
Route::get('/reviewers/{reviewer}', 'ReviewerController@show')->name('reviewer.show');
Route::put('/reviewers/{reviewer}/update', 'ReviewerController@update')->name('reviewer.update');
Route::post('/{reviewer}/{comment}/score','ReviewerController@add_score')->name('reviewer.score');
Route::get('/reviewer/profile', 'ReviewerController@profile')->name('reviewer.profile');


Route::prefix('users')->group(function (){
    Route::get('/','UserController@index')->name('users.index');
    Route::get('/{user}','UserController@show')->name('user.show');
    Route::get('/{user}/allow_reviewer/{reviewer}','UserController@allow_reviewer')->name('allow_reviewer');
    Route::get('/{user}/forbid_reviewer/{reviewer}','UserController@forbid_reviewer')->name('forbid_reviewer');
    Route::get('/{user}/download_cv/{reviewer}','UserController@download_cv')->name('cv_download');
    Route::post('/{user}/comment','CommentController@store')->name('comment.store');

});


Route::get('login/reviewer/{provider}', 'Auth\SocialiteController@redirectToProvider')->name('reviewer.social');
Route::get('login/{provider}', 'Auth\SocialiteController@redirectToProvider')->name('user.social');
Route::get('callback/{provider}', 'Auth\SocialiteController@handleProviderCallback');