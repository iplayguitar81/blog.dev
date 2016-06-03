@extends('layout')
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6&appId=409035349261019";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
@section('title', $post->title)
@section('content')


    <div class="col-md-12">



    <article class="center-block">
        <h1 class="article-title-show" style="font-family: Pacifico, cursive;font-size:4em;line-height:1em;text-align:center;">{{ $post->title }}</h1>
        <p class="subheader-main" style="text-align:center;font-family: Boogaloo, cursive; font-size:3em;">{{ $post->subHead}}</p>
        <p class="uk-article-meta" style="text-align:center;">
            Written by <?
            //below is one way to get the name of the author.....
            ?>

           @if($post->user_id != null)
            <? $author = App\User::find($post->user_id)->name; ?>

            {{$author}}
            @endif
            {{--@foreach($records as $record)--}}
            {{--{{$record->name}}--}}
            {{--@endforeach--}}
            on {{ $post->created_at->format('M dS Y') }}
        </p>
        <p class="uk-article-lead"><img class="img-responsive center-block" src='{{"../../images/". $post->imgPath}}'></p>
        <br/>
        <div class="center-block">
       <p class="article-texterson text-center"> {!! ($post->body) !!} </p>

        </div>

        <br/>


        <div class="rating center-block"><div class="stars"></div><div class="back" style="width:{{$rating_pct}}%;"></div><p> Average Article Rating: {{$rating_avg}}/5 Stars</p></div>
        {{--*/ @ $hide_rating_form = false; /*--}}
        <p>Number of Ratings: {{$rating_count}}</p>
        <div class="row">
            @foreach($post_ratings as $rating)

            <div class="col-md-8 center-block">
        @if(Auth::user())
             @if($rating->user_id==Auth::user()->id)
                {{--*/ @ $hide_rating_form = true; /*--}}
                @endif
        @endif
            <p>Rating: {{$rating->rating}}/5</p>
            <p>Rater Message: {{$rating->rate_message}}</p>
            <? $author = App\User::find($rating->user_id)->name; ?>
            <? $avatar = App\User::find($rating->user_id)->avatar; ?>


            <p>Reviewer Name: {{$author}}</p>
            <p>User ID: {{$rating->user_id}}</p>
            </div>
                <div class="col-sm-8">
                    <div class="panel panel-white post panel-shadow">
                        <div class="post-heading">
                            <div class="pull-left image">
                                <img src="{{$avatar}}" class="img-circle avatar" alt="user profile image">
                            </div>
                            <div class="pull-left meta">
                                <div class="title h5">
                                    <a href="#"><b>Ryan Haywood</b></a>
                                    made a post.
                                </div>
                                <h6 class="text-muted time">1 minute ago</h6>
                            </div>
                        </div>
                        <div class="post-description">
                            <p>Bootdey is a gallery of free snippets resources templates and utilities for bootstrap css hmtl js framework. Codes for developers and web designers</p>
                            <div class="stats">
                                <a href="#" class="btn btn-default stat-item">
                                    <i class="fa fa-thumbs-up icon"></i>2
                                </a>
                                <a href="#" class="btn btn-default stat-item">
                                    <i class="fa fa-thumbs-down icon"></i>12
                                </a>
                            </div>
                        </div>
                    </div>
                </div>


        @endforeach
                </div>

        @can('loggedIn')
@if( $hide_rating_form == false)
        <h2>Rate this article!!!</h2>
        <hr>

        {!! Form::open(array('url'=>'/posts/{id}/{title}')) !!}
        {{--echo Form::open(array('url' => 'foo/bar', 'files' => true))--}}

        {{--{!! Form::open(['url' => '/posts', 'class' => '', 'files' =>true]) !!}--}}
        {{ Form::selectRange('userRate', 1, 5) }}

        <div class="form-group">
            {!! Form::label('userRateMsg', 'userRateMsg', ['class' => '']) !!}

            {!! Form::hidden('post_id', $post->id, ['class' => 'form-control']) !!}
            <div class="">
                {!! Form::textarea('userRateMsg', null, ['class' => 'form-control', 'name'=>'userRateMsg', 'id'=>'userRateMsg']) !!}
                {!! $errors->first('userRateMsg', '<p class="uk-alert-danger">:message</p>') !!}
            </div>
        </div>
        <br/>
        <br/>

        {!! Form::submit('Rate This Article', ['class' => 'btn btn-success form-control']) !!}

        {!! Form::close() !!}
        @else

    <p>You have already rated this article!  :D We assure you your rating has been figured into the total score!</p>

        @endif
        @endcan

        <br/>
        <br/>
        <hr>
        <h2>Leave a Facebook Comment!</h2>
        <div class="fb-comments center-block" data-href="https://www.bowtiesoft.com/posts/{{$post->id}}/{{str_slug($post->title)}}" data-numposts="10"></div>

        <br/>





    </article>




    <a href="{{url('posts')}}">

        <button type="submit" class="btn btn-primary center-block btn-md">Back to All Posts</button>
    </a>
   &nbsp;
    <a href="{{url('/')}}">

        <button type="submit" class="btn btn-success center-block btn-md">Back Home</button>
    </a>

    </div>



    @endsection


