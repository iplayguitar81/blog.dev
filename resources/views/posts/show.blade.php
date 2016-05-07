@extends('layout')

@section('content')
<div class="container">

    <h1>Post</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>{{ trans('posts.title') }}</th><th>{{ trans('posts.body') }}</th><th>{{ trans('posts.imgPath') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $post->id }}</td> <td> {{ $post->title }} </td><td> {{ $post->body }} </td><td> <img class="uk-thumbnail uk-align-center" src="../images/{{ $post->imgPath}}"> </td>
                </tr>
            </tbody>
        </table>
    </div>

    <br/>
    <hr>

    <a href="{{url('posts')}}">

        <button type="submit" class="">Back to All Posts</button>
    </a>
    @endsection

</div>

