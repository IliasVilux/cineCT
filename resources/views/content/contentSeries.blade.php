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
                <a href="/detail/detailSeries/37" class="link-img-carousel">
                    <img src="{{$serie[36]->poster_path}}" class="img-carousel px-3" alt="Img {{$serie[36]->name}}">
                </a>
                <a href="/detail/detailSeries/38" class="link-img-carousel">
                    <img src="{{$serie[37]->poster_path}}" class="img-carousel px-3" alt="Img {{$serie[37]->name}}">
                </a>
                <a href="/detail/detailSeries/39" class="link-img-carousel">
                    <img src="{{$serie[38]->poster_path}}" class="img-carousel px-3" alt="Img {{$serie[38]->name}}">
                </a>
            </div>
            <div class="carousel-item full text-center">
                <a href="/detail/detailSeries/40" class="link-img-carousel">
                    <img src="{{$serie[39]->poster_path}}" class="img-carousel px-3" alt="Img {{$serie[39]->name}}">
                </a>
                <a href="/detail/detailSeries/41" class="link-img-carousel">
                    <img src="{{$serie[40]->poster_path}}" class="img-carousel px-3" alt="Img {{$serie[40]->name}}">
                </a>
                <a href="/detail/detailSeries/42" class="link-img-carousel">
                    <img src="{{$serie[41]->poster_path}}" class="img-carousel px-3" alt="Img {{$serie[41]->name}}">
                </a>
            </div>
            <div class="carousel-item full text-center">
                <a href="/detail/detailSeries/43" class="link-img-carousel">
                    <img src="{{$serie[42]->poster_path}}" class="img-carousel px-3" alt="Img {{$serie[42]->name}}">
                </a>
                <a href="/detail/detailSeries/44" class="link-img-carousel">
                    <img src="{{$serie[43]->poster_path}}" class="img-carousel px-3" alt="Img {{$serie[43]->name}}">
                </a>
                <a href="/detail/detailSeries/45" class="link-img-carousel">
                    <img src="{{$serie[44]->poster_path}}" class="img-carousel px-3" alt="Img {{$serie[44]->name}}">
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
    @if(!empty($serie))
    <div class="content d-flex flex-wrap align-items-stretch justify-content-center">
        @foreach($serie as $serie)
        <a href="/detail/detailSeries/{{$serie->id}}" class="image-link col-3 col-sm-2 p-2">
            @if($serie->poster_path === NULL)
            <img src="/img/NoImg.jpg" class="img-content col-12" alt="">
            @else
            <img src="{{$serie->poster_path}}" class="img-content col-12" alt="">
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
    <!-- $serie->links() -->
</div>
@endsection