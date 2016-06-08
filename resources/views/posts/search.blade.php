@extends('layout')

@section('title', 'Map Laravel Test')


@section('content')

<h1>Showing Results for '{{$user_input}}'.....</h1>

{{$results}}

@endsection