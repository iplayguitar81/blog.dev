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

    <form action="/posts/create" method="post" enctype="multipart/form-data">
        <!-- some form fields... -->
        <div class="dropzone" id="dropkicks"></div>
        <!-- maybe some more form fields... -->
        <button type="submit">Submit Form</button>
    </form>

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

<script>
//    Dropzone.options.dropkicks = {
//        autoProcessQueue: false,
//        uploadMultiple: true,
//        parallelUploads: 100,
//        paramName: "files",
//        maxFiles: 100,
//        // This URL is not really used in your case but it's needed
//        // because the plugin won't attach itself without one specified
//        url: '#'
//    }


    var photo_counter = 0;
    Dropzone.options.dropkicks = {

        uploadMultiple: false,
        parallelUploads: 100,
        maxFilesize: 8,
        previewsContainer: '#dropzonePreview',
        previewTemplate: document.querySelector('#preview-template').innerHTML,
        addRemoveLinks: true,
        dictRemoveFile: 'Remove',
        dictFileTooBig: 'Image is bigger than 8MB',

        // The setting up of the dropzone
        init:function() {

            this.on("removedfile", function(file) {

                $.ajax({
                    type: 'POST',
                    url: 'upload/delete',
                    data: {id: file.name},
                    dataType: 'html',
                    success: function(data){
                        var rep = JSON.parse(data);
                        if(rep.code == 200)
                        {
                            photo_counter--;
                            $("#photoCounter").text( "(" + photo_counter + ")");
                        }

                    }
                });

            } );
        },
        error: function(file, response) {
            if($.type(response) === "string")
                var message = response; //dropzone sends it's own error messages in string
            else
                var message = response.message;
            file.previewElement.classList.add("dz-error");
            _ref = file.previewElement.querySelectorAll("[data-dz-errormessage]");
            _results = [];
            for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                node = _ref[_i];
                _results.push(node.textContent = message);
            }
            return _results;
        },
        success: function(file,done) {
            photo_counter++;
            $("#photoCounter").text( "(" + photo_counter + ")");
        }
    }

</script>


