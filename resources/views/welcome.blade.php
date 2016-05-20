@extends('layout')

@section('content')
{{--<div class="container">--}}
    {{--<div class="row">--}}
        {{--<div class="col-md-10 col-md-offset-1">--}}
            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading">Welcome to Bowtiesoft</div>--}}

                {{--<div class="panel-body">--}}
                   {{--Welcome to Bowtiesofty.  This page is under development but should be up and running soon!  Check back soon for updates!--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}



{{--</div>--}}



    {{--<div class="uk-width-medium-1-3 uk-row-first">--}}
        {{--<div class="uk-panel"><img src="images/placeholder_400x250.svg" alt="Placeholder"></div>--}}
    {{--</div>--}}
    {{--<div class="uk-width-medium-2-3 uk-flex-middle">--}}
        {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>--}}
    {{--</div>--}}
    {{--<hr>--}}


{{--@foreach($posts as $item)--}}

    {{--<article class="uk-article">--}}

        {{--<h1 class="uk-article-title"><a href="{{ url('posts', $item->id) }}">{{ $item->title }}</a></h1>--}}
        {{--<p class="uk-article-lead">HERE IS SUBTITLE</p>--}}
        {{--<p class="uk-article-meta">{{ $item->created_at }}</p>--}}

        {{--<div class="uk-grid">--}}
            {{--<div class="uk-width-medium-1-2 uk-push-1-2"><img class="uk-responsive-width" src="../images/{{ $item->imgPath}}"></div>--}}
            {{--<div class="uk-width-medium-1-2 uk-pull-1-2">{{$item->body}}</div>--}}
        {{--</div>--}}





    {{--</article>--}}
    {{--<hr class="uk-article-divider">--}}
{{--@endforeach--}}




<div class="uk-width-medium-3-4 uk-row-first">

    @foreach($posts as $item)--}}
    <article class="uk-article">

        <h1 class="uk-article-title">
            <a href="layouts_post.html"><a href="{{ url('posts', $item->id) }}">{{ $item->title }}</a></a>
        </h1>

        <p class="uk-article-meta">Written by Author on 12 April 2013. Posted in <a href="#">Blog</a></p>

        <p>
            <a href="layouts_post.html"><img class="uk-responsive-width" src="../images/{{ $item->imgPath}}"></a>
        </p>

        <p>Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea commodi consequat. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

        <h2>Subheading</h2>

        <p>Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea commodi consequat. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

        <p>
            <a class="uk-button uk-button-primary" href="#">Continue Reading</a>
            <a class="uk-button" href="#">Comments</a>
        </p>

    </article>
    @endforeach

    <article class="uk-article">

        <h1 class="uk-article-title">
            <a href="layouts_post.html">Article Heading</a>
        </h1>

        <p class="uk-article-meta">Written by Author on 12 April 2013. Posted in <a href="#">Blog</a></p>

        <p>
            <a href="layouts_post.html"><img width="900" height="300" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iOTAwcHgiIGhlaWdodD0iMzAwcHgiIHZpZXdCb3g9IjAgMCA5MDAgMzAwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA5MDAgMzAwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSI5MDAiIGhlaWdodD0iMzAwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0zNzguMTg0LDkzLjV2MTEzaDE0My42MzN2LTExM0gzNzguMTg0eiBNNTEwLjI0NCwxOTQuMjQ3SDM5MC40Mzd2LTg4LjQ5NGgxMTkuODA4TDUxMC4yNDQsMTk0LjI0Nw0KCQlMNTEwLjI0NCwxOTQuMjQ3eiIvPg0KCTxwb2x5Z29uIGZpbGw9IiNEOEQ4RDgiIHBvaW50cz0iMzk2Ljg4MSwxODQuNzE3IDQyMS41NzIsMTU4Ljc2NCA0MzAuODI0LDE2Mi43NjggNDYwLjAxNSwxMzEuNjg4IDQ3MS41MDUsMTQ1LjQzNCANCgkJNDc2LjY4OSwxNDIuMzAzIDUwNC43NDYsMTg0LjcxNyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iNDI1LjQwNSIgY3k9IjEyOC4yNTciIHI9IjEwLjc4NyIvPg0KPC9nPg0KPC9zdmc+DQo=" alt=""></a>
        </p>

        <p>Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea commodi consequat. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

        <h2>Subheading</h2>

        <p>Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea commodi consequat. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

        <p>
            <a class="uk-button uk-button-primary" href="layouts_post.html">Continue Reading</a>
            <a class="uk-button" href="layouts_post.html">4 Comments</a>
        </p>

    </article>

    <ul class="uk-pagination">
        <li class="uk-disabled"><span><i class="uk-icon-angle-double-left"></i></span></li>
        <li class="uk-active"><span>1</span></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><span>...</span></li>
        <li><a href="#">20</a></li>
        <li><a href="#"><i class="uk-icon-angle-double-right"></i></a></li>
    </ul>

</div>

<div class="uk-width-medium-1-4">
    @include('sidebar')
</div>


@endsection

