@extends('headerFooter')
@section('content')

<head>
    <link rel="stylesheet" href="../storage/css/home.css">
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
<section class="section-content container-fluid">

    <!-- SERIES -->
    <h5>SERIES</h5>
    <div class="container-fluid d-flex flex-row align-items-center">
        <a class="btn-floating" href="#series" data-bs-slide="prev"><i class="fa fa-chevron-left fa-2x"
                aria-hidden="true"></i></a>

        <div id="series" class="carousel slide carousel-equal-heights my-4" data-bs-ride="carousel"
            data-bs-interval="false">

            <div class="carousel-inner" role="listbox">           
                <div class="carousel-item active">
                    <div class="row">
                        @foreach($serie as $key => $dataSerie)
                        <div class="col d-flex justify-content-center">
                            <a href="/detail/{{$dataSerie->id}}">
                                <p class="text-light fs-2 p-5">{{$dataSerie->id}}</p>
                                <!-- <img class="img-carousel" src="{{url('storage/img/Dexter.jpg')}}" alt=""> -->
                            </a>
                        </div>
                        @endforeach
                        <!--<div class="col d-flex justify-content-center">
                            <a href="{{url('/detail')}}">
                                <img class="img-carousel" src="{{url('storage/img/Dexter.jpg')}}" alt="">
                            </a>
                        </div>
                        <div class="col d-flex justify-content-center">
                            <a href="{{url('/detail')}}">
                                <img class="img-carousel" src="{{url('storage/img/Euphoria.jpeg')}}" alt="">
                            </a>
                        </div>
                        <div class="col d-flex justify-content-center">
                            <a href="{{url('/detail')}}">
                                <img class="img-carousel" src="{{url('storage/img/SexEducation.jpg')}}" alt="">
                            </a>
                        </div>
                        <div class="col d-flex justify-content-center">
                            <a href="{{url('/detail')}}">
                                <img class="img-carousel" src="{{url('storage/img/SquidGame.jpg')}}" alt="">
                            </a>
                        </div>
                        <div class="col d-flex justify-content-center">
                            <a href="{{url('/detail')}}">
                                <img class="img-carousel" src="{{url('storage/img/EstamosMuertos.jpeg')}}" alt="">
                            </a>
                        </div>-->
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="row">
                        <div class="col d-flex justify-content-center">
                            <a href="{{url('/detail')}}">
                                <img class="img-carousel" src="{{url('storage/img/Dexter.jpg')}}" alt="">
                            </a>
                        </div>
                        <div class="col d-flex justify-content-center">
                            <a href="{{url('/detail')}}">
                                <img class="img-carousel" src="{{url('storage/img/Euphoria.jpeg')}}" alt="">
                            </a>
                        </div>
                        <div class="col d-flex justify-content-center">
                            <a href="{{url('/detail')}}">
                                <img class="img-carousel" src="{{url('storage/img/SexEducation.jpg')}}" alt="">
                            </a>
                        </div>
                        <div class="col d-flex justify-content-center">
                            <a href="{{url('/detail')}}">
                                <img class="img-carousel" src="{{url('storage/img/SquidGame.jpg')}}" alt="">
                            </a>
                        </div>
                        <div class="col d-flex justify-content-center">
                            <a href="{{url('/detail')}}">
                                <img class="img-carousel" src="{{url('storage/img/EstamosMuertos.jpeg')}}" alt="">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="row">
                        <div class="col d-flex justify-content-center">
                            <a href="{{url('/detail')}}">
                                <img class="img-carousel" src="{{url('storage/img/Dexter.jpg')}}" alt="">
                            </a>
                        </div>
                        <div class="col d-flex justify-content-center">
                            <a href="{{url('/detail')}}">
                                <img class="img-carousel" src="{{url('storage/img/Euphoria.jpeg')}}" alt="">
                            </a>
                        </div>
                        <div class="col d-flex justify-content-center">
                            <a href="{{url('/detail')}}">
                                <img class="img-carousel" src="{{url('storage/img/SexEducation.jpg')}}" alt="">
                            </a>
                        </div>
                        <div class="col d-flex justify-content-center">
                            <a href="{{url('/detail')}}">
                                <img class="img-carousel" src="{{url('storage/img/SquidGame.jpg')}}" alt="">
                            </a>
                        </div>
                        <div class="col d-flex justify-content-center">
                            <a href="{{url('/detail')}}">
                                <img class="img-carousel" src="{{url('storage/img/EstamosMuertos.jpeg')}}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="row">
                @for ($i=8; $i < 12; $i++) <div class="col d-flex justify-content-center">
                    <a class="carousel-link" href="/detail/{{$serie[$i]->id}}">
                        <p class="text-light fs-2 p-5">{{$serie[$i]->id}}</p>
                        <!-- <img class="img-carousel" src="{{url('storage/img/Dexter.jpg')}}" alt=""> -->
                    </a>
            </div>
            @endfor
        </div>
    </div>

    </div>
    </div>
    <a class="btn-floating" href="#series" data-bs-slide="next"><i class="fa fa-chevron-right fa-2x"
            aria-hidden="true"></i></a>
    </div>

    <!-- PELICULAS -->
    <h5>PELICULAS</h5>
    <div class="container-fluid d-flex flex-row align-items-center">
        <a class="btn-floating" href="#peliculas" data-bs-slide="prev"><i class="fa fa-chevron-left fa-2x"
                aria-hidden="true"></i></a>

        <div id="peliculas" class="carousel slide carousel-equal-heights my-4" data-bs-ride="carousel"
            data-bs-interval="false">
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <div class="row">
                        @foreach($film as $key => $dataFilm)
                        <div class="col d-flex justify-content-center">
                            <a href="/detail/{{$dataFilm->id}}">
                                <p class="text-light fs-2 p-5">{{$dataFilm->id}}</p>
                                <!-- <img class="img-carousel" src="{{url('storage/img/Dexter.jpg')}}" alt=""> -->
                            </a>
                        </div>
                        @endforeach
                        <!-- <div class="col d-flex justify-content-center"> 
                            <img class="img-carousel" src="{{url('storage/img/agente-355.jpg')}}" alt="">
                        </div>
                        <div class="col d-flex justify-content-center">
                            <img class="img-carousel" src="{{url('storage/img/Encanto.jpg')}}" alt="">
                        </div>

                        <div class="col d-flex justify-content-center">
                            <img class="img-carousel" src="{{url('storage/img/matrix.jpg')}}" alt="">
                        </div>
                        <div class="col d-flex justify-content-center">
                            <img class="img-carousel" src="{{url('storage/img/uncharted.jpg')}}" alt="">
                        </div>
                        <div class="col d-flex justify-content-center">
                            <img class="img-carousel" src="{{url('storage/img/Coco.jpg')}}" alt="">
                        </div>-->
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="row">
                        <div class="col d-flex justify-content-center">
                            <img class="img-carousel" src="{{url('storage/img/agente-355.jpg')}}" alt="">
                        </div>
                        <div class="col d-flex justify-content-center">
                            <img class="img-carousel" src="{{url('storage/img/Encanto.jpg')}}" alt="">
                        </div>

                        <div class="col d-flex justify-content-center">
                            <img class="img-carousel" src="{{url('storage/img/matrix.jpg')}}" alt="">
                        </div>
                        <div class="col d-flex justify-content-center">
                            <img class="img-carousel" src="{{url('storage/img/uncharted.jpg')}}" alt="">
                        </div>
                        <div class="col d-flex justify-content-center">
                            <img class="img-carousel" src="{{url('storage/img/Coco.jpg')}}" alt="">
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="row">
                        <div class="col d-flex justify-content-center">
                            <img class="img-carousel" src="{{url('storage/img/agente-355.jpg')}}" alt="">
                        </div>
                        <div class="col d-flex justify-content-center">
                            <img class="img-carousel" src="{{url('storage/img/Encanto.jpg')}}" alt="">
                        </div>

                        <div class="col d-flex justify-content-center">
                            <img class="img-carousel" src="{{url('storage/img/matrix.jpg')}}" alt="">
                        </div>
                        <div class="col d-flex justify-content-center">
                            <img class="img-carousel" src="{{url('storage/img/uncharted.jpg')}}" alt="">
                        </div>
                        <div class="col d-flex justify-content-center">
                            <img class="img-carousel" src="{{url('storage/img/Coco.jpg')}}" alt="">
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <a class="btn-floating" href="#peliculas" data-bs-slide="next"><i class="fa fa-chevron-right fa-2x"
                aria-hidden="true"></i></a>
    </div>

    <!-- ANIMES -->
    <h5>ANIMES</h5>
    <div class="container-fluid d-flex flex-row align-items-center">

        <a class="btn-floating" href="#animes" data-bs-slide="prev"><i class="fa fa-chevron-left fa-2x"
                aria-hidden="true"></i></a>

        <div id="animes" class="carousel slide carousel-equal-heights my-4" data-bs-ride="carousel"
            data-bs-interval="false">
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <div class="row">
                        @foreach($anime as $key => $dataAnime)
                        <div class="col d-flex justify-content-center">
                            <a href="/detail/{{$dataAnime->id}}">
                                <p class="text-light fs-2 p-5">{{$dataAnime->id}}</p>
                                <!-- <img class="img-carousel" src="{{url('storage/img/Boku.jpg')}}" alt=""> -->
                            </a>
                        </div>
                        @endforeach
                        <!-- <div class="col d-flex justify-content-center">
                            <img class="img-carousel" src="{{url('storage/img/Boku.jpg')}}" alt="">
                        </div>
                        <div class="col d-flex justify-content-center">
                            <img class="img-carousel" src="{{url('storage/img/Kimetsu.jpg')}}" alt="">
                        </div>

                        <div class="col d-flex justify-content-center">
                            <img class="img-carousel" src="{{url('storage/img/OnePiece.jpg')}}" alt="">
                        </div>
                        <div class="col d-flex justify-content-center">
                            <img class="img-carousel" src="{{url('storage/img/Shingeki.jpg')}}" alt="">
                        </div>
                        <div class="col d-flex justify-content-center">
                            <img class="img-carousel" src="{{url('storage/img/FoodWars.jpeg')}}" alt="">
                        </div> -->
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="row">
                        <div class="col d-flex justify-content-center">
                            <img class="img-carousel" src="{{url('storage/img/Boku.jpg')}}" alt="">
                        </div>
                        <div class="col d-flex justify-content-center">
                            <img class="img-carousel" src="{{url('storage/img/Kimetsu.jpg')}}" alt="">
                        </div>

                        <div class="col d-flex justify-content-center">
                            <img class="img-carousel" src="{{url('storage/img/OnePiece.jpg')}}" alt="">
                        </div>
                        <div class="col d-flex justify-content-center">
                            <img class="img-carousel" src="{{url('storage/img/Shingeki.jpg')}}" alt="">
                        </div>
                        <div class="col d-flex justify-content-center">
                            <img class="img-carousel" src="{{url('storage/img/FoodWars.jpeg')}}" alt="">
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="row">
                        <div class="col d-flex justify-content-center">
                            <img class="img-carousel" src="{{url('storage/img/Boku.jpg')}}" alt="">
                        </div>
                        <div class="col d-flex justify-content-center">
                            <img class="img-carousel" src="{{url('storage/img/Kimetsu.jpg')}}" alt="">
                        </div>

                        <div class="col d-flex justify-content-center">
                            <img class="img-carousel" src="{{url('storage/img/OnePiece.jpg')}}" alt="">
                        </div>
                        <div class="col d-flex justify-content-center">
                            <img class="img-carousel" src="{{url('storage/img/Shingeki.jpg')}}" alt="">
                        </div>
                        <div class="col d-flex justify-content-center">
                            <img class="img-carousel" src="{{url('storage/img/FoodWars.jpeg')}}" alt="">
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <a class="btn-floating" href="#animes" data-bs-slide="next"><i class="fa fa-chevron-right fa-2x"
                aria-hidden="true"></i></a>
    </div>
</section>
@endsection