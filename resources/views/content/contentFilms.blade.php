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
                <a href="/detail/detailFilms/1" class="link-img-carousel">
                    <img src="{{$films[0]->poster_path}}" class="img-carousel px-3" alt="Img {{$films[0]->name}}">
                </a>
                <a href="/detail/detailFilms/2" class="link-img-carousel">
                    <img src="{{$films[1]->poster_path}}" class="img-carousel px-3" alt="Img {{$films[1]->name}}">
                </a>
                <a href="/detail/detailFilms/3" class="link-img-carousel">
                    <img src="{{$films[2]->poster_path}}" class="img-carousel px-3" alt="Img {{$films[2]->name}}">
                </a>
            </div>
            <div class="carousel-item full text-center">
                <a href="/detail/detailFilms/4" class="link-img-carousel">
                    <img src="{{$films[3]->poster_path}}" class="img-carousel px-3" alt="Img {{$films[3]->name}}">
                </a>
                <a href="/detail/detailFilms/5" class="link-img-carousel">
                    <img src="{{$films[4]->poster_path}}" class="img-carousel px-3" alt="Img {{$films[4]->name}}">
                </a>
                <a href="/detail/detailFilms/7" class="link-img-carousel">
                    <img src="{{$films[6]->poster_path}}" class="img-carousel px-3" alt="Img {{$films[6]->name}}">
                </a>
            </div>
            <div class="carousel-item full text-center">
                <a href="/detail/detailFilms/8" class="link-img-carousel">
                    <img src="{{$films[7]->poster_path}}" class="img-carousel px-3" alt="Img {{$films[7]->name}}">
                </a>
                <a href="/detail/detailFilms/9" class="link-img-carousel">
                    <img src="{{$films[8]->poster_path}}" class="img-carousel px-3" alt="Img {{$films[8]->name}}">
                </a>
                <a href="/detail/detailFilms/10" class="link-img-carousel">
                    <img src="{{$films[9]->poster_path}}" class="img-carousel px-3" alt="Img {{$films[9]->name}}">
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
        <p class="m-0">{{trans('titles.action')}}</p>
    </button>
    <button class="button-category">
        <p class="m-0">{{trans('titles.animation')}}</p>
    </button>
    <button class="button-category">
        <p class="m-0">{{trans('titles.comedy')}}</p>
    </button>
    <button class="button-category">
        <p class="m-0">{{trans('titles.terror')}}</p>
    </button>

    <button class="button-category">
        <p class="m-0">{{trans('titles.romance')}}</p>
    </button>
    <button class="button-category">
        <p class="m-0">{{trans('titles.fiction')}}</p>
    </button>
    <button class="button-category">
        <p class="m-0">{{trans('titles.drama')}}</p>
    </button>
    <button class="button-category">
        <p class="m-0">{{trans('titles.crime')}}</p>
    </button>
</section>

<section class="container py-5">
    <div class="d-flex flex-row justify-content-between">
        <h5 class="col-6 text-uppercase">{{trans('titles.films')}}</h5>
        <div class="d-flex justify-content-center">
            {{$films->links()}}
        </div>
    </div>

    <?php
    if(!empty($films)) {
    echo '<div class="content d-flex flex-wrap align-items-stretch justify-content-center">';

    foreach($films as $data) {
        echo '<a href="/detail/detailFilms/'.$data->id.'" class="image-link col-3 col-sm-2 p-2">';
        if($data->poster_path === NULL) {
        echo '<img src="/img/NoImg.jpg" class="img-content col-12" alt="No Image">';
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
    {{$films->links()}}
</div>
@endsection