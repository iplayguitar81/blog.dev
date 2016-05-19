@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome to Bowtiesoft</div>

                <div class="panel-body">
                   Welcome to Bowtiesofty.  This page is under development but should be up and running soon!  Check back soon for updates!
                </div>
            </div>
        </div>
    </div>



</div>



    <div class="uk-width-medium-1-3 uk-row-first">
        <div class="uk-panel"><img src="images/placeholder_400x250.svg" alt="Placeholder"></div>
    </div>
    <div class="uk-width-medium-2-3 uk-flex-middle">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
    </div>
    <hr>


@foreach($posts as $item)

    <article class="uk-article">

        <h1 class="uk-article-title"><a href="{{ url('posts', $item->id) }}">{{ $item->title }}</a></h1>
        <p class="uk-article-lead">HERE IS SUBTITLE</p>
        <p class="uk-article-meta">{{ $item->created_at }}</p>

        <div class="uk-grid">
            <div class="uk-width-medium-1-2 uk-push-1-2"><img class="uk-responsive-width" src="../images/{{ $item->imgPath}}"></div>
            <div class="uk-width-medium-1-2 uk-pull-1-2">{{$item->body}}</div>
        </div>





    </article>
    <hr class="uk-article-divider">
@endforeach





@endsection

