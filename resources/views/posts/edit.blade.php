@extends('layout')

@section('content')
<div class="container">

    @can('isAdmin')
    <h1>Edit Post</h1>

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <hr/>


    {!! Form::model($post, [
        'method' => 'PATCH',
        'url' => ['/posts', $post->id],
        'class' => '.uk-form-row'
    ]) !!}

                <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
                {!! Form::label('title', trans('posts.title'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
    <br/>
            <div class="form-group {{ $errors->has('body') ? 'has-error' : ''}}">
                {!! Form::label('body', trans('posts.body'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
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
    <img class="uk-thumbnail-small" src="../../images/{{ $post->imgPath}}">
<br/>
<br/>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Update', ['class' => 'uk-button uk-width-1-1 uk-margin-small-bottom']) !!}
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