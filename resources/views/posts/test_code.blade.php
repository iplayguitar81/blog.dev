@extends('layout')

@section('content')

{{$post}}
    <div class="row">

        <div class="my-gallery" itemscope itemtype="http://schema.org/ImageGallery">



            <div class="col-md-12">

    <div id="carousel-id" class="carousel slide col-md-2" data-ride="carousel">
        {{--<ol class="carousel-indicators">--}}
            {{--<li data-target="#carousel-id" data-slide-to="0" class=""></li>--}}
            {{--<li data-target="#carousel-id" data-slide-to="1" class=""></li>--}}
            {{--<li data-target="#carousel-id" data-slide-to="2" class="active"></li>--}}
        {{--</ol>--}}
        <div class="carousel-inner">
            <div class="item">
                <img data-src="holder.js/900x500/auto/#777:#7a7a7a/text:First slide" alt="First slide" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI5MDAiIGhlaWdodD0iNTAwIj48cmVjdCB3aWR0aD0iOTAwIiBoZWlnaHQ9IjUwMCIgZmlsbD0iIzc3NyI+PC9yZWN0Pjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9IjQ1MCIgeT0iMjUwIiBzdHlsZT0iZmlsbDojN2E3YTdhO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjU2cHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhbnMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+Rmlyc3Qgc2xpZGU8L3RleHQ+PC9zdmc+">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Example headline.</h1>
                        <p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
                        <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="item">
                <img data-src="holder.js/900x500/auto/#666:#6a6a6a/text:Second slide" alt="Second slide" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI5MDAiIGhlaWdodD0iNTAwIj48cmVjdCB3aWR0aD0iOTAwIiBoZWlnaHQ9IjUwMCIgZmlsbD0iIzY2NiI+PC9yZWN0Pjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9IjQ1MCIgeT0iMjUwIiBzdHlsZT0iZmlsbDojNmE2YTZhO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjU2cHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhbnMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+U2Vjb25kIHNsaWRlPC90ZXh0Pjwvc3ZnPg==">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Another example headline.</h1>
                        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                        <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="item active">
                <img data-src="holder.js/900x500/auto/#555:#5a5a5a/text:Third slide" alt="Third slide" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI5MDAiIGhlaWdodD0iNTAwIj48cmVjdCB3aWR0aD0iOTAwIiBoZWlnaHQ9IjUwMCIgZmlsbD0iIzU1NSI+PC9yZWN0Pjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9IjQ1MCIgeT0iMjUwIiBzdHlsZT0iZmlsbDojNWE1YTVhO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjU2cHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhbnMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+VGhpcmQgc2xpZGU8L3RleHQ+PC9zdmc+">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>One more for good measure.</h1>
                        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                        <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
        <a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div>
</div>
            </div>
        </div>

    @endsection


{{--<div class="row">--}}

    {{--<div class="my-gallery" itemscope itemtype="http://schema.org/ImageGallery">--}}



        {{--<div class="col-md-12">--}}

            {{--@foreach($post->images as $image)--}}

                {{--*/ @ $pathy =$image->file_path  /*--}}

                {{--*/ @ list($width, $height) = getimagesize($pathy) /*--}}

                {{--*/ @ $dimensions =$width.'x'.$height  /*--}}


                {{--<figure class="col-md-2" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">--}}
                    {{--<a href="{{url($image->file_path)}}" itemprop="contentUrl" data-size="{{$dimensions}}">--}}
                        {{--<img src="{{url($image->file_path)}}"  alt="CRUD MVC ASP" />--}}
                    {{--</a>--}}
                    {{--<figcaption itemprop="caption description">MVC ASP CRUD height: {{$height}} width: {{$width}}</figcaption>--}}
                {{--</figure>--}}
            {{--@endforeach--}}
        {{--</div>--}}

    {{--</div>--}}



    {{--<a href="#demo9" class="btn btn-info" data-toggle="collapse">More Info</a>--}}
    {{--<div id="demo9" class="collapse">--}}
    {{--<p>Since I am familiar with Rails and MVC I decided to learn ASP MVC when not busy studying.  Here is some idea of what I can do with that technology.  Unfortunately,  I do not currently have a neatly designed page as I have mostly been focusing on learning the backend of this technology.  There are also other things that I have figured out with this technology like pagination of records- - for example, but I do not have a photo at this time only code.  I also do not have a live version of this site but if requested I can provide examples of my code!  It has been a cool experience learning ASP MVC because I have found that I am able to learn MVC frameworks fairly easily and am excited to learn more!</p></div>--}}
    {{--</div>--}}
{{--</div>--}}
