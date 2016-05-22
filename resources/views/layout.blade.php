<!DOCTYPE html>
<html lang="en-gb" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bowtie Software &amp; Web Development | </title>
    <link rel="shortcut icon" href="{{ 'favicon.ico' }}">
    <link rel="apple-touch-icon-precomposed" href="images/apple-touch-icon.png">
    <link rel="stylesheet" href="/css/uikit.docs.min.css">

</head>

<body>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-75872228-1', 'auto');
    ga('send', 'pageview');

</script>

<div class="uk-container uk-container-center uk-margin-top uk-margin-large-bottom">

    <header id="top" role="banner">
        <a href="{{url('/')}}" ><img alt="bowtie software &amp; web development" src="{{url('/images/bowtiebranded.png')}}"></a>
    </header>
<br/>
    <nav class="uk-navbar uk-margin-large-bottom">
        {{--<a class="uk-navbar-brand uk-hidden-small" href="{{url('/')}}"><img src="{{url('/images/bowtiebranded.png')}}" alt="bowtiesoftware &amp; web development"/></a>--}}
        <ul class="uk-navbar-nav uk-hidden-small">
            <li class="uk-active">
                <a href="{{url('/')}}" >Home</a>
            </li>
            <li>
                <a href="#">Portfolio</a>
            </li>
            <li>
                <a href="{{url('/posts')}}">Blog</a>
            </li>
            <li>
                <a href="#">Contact</a>
            </li>
            @if (Auth::guest())
                <li><a href="{{ url('/login') }}">Login</a></li>
                {{--<li><a href="{{ url('/register') }}">Register</a></li>--}}
            @else
                <li class="dropdown">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">

                        {{Auth::user()->name}} <span class="caret"></span>
                        </a>

                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{url('/logout')}}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>


                    </ul>

                </li>

            @endif
        </ul>
        <a href="#offcanvas" class="uk-navbar-toggle uk-visible-small" data-uk-offcanvas></a>
        <div class="uk-navbar-brand uk-navbar-center uk-visible-small"><!-- This is where you put branding text --></div>
    </nav>

    <div class="uk-grid" data-uk-grid-margin>
        @yield('content')




    </div>

</div>

<div id="offcanvas" class="uk-offcanvas">
    <div class="uk-offcanvas-bar">
        <ul class="uk-nav uk-nav-offcanvas">
            <li>
                <a href="/">Home</a>
            </li>
            <li>
                <a href="#">Portfolio</a>
            </li>
            <li class="uk-active">
                <a href="#">Blog</a>
            </li>
            <li>
                <a href="#">Contact</a>
            </li>
            <li>
                <a href="#">Contact</a>
            </li>
            @if (Auth::guest())
                <li><a href="{{ url('/login') }}">Login</a></li>
                {{--<li><a href="{{ url('/register') }}">Register</a></li>--}}
            @else
                <li class="dropdown">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">

                        {{Auth::user()->name}} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{url('/logout')}}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>


                    </ul>

                </li>

            @endif
        </ul>
    </div>
</div>




<script src="{{url('/js/jquery.js')}}"></script>
<script src="{{url('/js/uikit.min.js')}}"></script>
<script src="{{url('/js/bootstrap.min.js')}}"></script>



@include('footer')
</body>
</html>














