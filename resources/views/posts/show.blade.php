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
        <h1 class="article-title-show" style="font-family: Pacifico, cursive;font-size:4em;line-height:1.2em;text-align:center;">{{ $post->title }}</h1>
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
        <div class="center-block text-center">
       <p class="article-texterson"> {!! ($post->body) !!} </p>
            <div class="container">
                <h2 style="font-family: Pacifico, cursive;font-size:2em;line-height:1.2em;color:#E63C4D;text-align:center;">Article Gallery</h2>
                    <br/>
                <ul class="owl-carousel">
                    @foreach($post->images as $image)

                        {{--*/ @ $pathy =$image->file_path  /*--}}

                        {{--*/ @ list($width, $height) = getimagesize($pathy) /*--}}

                        {{--*/ @ $dimensions =$width.'x'.$height  /*--}}

                        {{--*/ $thumb_path= substr($image->file_path, 7);/*--}}
                        <li class="owl-trick">
                            <a href="{{url($image->file_path)}}" data-size="{{$dimensions}}" data-title="{{$thumb_path}}">
                                <img class="img-responsive" src="{{url('images/thmb-'.$thumb_path)}}" alt="1"></a></li>
                    @endforeach

                </ul>

            </div>

                    </div>

    </article>
                </div>

            </div>

        </div>

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
<h2 class="text-center" style="font-family: Pacifico, cursive;font-size:2em;line-height:1.2em;color:#E63C4D;text-align:center;" >Bowtie User Ratings</h2>

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

                            <p>{{round($rating->rating,2)}}/5 Stars</p>
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

        <h2 class="text-center" style="font-family: Pacifico, cursive;font-size:2em;line-height:1.2em;color:#E63C4D;text-align:center;">Leave a Facebook Comment!</h2>
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

{{--<script src="{{url('/js/jquery.js')}}"></script>--}}


<script src="{{url('/js/jquery-1.11.3.min.js')}}"></script>
<script src="{{url('/js/star-rating.js')}}"></script>
<script src="{{url('/js/owl.carousel.js')}}"></script>
<script src="{{url('/js/photoswipe.min.js')}}"></script>
<script src="{{url('/js/photoswipe-ui-default.min.js')}}"></script>
<script>

    $(function(){

        // Drawing the HTML for PhotoSwipe
        function buildPswdHtml(){
            $("body").append([
                '<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">',
                '  <div class="pswp__bg"></div>',
                '  <div class="pswp__scroll-wrap">',
                '    <div class="pswp__container">',
                '      <div class="pswp__item"></div>',
                '      <div class="pswp__item"></div>',
                '      <div class="pswp__item"></div>',
                '    </div>',
                '    <div class="pswp__ui pswp__ui--hidden">',
                '      <div class="pswp__top-bar">',
                '          <div class="pswp__counter"></div>',
                '          <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>',
                '          <button class="pswp__button pswp__button--share" title="Share"></button>',
                '          <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>',
                '          <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>',
                '          <div class="pswp__preloader">',
                '            <div class="pswp__preloader__icn">',
                '              <div class="pswp__preloader__cut">',
                '                <div class="pswp__preloader__donut"></div>',
                '              </div>',
                '            </div>',
                '          </div>',
                '      </div>',
                '      <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">',
                '        <div class="pswp__share-tooltip"></div> ',
                '      </div>',
                '      <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>',
                '      <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>',
                '      <div class="pswp__caption">',
                '        <div class="pswp__caption__center"></div>',
                '      </div>',
                '    </div>',
                '  </div>',
                '</div>'
            ].join(""));
        }


        // From the gallery, get the items for PhotoSwipe
        function getGalleryItems($gallery){
            var items = [];

            $gallery.find("a").each(function(){
                var $anchor = $(this),
                        size = $anchor.attr("data-size").split("x"),
                        title = $anchor.attr("data-title"),
                        item = {
                            el: $anchor.get(0),
                            src: $anchor.attr("href"),
                            w: parseInt(size[0]),
                            h: parseInt(size[1])
                        };

                // caption
                if( title ) item.title = title;

                items.push(item);
            });

            return items;
        }


        //Opening the PhotoSwipe
        function openGallery($gallery, index, items, pswpOptions){
            var $pswp = $(".pswp"),
                    owl = $gallery.data("owlCarousel"),
                    gallery;

            //Set an option value
            var options = $.extend(true, {
                // Image number to open
                index: index,

                //Zoom setting at the time of image click
                getThumbBoundsFn: function(index){
                    var $thumbnail = $(items[index].el).find("img"),
                            offset = $thumbnail.offset();
                    return {
                        x: offset.left,
                        y: offset.top,
                        w: $thumbnail.outerWidth()
                    };
                }
            }, pswpOptions);

            //Display the PhotoSwipe
            gallery = new PhotoSwipe($pswp.get(0), PhotoSwipeUI_Default, items, options);
            gallery.init();

            // In accordance with the switching of PhotoSwipe slide , OwlCarousel also adjusts position
            gallery.listen("beforeChange", function(x){
                owl.goTo(this.getCurrentIndex());
            });

            gallery.listen("close", function(){
                this.currItem.initialLayout = options.getThumbBoundsFn(this.getCurrentIndex());
            });
        }


        // Initialization
        function initializeGallery($elem, owlOptions, pswpOptions){

            //If the DOM for PhotoSwipe does not exist , a new drawing
            if( $(".pswp").size() === 0 ){
                buildPswdHtml();
            }

            // Scan to accommodate a plurality of gallery
            $elem.each(function(i){
                var $gallery = $(this),
                        uid = i + 1,
                        items = getGalleryItems($gallery),
                        options = $.extend(true, {}, pswpOptions);

                // Initialization of OwlCarousel
                $gallery.owlCarousel(owlOptions);

                //Assign a unique ID to each gallery
                options.galleryUID = uid;
                $gallery.attr("data-pswp-uid", uid);

                // With the click of each item , start PhotoSwipe
                $gallery.find(".owl-item").on("click", function(e){
                    if( !$(e.target).is("img") ) return;

                    //items pass a copy because it is rewritten to PhotoSwipe.init ()
                    openGallery($gallery, $(this).index(), items.concat(), options);
                    return false;
                });
            });
        }


        // In the sample to perform the processing for the `.owl-carousel`
        var owlOptions = {
                    itemsCustom: [[0, 3]],
                    responsiveRefreshRate: 0
                },
                pswpOptions = {
                    bgOpacity: 0.9,
                    history: false,
                    shareEl: true
                };

        initializeGallery($(".owl-carousel"), owlOptions, pswpOptions);

    });

</script>





