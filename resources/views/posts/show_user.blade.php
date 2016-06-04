@extends('layout')

@section('title', $user->name.' View Page')


@section('content')

 <div class="row">
 <div class="col-md-12">

<h1>{{$user->name}}</h1>


<p><img src="{{$user->avatar}}" alt="user avatar"></p>
</div>
</div>
    @endsection
