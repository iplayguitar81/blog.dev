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
use Intervention\Image\Facades\Image;
use App\User;
use AdamWathan\EloquentOAuth\Facades\OAuth;
//use App\Rating;

//use Stevebauman\Location\Facades\Location;
//use Stevebauman\Location\Objects\Location;
//use Stevebauman\Location;
//use Stevebauman\Location\Location;

//use Stevebauman\Location\Objects\Location;
//use Stevebauman\Location\Facades\Location;

use Torann\GeoIP\GeoIPFacade as GeoIP;


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






Route::get('contact',
    ['as' => 'contact', 'uses' => 'AboutController@create']);
Route::post('contact',
    ['as' => 'contact_store', 'uses' => 'AboutController@store']);





Route::get('/posts/user_posts','PostsController@user_posts');

Route::get('/posts/test_slides','PostsController@test_slides');


Route::get('/posts/file_upload', ['as' => 'posts.file_upload', 'uses'=>'PostsController@file_upload']);

Route::get('/posts/file_export', ['as' => 'posts.file_export', 'uses'=>'PostsController@file_export']);



Route::post('/posts/file_upload', 'PostsController@postUploadCsv');
Route::post('/posts/file_upload', 'PostsController@postUploadCsv');





Route::post('/posts/post_rating', 'PostsController@userRating');
Route::post('posts/{id}/{title}', 'PostsController@userRating');



Route::get('/posts/post_rating', ['as' => 'posts.post_rating','uses'=>'PostsController@post_rating']);



Route::group(['middleware' => ['web']], function () {
	Route::resource('posts', 'PostsController');




});

Route::get('posts/{id}/{title}', ['as' => 'posts.show', 'uses' => 'PostsController@show']);

Route::get('/test_code/{id}/', ['as' => 'posts.test_code', 'uses' => 'PostsController@test_code']);


Route::get('/show_user/{id}', ['as' => 'posts.show_user', 'uses'=>'PostsController@show_user']);

//Route::get('posts/test_code/{id}',['as' => 'posts.test_code', 'uses'=>'PostsController@test_code']);


Route::resource('posts', 'PostsController');

Route::auth();

Route::get('/home', 'HomeController@index');

//Route::post('posts/create/uploadFiles', 'PostsController@uploadFiles');


Route::get('/posts/create', ['as' => 'upload', 'uses' => 'PostsController@getUpload']);
Route::post('upload', ['as' => 'upload-post', 'uses' =>'PostsController@postUpload']);


Route::post('do-upload', ['as' => 'do-upload', 'uses' =>'PostsController@doImageUpload']);


//Route::post('upload', function () {
//
//    $input = Input::all();
//
//    $rules = array(
//        'file' => 'image|max:3000',
//    );
//
//    $validation = Validator::make($input, $rules);
//
//    if ($validation->fails())
//    {
//        return Response::make($validation->errors->first(), 400);
//    }
//
//    $file = Input::file('file');
//    //$albumID = Input::get('albumID');
//  //  $museumName = Input::get('museumName');
//
//    if($file) {
//
//        $destinationPath = public_path() . '/images/';
//      //  $filename = $file->getClientOriginalName();
//        $filename = $file->getClientOriginalName();
//
//        $upload_success = Input::file('file')->move($destinationPath, $filename);
//
//        if ($upload_success) {
//
//            // resizing an uploaded file
//            Image::make($destinationPath . $filename)->resize(100, 100)->save($destinationPath . "100x100_" . $filename);
//
//            $image = New Image();
//            $image->img_path = $filename;
//           // $image->path = $destinationPath;
//          //  $image->album_id = $albumID;
//            $image->save();
//
//            return Response::json('success', 200);
//        } else {
//            return Response::json('error', 400);
//        }
//    }
//});
//Route::post('upload/delete', ['as' => 'upload-remove', 'uses' =>'PostsController@deleteUpload']);

Route::delete('upload/delete/', [
    'as' => 'upload-remove',
    'uses' => 'PostsController@deleteUpload'
]);
//destroy_image

Route::delete('delete/{id}',array('uses' => 'PostsController@destroy_image', 'as' => 'My.route'));


Route::post('update/{id}', ['as' => 'My.route2', 'uses' =>'PostsController@update_image_caption']);
//Route::post('update/{id}',array('uses' => 'PostsController@update_image_caption', 'as' => 'My.route2'));



//Route::post(
//    'posts/search',
//    array(
//        'as' => 'posts.search',
//        'uses' => 'PostsController@postSearch'
//    )
//);
//Route::get('posts/search', ['as' => 'posts.search', 'uses' => 'PostsController@searchResults']);

//Route::resource('search','as'=>'posts.search';


#Route::resource('users','UsersController');

#Route::get('/posts/user_posts', 'PostsController@user_posts');

//Route::get('social/login/redirect/{provider}', ['uses' => 'Auth\AuthController@redirectToProvider', 'as' => 'social.login']);
//Route::get('social/login/{provider}', 'Auth\AuthController@handleProviderCallback');
Route::resource('ratings', 'RatingsController');

Route::post('posts/search', ['as' => 'posts.search', 'uses'=>'PostsController@getIndex']);

Route::get('search', 'PostsController@getIndex');
Route::resource('post-images', 'PostImagesController');