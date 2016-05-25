<!DOCTYPE html>
<html lang="en-gb" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bowtie Software &amp; Web Development | @yield('title') </title>
    <link rel="shortcut icon" href="{{ 'images/favicon.ico' }}">
    <link rel="apple-touch-icon-precomposed" href="images/apple-touch-icon.png">
    <link rel="stylesheet" href="/css/uikit.docs.min.css">
    <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Boogaloo' rel='stylesheet' type='text/css'>
    <style type="text/css">
        @font-face {
            font-family: Creampuff;
            src: url('{{ public_path('fonts/creampuffy.tff') }}');
        }
    </style>

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

    <header id="top">
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
                <a href="/contact">Contact</a>
            </li>
            @if (Auth::guest())
                <li><a href="{{ url('/login') }}">Login</a></li>
                {{--<li><a href="{{ url('/register') }}">Register</a></li>--}}
            @else



                    {{--<ul href="#" class="uk-nav uk-nav-dropdow" role="button" aria-expanded="false">--}}

                        {{--{{Auth::user()->name}} <span class="caret"></span>--}}
                        {{--</ul>--}}

                {{--<li><a href="{{url('/posts/user_posts')}}"><i class="fa fa-btn fa-sign-out"></i>Posts You Made</a></li>--}}

                {{--<li><a href="{{url('/logout')}}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>--}}


                    {{--<ul class="n" role="menu">--}}



                    {{--</ul>--}}

                <div class="uk-button-dropdown uk-align-right" data-uk-dropdown="{mode:'click'}" aria-haspopup="true" aria-expanded="false">
                    <button class="uk-button">{{Auth::user()->name}}&nbsp;&nbsp;<i class="uk-icon-caret-down"></i></button>
                    <div class="uk-dropdown uk-dropdown-bottom" style="top: 30px; left: 0px;">
                        <ul class="uk-nav uk-nav-dropdown">
                            <li><a href="{{url('/posts/user_posts')}}"><i class="fa fa-btn fa-sign-out"></i>Posts You Made</a></li>
                            <li class="uk-nav-divider"></li>
                            <li><a href="{{url('/logout')}}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>

                        </ul>
                    </div>
                </div>

            @endif
        </ul>
        <a href="#offcanvas" class="uk-navbar-toggle uk-visible-small" data-uk-offcanvas></a>
        <div class="uk-navbar-brand uk-navbar-center uk-visible-small"><!-- This is where you put branding text --></div>
    </nav>






    <div class="uk-grid" data-uk-grid-margin>
        @yield('content')

        <style type="text/css">@font-face { font-family:Creampuff; URL('/fonts/creampuffy.ttf'); }</style>



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
                <a href="{{url('/posts')}}">Blog</a>
            </li>
            <li>
                <a href="/contact">Contact</a>
            </li>
            @if (Auth::guest())
                <li><a href="{{ url('/login') }}">Login</a></li>
                {{--<li><a href="{{ url('/register') }}">Register</a></li>--}}
            @else



                {{--<ul href="#" class="uk-nav uk-nav-dropdow" role="button" aria-expanded="false">--}}

                {{--{{Auth::user()->name}} <span class="caret"></span>--}}
                {{--</ul>--}}

                {{--<li><a href="{{url('/posts/user_posts')}}"><i class="fa fa-btn fa-sign-out"></i>Posts You Made</a></li>--}}

                {{--<li><a href="{{url('/logout')}}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>--}}


                {{--<ul class="n" role="menu">--}}



                {{--</ul>--}}

                <div class="uk-button-dropdown uk-align-left" data-uk-dropdown="{mode:'click', boundary:'#offcanvas'}" aria-haspopup="true" aria-expanded="false">
                    <button class="uk-button">{{Auth::user()->name}}&nbsp;&nbsp;<i class="uk-icon-caret-down"></i></button>
                    <div class="uk-dropdown uk-dropdown-bottom" style="top: 30px; left: 0px;">
                        <ul class="uk-nav uk-nav-dropdown">
                            <li><a href="{{url('/posts/user_posts')}}"><i class="fa fa-btn fa-sign-out"></i>Posts You Made</a></li>
                            <li class="uk-nav-divider"></li>
                            <li><a href="{{url('/logout')}}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>

                        </ul>
                    </div>
                </div>


            @endif
        </ul>
    </div>
</div>
<div class="uk-footer" style="text-align:center;">

    @include('footer')
    </div>
<script src="{{url('/js/jquery.js')}}"></script>
<script src="{{url('/js/uikit.min.js')}}"></script>
<script src="{{url('/js/bootstrap.min.js')}}"></script>

</body>
</html>