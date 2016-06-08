@extends('layout')

@section('title', 'Map Laravel Test')


@section('content')

<h1>Showing Results for '{{$user_input}}'.....</h1>

{{$results}}

    @foreach($results as $result)
    <article>

        <h3>{{$result->title}}</h3>
        <span class="text-lowercase">{{$result->created_at}}</span>

        <p>{{$result->user_id}}</p>
        <p>{{$result->body}}</p>


    </article>

    @endforeach


@endsection