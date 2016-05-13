@extends('layout')

@section('content')
<div class="container">

    <h1>Posts @can('isAdmin')<a href="{{ url('/posts/create') }}" class="btn btn-primary pull-right btn-sm">Add New Post</a>@endcan</h1>
    <div class="table">
        <table class="uk-table uk-table-hover uk-table-striped">
            <thead>
                <tr>
                    <th>{{ trans('posts.title') }}</th><th>{{ trans('posts.body') }}</th><th>Image</th>@can('isAdmin')<th>Actions</th>@endcan
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($posts as $item)
                {{-- */$x++;/* --}}
                <tr>
                    {{--<td>{{ $x }}</td>--}}
                    <td><a href="{{ url('posts', $item->id) }}">{{ $item->title }}</a></td><td>{{ $item->body }}</td><td><img class="uk-responsive-width" src="../images/{{ $item->imgPath}}"></td>
                    @can('isAdmin')
                    <td>
                        <a href="{{ url('/posts/' . $item->id . '/edit') }}" class="uk-button uk-button-primary">Update</a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/posts', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'uk-button uk-button-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                    @endcan
                </tr>

            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $posts->render() !!} </div>
    </div>

@foreach($posts as $item)

        <article class="uk-article">

            <h1 class="uk-article-title"><a href="{{ url('posts', $item->id) }}">{{ $item->title }}</a></h1>
            <p class="uk-article-lead">HERE IS SUBTITLE</p>
            <p class="uk-article-meta">{{ $item->created_at }}</p>

            <div class="uk-grid">
                <div class="uk-width-medium-1-2 uk-push-1-2"><img class="uk-responsive-width" src="../images/{{ $item->imgPath}}"></div>
                <div class="uk-width-medium-1-2 uk-pull-1-2">{{$item->body}}</div>
            </div>





        </article>
        <hr class="uk-article-divider">
    @endforeach
   {{--<p>{{ print_r($route) }}</p> heres where i need to figure out how to
   display the route name better.....
   --}}
</div>
@endsection
