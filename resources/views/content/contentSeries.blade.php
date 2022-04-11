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
                    <img src="{{$allSeries[0]->poster_path}}" class="img-carousel px-3" alt="Img {{$allSeries[0]->name}}">
                </a>
                <a href="/detail/detailSeries/2" class="link-img-carousel">
                    <img src="{{$allSeries[1]->poster_path}}" class="img-carousel px-3" alt="Img {{$allSeries[1]->name}}">
                </a>
                <a href="/detail/detailSeries/3" class="link-img-carousel">
                    <img src="{{$allSeries[2]->poster_path}}" class="img-carousel px-3" alt="Img {{$allSeries[2]->name}}">
                </a>
            </div>
            <div class="carousel-item full text-center">
                <a href="/detail/detailSeries/4" class="link-img-carousel">
                    <img src="{{$allSeries[3]->poster_path}}" class="img-carousel px-3" alt="Img {{$allSeries[3]->name}}">
                </a>
                <a href="/detail/detailSeries/6" class="link-img-carousel">
                    <img src="{{$allSeries[5]->poster_path}}" class="img-carousel px-3" alt="Img {{$allSeries[5]->name}}">
                </a>
                <a href="/detail/detailSeries/7" class="link-img-carousel">
                    <img src="{{$allSeries[6]->poster_path}}" class="img-carousel px-3" 
                        alt="Img {{$allSeries[6]->name}}">
                </a>
            </div>
            <div class="carousel-item full text-center">
                <a href="/detail/detailSeries/8" class="link-img-carousel">
                    <img src="{{$allSeries[7]->poster_path}}" class="img-carousel px-3" alt="Img {{$allSeries[7]->name}}">
                </a>
                <a href="/detail/detailSeries/9" class="link-img-carousel">
                    <img src="{{$allSeries[8]->poster_path}}" class="img-carousel px-3" alt="Img {{$allSeries[8]->name}}">
                </a>
                <a href="/detail/detailSeries/10" class="link-img-carousel">
                    <img src="{{$allSeries[9]->poster_path}}" class="img-carousel px-3" alt="Img {{$allSeries[9]->name}}">
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
            <a href="{{route('serie.series-filtered', ['genre' => $genre])}}">
                <p class="m-0">{{trans('titles.'.$genre.'')}}</p>
            </a>
        </button>
    @endforeach
    <!--ACABAN: TODOS LOS BOTONES PARA BILTRAR-->
</section>

<section class="container py-5">
    <div class="d-flex flex-row justify-content-between">
        <h5 class="col-4 text-uppercase">{{trans('titles.series')}}</h5>
        <div class="d-flex justify-content-center">
            {{$series->links()}}
        </div>
    </div>

    <?php
    if(!empty($series)) {
    echo '<div class="content d-flex flex-wrap align-items-stretch justify-content-center">';

    foreach($series as $data) {
        echo '<a href="/detail/detailSeries/'.$data->id.'" class="image-link col-3 col-sm-2 p-2">';
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
    {{$series->links()}}
</div>
@endsection