@extends('layout')
@section('title', 'Post CSV Upload')
@section('content')



    {!! Form::open(array('url'=>'/posts/post_rating')) !!}
    {{--echo Form::open(array('url' => 'foo/bar', 'files' => true))--}}

    {{--{!! Form::open(['url' => '/posts', 'class' => '', 'files' =>true]) !!}--}}
    {{ Form::selectRange('rate 1-5', 1, 5) }}

    <br/>
    <br/>

    {!! Form::submit('Upload CSV', ['class' => 'btn btn-success form-control']) !!}

    {!! Form::close() !!}


    @endsection