<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    $richardson=['nutsack1','nutsack2','nutsack3'];
    return view('welcome', compact('richardson'));
});

Route::group(['middleware' => ['web']], function () {
	Route::resource('posts', 'PostsController');
});
Route::auth();

Route::get('/home', 'HomeController@index');
