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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/login/reviewer', 'Auth\LoginController@showReviewerLoginForm');
Route::get('/register/reviewer', 'Auth\RegisterController@showReviewerRegisterForm');

Route::post('/login/reviewer', 'Auth\LoginController@reviewerLogin')->name('login.reviewer');
Route::post('/register/reviewer', 'Auth\RegisterController@createReviewer');

Route::view('/reviewer', 'reviewer')->middleware('auth:reviewer')->name('reviewer');