

@extends('layout')
@section('title', 'Home')

@section('content')

<div class="col-md-8">
    @if(Session::has('message'))
        <div class="alert alert-info" style="color:red;">
            {{Session::get('message')}}
        </div>
    @endif

    @foreach($posts as $item)
    <article class="text-center">


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

            @if($item->user_id != null)
            <? $author = App\User::find($item->user_id)->name; ?>

            {{$author}}
            @endif
            {{--@foreach($records as $record)--}}

                {{--{{$record->name}}--}}
                {{--@endforeach--}}

            on {{ $item->created_at->format('M dS Y') }}</p>

        <p>
            <a href="{{ route('posts.show', [$item->id, str_slug($item->title)]) }}"><img class="img-responsive center-block" src="../images/{{ $item->imgPath}}"></a>
        </p>





            <?$post= App\Post::findOrFail($item->id)?>

        <p>Average Rating: {{$post->averageRating}}</p>
        <p>Rating %: {{$post->ratingPercent}}</p>

{{--{{$variable = str_limit($item->body, 100)}}--}}
   <?

            $variable= strip_tags($item->body);
            $variable =substr($variable,0, 50);
       // $variable = (str_limit($item->body, 100));
       // $variable= htmlentities($variable);
        ?>
       <p class="article-texterson">{{$variable}} ...</p>
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
<br/>

<br/>

<div class="col-md-3 pull-right">
    @include('sidebar')
</div>


@endsection


