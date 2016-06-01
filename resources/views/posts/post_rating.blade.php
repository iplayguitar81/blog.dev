@extends('layout')
@section('title', 'Post Rating Test')
@section('content')



    {!! Form::open(array('url'=>'/posts/post_rating')) !!}
    {{--echo Form::open(array('url' => 'foo/bar', 'files' => true))--}}

    {{--{!! Form::open(['url' => '/posts', 'class' => '', 'files' =>true]) !!}--}}
    {{ Form::selectRange('userRate', 1, 5) }}

    <div class="form-group">
        {!! Form::label('userRateMsg', 'userRateMsg', ['class' => '']) !!}
        <div class="">
            {!! Form::textarea('userRateMsg', null, ['class' => 'form-control', 'name'=>'userRateMsg', 'id'=>'userRateMsg']) !!}
            {!! $errors->first('userRateMsg', '<p class="uk-alert-danger">:message</p>') !!}
        </div>
    </div>

    <br/>
    <br/>

    {!! Form::submit('Rate This Article', ['class' => 'btn btn-success form-control']) !!}

    {!! Form::close() !!}


    @endsection