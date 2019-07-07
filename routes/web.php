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
    return view('index');
});

Auth::routes();

Route::get('/info/preface', 'HomeController@preface');
Route::get('/info/contents', 'HomeController@contents');
Route::get('/info/articles', 'HomeController@articles');

Route::get('/comments', 'CommentController@index');
