@extends('layout')

@section('content')
<div class="container">

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


    <article class="uk-article">
        <h1 class="uk-article-title">{{ $post->title }}</h1>
        <p class="uk-article-meta">
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
        <p class="uk-article-lead"><img class="uk-thumbnail uk-align-center" src="../images/{{ $post->imgPath}}"></p>
        {{ $post->body }}

    </article>

    <br/>



    <a href="{{url('posts')}}">

        <button type="submit" class="">Back to All Posts</button>
    </a>
   &nbsp;
    <a href="{{url('/')}}">

        <button type="submit" class="">Back Home</button>
    </a>


    @endsection

</div>

