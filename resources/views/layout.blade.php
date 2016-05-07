<!DOCTYPE html>
<html lang="en-gb" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bowtiesoft - UIkit</title>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon-precomposed" href="images/apple-touch-icon.png">
    <link rel="stylesheet" href="/css/uikit.docs.min.css">
</head>

<body>

<div class="uk-container uk-container-center uk-margin-top uk-margin-large-bottom">

    <nav class="uk-navbar uk-margin-large-bottom">
        <a class="uk-navbar-brand uk-hidden-small" href="{{url('/')}}">Bowtie Software & Web Development</a>
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
                <li><a href="{{ url('#') }}">Login</a></li>
                <li><a href="{{ url('#') }}">Register</a></li>
            @else

            @endif
        </ul>
        <a href="#offcanvas" class="uk-navbar-toggle uk-visible-small" data-uk-offcanvas></a>
        <div class="uk-navbar-brand uk-navbar-center uk-visible-small">Brand</div>
    </nav>

    <div class="uk-grid" data-uk-grid-margin>
        @yield('content')
    </div>

</div>

<div id="offcanvas" class="uk-offcanvas">
    <div class="uk-offcanvas-bar">
        <ul class="uk-nav uk-nav-offcanvas">
            <li>
                <a href="layouts_frontpage.html">Frontpage</a>
            </li>
            <li>
                <a href="layouts_portfolio.html">Portfolio</a>
            </li>
            <li class="uk-active">
                <a href="layouts_blog.html">Blog</a>
            </li>
            <li>
                <a href="layouts_documentation.html">Documentation</a>
            </li>
            <li>
                <a href="layouts_contact.html">Contact</a>
            </li>
            <li>
                <a href="layouts_login.html">Login</a>
            </li>
        </ul>
    </div>
</div>


<script src="{{url('/js/jquery.js')}}"></script>
<script src="{{url('/js/uikit.min.js')}}"></script>
</body>
</html>














