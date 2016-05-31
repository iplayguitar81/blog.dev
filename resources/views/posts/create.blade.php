@extends('layout')
@section('title', 'Create New Post')
@section('content')
<div class="container">

    @can('isAdmin')<h1 class="" style="font-family:Pacifico,cursive;color:#E63C4D;font-size:4em;">Create New Post</h1>

    @if ($errors->any())
        <ul class="uk-alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif


    {!! Form::open(['url' => '/posts', 'class' => '', 'files' =>true]) !!}



                <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
                {!! Form::label('title', trans('posts.title'), ['class' => '']) !!}
                <div class="">
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('title', '<p class="uk-alert-danger">:message</p>') !!}
                </div>
            </div>
    <br/>

    <div class="form-group {{ $errors->has('subHead') ? 'has-error' : ''}}">
        {!! Form::label('subhead', trans('posts.subhead'), ['class' => '']) !!}
        <div class="">
            {!! Form::text('subhead', null, ['class' => 'form-control']) !!}
            {!! $errors->first('subhead', '<p class="uk-alert-danger">:message</p>') !!}
        </div>
    </div>
<br/>
<br/>

            <div class="form-group {{ $errors->has('body') ? 'has-error' : ''}}">
                {!! Form::label('body', trans('posts.body'), ['class' => '']) !!}
                <div class="">
                    {!! Form::textarea('body', null, ['class' => 'form-control', 'name'=>'body', 'id'=>'body']) !!}
                    {!! $errors->first('body', '<p class="uk-alert-danger">:message</p>') !!}
                </div>
            </div>
<br/>
<br/>

    <div class="form-group">
        <div class="">
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
                <div class="">
                    {!! Form::text('imgPath', null, ['class' => 'form-control filename']) !!}
                    {!! $errors->first('imgPath', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <br/>

    <div class="form-group">
        <div class="">
            {!! Form::submit('Create', ['class' => 'btn btn-success form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}

    @else <?php header("Location: /"); die(); ?>

    @endcan
</div>

@endsection

<script src="{{url('/js/jquery.js')}}"></script>
<script src="{{url('/js/image_upload.js')}}"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

<script>
    tinymce.init({ selector:'textarea',plugins: "media" });
</script>


