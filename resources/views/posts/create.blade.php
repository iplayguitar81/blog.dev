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
        {!! Form::label('subHead', trans('posts.subhead'), ['class' => '']) !!}
        <div class="">
            {!! Form::text('subHead', null, ['class' => 'form-control']) !!}
            {!! $errors->first('subHead', '<p class="uk-alert-danger">:message</p>') !!}
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

    <div class="container">
    <div class="dropzone" id="dropzoneFileUpload">
    </div>
    </div>

    @else <?php header("Location: /"); die(); ?>

    @endcan
</div>

@endsection

<script src="{{url('/js/jquery.js')}}"></script>
<script src="{{url('/js/image_upload.js')}}"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script src="{{url('/js/dropzone.js')}}"></script>

<script>
    tinymce.init({ selector:'textarea',plugins: "media" });
</script>

<script type="text/javascript">
    var baseUrl = "{{ url('/') }}";
    var token = "{{ Session::getToken() }}";
    Dropzone.autoDiscover = false;
    var myDropzone = new Dropzone("div#dropzoneFileUpload", {
        url: baseUrl + "/dropzone/uploadFiles",
        params: {
            _token: token
        }
    });
    Dropzone.options.myAwesomeDropzone = {
        paramName: "file", // The name that will be used to transfer the file
        maxFilesize: 2, // MB
        addRemoveLinks: true,
        accept: function(file, done) {

        },
    };
</script>


