<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Facade;

use App\Post;

use \App;
use Illuminate\Support\Facades\DB;


use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Validator;
use Flash;
use Illuminate\Routing\Route;

use Auth;

use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Redirect;
use willvincent\Rateable\Rateable;
use willvincent\Rateable\Rating;
use Illuminate\Database\Eloquent\Model;
use Torann\GeoIP\GeoIPFacade as GeoIP;


class PostsController extends Controller
{
    use Rateable;


    /**
     * Display a listing of the resource.
     *
     * @return void
     *
     *
     *
     */

    public function index( )
    {

  //      $excel= \App::make('excel');

//        $results = Excel::load('app/test-file.csv')->get();

    
        $user=Auth::id();

        #$posts = Post::where('user_id','=', Auth::id())->get();

        // the right way to do target date range for archives if need be....
        //$posts = Post::orderBy('created_at', 'desc')->whereBetween('created_at',array('2016-05-24','2016-05-25'))->paginate(3);

        $posts = Post::orderBy('created_at', 'desc')->paginate(3);
        
        

        #$posts=User::with(['posts'])->all();
      #  $posts = Post::where('user_id','=', Auth::id())->get();

       #$posts=dd(\App\User::paginate(5));

        return view('posts.index', compact('posts', 'user', 'results'));

        $this->authorize('isAdmin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {

        if(Auth::user()) {
        $user =Auth::user()->id;
        }

        return view('posts.create', compact('user'));
        $this->authorize('isAdmin');
    }

    public function post_rating(){


        return view('posts.post_rating');

    }


    public function userRating(Request $request){

        //this needs to be similar to show function and pass $id into it to pull up right
        // record then it will work


        $post = Post::findOrFail($request->input('post_id'));
        
        $rating = new Rating;

        //gotta pass the post_id into this also.....hidden value.......

        //store the actual user input for the rating.....
        $rating->rating = $request->input('starRate');
        $rating->rate_message = $request->input('userRateMsg');

        //logged in user id of user making rating
        $rating->user_id = \Auth::id();

        $post->ratings()->save($rating);


     //  dd(Post::first()->ratings);

        return Redirect::back();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function postUploadCsv()
    {
        $rules = array(
//            'title' => 'required',
//            'subHead' => 'required',
//            'body' => 'required'

        );

        $validator = Validator::make(Input::all(), $rules);
        // process the form
        if ($validator->fails())
        {
            return Redirect::route(('posts.file_upload'))->withErrors($validator);
        }
        else
        {
            
            try {
                $csv_file =Excel::load(Input::file('csv-file'))->get();


                foreach($csv_file as $csv)
                {
                    $title=$csv->title;
                    $subhead=$csv->subhead;
                    $body =$csv->body;
                    $imgpath =$csv->imgpath;

                    $csv_import = new Post(['user_id'=> Auth::user()->id,'title' => $title,'subHead' => $subhead,'body' => $body,'imgPath' => $imgpath ]);
                    $csv_import->save();
                }


                \Session::flash('success', 'Post uploaded successfully.');
                return redirect(route('posts.index',compact('results')));
            } catch (\Exception $e) {
                \Session::flash('error', $e->getMessage());
                return redirect(route('posts.index'));
            }
        }
    }




    public function store(Request $request)
    {


        $this->validate($request, [
        'title' => 'required',
        'body' => 'required',
        'subHead' => 'required',

    ]);

        if(Input::hasFile('file')){

            $file = Input::file('file');
            $file->move('images', $file->getClientOriginalName());

        }

       // Post::create($request->all());


        $post = new Post($request->all());
        \Auth::user()->posts()->save($post);

        Session::flash('flash_message', 'Post added!');

        return redirect('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        $post_ratings =Rating::where('post_id','=', $id)->orderBy('created_at', 'desc')->paginate(3);

        //aggregate functions Eloquent style........
        $rating_count =Rating::where('post_id','=', $id)->count();
        $rating_avg =Rating::where('post_id','=', $id)->avg('rating');

        $rating_pct =($rating_avg/5)*100;
       // $rating_avg = $rating_sum/$rating_count;




        return view('posts.show', compact('post','post_ratings','rating_count','rating_avg','rating_pct'));
    }


    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.edit', compact('post'));
        $this->authorize('isAdmin');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function update($id, Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);

        if(Input::hasFile('file')){

            $file = Input::file('file');
            $file->move('images', $file->getClientOriginalName());



        }
        
        $post = Post::findOrFail($id);
        $post->update($request->all());

        Session::flash('flash_message', 'Post updated!');

        return redirect('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id)
    {
        Post::destroy($id);

        Session::flash('flash_message', 'Post deleted!');

        return redirect('posts');
    }

    public function user_posts() {

        $user_name = Auth::user()->name;
        $posts = Post::where('user_id','=', Auth::id())->orderBy('created_at', 'desc')->paginate(3);



       # return view('user_posts', compact('posts'));
        return \View::make('posts.user_posts', compact('posts', 'user_name'));
    }




    public function file_upload()
    {


        return view('posts.file_upload');

    }

    public function file_export()
    {

        //export user posts
        $posts = Post::where('user_id','=', Auth::id())->orderBy('created_at', 'desc')->get();

//export all posts for super user
//        $posts = Post::select('user_id', 'title', 'subhead','body','imgpath', 'created_at')->get();

        Excel::create('blog-posts', function($excel) use($posts) {
            $excel->sheet('Sheet 1', function($sheet) use($posts) {
                $sheet->fromArray($posts);
            });
        })->export('xls');


        return view('posts.file_export', compact('xls'));

    }

    public function show_user($id)
    {
        $user=User::findOrFail($id);
        // App\User::find($id);
        $ratings =Rating::where('user_id','=', $id)->orderBy('created_at', 'desc')->paginate(3);

        return view('posts.show_user', compact('user','ratings'));

    }

    public function map()
    {

        $location = GeoIP::getLocation();
        return view('map', compact('location'));
    }

    public function search(Request $request)
    {
        // Gets the query string from our form submission
        $query = Request::input('search');
        // Returns an array of articles that have the query string located somewhere within
        // our articles titles. Paginates them so we can break up lots of search results.
        $articles = DB::table('articles')->where('title', 'LIKE', '%' . $query . '%')->paginate(10);

        // returns a view and passes the view the list of articles and the original query.
        return view('page.search', compact('articles', 'query'));
    }


}
