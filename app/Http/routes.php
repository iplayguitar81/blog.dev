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


Route::get('/', function () {
    $posts = Post::paginate(15);
    return view('welcome', compact('posts'));
});

Route::group(['middleware' => ['web']], function () {
	Route::resource('posts', 'PostsController');




});
Route::auth();

Route::get('/home', 'HomeController@index');

#Route::get('/posts/user_posts', 'PostsController@user_posts');

//Route::get('social/login/redirect/{provider}', ['uses' => 'Auth\AuthController@redirectToProvider', 'as' => 'social.login']);
//Route::get('social/login/{provider}', 'Auth\AuthController@handleProviderCallback');