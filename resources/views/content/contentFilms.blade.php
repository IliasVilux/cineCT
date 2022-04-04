@extends('headerFooter')
@section('content')

<head>
    <link rel="stylesheet" href="{{asset('css/content.css')}}">
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
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
                <img class="full-img" src="/img/SquidGame.jpg" alt="">
            </div>
            <div class="carousel-item full">
                <img class="full-img" src="/img/uncharted.jpg" alt="">
            </div>
            <div class="carousel-item full">
                <img class="full-img" src="/img/Kimetsu.jpg" alt="">
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
        @foreach($genres as $genre)
        <a class="btn button-category m-0" type="submit" id="{{$genre->id}}" href="{{route('film.all-films-filter', ['genre' => $genre->name])}}" 
            value="{{$genre->name}}">{{$genre->name}}</a>
        @endforeach
</section>

<section class="container py-4">
    <h5>PELÍCULAS</h5>
    @if(!empty($film))
    <div class="content d-flex flex-wrap align-items-streach justify-content-center">
        @foreach($film->take(10) as $film)
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

<script>
    
    jQuery('#filterSubmit').submit(function(e) {
        var valor = $(this).val();
        alert(valor);
    });

</script>
@endsection