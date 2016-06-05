@extends('layout')

@section('title', 'Map Laravel Test')


@section('content')


    <div id="search_holder">
        <input id="address"  data-clear-btn="true"  data-theme="a" data-type="search" placeholder="Address, City, State, or Zip"/>
        <a data-role='button'  data-icon='search' data-theme="a" data-iconpos="right" onclick="codeAddress();"><span class="orangose3">Switch Location</span></a>
    </div>
    <br/>
    <div id="wrappa">
        <div id="loading_animation"><h3 class="contact_header">Finding locations near you...</h3><img src="loader.gif" alt="loading location"/> <img src="loader.gif" alt="loading location"/><img src="loader.gif" alt="loading location"/></div>
        <div id="map_canvas"></div>
        <br/>
        <div id="sidebar" data-role="collapsible">
        </div>
        <br/>
        <hr>



    @endsection
<link rel="stylesheet" href="//code.jquery.com/mobile/1.4.3/jquery.mobile-1.4.3.min.css">
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false&amp;v=3&amp;libraries=geometry"></script>
<script type="text/javascript" src="http://geoxml3.googlecode.com/svn/branches/polys/geoxml3.js"></script>
