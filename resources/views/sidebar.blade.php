<br/>

<div class="panel panel-primary">

    <div class="panel-heading">
        <h3 class="panel-title">Welcome

            @if(Auth::user())

                {{Auth::user()->name}}

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
            <h3>HOME</h3>
            <p>Thank you for visiting Bowtie Software &amp; Web Development.  Please take time to like us on Facebook and/or follow us on Twitter!</p>
        </div>
        <div id="menu1" class="tab-pane fade">
            <h3>Menu 1</h3>
            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
        <div id="menu2" class="tab-pane fade">
            <h3>Menu 2</h3>
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
        </div>
        <div id="menu3" class="tab-pane fade">
            <h3>Menu 3</h3>
            <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
        </div>
    </div>