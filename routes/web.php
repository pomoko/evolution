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

use Illuminate\Http\Request;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('index');
});
Route::get('/eng', function () {
    return view('eng.index');
});

Auth::routes();

Route::get('/contact', 'HomeController@contact');
Route::post('/contact/sendMail', "HomeController@sendMail");

Route::get('/info/preface', 'HomeController@preface');
Route::get('/info/contents', 'HomeController@contents');
Route::get('/info/articles', 'HomeController@articles');
Route::get('/info/bookInfo', 'HomeController@bookInfo');

Route::get('/reviews', 'HomeController@reviews');
Route::get('/eng/reviews', 'HomeController@reviewsEng');

Route::get('/comments', 'CommentController@index');
Route::get('/comments/store', 'CommentController@store');
Route::get('/comments/getAll', 'CommentController@getAll');
Route::post('/comments/delete', 'CommentController@delete');
Route::post('/comments/update', 'CommentController@update');

//english
Route::get('/eng/info/preface', 'HomeController@prefaceEng');
Route::get('/eng/info/contents', 'HomeController@contentsEng');
Route::get('/eng/info/articles', 'HomeController@articlesEng');
Route::get('/eng/info/bookInfo', 'HomeController@bookInfoEng');
Route::get('/eng/info/references', 'HomeController@referencesEng');

Route::get('/eng/contact', 'HomeController@contactEng');
Route::get('/eng/comments', 'CommentController@indexEng');
Route::get('/eng/comments/store', 'CommentController@store');
Route::get('/eng/comments/getAll', 'CommentController@getAll');
