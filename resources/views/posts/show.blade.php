@extends('layout')
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6&appId=409035349261019";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
@section('title', $post->title)
@section('content')

<div class="row">
    <div class="col-md-12">

    <article class="center-block">
        <h1 class="article-title-show" style="font-family: Pacifico, cursive;font-size:4em;line-height:1em;text-align:center;">{{ $post->title }}</h1>
        <p class="subheader-main" style="text-align:center;font-family: Boogaloo, cursive; font-size:3em;">{{ $post->subHead}}</p>
        <p class="uk-article-meta" style="text-align:center;">
            Written by <?
            //below is one way to get the name of the author.....
            ?>

           @if($post->user_id != null)
            <? $author = App\User::find($post->user_id)->name; ?>

            {{$author}}
            @endif
            {{--@foreach($records as $record)--}}
            {{--{{$record->name}}--}}
            {{--@endforeach--}}
            on {{ $post->created_at->format('M dS Y') }}
        </p>
        <p class="uk-article-lead"><img class="img-responsive center-block" src='{{"../../images/". $post->imgPath}}'></p>
        <br/>
        <div class="center-block">
       <p class="article-texterson text-center"> {!! ($post->body) !!} </p>
            <h4>Article Images</h4>
            <div class="container">


                <h2>First gallery</h2>

                <ul class="owl-carousel">
                    @foreach($post->images as $image)

                        {{--*/ @ $pathy =$image->file_path  /*--}}

                        {{--*/ @ list($width, $height) = getimagesize($pathy) /*--}}

                        {{--*/ @ $dimensions =$width.'x'.$height  /*--}}



                        {{--*/ $thumb_path= substr($image->file_path, 7);/*--}}


                        <li>
                            <a href="{{url($image->file_path)}}" data-size="{{$dimensions}}" data-title="{{$thumb_path}}">
                                <img class="img-responsive" src="{{url('images/thmb-'.$thumb_path)}}" alt="1"></a></li>
                    @endforeach

                    {{--<li><a href="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo02_lg.jpg" data-size="960x640"><img class="img-responsive" src="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo02.jpg" alt="2"></a></li>--}}
                    {{--<li><a href="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo03_lg.jpg" data-size="960x640"><img class="img-responsive" src="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo03.jpg" alt="3"></a></li>--}}
                    {{--<li><a href="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo04_lg.jpg" data-size="960x640"><img class="img-responsive" src="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo04.jpg" alt="4"></a></li>--}}
                    {{--<li><a href="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo05_lg.jpg" data-size="960x640"><img class="img-responsive" src="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo05.jpg" alt="5"></a></li>--}}
                    {{--<li><a href="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo06_lg.jpg" data-size="960x640"><img class="img-responsive" src="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo06.jpg" alt="6"></a></li>--}}
                    {{--<li><a href="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo07_lg.jpg" data-size="960x640"><img class="img-responsive" src="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo07.jpg" alt="7"></a></li>--}}
                    {{--<li><a href="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo08_lg.jpg" data-size="960x640"><img class="img-responsive" src="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo08.jpg" alt="8"></a></li>--}}
                    {{--<li><a href="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo09_lg.jpg" data-size="960x640"><img class="img-responsive" src="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo09.jpg" alt="9"></a></li>--}}
                </ul>

                {{--<h2>Second gallery</h2>--}}
                {{--<ul class="owl-carousel">--}}
                {{--<li><a href="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo10_lg.jpg" data-size="960x640" data-title="1"><img class="img-responsive" src="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo10.jpg" alt="10"></a></li>--}}
                {{--<li><a href="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo11_lg.jpg" data-size="960x640" data-title="2"><img class="img-responsive" src="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo11.jpg" alt="11"></a></li>--}}
                {{--<li><a href="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo12_lg.jpg" data-size="960x640" data-title="3"><img class="img-responsive" src="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo12.jpg" alt="12"></a></li>--}}
                {{--<li><a href="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo13_lg.jpg" data-size="960x640" data-title="4"><img class="img-responsive" src="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo13.jpg" alt="13"></a></li>--}}
                {{--<li><a href="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo14_lg.jpg" data-size="960x640" data-title="5"><img class="img-responsive" src="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo14.jpg" alt="14"></a></li>--}}
                {{--<li><a href="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo15_lg.jpg" data-size="960x640" data-title="6"><img class="img-responsive" src="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo15.jpg" alt="15"></a></li>--}}
                {{--</ul>--}}



            </div>


                    </div>


                </div>

            </div>

        </div>
    </article>
        </div>
</div>
<div class="row">
        <br/>
    <div class="col-md-12 text-center">
        <input id="input-id" type="text" class="rating" name="starRate" data-size="md" readonly="true" value="{{$rating_avg}}" diabled="true" >
        <p> Overall Average Article Rating: {{round($rating_avg,2)}}/5 Stars</p>
        {{--*/ @ $hide_rating_form = false; /*--}}
        <p>Number of Ratings: {{$rating_count}}</p>

        @can('loggedIn')
            @if( $hide_rating_form == false)
                {{--<div class="alert-warning"><p class="text-center">You have already rated this article!  :D We assure you your rating has been figured into the total score!</p></div>--}}

            @endif
        @endcan
        </div>
    </div>
        <br/>
<h2 class="text-center">Bowtie User Ratings</h2>

        <div class="row">
            @foreach($post_ratings as $rating)
                {{--*/ @ $rate_pct_reviewer = (($rating->rating/5)*100); /*--}}

        @if(Auth::user())
             @if($rating->user_id== Auth::user()->id || $post->user_id== Auth::user()->id)
                {{--*/ @ $hide_rating_form = true; /*--}}
                @endif
        @endif
            <? $author = App\User::find($rating->user_id)->name; ?>

                    <div class="col-md-2 col-md-offset-1"><? $avatar = App\User::find($rating->user_id)->avatar; ?>

                        @if(empty($avatar))
                           <p> <img src="{{url('images/default-user-img.png')}}" class="img-circle avatar" alt="user profile image"></p>

                        @else

                            <p><img src="{{$avatar}}" class="img-circle avatar" alt="user profile image"></p>

                        @endif
                        <p>rated by <a href="{{ url('/show_user/' . $rating->user_id) }}"> <b>{{$author}}</b></a></p>


                        <span class="text-muted time">{{$rating->created_at->format('M dS Y')}}</span>

                    </div>

                    <div class="col-md-6"><p>{{$rating->rate_message}}</p></div>
                    <div class="col-md-2 offset-1">

                            <p>{{$rating->rating}}/5 Stars</p>
                            <div class="rating2"><div class="stars"></div><div class="back" style="width:{{$rate_pct_reviewer}}%;"></div></div>

                    </div>
                </div>
<hr>
    <br/>

        @endforeach



        @can('loggedIn')
@if( $hide_rating_form == false)

        <h2>Rate this article!!!</h2>
        <hr>

        {!! Form::open(array('url'=>'/posts/{id}/{title}')) !!}
        {{--echo Form::open(array('url' => 'foo/bar', 'files' => true))--}}
<div class="form-group center-block">
        <div class="rate-width text-center">
        <input id="input-id2" type="text" class="rating" name="starRate" data-size="md" >
            </div>
</div>
        {{--{!! Form::open(['url' => '/posts', 'class' => '', 'files' =>true]) !!}--}}
        {{--{{ Form::selectRange('userRate', 1, 5) }}--}}

        <div class="form-group">
            {!! Form::label('userRateMsg', 'Please Leave Comments With Your Rating', ['class' => '']) !!}

            {!! Form::hidden('post_id', $post->id, ['class' => 'form-control']) !!}
            <div class="">
                {!! Form::textarea('', null, ['class' => 'form-control', 'name'=>'userRateMsg', 'id'=>'userRateMsg']) !!}
                {!! $errors->first('userRateMsg', '<p class="uk-alert-danger">:message</p>') !!}
            </div>
        </div>
        <br/>
        <br/>

        {!! Form::submit('Rate This Article', ['class' => 'btn btn-success form-control']) !!}

        {!! Form::close() !!}

        @else


        @endif
        @endcan

        <br/>

        <h2 class="text-center">Leave a Facebook Comment!</h2>
        <div class="fb-comments center-block" data-href="https://www.bowtiesoft.com/posts/{{$post->id}}/{{str_slug($post->title)}}" data-numposts="10"></div>

        <br/>



    <a href="{{url('posts')}}">

        <button type="submit" class="btn btn-primary center-block btn-md">Back to All Posts</button>
    </a>
   &nbsp;
    <a href="{{url('/')}}">

        <button type="submit" class="btn btn-success center-block btn-md">Back Home</button>
    </a>

    </div>




    @endsection

<script src="{{url('/js/jquery.js')}}"></script>
<script src="{{url('/js/star-rating.js')}}"></script>





<script>
    // initialize with defaults

    $('#input-id2').rating();


//
//    $(document).on('ready', function(){
//        $('#input-id').rating({min: 0, max: 5, step: 0.1, stars: 5});
//    });




    var initPhotoSwipeFromDOM = function(gallerySelector) {

        // parse slide data (url, title, size ...) from DOM elements
        // (children of gallerySelector)
        var parseThumbnailElements = function(el) {
            var thumbElements = el.childNodes,
                    numNodes = thumbElements.length,
                    items = [],
                    figureEl,
                    linkEl,
                    size,
                    item;

            for(var i = 0; i < numNodes; i++) {

                figureEl = thumbElements[i]; // <figure> element

                // include only element nodes
                if(figureEl.nodeType !== 1) {
                    continue;
                }

                linkEl = figureEl.children[0]; // <a> element

                size = linkEl.getAttribute('data-size').split('x');

                // create slide object
                item = {
                    src: linkEl.getAttribute('href'),
                    w: parseInt(size[0], 10),
                    h: parseInt(size[1], 10)
                };



                if(figureEl.children.length > 1) {
                    // <figcaption> content
                    item.title = figureEl.children[1].innerHTML;
                }

                if(linkEl.children.length > 0) {
                    // <img> thumbnail element, retrieving thumbnail url
                    item.msrc = linkEl.children[0].getAttribute('src');
                }

                item.el = figureEl; // save link to element for getThumbBoundsFn
                items.push(item);
            }

            return items;
        };

        // find nearest parent element
        var closest = function closest(el, fn) {
            return el && ( fn(el) ? el : closest(el.parentNode, fn) );
        };

        // triggers when user clicks on thumbnail
        var onThumbnailsClick = function(e) {
            e = e || window.event;
            e.preventDefault ? e.preventDefault() : e.returnValue = false;

            var eTarget = e.target || e.srcElement;

            // find root element of slide
            var clickedListItem = closest(eTarget, function(el) {
                return (el.tagName && el.tagName.toUpperCase() === 'FIGURE');
            });

            if(!clickedListItem) {
                return;
            }

            // find index of clicked item by looping through all child nodes
            // alternatively, you may define index via data- attribute
            var clickedGallery = clickedListItem.parentNode,
                    childNodes = clickedListItem.parentNode.childNodes,
                    numChildNodes = childNodes.length,
                    nodeIndex = 0,
                    index;

            for (var i = 0; i < numChildNodes; i++) {
                if(childNodes[i].nodeType !== 1) {
                    continue;
                }

                if(childNodes[i] === clickedListItem) {
                    index = nodeIndex;
                    break;
                }
                nodeIndex++;
            }



            if(index >= 0) {
                // open PhotoSwipe if valid index found
                openPhotoSwipe( index, clickedGallery );
            }
            return false;
        };

        // parse picture index and gallery index from URL (#&pid=1&gid=2)
        var photoswipeParseHash = function() {
            var hash = window.location.hash.substring(1),
                    params = {};

            if(hash.length < 5) {
                return params;
            }

            var vars = hash.split('&');
            for (var i = 0; i < vars.length; i++) {
                if(!vars[i]) {
                    continue;
                }
                var pair = vars[i].split('=');
                if(pair.length < 2) {
                    continue;
                }
                params[pair[0]] = pair[1];
            }

            if(params.gid) {
                params.gid = parseInt(params.gid, 10);
            }

            return params;
        };

        var openPhotoSwipe = function(index, galleryElement, disableAnimation, fromURL) {
            var pswpElement = document.querySelectorAll('.pswp')[0],
                    gallery,
                    options,
                    items;

            items = parseThumbnailElements(galleryElement);

            // define options (if needed)
            options = {

                // define gallery index (for URL)
                galleryUID: galleryElement.getAttribute('data-pswp-uid'),

                getThumbBoundsFn: function(index) {
                    // See Options -> getThumbBoundsFn section of documentation for more info
                    var thumbnail = items[index].el.getElementsByTagName('img')[0], // find thumbnail
                            pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
                            rect = thumbnail.getBoundingClientRect();

                    return {x:rect.left, y:rect.top + pageYScroll, w:rect.width};
                }

            };

            // PhotoSwipe opened from URL
            if(fromURL) {
                if(options.galleryPIDs) {
                    // parse real index when custom PIDs are used
                    // http://photoswipe.com/documentation/faq.html#custom-pid-in-url
                    for(var j = 0; j < items.length; j++) {
                        if(items[j].pid == index) {
                            options.index = j;
                            break;
                        }
                    }
                } else {
                    // in URL indexes start from 1
                    options.index = parseInt(index, 10) - 1;
                }
            } else {
                options.index = parseInt(index, 10);
            }

            // exit if index not found
            if( isNaN(options.index) ) {
                return;
            }

            if(disableAnimation) {
                options.showAnimationDuration = 0;
            }

            // Pass data to PhotoSwipe and initialize it
            gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
            gallery.init();
        };

        // loop through all gallery elements and bind events
        var galleryElements = document.querySelectorAll( gallerySelector );

        for(var i = 0, l = galleryElements.length; i < l; i++) {
            galleryElements[i].setAttribute('data-pswp-uid', i+1);
            galleryElements[i].onclick = onThumbnailsClick;
        }

        // Parse URL and open gallery if it contains #&pid=3&gid=1
        var hashData = photoswipeParseHash();
        if(hashData.pid && hashData.gid) {
            openPhotoSwipe( hashData.pid ,  galleryElements[ hashData.gid - 1 ], true, true );
        }
    };

    // execute above function
    initPhotoSwipeFromDOM('.my-gallery');

</script>


