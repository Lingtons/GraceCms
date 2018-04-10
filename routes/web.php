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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'auth'], function () {
Route::get('home', 'HomeController@index');
Route::resource('posts', 'PostController');
Route::resource('booster', 'BoosterController');
Route::resource('lesson', 'LessonController');
Route::get('add_lesson/{p_id}', 'PostController@post_lesson_create');
Route::put('update_avatar/{p_id}', 'PostController@update_avatar');
});

