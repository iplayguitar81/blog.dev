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
use App\Post;
use App\User;



Route::get('/', function () {
    $posts = Post::orderBy('created_at', 'desc')->paginate(3);
    $users = User::all();

    return view('welcome', compact('posts', 'users'));
});

//Route::get('/contact', function () {
//
//
//    return view('contact');
//});

Route::get('contact',
    ['as' => 'contact', 'uses' => 'AboutController@create']);
Route::post('contact',
    ['as' => 'contact_store', 'uses' => 'AboutController@store']);





Route::get('/posts/user_posts','PostsController@user_posts');

Route::get('/posts/file_upload', ['as' => 'posts.file_upload', 'uses'=>'PostsController@file_upload']);

Route::get('/posts/file_export', ['as' => 'posts.file_export', 'uses'=>'PostsController@file_export']);

Route::post('/posts/file_upload', 'PostsController@postUploadCsv');

Route::post('/posts/post_rating', ['as' => 'posts.post_rating', 'uses'=>'PostsController@userRating']);
//Route::get('/posts/post_rating', 'PostsController@userRating');



Route::group(['middleware' => ['web']], function () {
	Route::resource('posts', 'PostsController');




});

Route::get('posts/{id}/{title}', ['as' => 'posts.show', 'uses' => 'PostsController@show']);
Route::resource('posts', 'PostsController');

Route::auth();

Route::get('/home', 'HomeController@index');


#Route::resource('users','UsersController');

#Route::get('/posts/user_posts', 'PostsController@user_posts');

//Route::get('social/login/redirect/{provider}', ['uses' => 'Auth\AuthController@redirectToProvider', 'as' => 'social.login']);
//Route::get('social/login/{provider}', 'Auth\AuthController@handleProviderCallback');
Route::resource('ratings', 'RatingsController');