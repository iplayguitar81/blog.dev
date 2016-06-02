<br/>

<div class="panel panel-primary">

    <div class="panel-heading">
        <h3 class="panel-title">Welcome

            @if(Auth::user())

                {{Auth::user()->name}}

                @if(empty(Auth::user()->avatar))

                @else


        <img src="{{Auth::user()->avatar}}" alt="user avatar" class="img-rounded" width="50" size="50">
                @endif

            @else
                to Bowtie<br/>Software &amp; Web Development!
            @endif

        </h3>
    </div>
    <br/>

    <div class="list-group">
        <a href="#"><button type="button" class="list-group-item"><i class="fa fa-lg fa-facebook"></i> &nbsp;Facebook</button></a>
        <a href="#"><button type="button" class="list-group-item"><i class="fa fa-lg fa-twitter"></i> &nbsp;Twitter</button></a>
        <a href="#"><button type="button" class="list-group-item"><i class="fa fa-lg fa-github"></i> &nbsp;Github</button></a>
        <a href="#"><button type="button" class="list-group-item"><i class="fa fa-lg fa-youtube"></i> &nbsp;YouTube</button></a>

    </div>

</div>




<div class="panel">
        <div class="panel-heading">
        <h3 class="panel-title">Title</h3></div>
        <ul class="list-group">
            <li class="list-group-item"><a href="#">List Item 1</a></li>
            <li class="list-group-item"><a href="#">List Item 2</a></li>
            <li class="list-group-item"><a href="#">List Item 3</a></li>
            <li class="list-group-item"><a href="#">List Item 4</a></li>
            <li class="list-group-item"><a href="#">You Get The Idea...</a></li>
        </ul>
    </div>

    <div class="well">


    </div>

    <div class="panel panel-success"> <div class="panel-heading"> <h3 class="panel-title">Panel title</h3> </div> <div class="panel-body"> Panel content </div> </div>


    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
        <li><a data-toggle="tab" href="#menu1"><i class="fa fa-lg fa-facebook"></i>&nbsp;Facebook</a></li>
        <li><a data-toggle="tab" href="#menu2"><i class="fa fa-lg fa-twitter"></i>&nbsp;Twitter</a></li>
    </ul>

    <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
            <h3>Welcome!</h3>
            <p>Thank you for visiting Bowtie Software &amp; Web Development.  Please take time to like us on Facebook and/or follow us on Twitter!</p>
        </div>
        <div id="menu1" class="tab-pane fade">
            <h3>Facebook</h3>
            <div class="fb-page" data-href="https://www.facebook.com/bowtiesoft/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/bowtiesoft/"><a href="https://www.facebook.com/bowtiesoft/">Bowtie Software &amp; Web Development</a></blockquote></div></div>
        </div>
        <div id="menu2" class="tab-pane fade">
            <h3>Twitter</h3>
            <a class="twitter-timeline" href="https://twitter.com/search?q=from%3Aarronafflalo%20OR%20from%3ADame_Lillard%20OR%20from%3Arolopez42%20OR%20from%3Aaldridge_12%20OR%20from%3Anicolas88batum%20OR%20from%3ASteveBlake5%20OR%20from%3Aallencrabbe%20OR%20from%3Apsufraz23%20OR%20from%3AGeeAlonzo%20OR%20from%3AChrisKaman%20OR%20from%3AMeyersLeonard11%20OR%20from%3Awessywes2%20OR%20from%3ACJMcCollum%20OR%20from%3ADWRIGHTWAY1%20OR%20from%3Atrailblazers" data-widget-id="599516450617856000">Tweets about from:arronafflalo OR from:Dame_Lillard OR from:rolopez42 OR from:aldridge_12 OR from:nicolas88batum OR from:SteveBlake5 OR from:allencrabbe OR from:psufraz23 OR from:GeeAlonzo OR from:ChrisKaman OR from:MeyersLeonard11 OR from:wessywes2 OR from:CJMcCollum OR from:DWRIGHTWAY1 OR from:trailblazers</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
        </div>
        <div id="menu3" class="tab-pane fade">
            <h3>Menu 3</h3>
            <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
        </div>
    </div>