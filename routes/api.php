<?php
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'v1', 'namespace' => 'v1'], function () {
    Route::post('/login', 'LoginController@login');
    Route::post('/upload', 'UploadController@index');
    Route::get('/', 'IndexController@index');
    Route::group(['middleware' => ['jwt.auth']], function () {
        Route::get('user', 'UserController@index');
    });
});
