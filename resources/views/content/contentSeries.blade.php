@extends('headerFooter')
@section('content')

<head>
    <link rel="stylesheet" href="{{asset('css/content.css')}}">
</head>
<section class="slider">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item full text-center active">
                <a href="/detail/detailSeries/1" class="link-img-carousel">
                    <img src="{{$series[0]->poster_path}}" class="img-carousel px-3" alt="Img {{$series[0]->name}}">
                </a>
                <a href="/detail/detailSeries/2" class="link-img-carousel">
                    <img src="{{$series[1]->poster_path}}" class="img-carousel px-3" alt="Img {{$series[1]->name}}">
                </a>
                <a href="/detail/detailSeries/3" class="link-img-carousel">
                    <img src="{{$series[2]->poster_path}}" class="img-carousel px-3" alt="Img {{$series[2]->name}}">
                </a>
            </div>
            <div class="carousel-item full text-center">
                <a href="/detail/detailSeries/4" class="link-img-carousel">
                    <img src="{{$series[3]->poster_path}}" class="img-carousel px-3" alt="Img {{$series[3]->name}}">
                </a>
                <a href="/detail/detailSeries/5" class="link-img-carousel">
                    <img src="{{$series[4]->poster_path}}" class="img-carousel px-3" alt="Img {{$series[4]->name}}">
                </a>
                <a href="/detail/detailSeries/6" class="link-img-carousel">
                    <img src="{{$series[5]->poster_path}}" class="img-carousel px-3" alt="Img {{$series[5]->name}}">
                </a>
            </div>
            <div class="carousel-item full text-center">
                <a href="/detail/detailSeries/7" class="link-img-carousel">
                    <img src="{{$series[6]->poster_path}}" class="img-carousel px-3" alt="Img {{$series[6]->name}}">
                </a>
                <a href="/detail/detailSeries/8" class="link-img-carousel">
                    <img src="{{$series[7]->poster_path}}" class="img-carousel px-3" alt="Img {{$series[7]->name}}">
                </a>
                <a href="/detail/detailSeries/9" class="link-img-carousel">
                    <img src="{{$series[8]->poster_path}}" class="img-carousel px-3" alt="Img {{$series[8]->name}}">
                </a>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>
<section class="d-flex flex-wrap justify-content-around align-items-center">
    <button class="button-category">
        <p class="m-0">Acción / Aventura</p>
    </button>
    <button class="button-category">
        <p class="m-0">Animación / Familia</p>
    </button>
    <button class="button-category">
        <p class="m-0">Comedia</p>
    </button>
    <button class="button-category">
        <p class="m-0">Terror / Suspense</p>
    </button>

    <button class="button-category">
        <p class="m-0">Romance</p>
    </button>
    <button class="button-category">
        <p class="m-0">Ciencia ficción / Fantasía</p>
    </button>
    <button class="button-category">
        <p class="m-0">Drama / Misterio</p>
    </button>
    <button class="button-category">
        <p class="m-0">Bélica / Crimen</p>
    </button>
</section>
<section class="container py-4">
    <h5>Series</h5>
    <?php
    if(!empty($series)) {
    echo '<div class="content d-flex flex-wrap align-items-stretch justify-content-center">';

        foreach($series as $data) {
            echo '<a href="/detail/detailAnimes/"'.$data->id.'" class="image-link col-3 col-sm-2 p-2">';
            if($data->poster_path === NULL) {
            echo '<img src="/img/NoImg.jpg" class="img-content col-12" alt="">';
            } else {
            echo '<img src="'.$data->poster_path.'" class="img-content col-12" alt="">
            </a>';
        }
    }
   echo' </div>';
           
    } else {
        echo '<h2 style="color: red;">No hi ha cap registre!!!</h2>';
    }
    ?>

</section>
{{-- Pagination --}}
<div class="d-flex justify-content-center">
{{$series->links()}}
</div>
@endsection