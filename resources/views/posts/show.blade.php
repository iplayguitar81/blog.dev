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
        <br/>

        {{--*/ @ $rate_sum = 0; $rate_count=0; $rate_avg=0; $rate_pct=0;  /*--}}
        <div class="rating center-block"><div class="stars"></div><div class="back" style="width:{{$rate_pct}}%;"></div></div>


    @foreach($post_ratings as $rating)

            <p>Rating: {{$rating->rating}}/5</p>
            <p>Rater Message: {{$rating->rate_message}}</p>
            <p>User ID: {{$rating->user_id}}</p>




            @endforeach
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


