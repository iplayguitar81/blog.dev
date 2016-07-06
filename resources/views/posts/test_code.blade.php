@extends('layout')

@section('content')



<div id="portfolio">








{{--<div class="slider">--}}
{{--<div class="my-gallery" itemscope itemtype="http://schema.org/ImageGallery">--}}

        {{--@foreach($post->images as $image)--}}


        {{--*/ @ $pathy =$image->file_path  /*--}}

        {{--*/ @ list($width, $height) = getimagesize($pathy) /*--}}

        {{--*/ @ $dimensions =$width.'x'.$height  /*--}}


        {{--<figure class="item" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">--}}
            {{--<a href="{{url($image->file_path)}}" itemprop="contentUrl" data-size="{{$dimensions}}">--}}
                {{--<img src="{{url($image->file_path)}}"  alt="CRUD MVC ASP" />--}}
            {{--</a>--}}
            {{--<figcaption itemprop="caption description">MVC ASP CRUD height: {{$height}} width: {{$width}}</figcaption>--}}
        {{--</figure>--}}


        {{--@endforeach--}}

{{--</div>--}}
{{--</div>--}}





{{--<br/>--}}
    {{--<hr>--}}
    {{--<br/>--}}

{{--<div class="customNavigation">--}}
    {{--<a class="btn prev btn-danger">Previous</a>--}}
    {{--<a class="btn next btn-danger">Next</a>--}}
{{--</div>--}}

    {{--<div class="my-gallery">--}}
    {{--<div id="owl-demo" class="owl-carousel" itemscope itemtype="http://schema.org/ImageGallery">--}}

    {{--@foreach($post->images as $image)--}}
        {{--*/ @ $pathy =$image->file_path  /*--}}

        {{--*/ @ list($width, $height) = getimagesize($pathy) /*--}}

        {{--*/ @ $dimensions =$width.'x'.$height  /*--}}
            {{--{{$img = Image::make($image->file_path)->resize(300, 200);}}--}}

        {{--<figure class="item" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">--}}
            {{--<a class="" href="{{url($image->file_path)}}" itemprop="contentUrl" data-size="{{$dimensions}}">--}}
            {{--<img class="thumbnail slide" src="{{url($image->file_path)}}"  alt=""/>--}}
                {{--</a>--}}
            {{--<figcaption itemprop="caption description">MVC ASP CRUD height: {{$height}} width: {{$width}}</figcaption>--}}
        {{--</figure>--}}


    {{--@endforeach--}}


    {{--</div>--}}



    </div>


    <br/>
    <br/>



    {{--*/ @ $pathy =$image->file_path  /*--}}

    {{--*/ @ list($width, $height) = getimagesize($pathy) /*--}}

    {{--*/ @ $dimensions =$width.'x'.$height  /*--}}


    <figure id="s2" class="col-sm-1" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
        @foreach($post->images as $image)
        <a href="{{url($image->file_path)}}" itemprop="contentUrl" data-size="{{$dimensions}}">
            <img src="{{url($image->file_path)}}"  alt="CRUD MVC ASP" />
        </a>
        {{--<figcaption itemprop="caption description">MVC ASP CRUD height: {{$height}} width: {{$width}}</figcaption>--}}
        @endforeach
    </figure>


@endsection
</div>

<script>

</script>
