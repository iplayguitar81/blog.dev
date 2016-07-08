@extends('layout')
@section('title', 'Edit '.$post->title)
@section('content')

    @can('isAdmin')

        <div class="col-md-12">
    <h1 class="" style="font-family:Pacifico,cursive;color:#E63C4D;font-size:4em;">Edit Post</h1>

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif



    {!! Form::model($post, [
        'method' => 'PATCH',
        'url' => ['/posts', $post->id],
        'class' => '','files' => true
    ]) !!}

                <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
                {!! Form::label('title', trans('posts.title'), ['class' => 'control-label']) !!}
                <div class="">
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
    <br/>

        <div class="form-group {{ $errors->has('subHead') ? 'has-error' : ''}}">
            {!! Form::label('subHead', trans('posts.subhead'), ['class' => '']) !!}
            <div class="">
                {!! Form::text('subHead', null, ['class' => 'form-control']) !!}
                {!! $errors->first('subHead', '<p class="">:message</p>') !!}
            </div>
        </div>

        <br/>


            <div class="form-group {{ $errors->has('body') ? 'has-error' : ''}}">
                {!! Form::label('body', trans('posts.body'), ['class' => '']) !!}
                <div class="">
                    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('body', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            {{--<div class="form-group {{ $errors->has('imgPath') ? 'has-error' : ''}}">--}}
                {{--{!! Form::label('imgPath', trans('posts.imgPath'), ['class' => 'col-sm-3 control-label']) !!}--}}
                {{--<div class="col-sm-6">--}}
                    {{--{!! Form::text('imgPath', null, ['class' => 'form-control']) !!}--}}
                    {{--{!! $errors->first('imgPath', '<p class="help-block">:message</p>') !!}--}}
                {{--</div>--}}
            {{--</div>--}}
<br/>
    <label>Current Main Article Image:</label>
    <img class="img-responsive thumbnail" src="../../images/{{ $post->imgPath}}">

        <br/>
    <label>Update Lead Image</label>
        <div class="form-group">
            <div class="">
                <input type="file" name="file" id="file" onchange="readURL(this);"/>
            </div>
        </div>
        <br/>
        {{csrf_field()}}

        <div id="blah2">
            <img id="blah" class="img-responsive thumbnail" src="#" alt="uploaded image">
        </div>


        <div class="form-group {{ $errors->has('imgPath') ? 'has-error' : ''}}">
            {{--{!! Form::label('imgPath', trans('posts.imgPath'), ['class' => 'col-sm-3 control-label img_string']) !!}--}}
            <div class="">
                {!! Form::text('imgPath', null, ['class' => 'form-control filename']) !!}
                {!! $errors->first('imgPath', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <br/>

        <br/>
<br/>

    <div class="form-group">
        <div class="">
            {!! Form::submit('Update', ['class' => 'btn btn-success']) !!}
        </div>
    </div>
    {!! Form::close() !!}

<br/>
<br/>

<div class="row">
<div class="col-md-12">
    <form action="{{url('do-upload')}}"
    class="dropzone" id="addImages">

    {{csrf_field()}}
<input type="hidden" name="gallery_id" value="{{$post->id}}">

    </form>
</div>

</div>

            <h4>Article Images</h4>
            {{--{{$post->images}}--}}

            <div class="row">

                <div class="col-md-12">

                    <div id="gallery-images">

                        <ul>
                            @foreach($post->images as $image)

                                <li>
                                    <a href="{{url($image->file_path)}}" target="_blank">
                                        <img src="{{url($image->file_path)}}">
                                        {{--@if($image->user_id == $user)--}}

                                    </a>
                                    <br/>
                                    <button type="button" class="btn btn-info" data-toggle="collapse" data-target="{{'#'.$image->id}}">Add Caption</button>
                                    <br/>
                                    <div id="{{$image->id}}" class="collapse">
                                        {{--Please Enter Caption Below &amp; Submit!--}}
                                        {{ Form::open(['route' => ['My.route', $image->id], 'method' => 'delete']) }}
                                        <br/>
                                        {!! Form::textarea('caption', null, ['class' => 'text-area', 'size' => '30x3']) !!}
                                        {{--{!! Form::submit(Auth::user()->name.' - -Delete Image', ['class' => 'btn btn-danger']) !!}--}}
                                        {{--@endif--}}
                                        <br/>
                                        {!! Form::submit('Save Caption', ['class' => 'btn btn-success']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                    <br/>
                                    <br/>

                                    {{ Form::open(['route' => ['My.route', $image->id], 'method' => 'delete']) }}
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                    {{--{!! Form::submit(Auth::user()->name.' - -Delete Image', ['class' => 'btn btn-danger']) !!}--}}
                                    {{--@endif--}}

                                    {!! Form::close() !!}

                                </li>
                            @endforeach


                        </ul>

                    </div>

                </div>

            </div>

<br/>
<br/>

    <a href="{{url('posts')}}">

        <button type="submit" class="uk-button uk-width-1-1 uk-margin-small-bottom">Back to All Posts</button>
    </a>

    @else <?php header("Location: /"); die(); ?>

    @endcan
</div>

@endsection


<script src="{{url('/js/jquery.js')}}"></script>
<script src="{{url('/js/image_upload.js')}}"></script>

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

<script>
    tinymce.init({ mode : 'specific_textareas', plugins: 'media', editor_selector : 'form-control' });

</script>

