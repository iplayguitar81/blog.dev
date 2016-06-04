@extends('layout')

@section('title', $user->name.' View Page')


@section('content')


<img src="{{$user->avatar}}" alt="user avatar">


    @endsection
