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
                <a href="/detail/detailAnimes/1" class="link-img-carousel">
                    <img src="{{$animes[0]->poster_path}}" class="img-carousel px-3" alt="Img {{$animes[0]->name}}">
                </a>
                <a href="/detail/detailAnimes/2" class="link-img-carousel">
                    <img src="{{$animes[1]->poster_path}}" class="img-carousel px-3" alt="Img {{$animes[1]->name}}">
                </a>
                <a href="/detail/detailAnimes/3" class="link-img-carousel">
                    <img src="{{$animes[2]->poster_path}}" class="img-carousel px-3" alt="Img {{$animes[2]->name}}">
                </a>
            </div>
            <div class="carousel-item full text-center">
                <a href="/detail/detailAnimes/4" class="link-img-carousel">
                    <img src="{{$animes[3]->poster_path}}" class="img-carousel px-3" alt="Img {{$animes[3]->name}}">
                </a>
                <a href="/detail/detailAnimes/5" class="link-img-carousel">
                    <img src="{{$animes[4]->poster_path}}" class="img-carousel px-3" alt="Img {{$animes[4]->name}}">
                </a>
                <a href="/detail/detailAnimes/6" class="link-img-carousel">
                    <img src="{{$animes[5]->poster_path}}" class="img-carousel px-3" alt="Img {{$animes[5]->name}}">
                </a>
            </div>
            <div class="carousel-item full text-center">
                <a href="/detail/detailAnimes/7" class="link-img-carousel">
                    <img src="{{$animes[6]->poster_path}}" class="img-carousel px-3" alt="Img {{$animes[6]->name}}">
                </a>
                <a href="/detail/detailAnimes/8" class="link-img-carousel">
                    <img src="{{$animes[7]->poster_path}}" class="img-carousel px-3" alt="Img {{$animes[7]->name}}">
                </a>
                <a href="/detail/detailAnimes/9" class="link-img-carousel">
                    <img src="{{$animes[8]->poster_path}}" class="img-carousel px-3" alt="Img {{$animes[8]->name}}">
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
        <p class="m-0">Samurai</p>
    </button>
    <button class="button-category">
        <p class="m-0">Shounen</p>
    </button>
    <button class="button-category">
        <p class="m-0">Seinen</p>
    </button>
    <button class="button-category">
        <p class="m-0">Shoujo</p>
    </button>

    <button class="button-category">
        <p class="m-0">Demons</p>
    </button>
    <button class="button-category">
        <p class="m-0">Sci-fi</p>
    </button>
    <button class="button-category">
        <p class="m-0">Mecha</p>
    </button>
    <button class="button-category">
        <p class="m-0">Josei</p>
    </button>
</section>
<section class="container py-4">
    <div class="d-flex justify-content-between py-3 px-5">
        <h5 class="col-6">Animes</h5>
    </div>

    <?php
    if(!empty($animes)) {
    echo '<div class="content d-flex flex-wrap align-items-stretch justify-content-center">';

    foreach($animes as $data) {
        echo '<a href="/detail/detailFilms/'.$data->id.'" class="image-link col-3 col-sm-2 p-2">';
        if($data->poster_path === NULL) {
        echo '<img src="{{url("/img/NoImg.jpg")}}" class="img-content col-12" alt="No Image">';
        } else {
        echo '<img src="'.$data->poster_path.'" class="img-content col-12" alt="'.$data->name.'">
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
{{$animes->links()}}
</div>
@endsection