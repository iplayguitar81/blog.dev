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

<div class="row">
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
    </article>
        </div>
</div>
<div class="row">

        <br/>
    <div class="col-md-12 text-center">
        <div class="rating2 center-block"><div class="stars"></div><div class="back" style="width:{{$rating_pct}}%;"></div></div>
        <p> Average Article Rating: {{round($rating_avg,2)}}/5 Stars</p>
        {{--*/ @ $hide_rating_form = false; /*--}}
        <p>Number of Ratings: {{$rating_count}}</p>
        </div>
    </div>

        <br/>
<h2 class="text-center">Bowtie User Ratings</h2>
        <div class="row">
            @foreach($post_ratings as $rating)
                {{--*/ @ $rate_pct_reviewer = (($rating->rating/5)*100); /*--}}

        @if(Auth::user())
             @if($rating->user_id==Auth::user()->id)
                {{--*/ @ $hide_rating_form = true; /*--}}
                @endif
        @endif
            <? $author = App\User::find($rating->user_id)->name; ?>




                    <div class="col-md-2 col-md-offset-1"><? $avatar = App\User::find($rating->user_id)->avatar; ?>

                        @if(empty($avatar))
                           <p> <img src="{{url('images/default-user-img.png')}}" class="img-circle avatar" alt="user profile image"></p>

                        @else

                            <p><img src="{{$avatar}}" class="img-circle avatar" alt="user profile image"></p>

                        @endif
                        <p>rated by <a href="#"> <b>{{$author}}</b></a></p>


                        <span class="text-muted time">{{$rating->created_at->format('M dS Y')}}</span>

                    </div>

                    <div class="col-md-6"><p>{{$rating->rate_message}}</p></div>
                    <div class="col-md-2 offset-1">

                            <p>{{$rating->rating}}/5 Stars</p>
                            <div class="rating2"><div class="stars"></div><div class="back" style="width:{{$rate_pct_reviewer}}%;"></div></div>

                    </div>
                </div>
<hr>
    <br/>

        @endforeach



        @can('loggedIn')
@if( $hide_rating_form == false)

        <h2>Rate this article!!!</h2>
        <hr>

        {!! Form::open(array('url'=>'/posts/{id}/{title}')) !!}
        {{--echo Form::open(array('url' => 'foo/bar', 'files' => true))--}}
<div class="form-group center-block">
        <div class="rate-width">
        <input id="input-id" type="text" class="rating" name="starRate" data-size="md" >
            </div>
</div>
        {{--{!! Form::open(['url' => '/posts', 'class' => '', 'files' =>true]) !!}--}}
        {{--{{ Form::selectRange('userRate', 1, 5) }}--}}

        <div class="form-group">
            {!! Form::label('userRateMsg', 'userRateMsg', ['class' => '']) !!}

            {!! Form::hidden('post_id', $post->id, ['class' => 'form-control']) !!}
            <div class="">
                {!! Form::textarea('', null, ['class' => 'form-control', 'name'=>'userRateMsg', 'id'=>'userRateMsg']) !!}
                {!! $errors->first('userRateMsg', '<p class="uk-alert-danger">:message</p>') !!}
            </div>
        </div>
        <br/>
        <br/>

        {!! Form::submit('Rate This Article', ['class' => 'btn btn-success form-control']) !!}

        {!! Form::close() !!}

        @else

    <div class="alert-warning"><p class="text-center">You have already rated this article!  :D We assure you your rating has been figured into the total score!</p></div>

        @endif
        @endcan

        <br/>

        <h2 class="text-center">Leave a Facebook Comment!</h2>
        <div class="fb-comments center-block" data-href="https://www.bowtiesoft.com/posts/{{$post->id}}/{{str_slug($post->title)}}" data-numposts="10"></div>

        <br/>










    <a href="{{url('posts')}}">

        <button type="submit" class="btn btn-primary center-block btn-md">Back to All Posts</button>
    </a>
   &nbsp;
    <a href="{{url('/')}}">

        <button type="submit" class="btn btn-success center-block btn-md">Back Home</button>
    </a>

    </div>



    @endsection

<script src="{{url('/js/jquery.js')}}"></script>
<script src="{{url('/js/star-rating.js')}}"></script>


<script>
    // initialize with defaults

    $('#input-id').rating({disabled: true, showClear: false, showCaption: false});



</script>