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
    <label>Current Image:</label>
    <img class="img-responsive thumbnail" src="../../images/{{ $post->imgPath}}">

        <br/>
    <label>Update Image</label>
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
    tinymce.init({ selector:'textarea',plugins: "media" });
</script>