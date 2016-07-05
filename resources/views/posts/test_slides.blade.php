@extends('layout')

@section('content')




    <div class="container">
        <h1>OwlCarousel & PhotoSwipe</h1>

        <h2>First gallery</h2>
        <ul class="owl-carousel">
            <li><a href="./images/photo01_lg.jpg" data-size="960x640"><img src="./images/photo01.jpg" alt="写真1"></a></li>
            <li><a href="./images/photo02_lg.jpg" data-size="960x640"><img src="./images/photo02.jpg" alt="写真2"></a></li>
            <li><a href="./images/photo03_lg.jpg" data-size="960x640"><img src="./images/photo03.jpg" alt="写真3"></a></li>
            <li><a href="./images/photo04_lg.jpg" data-size="960x640"><img src="./images/photo04.jpg" alt="写真4"></a></li>
            <li><a href="./images/photo05_lg.jpg" data-size="960x640"><img src="./images/photo05.jpg" alt="写真5"></a></li>
            <li><a href="./images/photo06_lg.jpg" data-size="960x640"><img src="./images/photo06.jpg" alt="写真6"></a></li>
            <li><a href="./images/photo07_lg.jpg" data-size="960x640"><img src="./images/photo07.jpg" alt="写真7"></a></li>
            <li><a href="./images/photo08_lg.jpg" data-size="960x640"><img src="./images/photo08.jpg" alt="写真8"></a></li>
            <li><a href="./images/photo09_lg.jpg" data-size="960x640"><img src="./images/photo09.jpg" alt="写真9"></a></li>
        </ul>

        <h2>Second gallery</h2>
        <ul class="owl-carousel">
            <li><a href="./images/photo10_lg.jpg" data-size="960x640" data-title="タイトル1"><img src="./images/photo10.jpg" alt="写真10"></a></li>
            <li><a href="./images/photo11_lg.jpg" data-size="960x640" data-title="タイトル2"><img src="./images/photo11.jpg" alt="写真11"></a></li>
            <li><a href="./images/photo12_lg.jpg" data-size="960x640" data-title="タイトル3"><img src="./images/photo12.jpg" alt="写真12"></a></li>
            <li><a href="./images/photo13_lg.jpg" data-size="960x640" data-title="タイトル4"><img src="./images/photo13.jpg" alt="写真13"></a></li>
            <li><a href="./images/photo14_lg.jpg" data-size="960x640" data-title="タイトル5"><img src="./images/photo14.jpg" alt="写真14"></a></li>
            <li><a href="./images/photo15_lg.jpg" data-size="960x640" data-title="タイトル6"><img src="./images/photo15.jpg" alt="写真15"></a></li>
        </ul>
    </div>


    @endsection
