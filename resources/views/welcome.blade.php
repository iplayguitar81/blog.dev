@extends('layout')

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




<div class="uk-width-medium-3-4 uk-row-first">

    @foreach($posts as $item)
    <article class="uk-article">


        <h1 class="uk-article-title">
            <a href="{{ url('posts', $item->id) }}">{{ $item->title }}</a>
        </h1>

        {{$test_variable = $item->user_id}}
        <p class="uk-article-meta">Written by {{$item->user_id}}
            @foreach($test_variable as $user)
                {{ $user->name }}
            @endforeach
            on {{ $item->created_at}}.</p>
        <h2>{{ $item->subHead}}</h2>

        <p>
            <a href="{{ url('posts', $item->id) }}"><img class="uk-responsive-width" src="../images/{{ $item->imgPath}}"></a>
        </p>

        {{$item->body}}

        <p>
            <a class="uk-button uk-button-primary" href="{{ url('posts', $item->id) }}">Continue Reading</a>
            <a class="uk-button" href="#">Comments</a>
        </p>

    </article>
    @endforeach

    <ul class="uk-pagination">
        <li class="uk-disabled"><span><i class="uk-icon-angle-double-left"></i></span></li>
        <li class="uk-active"><span>1</span></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><span>...</span></li>
        <li><a href="#">20</a></li>
        <li><a href="#"><i class="uk-icon-angle-double-right"></i></a></li>
    </ul>

</div>

<div class="uk-width-medium-1-4">
    @include('sidebar')
</div>


@endsection

