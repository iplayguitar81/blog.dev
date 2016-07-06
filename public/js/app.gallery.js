$(function(){

    // PhotoSwipeç”¨ã®HTMLã‚’æç”»
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


    // ã‚®ãƒ£ãƒ©ãƒªãƒ¼ã‹ã‚‰ã€PhotoSwipeç”¨ã®itemsã‚’å–å¾—
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

            // ã‚­ãƒ£ãƒ—ã‚·ãƒ§ãƒ³
            if( title ) item.title = title;

            items.push(item);
        });

        return items;
    }


    // PhotoSwipeã‚’é–‹ã
    function openGallery($gallery, index, items, pswpOptions){
        var $pswp = $(".pswp"),
            owl = $gallery.data("owlCarousel"),
            gallery;

        // ã‚ªãƒ—ã‚·ãƒ§ãƒ³å€¤ã‚’è¨­å®š
        var options = $.extend(true, {
            // é–‹ãç”»åƒç•ªå·
            index: index,

            // ç”»åƒã‚¯ãƒªãƒƒã‚¯æ™‚ã®ã‚ºãƒ¼ãƒ è¨­å®š
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

        // PhotoSwipeã‚’è¡¨ç¤º
        gallery = new PhotoSwipe($pswp.get(0), PhotoSwipeUI_Default, items, options);
        gallery.init();

        // PhotoSwipeå´ã®åˆ‡ã‚Šæ›¿ãˆã«å¿œã˜ã¦ã€OwlCarouselã‚‚ä½ç½®ã‚’èª¿æ•´ã™ã‚‹
        gallery.listen("beforeChange", function(x){
            owl.goTo(this.getCurrentIndex());
        });

        gallery.listen("close", function(){
            this.currItem.initialLayout = options.getThumbBoundsFn(this.getCurrentIndex());
        });
    }


    // åˆæœŸåŒ–
    function initializeGallery($elem, owlOptions, pswpOptions){

        // PhotoSwipeç”¨ã®DOMãŒå­˜åœ¨ã—ãªã„å ´åˆã€æ–°ã—ãæç”»
        if( $(".pswp").size() === 0 ){
            buildPswdHtml();
        }

        // è¤‡æ•°ã®ã‚®ãƒ£ãƒ©ãƒªãƒ¼ã«å¯¾å¿œã™ã‚‹ãŸã‚ã«èµ°æŸ»
        $elem.each(function(i){
            var $gallery = $(this),
                uid = i + 1,
                items = getGalleryItems($gallery),
                options = $.extend(true, {}, pswpOptions);

            // OwlCarouselã®åˆæœŸåŒ–
            $gallery.owlCarousel(owlOptions);

            // å„ã‚®ãƒ£ãƒ©ãƒªãƒ¼ã«å¯¾ã—ã¦ãƒ¦ãƒ‹ãƒ¼ã‚¯ãªIDã‚’å‰²ã‚Šå½“ã¦ã‚‹
            options.galleryUID = uid;
            $gallery.attr("data-pswp-uid", uid);

            // å„ã‚¢ã‚¤ãƒ†ãƒ ã®ã‚¯ãƒªãƒƒã‚¯ã§ã€PhotoSwipeã‚’èµ·å‹•
            $gallery.find(".owl-item").on("click", function(e){
                if( !$(e.target).is("img") ) return;

                // itemsã¯PhotoSwipe.init()ã«æ›¸ãæ›ãˆã‚‰ã‚Œã‚‹ã®ã§ã‚³ãƒ”ãƒ¼ã‚’æ¸¡ã™
                openGallery($gallery, $(this).index(), items.concat(), options);
                return false;
            });
        });
    }


    // ã‚µãƒ³ãƒ—ãƒ«ã§ã¯`.owl-carousel`ã«å¯¾ã—ã¦å‡¦ç†ã‚’å®Ÿè¡Œã™ã‚‹
    var owlOptions = {
            itemsCustom: [[0, 3]],
            responsiveRefreshRate: 0
        },

        pswpOptions = {
            bgOpacity: 0.9,
            history: false,
            shareEl: true
        };

    shareButtons: [
        {id:'facebook', label:'Share on Facebook', url:'https://www.facebook.com/sharer/sharer.php?u={{url}}'},
        {id:'twitter', label:'Tweet', url:'https://twitter.com/intent/tweet?text={{text}}&url={{url}}'},
        {id:'pinterest', label:'Pin it', url:'http://www.pinterest.com/pin/create/button/?url={{url}}&media={{image_url}}&description={{text}}'},
        {id:'download', label:'Download image', url:'{{raw_image_url}}', download:true}
    ],


        initializeGallery($(".owl-carousel"), owlOptions, pswpOptions);

});