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
                <a href="/detail/detailFilms/37" class="link-img-carousel">
                    <img src="{{$film[36]->poster_path}}" class="img-carousel px-3" alt="Img {{$film[36]->name}}">
                </a>
                <a href="/detail/detailFilms/38" class="link-img-carousel">
                    <img src="{{$film[37]->poster_path}}" class="img-carousel px-3" alt="Img {{$film[37]->name}}">
                </a>
                <a href="/detail/detailFilms/39" class="link-img-carousel">
                    <img src="{{$film[38]->poster_path}}" class="img-carousel px-3" alt="Img {{$film[38]->name}}">
                </a>
            </div>
            <div class="carousel-item full text-center">
                <a href="/detail/detailFilms/40" class="link-img-carousel">
                    <img src="{{$film[39]->poster_path}}" class="img-carousel px-3" alt="Img {{$film[39]->name}}">
                </a>
                <a href="/detail/detailFilms/41" class="link-img-carousel">
                    <img src="{{$film[40]->poster_path}}" class="img-carousel px-3" alt="Img {{$film[40]->name}}">
                </a>
                <a href="/detail/detailFilms/42" class="link-img-carousel">
                    <img src="{{$film[41]->poster_path}}" class="img-carousel px-3" alt="Img {{$film[41]->name}}">
                </a>
            </div>
            <div class="carousel-item full text-center">
                <a href="/detail/detailFilms/43" class="link-img-carousel">
                    <img src="{{$film[42]->poster_path}}" class="img-carousel px-3" alt="Img {{$film[42]->name}}">
                </a>
                <a href="/detail/detailFilms/44" class="link-img-carousel">
                    <img src="{{$film[43]->poster_path}}" class="img-carousel px-3" alt="Img {{$film[43]->name}}">
                </a>
                <a href="/detail/detailFilms/45" class="link-img-carousel">
                    <img src="{{$film[44]->poster_path}}" class="img-carousel px-3" alt="Img {{$film[44]->name}}">
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
    <h5>PELÍCULAS</h5>
    @if(!empty($film))
    <div class="content d-flex flex-wrap align-items-streach justify-content-center">
        @foreach($film as $film)
        <a href="/detail/detailFilms/{{$film->id}}" class="image-link col-2 p-2">
            @if($film->poster_path === NULL)
            <img src="/img/NoImg.jpg" alt="">
            @else
            <img src="{{$film->poster_path}}" alt="">
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
    <!-- $film->links() -->
</div>
@endsection