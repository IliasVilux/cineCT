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
                <a href="/detail/detailAnimes/37" class="link-img-carousel">
                    <img src="{{$anime[36]->poster_path}}" class="img-carousel px-3" alt="Img {{$anime[36]->name}}">
                </a>
                <a href="/detail/detailAnimes/38" class="link-img-carousel">
                    <img src="{{$anime[37]->poster_path}}" class="img-carousel px-3" alt="Img {{$anime[37]->name}}">
                </a>
                <a href="/detail/detailAnimes/39" class="link-img-carousel">
                    <img src="{{$anime[38]->poster_path}}" class="img-carousel px-3" alt="Img {{$anime[38]->name}}">
                </a>
            </div>
            <div class="carousel-item full text-center">
                <a href="/detail/detailAnimes/40" class="link-img-carousel">
                    <img src="{{$anime[39]->poster_path}}" class="img-carousel px-3" alt="Img {{$anime[39]->name}}">
                </a>
                <a href="/detail/detailAnimes/41" class="link-img-carousel">
                    <img src="{{$anime[40]->poster_path}}" class="img-carousel px-3" alt="Img {{$anime[40]->name}}">
                </a>
                <a href="/detail/detailAnimes/42" class="link-img-carousel">
                    <img src="{{$anime[41]->poster_path}}" class="img-carousel px-3" alt="Img {{$anime[41]->name}}">
                </a>
            </div>
            <div class="carousel-item full text-center">
                <a href="/detail/detailAnimes/43" class="link-img-carousel">
                    <img src="{{$anime[42]->poster_path}}" class="img-carousel px-3" alt="Img {{$anime[42]->name}}">
                </a>
                <a href="/detail/detailAnimes/44" class="link-img-carousel">
                    <img src="{{$anime[43]->poster_path}}" class="img-carousel px-3" alt="Img {{$anime[43]->name}}">
                </a>
                <a href="/detail/detailAnimes/45" class="link-img-carousel">
                    <img src="{{$anime[44]->poster_path}}" class="img-carousel px-3" alt="Img {{$anime[44]->name}}">
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

    @if(!empty($anime))
    <div class="content d-flex flex-wrap align-items-stretch justify-content-center">

        @foreach($anime as $data)
        <a href="/detail/detailAnimes/{{$data->id}}" class="image-link col-3 col-sm-2 p-2">
            @if($data->poster_path === NULL)
            <img src="/img/NoImg.jpg" class="img-content col-12" alt="">
            @else
            <img src="{{$data->poster_path}}" class="img-content col-12" alt="">
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