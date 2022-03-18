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
    <h5>Animes</h5>
    @if(!empty($anime))
    <div class="content d-flex flex-wrap align-items-streach justify-content-center">
        @foreach($anime as $anime)
        <a href="/detail/detailAnimes/{{$anime->id}}" class="image-link col-2 p-2">
            @if($anime->poster_path === NULL)
            <img src="../storage/img/NoImg.jpg" alt="">
            @else
            <img src="{{$anime->poster_path}}" alt="">
            @endif
        </a>
        @endforeach
    </div>
    @else
    <h2 style="color: red;">No hi ha cap registre!!!</h2>
    @endif

</section>
{{-- Pagination --}}
<div class="d-flex justify-content-center">
    <!-- $anime->links() -->
</div>
@endsection