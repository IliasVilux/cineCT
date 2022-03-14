@extends('headerFooter')
@section('content')

<head>
    <link rel="stylesheet" href="../../storage/css/content.css">
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
            <div class="carousel-item full active">
                <img class="full-img" src="{{url('storage/img/SquidGame.jpg')}}" alt="">
            </div>
            <div class="carousel-item full">
                <img class="full-img" src="{{url('storage/img/uncharted.jpg')}}" alt="">
            </div>
            <div class="carousel-item full">
                <img class="full-img" src="{{url('storage/img/Kimetsu.jpg')}}" alt="">
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
<h5>PELÍCULAS</h5>
<section class="container">
    @if(!empty($film))
    <div class="content d-flex flex-wrap align-items-center justify-content-center">
        @foreach($film as $film)
        @if($film->poster_path === NULL)
        <img src="../storage/img/NoImg.jpg" class="img-carousel" alt="">
        @else
        <img src="{{$film->poster_path}}" class="img-carousel" alt="">
        @endif
        @endforeach
    </div>
    @else
    <h2 style="color: red;">No hi ha cap registre!!!</h2>
    @endif

</section>
{{-- Pagination --}}
<div class="d-flex justify-content-center">
    <!-- $film->links() -->
</div>
@endsection