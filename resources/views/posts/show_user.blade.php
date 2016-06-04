@extends('layout')

@section('title', $user->name.' View Page')


@section('content')
<h1>{{$user->name}}</h1>


<img src="{{$user->avatar}}" alt="user avatar">


    @endsection
