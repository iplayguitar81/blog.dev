@extends('layout')

@section('title', 'Map Laravel Test')


@section('content')

<h1>Showing Results for '{{$search}}'.....</h1>

{{$results2}}

    @foreach($results2 as $result)
    <article>
        <h3><a href="{{ route('posts.show', [$result->id, str_slug($result->title)]) }}">{{$result->title}}</a></h3>
        <p>Written by:
            @if($item->user_id != null)
                <? $author = App\User::find($item->user_id)->name; ?>

                {{$author}}
            @endif
        </p>
        <br/>
        <span class="text-lowercase">{{$result->created_at->format('M dS, Y')}}</span>
        <p>{{$result->user_id}}</p>
        <p>{{$result->body}}</p>

    </article>
        <br/>
        <hr>

    @endforeach

{!! $results2->render() !!}

@endsection