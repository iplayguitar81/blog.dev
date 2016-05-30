@extends('layout')
@section('content')
@section('title', 'Blog')
<div class="col-md-12">
    <h1>Posts &nbsp;&nbsp;&nbsp;</h1>

    {{--{{'This is the code to test output for locally stored CSV file... see controller'}}--}}
    {{--@foreach($results as $tubular)--}}
    {{--<p>{{$tubular->title}}</p>--}}
    {{--<p>{{$tubular->subhead}}</p>--}}
    {{--<p>{{$tubular->body}}</p>--}}
    {{--<p>{{$tubular->imgpath}}</p>--}}
    {{--@endforeach--}}

    @can('isAdmin')

        <div class="panel panel-success"> <div class="panel-heading">
                <h3 class="panel-title">Nifty Admin Functions</h3> </div>
            <div class="panel-body">

                <a href="{{ url('/posts/create') }}" class="btn btn-primary pull-right btn-sm">Add New Post</a>
                <br/>
                <a href="{{ url('/posts/file_upload') }}" class="btn btn-success pull-right btn-sm">Import CSV Posts</a>



            </div> </div>


    @endcan



        <table class="table">
            <thead>
                <tr>
                    <th>{{ trans('posts.title') }}</th><th>{{ trans('posts.subhead') }}</th><th>Date</th><th>{{ trans('posts.body') }}</th><th>Image</th>@can('isAdmin')<th>Actions</th>@endcan
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($posts as $item)
                {{-- */$x++;/* --}}
                <tr>
                    {{--<td>{{ $x }}</td>--}}
                    <td><a href="{{ url('posts', $item->id) }}">{{ $item->title }}</a></td><td>{{ $item->subHead }}</td><td>{{ $item->created_at->format('M dS Y') }}</td><td>

                        {{strip_tags(str_limit($item->body, 20))}}



                    </td><td><img class="img-responsive thumbnail" src="../images/{{ $item->imgPath}}"></td>
                    @can('isAdmin')

                        @if($item->user_id == $user)

                    <td>
                        <a href="{{ url('/posts/' . $item->id . '/edit') }}" class="btn btn-success">{{Auth::user()->name}}- -Update Post</a><br/><br/>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/posts', $item->id],
                            'style' => 'display:inline'
                        ]) !!}


                            {!! Form::submit(Auth::user()->name.' - -Delete Post', ['class' => 'btn btn-danger']) !!}

                        @endif

                        {!! Form::close() !!}
                    </td>
                    @endcan
                </tr>

            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $posts->render() !!} </div>


{{--@foreach($posts as $item)--}}

        {{--<article class="uk-article">--}}

            {{--<h1 class="uk-article-title"><a href="{{ url('posts', $item->id) }}">{{ $item->title }}</a></h1>--}}
            {{--<p class="uk-article-lead">{{$item->subHead}}</p>--}}
            {{--<p class="uk-article-meta">{{ $item->created_at }}</p>--}}

            {{--<div class="uk-grid">--}}
                {{--<div class="uk-width-medium-1-2 uk-push-1-2"><img class="uk-responsive-width" src="../images/{{ $item->imgPath}}"></div>--}}
                {{--<div class="uk-width-medium-1-2 uk-pull-1-2">{{$item->body}}</div>--}}
            {{--</div>--}}





        {{--</article>--}}
        {{--<hr class="uk-article-divider">--}}
    {{--@endforeach--}}
   {{--<p>{{ print_r($route) }}</p> heres where i need to figure out how to
   display the route name better.....
   --}}
</div>
@endsection
