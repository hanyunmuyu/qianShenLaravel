<?php

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

Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@login');
Route::get('/captcha', 'CaptchaController@index');
Route::group(['middleware' => ['adminAuth']], function () {
    Route::get('/', 'IndexController@index');
    Route::get('/dashboard', 'DashboardController@index');
    Route::get('/user/index', 'UserController@index');
    Route::get('/user/list', 'UserController@list');
    Route::get('/school/index', 'SchoolController@index');
    Route::get('/school/list', 'SchoolController@list');
    Route::get('/community/index', 'CommunityController@index');
    Route::get('/community/list', 'CommunityController@list');
    Route::get('/category/index', 'CategoryController@index');
    Route::get('/category/list', 'CategoryController@list');
});
