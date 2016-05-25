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


    <div class=".uk-width-2-3">


    <article class="uk-article">
        <h1 class="uk-article-title" style="font-family: FabFelt, cursive;font-size:5em;line-height:1em;text-align:center;">{{ $post->title }}</h1>
        <p class="subheader-main" style="text-align:center;">{{ $post->subHead}}</p>
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
        <p class="uk-article-lead"><img class="img-responsive" src='{{"../../images/". $post->imgPath}}'></p>
        <br/>
        {{ $post->body }}


    </article>

    <br/>



    <a href="{{url('posts')}}">

        <button type="submit" class="uk-button-danger">Back to All Posts</button>
    </a>
   &nbsp;
    <a href="{{url('/')}}">

        <button type="submit" class="uk-button-success">Back Home</button>
    </a>

    </div>
    @endsection


