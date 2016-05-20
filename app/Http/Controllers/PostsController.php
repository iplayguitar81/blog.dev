<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Facade;

use App\Post;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Validator;
use Flash;
use Illuminate\Routing\Route;

use Auth;

use Illuminate\Support\Facades\Input;





class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index( )
    {



        #$posts = Post::where('user_id','=', Auth::id())->get();
        $posts = Post::paginate(15);

        $posts=User::with(['posts'])->all();


       #$posts=dd(\App\User::paginate(5));

        return view('posts.index', compact('posts'));

        $this->authorize('isAdmin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {


        return view('posts.create');
        $this->authorize('isAdmin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        'title' => 'required',
        'body' => 'required',
    ]);

        if(Input::hasFile('file')){

            $file = Input::file('file');
            $file->move('images', $file->getClientOriginalName());



        }

        Post::create($request->all());

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
}
