@extends('layout')

@section('content')




    <div class="container">
        {{--<h1>OwlCarousel &amp; PhotoSwipe</h1>--}}

        <h2>First gallery</h2>
        <ul class="owl-carousel">
            <li><a href="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo01_lg.jpg" data-size="960x640"><img class="img-responsive" src="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo01.jpg" alt="1"></a></li>
            <li><a href="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo02_lg.jpg" data-size="960x640"><img class="img-responsive" src="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo02.jpg" alt="2"></a></li>
            <li><a href="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo03_lg.jpg" data-size="960x640"><img class="img-responsive" src="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo03.jpg" alt="3"></a></li>
            <li><a href="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo04_lg.jpg" data-size="960x640"><img class="img-responsive" src="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo04.jpg" alt="4"></a></li>
            <li><a href="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo05_lg.jpg" data-size="960x640"><img class="img-responsive" src="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo05.jpg" alt="5"></a></li>
            <li><a href="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo06_lg.jpg" data-size="960x640"><img class="img-responsive" src="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo06.jpg" alt="6"></a></li>
            <li><a href="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo07_lg.jpg" data-size="960x640"><img class="img-responsive" src="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo07.jpg" alt="7"></a></li>
            <li><a href="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo08_lg.jpg" data-size="960x640"><img class="img-responsive" src="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo08.jpg" alt="8"></a></li>
            <li><a href="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo09_lg.jpg" data-size="960x640"><img class="img-responsive" src="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo09.jpg" alt="9"></a></li>
        </ul>

        <h2>Second gallery</h2>
        <ul class="owl-carousel">
            <li><a href="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo10_lg.jpg" data-size="960x640" data-title="1"><img class="img-responsive" src="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo10.jpg" alt="10"></a></li>
            <li><a href="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo11_lg.jpg" data-size="960x640" data-title="2"><img class="img-responsive" src="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo11.jpg" alt="11"></a></li>
            <li><a href="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo12_lg.jpg" data-size="960x640" data-title="3"><img class="img-responsive" src="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo12.jpg" alt="12"></a></li>
            <li><a href="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo13_lg.jpg" data-size="960x640" data-title="4"><img class="img-responsive" src="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo13.jpg" alt="13"></a></li>
            <li><a href="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo14_lg.jpg" data-size="960x640" data-title="5"><img class="img-responsive" src="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo14.jpg" alt="14"></a></li>
            <li><a href="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo15_lg.jpg" data-size="960x640" data-title="6"><img class="img-responsive" src="http://webdesign-dackel.com/demo/owlcarousel-photoswipe/images/photo15.jpg" alt="15"></a></li>
        </ul>
    </div>

    <script src="{{url('/js/jquery-1.11.3.min.js')}}"></script>

    {{--<script src="{{url('/js/index.js')}}"></script>--}}
    <script src="{{url('/js/owl.carousel.js')}}"></script>
    <script src="{{url('/js/photoswipe.min.js')}}"></script>
    <script src="{{url('/js/photoswipe-ui-default.min.js')}}"></script>
    <script>

        $(function(){

            // PhotoSwipe用のHTMLを描画
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


            // ギャラリーから、PhotoSwipe用のitemsを取得
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

                    // キャプション
                    if( title ) item.title = title;

                    items.push(item);
                });

                return items;
            }


            // PhotoSwipeを開く
            function openGallery($gallery, index, items, pswpOptions){
                var $pswp = $(".pswp"),
                        owl = $gallery.data("owlCarousel"),
                        gallery;

                // オプション値を設定
                var options = $.extend(true, {
                    // 開く画像番号
                    index: index,

                    // 画像クリック時のズーム設定
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

                // PhotoSwipeを表示
                gallery = new PhotoSwipe($pswp.get(0), PhotoSwipeUI_Default, items, options);
                gallery.init();

                // PhotoSwipe側の切り替えに応じて、OwlCarouselも位置を調整する
                gallery.listen("beforeChange", function(x){
                    owl.goTo(this.getCurrentIndex());
                });

                gallery.listen("close", function(){
                    this.currItem.initialLayout = options.getThumbBoundsFn(this.getCurrentIndex());
                });
            }


            // 初期化
            function initializeGallery($elem, owlOptions, pswpOptions){

                // PhotoSwipe用のDOMが存在しない場合、新しく描画
                if( $(".pswp").size() === 0 ){
                    buildPswdHtml();
                }

                // 複数のギャラリーに対応するために走査
                $elem.each(function(i){
                    var $gallery = $(this),
                            uid = i + 1,
                            items = getGalleryItems($gallery),
                            options = $.extend(true, {}, pswpOptions);

                    // OwlCarouselの初期化
                    $gallery.owlCarousel(owlOptions);

                    // 各ギャラリーに対してユニークなIDを割り当てる
                    options.galleryUID = uid;
                    $gallery.attr("data-pswp-uid", uid);

                    // 各アイテムのクリックで、PhotoSwipeを起動
                    $gallery.find(".owl-item").on("click", function(e){
                        if( !$(e.target).is("img") ) return;

                        // itemsはPhotoSwipe.init()に書き換えられるのでコピーを渡す
                        openGallery($gallery, $(this).index(), items.concat(), options);
                        return false;
                    });
                });
            }


            // サンプルでは`.owl-carousel`に対して処理を実行する
            var owlOptions = {
                        itemsCustom: [[0, 3]],
                        responsiveRefreshRate: 0
                    },
                    pswpOptions = {
                        bgOpacity: 0.9,
                        history: false,
                        shareEl: false
                    };

            initializeGallery($(".owl-carousel"), owlOptions, pswpOptions);

        });

    </script>


    {{--getting this part right........ among files to remove after figuring out right gallery sitch:--}}




    @endsection
