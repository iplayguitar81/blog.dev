@extends('layout')

@section('title', 'Map Laravel Test')


@section('content')

<h1>Showing Results for '{{$user_input}}'.....</h1>

{{$results2}}

    @foreach($results2 as $result)
    <article>
        <h3>{{$result->title}}</h3>
        <span class="text-lowercase">{{$result->created_at->format('M dS, Y')}}</span>
        <p>{{$result->user_id}}</p>
        <p>{{$result->body}}</p>

    </article>
        <br/>
        <hr>

    @endforeach

<div class="pagination"> {!! $results2->render() !!} </div>

@endsection