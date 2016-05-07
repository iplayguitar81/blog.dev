@extends('layout')

@section('content')
<div class="container">

    <h1>Create New Post</h1>

    @if ($errors->any())
        <ul class="uk-alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <hr/>


    {!! Form::open(['url' => '/posts', 'class' => '.uk-form-row', 'files' =>true]) !!}

                <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
                {!! Form::label('title', trans('posts.title'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('title', '<p class="uk-alert-danger">:message</p>') !!}
                </div>
            </div>
    <br/>
            <div class="form-group {{ $errors->has('body') ? 'has-error' : ''}}">
                {!! Form::label('body', trans('posts.body'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('body', '<p class="uk-alert-danger">:message</p>') !!}
                </div>
            </div>
<br/>
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            <input type="file" name="file" id="file" onchange="readURL(this);"/>
        </div>
    </div>
    <br/>
    {{csrf_field()}}

    <div id="blah2">
        <img id="blah" class="uk-thumbnail" src="#" alt="uploaded image">
    </div>


            <div class="form-group {{ $errors->has('imgPath') ? 'has-error' : ''}}">
                {{--{!! Form::label('imgPath', trans('posts.imgPath'), ['class' => 'col-sm-3 control-label img_string']) !!}--}}
                <div class="col-sm-6">
                    {!! Form::text('imgPath', null, ['class' => 'form-control filename']) !!}
                    {!! $errors->first('imgPath', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <br/>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}



</div>
@endsection

<script src="{{url('/js/jquery.js')}}"></script>
<script src="{{url('/js/image_upload.js')}}"></script>


