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
use AdamWathan\EloquentOAuth\Facades\OAuth;
//use App\Rating;

//use Stevebauman\Location\Facades\Location;
//use Stevebauman\Location\Objects\Location;
//use Stevebauman\Location;
//use Stevebauman\Location\Location;

//use Stevebauman\Location\Objects\Location;
//use Stevebauman\Location\Facades\Location;

//use GeoIp2\Record\Location;

//use Torann\GeoIP\GeoIP;
use Torann\GeoIP;


use willvincent\Rateable\Rating;

use willvincent\Rateable\Rateable;
Route::get('/', function () {

    $location = GeoIP::getLocation();
    $posts = Post::orderBy('created_at', 'desc')->paginate(3);
    $users = User::all();
    $ratings =Rating::all();
    return view('welcome', compact('posts', 'users','ratings','location'));
});

//social login package establish authorize route......
Route::get('github/authorize', function(){
    return OAuth::authorize('github');
});
//log user into social network.... also store users email within this function...
Route::get('github/login', function(){
    OAuth::login('github', function ($user, $userDetails){

        $user->email = $userDetails->email;
        $user->name = $userDetails->full_name;

        $user->save();
      //  dd($userDetails);
    });
    return Redirect::intended();

});
//facebook routes.....

// Redirect to Facebook for authorization
Route::get('facebook/authorize', function() {
    return OAuth::authorize('facebook');
});

// Facebook redirects here after authorization
Route::get('facebook/login', function() {

    // Automatically log in existing users
    // or create a new user if necessary.
    OAuth::login('facebook', function ($user, $userDetails){

        $user->email = $userDetails->email;
        $user->name = $userDetails->full_name;
        $user->avatar = $userDetails->avatar;
        $user->save();

    });

    return Redirect::intended();
});


//google routes.....

// Redirect to Google for authorization
Route::get('google/authorize', function() {
    return OAuth::authorize('google');
});

// Google redirects here after authorization
Route::get('google/login', function() {

    // Automatically log in existing users
    // or create a new user if necessary.
    OAuth::login('google', function ($user, $userDetails){

        $user->email = $userDetails->email;
        $user->name = $userDetails->full_name;
        $user->avatar = $userDetails->avatar;


        $user->save();
    });
    return Redirect::intended();
});


// Redirect to Twitter for authorization
Route::get('twitter/authorize', function() {
    return OAuth::authorize('twitter');
});

// Twitter redirects here after authorization
Route::get('twitter/login', function() {

    // Automatically log in existing users
    // or create a new user if necessary.
    OAuth::login('twitter', function ($user, $userDetails){

        $user->email = $userDetails->email;
        $user->name = $userDetails->full_name;
        $user->avatar = $userDetails->avatar;


        $user->save();
    });
    return Redirect::intended();
});



Route::get('contact',
    ['as' => 'contact', 'uses' => 'AboutController@create']);
Route::post('contact',
    ['as' => 'contact_store', 'uses' => 'AboutController@store']);





Route::get('/posts/user_posts','PostsController@user_posts');

Route::get('/posts/file_upload', ['as' => 'posts.file_upload', 'uses'=>'PostsController@file_upload']);

Route::get('/posts/file_export', ['as' => 'posts.file_export', 'uses'=>'PostsController@file_export']);



Route::post('/posts/file_upload', 'PostsController@postUploadCsv');

Route::post('/posts/post_rating', 'PostsController@userRating');
Route::post('posts/{id}/{title}', 'PostsController@userRating');



Route::get('/posts/post_rating', ['as' => 'posts.post_rating','uses'=>'PostsController@post_rating']);



Route::group(['middleware' => ['web']], function () {
	Route::resource('posts', 'PostsController');




});

Route::get('posts/{id}/{title}', ['as' => 'posts.show', 'uses' => 'PostsController@show']);
Route::get('/show_user/{id}', ['as' => 'posts.show_user', 'uses'=>'Auth\AuthController@show_user']);
Route::resource('posts', 'PostsController');

Route::auth();

Route::get('/home', 'HomeController@index');


#Route::resource('users','UsersController');

#Route::get('/posts/user_posts', 'PostsController@user_posts');

//Route::get('social/login/redirect/{provider}', ['uses' => 'Auth\AuthController@redirectToProvider', 'as' => 'social.login']);
//Route::get('social/login/{provider}', 'Auth\AuthController@handleProviderCallback');
Route::resource('ratings', 'RatingsController');