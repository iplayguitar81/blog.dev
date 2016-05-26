@extends('layout')

@section('title', $post->title)
@section('content')


    {{--<h1>Post</h1>--}}
    {{--<div class="table-responsive">--}}
        {{--<table class="table table-bordered table-striped table-hover">--}}
            {{--<thead>--}}
                {{--<tr>--}}
                    {{--<th>ID.</th> <th>{{ trans('posts.title') }}</th><th>{{ trans('posts.body') }}</th><th>{{ trans('posts.imgPath') }}</th>--}}
                {{--</tr>--}}
            {{--</thead>--}}
            {{--<tbody>--}}
                {{--<tr>--}}
                    {{--<td>{{ $post->id }}</td> <td> {{ $post->title }} </td><td> {{ $post->body }} </td><td> <img class="uk-thumbnail uk-align-center" src="../images/{{ $post->imgPath}}"> </td>--}}
                {{--</tr>--}}
            {{--</tbody>--}}
        {{--</table>--}}
    {{--</div>--}}


    <div class="col-md-12">


    <article class="center-block">
        <h1 class="article-title-show" style="font-family: Pacifico, cursive;font-size:4em;line-height:1em;text-align:center;">{{ $post->title }}</h1>
        <p class="subheader-main" style="text-align:center;font-family: Boogaloo, cursive; font-size:3em;">{{ $post->subHead}}</p>
        <p class="uk-article-meta" style="text-align:center;">
            Written by <?
            //below is one way to get the name of the author.....
            ?>
            <? $author = App\User::find($post->user_id)->name; ?>

            {{$author}}

            {{--@foreach($records as $record)--}}

            {{--{{$record->name}}--}}
            {{--@endforeach--}}

            on {{ $post->created_at->format('M dS Y') }}

        </p>
        <p class="uk-article-lead"><img class="img-responsive center-block" src='{{"../../images/". $post->imgPath}}'></p>
        <br/>
        <div class="center-block">
       <p class="text-center"> {{ $post->body }}</p>

        </div>

    </article>

    <br/>



    <a href="{{url('posts')}}">

        <button type="submit" class="uk-button-danger center-block">Back to All Posts</button>
    </a>
   &nbsp;
    <a href="{{url('/')}}">

        <button type="submit" class="uk-button-success center-block">Back Home</button>
    </a>

    </div>
    @endsection


