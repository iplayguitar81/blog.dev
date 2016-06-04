@extends('layout')

@section('title', $user->name.' View Page')


@section('content')

 <div class="row">
 <div class="col-md-12">

<h1>{{$user->name}}</h1>


<p><img src="{{$user->avatar}}" alt="user avatar"></p>
<p>Member since: {{$user->created_at->format('M jS, Y')}}</p>
     <? $title = App\Post::find($rating->post_id)->title; ?>
     <p>{{$ratings}}</p>

     @foreach($ratings as $rating)
{{--<span>test this line out below to be sure output is for correct user.....</span>--}}
         {{--<p>{{$rating->user_id}}</p>--}}

     <p>{{$rating->post_id}}</p>
     <p>{{$title}}</p>
         <p>Rating Comments: {{$rating->rate_message}}</p>
         <p>{{$rating->rate_message}}</p>
            <hr>
            <br/>
         @endforeach

</div>
</div>
    @endsection
