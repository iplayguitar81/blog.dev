@extends('layout')

@section('content')



<div id="portfolio">



    <!-- heres where we can test photoswipe-->
    <div class="row">

        <div class="my-gallery" itemscope itemtype="http://schema.org/ImageGallery">



            <div class="col-md-12">


                @foreach($post->images as $image)

                    {{--*/ @ $pathy =$image->file_path  /*--}}

                    {{--*/ @ list($width, $height) = getimagesize($pathy) /*--}}

                    {{--*/ @ $dimensions =$width.'x'.$height  /*--}}


                    <figure class="col-md-2" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                        <a href="{{url($image->file_path)}}" itemprop="contentUrl" data-size="{{$dimensions}}">
                            <img src="{{url($image->file_path)}}"  alt="CRUD MVC ASP" />
                        </a>
                        <figcaption itemprop="caption description">MVC ASP CRUD height: {{$height}} width: {{$width}}</figcaption>
                    </figure>
                @endforeach
            </div>

        </div>



        {{--<a href="#demo9" class="btn btn-info" data-toggle="collapse">More Info</a>--}}
        {{--<div id="demo9" class="collapse">--}}
        {{--<p>Since I am familiar with Rails and MVC I decided to learn ASP MVC when not busy studying.  Here is some idea of what I can do with that technology.  Unfortunately,  I do not currently have a neatly designed page as I have mostly been focusing on learning the backend of this technology.  There are also other things that I have figured out with this technology like pagination of records- - for example, but I do not have a photo at this time only code.  I also do not have a live version of this site but if requested I can provide examples of my code!  It has been a cool experience learning ASP MVC because I have found that I am able to learn MVC frameworks fairly easily and am excited to learn more!</p></div>--}}
        {{--</div>--}}
    </div>
    <!-- Root element of PhotoSwipe. Must have class pswp. -->
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

        <!-- Background of PhotoSwipe.
             It's a separate element, as animating opacity is faster than rgba(). -->
        <div class="pswp__bg"></div>

        <!-- Slides wrapper with overflow:hidden. -->
        <div class="pswp__scroll-wrap">

            <!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory. -->
            <!-- don't modify these 3 pswp__item elements, data is added later on. -->
            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>

            <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
            <div class="pswp__ui pswp__ui--hidden">

                <div class="pswp__top-bar">

                    <!--  Controls are self-explanatory. Order can be changed. -->

                    <div class="pswp__counter"></div>

                    <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                    <button class="pswp__button pswp__button--share" title="Share"></button>

                    <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                    <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                    <!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
                    <!-- element will get class pswp__preloader--active when preloader is running -->
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div>

                <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                </button>

                <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                </button>

                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>

            </div>

        </div>

    </div>


</div>


<br/>
<br/>



<div class="row">
    <div class="col-sm-6">
<div class="slider">


        @foreach($post->images as $image)
        <img class="col-sm-2" src="{{url($image->file_path)}}"  alt="CRUD MVC ASP"/>
        @endforeach


</div>
</div>

</div>

<br/>
    <hr>
    <br/>

{{--<div class="customNavigation">--}}
    {{--<a class="btn prev btn-danger">Previous</a>--}}
    {{--<a class="btn next btn-danger">Next</a>--}}
{{--</div>--}}

    <div class="my-gallery" itemscope itemtype="http://schema.org/ImageGallery">
        <div id="owl-demo" class="owl-carousel">
    @foreach($post->images as $image)
        {{--*/ @ $pathy =$image->file_path  /*--}}

        {{--*/ @ list($width, $height) = getimagesize($pathy) /*--}}

        {{--*/ @ $dimensions =$width.'x'.$height  /*--}}

    {{--<div class="item" style="">--}}
        <figure class="item" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
            <a href="{{url($image->file_path)}}" itemprop="contentUrl" data-size="{{$dimensions}}">
            <img class="thumbnail lazyOwl" src="{{url($image->file_path)}}"  alt=""/>
                </a>
            <figcaption itemprop="caption description">MVC ASP CRUD height: {{$height}} width: {{$width}}</figcaption>
        </figure>

    {{--</div>--}}
    @endforeach

</div>
    </div>

@endsection


<script>
    // initialize with defaults

//    $('#input-id2').rating();


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
                allowPanToNext: true,

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
