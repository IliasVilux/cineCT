@extends('layoutAll')
@section('content')
<head>
    <link rel="stylesheet" href="storage/css/HomeStyle.css">
</head>
<section>
    <img class="banner" src="{{ url('storage/img/img.png')}}">
    <h5>Series</h5>
    <div class="wrapper">
        <section id="section1">
            <a href="#section3">‹</a>
            <div class="item">
                <img class="defaultSize" src="{{ url('storage/img/img.png')}}">
            </div>
            <div class="item">
                <img class="defaultSize" src="{{ url('storage/img/img.png')}}">
            </div>
            <div class="item">
                <img class="defaultSize" src="{{ url('storage/img/img.png')}}">
            </div>
            <div class="item">
                <img class="defaultSize" src="{{ url('storage/img/img.png')}}">
            </div>
            <div class="item">
                <img class="defaultSize" src="{{ url('storage/img/img.png')}}">
            </div>
            <a href="#section2">›</a>
        </section>
        <section id="section2">
            <a href="#section1">‹</a>
            <div class="item">
                <img class="defaultSize" src="{{ url('storage/img/img2.png')}}">
            </div>
            <div class="item">
                <img class="defaultSize" src="{{ url('storage/img/img2.png')}}">
            </div>
            <div class="item">
                <img class="defaultSize" src="{{ url('storage/img/img2.png')}}">
            </div>
            <div class="item">
                <img class="defaultSize" src="{{ url('storage/img/img2.png')}}">
            </div>
            <div class="item">
                <img  class="defaultSize"src="{{ url('storage/img/img2.png')}}">
            </div>
            <a href="#section3">›</a>
        </section>
        <section id="section3">
            <a href="#section2">‹</a>
            <div class="item">
                <img class="defaultSize" src="{{ url('storage/img/img3.png')}}">
            </div>
            <div class="item">
                <img class="defaultSize" src="{{ url('storage/img/img3.png')}}">
            </div>
            <div class="item">
                <img class="defaultSize" src="{{ url('storage/img/img3.png')}}">
            </div>
            <div class="item">
                <img class="defaultSize" src="{{ url('storage/img/img3.png')}}">
            </div>
            <div class="item">
                <img  class="defaultSize"src="{{ url('storage/img/img3.png')}}">
            </div>
            <a href="#section1">›</a>
        </section>
    </div>
</section>
<section>
    <h5>Películas</h5>
    <div class="row">
        <img class="defaultSize" src="{{ url('storage/img/img.png')}}">
        <img class="defaultSize" src="{{ url('storage/img/img.png')}}">
        <img class="defaultSize" src="{{ url('storage/img/img.png')}}">
    </div>
</section>
<section>
    <h5>Animes</h5>
    <div class="row">
        <img class="defaultSize" src="{{ url('storage/img/img.png')}}">
        <img class="defaultSize" src="{{ url('storage/img/img.png')}}">
        <img class="defaultSize" src="{{ url('storage/img/img.png')}}">
    </div>
</section>
@endsection