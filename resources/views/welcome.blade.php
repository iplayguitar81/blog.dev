

@extends('layout')
@section('title', 'Home')

@section('content')
{{--<div class="container">--}}
    {{--<div class="row">--}}
        {{--<div class="col-md-10 col-md-offset-1">--}}
            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading">Welcome to Bowtiesoft</div>--}}

                {{--<div class="panel-body">--}}
                   {{--Welcome to Bowtiesofty.  This page is under development but should be up and running soon!  Check back soon for updates!--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}



{{--</div>--}}



    {{--<div class="uk-width-medium-1-3 uk-row-first">--}}
        {{--<div class="uk-panel"><img src="images/placeholder_400x250.svg" alt="Placeholder"></div>--}}
    {{--</div>--}}
    {{--<div class="uk-width-medium-2-3 uk-flex-middle">--}}
        {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>--}}
    {{--</div>--}}
    {{--<hr>--}}


{{--@foreach($posts as $item)--}}

    {{--<article class="uk-article">--}}

        {{--<h1 class="uk-article-title"><a href="{{ url('posts', $item->id) }}">{{ $item->title }}</a></h1>--}}
        {{--<p class="uk-article-lead">HERE IS SUBTITLE</p>--}}
        {{--<p class="uk-article-meta">{{ $item->created_at }}</p>--}}

        {{--<div class="uk-grid">--}}
            {{--<div class="uk-width-medium-1-2 uk-push-1-2"><img class="uk-responsive-width" src="../images/{{ $item->imgPath}}"></div>--}}
            {{--<div class="uk-width-medium-1-2 uk-pull-1-2">{{$item->body}}</div>--}}
        {{--</div>--}}


    {{--</article>--}}
    {{--<hr class="uk-article-divider">--}}
{{--@endforeach--}}
<div class="col-md-8">
    @if(Session::has('message'))
        <div class="alert alert-info" style="color:red;">
            {{Session::get('message')}}
        </div>
    @endif

    @foreach($posts as $item)
    <article class="">


        <h1 class="main-article-titles" style="font-family: Pacifico, cursive;">
            <a href="{{ route('posts.show', [$item->id, str_slug($item->title)]) }}">{{ $item->title }}</a>
        </h1>
        <p class="subheader-main" style="font-family: Boogaloo, cursive; font-size:2em;">{{ $item->subHead}}</p>
        {{--{{$posts-> $item->user }}--}}

        {{--{{//$users::where('id','like',$item->user_id) -> name()}}--}}
        <p class="">Written by
            <?
            //below is one way to get the name of the author.....
            ?>
            <? $author = App\User::find($item->user_id)->name; ?>

            {{$author}}

            {{--@foreach($records as $record)--}}

                {{--{{$record->name}}--}}
                {{--@endforeach--}}

            on {{ $item->created_at->format('M dS Y') }}</p>

        <p>
            <a href="{{ route('posts.show', [$item->id, str_slug($item->title)]) }}"><img class="img-responsive" src="../images/{{ $item->imgPath}}"></a>
        </p>
{{$variable = str_limit($item->body, 100)}}
        {{htmlspecialchars($variable) }}
      {{--<p>  {{strip_tags((str_limit($item->body, 100)))}}...</p>--}}
        <br/>
            <a class="btn btn-danger btn-md active" href="{{ route('posts.show', [$item->id, str_slug($item->title)]) }}">Continue Reading</a>

            <a style="margin-top:.2em;" class="btn btn-primary btn-md active" href="#">Comments</a>
        <hr>


    </article>

    @endforeach

        {{--<h1>All Cards</h1>--}}



        {{--<!-- Project One -->--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-7">--}}
                {{--<a href="#">--}}
                    {{--<img class="img-responsive" src="http://placehold.it/700x300" alt="">--}}
                {{--</a>--}}
            {{--</div>--}}
            {{--<div class="col-md-5">--}}
                {{--<h3><a href="/cards/1">once upon a rhyme</a></h3>--}}
                {{--<h4>2016-04-28 00:00:00</h4>--}}
                {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium veniam exercitationem expedita laborum at voluptate. Labore, voluptates totam at aut nemo deserunt rem magni pariatur quos perspiciatis atque eveniet unde.</p>--}}
                {{--<a class="btn btn-primary" href="/cards/1">View Card <span class="glyphicon glyphicon-chevron-right"></span></a>--}}
            {{--</div>--}}
        {{--</div>--}}

<br/>
        <br/>
        <div class="pagination"> {!! $posts->render() !!} </div>


</div>


<div class="col-md-4">
    @include('sidebar')
</div>


@endsection


