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
            <div class="carousel-item full text-center active">
                <a href="/detail/detailFilms/1" class="link-img-carousel">
                    <img src="{{$allFilms[0]->poster_path}}" class="img-carousel px-3" alt="Img {{$allFilms[0]->name}}">
                </a>
                <a href="/detail/detailFilms/2" class="link-img-carousel">
                    <img src="{{$allFilms[1]->poster_path}}" class="img-carousel px-3" alt="Img {{$allFilms[1]->name}}">
                </a>
                <a href="/detail/detailFilms/3" class="link-img-carousel">
                    <img src="{{$allFilms[2]->poster_path}}" class="img-carousel px-3" alt="Img {{$allFilms[2]->name}}">
                </a>
            </div>
            <div class="carousel-item full text-center">
                <a href="/detail/detailFilms/4" class="link-img-carousel">
                    <img src="{{$allFilms[3]->poster_path}}" class="img-carousel px-3" alt="Img {{$allFilms[3]->name}}">
                </a>
                <a href="/detail/detailFilms/5" class="link-img-carousel">
                    <img src="{{$allFilms[4]->poster_path}}" class="img-carousel px-3" alt="Img {{$allFilms[4]->name}}">
                </a>
                <a href="/detail/detailFilms/7" class="link-img-carousel">
                    <img src="{{$allFilms[6]->poster_path}}" class="img-carousel px-3" alt="Img {{$allFilms[6]->name}}">
                </a>
            </div>
            <div class="carousel-item full text-center">
                <a href="/detail/detailFilms/8" class="link-img-carousel">
                    <img src="{{$allFilms[7]->poster_path}}" class="img-carousel px-3" alt="Img {{$allFilms[7]->name}}">
                </a>
                <a href="/detail/detailFilms/9" class="link-img-carousel">
                    <img src="{{$allFilms[8]->poster_path}}" class="img-carousel px-3" alt="Img {{$allFilms[8]->name}}">
                </a>
                <a href="/detail/detailFilms/10" class="link-img-carousel">
                    <img src="{{$allFilms[9]->poster_path}}" class="img-carousel px-3" alt="Img {{$allFilms[9]->name}}">
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

<section class="d-flex flex-wrap justify-content-around align-items-center mt-3">
    <!--EMPIEZAN: TODOS LOS BOTONES PARA BILTRAR-->
    @foreach($genres as $genre)
        <button class="button-category" style="border:none;">
            <a href="{{route('film.films-filtered', ['genre' => $genre])}}">
                <p class="m-0">{{trans('titles.'.$genre.'')}}</p>
            </a>
        </button>
    @endforeach
    <!--ACABAN: TODOS LOS BOTONES PARA BILTRAR-->
</section>

<section class="container py-5">
    <div class="d-flex flex-row justify-content-between">
        <h5 class="col-4 text-uppercase">{{trans('titles.films')}}</h5>
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
<div class="d-flex justify-content-center mb-4">
    {{$films->links()}}
</div>

<script>


</script>
@endsection