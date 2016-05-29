<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Facade;

use App\Post;

use \App;

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



class PostsController extends Controller
{
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
        $excel= \App::make('excel');

        $results = Excel::load('app/test-file.csv')->get();


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

                $results = Excel::load(Input::file('app/test-file.csv')->get());
//                Excel::load(Input::file('csv-file'), function ($reader) {
//
//                    foreach ($reader->toArray() as $row) {
//                        Post::firstOrCreate($row);
//                      //  $row->title;
//
//                       // Post::first(array('title' => $row->title, 'subHead' => $row->subHead, 'body' => $row->body, 'imgPath' => $row->imgPath));
//
//                    }

                foreach ($results as $result){

                    Post::first(array('title' => $result->title, 'subHead' => $result->subHead, 'body' => $result->body, 'imgPath' => $result->imgPath));
                }


                \Session::flash('success', 'Post uploaded successfully.');
                return redirect(route('posts.index'));
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

        return view('posts.show', compact('post'));
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



}
