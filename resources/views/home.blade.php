@extends('headerFooter')
@section('content')
<head>
	<link rel="stylesheet" href="storage/css/home.css">
</head>
<section class="section-container">
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item full active">
        <img class="full-img" src="{{url('storage/img/img.png')}}" alt="">
    </div>
    <div class="carousel-item full">
    <img class="full-img" src="{{url('storage/img/img2.png')}}" alt="">
    </div>
    <div class="carousel-item full">
    <img class="full-img" src="{{url('storage/img/img3.png')}}" alt="">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</section>
<section class="container">

<!-- SERIES -->
<h5>SERIES</h5>
    <div class="container d-flex flex-row align-items-center">
        <a class="btn-floating" href="#series" data-bs-slide="prev"><i
                class="fa fa-chevron-left fa-2x" aria-hidden="true"></i></a>

        <div id="series" class="carousel slide carousel-equal-heights my-4" data-bs-ride="carousel"
            data-bs-interval="false">
			
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <div class="row">
                        <div class="col-3 d-flex justify-content-center">
							<img class="img-carousel"
								src="https://via.placeholder.com/800x600/69c/9fc/?text=Image%201.1" alt="">
                        </div>
                        <div class="col-3 d-flex justify-content-center">
							<img class="img-carousel"
							src="https://via.placeholder.com/800x600/69c/9fc/?text=Image%201.2" alt="">
                        </div>
						
                        <div class="col-3 d-flex justify-content-center">
							<img class="img-carousel"
							src="https://via.placeholder.com/800x600/69c/9fc/?text=Image%201.3" alt="">
                        </div>
						<div class="col-3 d-flex justify-content-center">
							<img class="img-carousel"
								src="https://via.placeholder.com/800x600/69c/9fc/?text=Image%201.4" alt="">
						</div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="row">
                        <div class="col-3 d-flex justify-content-center">
                                <img class="img-carousel"
                                    src="https://via.placeholder.com/800x600/c69/f9c/?text=Image%202.1" alt="">
                        </div>

                        <div class="col-3 d-flex justify-content-center">
                                <img class="img-carousel"
                                    src="https://via.placeholder.com/800x600/c69/f9c/?text=Image%202.2" alt="">
                        </div>

                        <div class="col-3 d-flex justify-content-center">
                                <img class="img-carousel"
                                    src="https://via.placeholder.com/800x600/c69/f9c/?text=Image%202.3" alt="">
                        </div>
						<div class="col-3 d-flex justify-content-center">
                                <img class="img-carousel"
                                    src="https://via.placeholder.com/800x600/c69/f9c/?text=Image%202.4" alt="">
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="row">
                        <div class="col-3 d-flex justify-content-center">
                                <img class="img-carousel"
                                    src="https://via.placeholder.com/800x600/9c6/cf9/?text=Image%203.1" alt="">
                        </div>

                        <div class="col-3 d-flex justify-content-center">
                                <img class="img-carousel"
                                    src="https://via.placeholder.com/800x600/9c6/cf9/?text=Image%203.2" alt="">
                        </div>

                        <div class="col-3 d-flex justify-content-center">
                                <img class="img-carousel"
                                    src="https://via.placeholder.com/800x600/9c6/cf9/?text=Image%203.3" alt="">
                        </div>
						<div class="col-3 d-flex justify-content-center">
                                <img class="img-carousel"
                                    src="https://via.placeholder.com/800x600/9c6/cf9/?text=Image%203.4" alt="">
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <a class="btn-floating" href="#series" data-bs-slide="next"><i
                class="fa fa-chevron-right fa-2x" aria-hidden="true"></i></a>
    </div>

	<!-- PELICULAS -->
	<h5>PELICULAS</h5>
    <div class="container d-flex flex-row align-items-center">
        <a class="btn-floating" href="#peliculas" data-bs-slide="prev"><i
                class="fa fa-chevron-left fa-2x" aria-hidden="true"></i></a>

        <div id="peliculas" class="carousel slide carousel-equal-heights my-4" data-bs-ride="carousel"
            data-bs-interval="false">
			<div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <div class="row">
                        <div class="col-3 d-flex justify-content-center">
							<img class="img-carousel"
								src="https://via.placeholder.com/800x600/69c/9fc/?text=Image%201.1" alt="">
                        </div>
                        <div class="col-3 d-flex justify-content-center">
							<img class="img-carousel"
							src="https://via.placeholder.com/800x600/69c/9fc/?text=Image%201.2" alt="">
                        </div>
						
                        <div class="col-3 d-flex justify-content-center">
							<img class="img-carousel"
							src="https://via.placeholder.com/800x600/69c/9fc/?text=Image%201.3" alt="">
                        </div>
						<div class="col-3 d-flex justify-content-center">
							<img class="img-carousel"
								src="https://via.placeholder.com/800x600/69c/9fc/?text=Image%201.4" alt="">
						</div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="row">
                        <div class="col-3 d-flex justify-content-center">
                                <img class="img-carousel"
                                    src="https://via.placeholder.com/800x600/c69/f9c/?text=Image%202.1" alt="">
                        </div>

                        <div class="col-3 d-flex justify-content-center">
                                <img class="img-carousel"
                                    src="https://via.placeholder.com/800x600/c69/f9c/?text=Image%202.2" alt="">
                        </div>

                        <div class="col-3 d-flex justify-content-center">
                                <img class="img-carousel"
                                    src="https://via.placeholder.com/800x600/c69/f9c/?text=Image%202.3" alt="">
                        </div>
						<div class="col-3 d-flex justify-content-center">
                                <img class="img-carousel"
                                    src="https://via.placeholder.com/800x600/c69/f9c/?text=Image%202.4" alt="">
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="row">
                        <div class="col-3 d-flex justify-content-center">
                                <img class="img-carousel"
                                    src="https://via.placeholder.com/800x600/9c6/cf9/?text=Image%203.1" alt="">
                        </div>

                        <div class="col-3 d-flex justify-content-center">
                                <img class="img-carousel"
                                    src="https://via.placeholder.com/800x600/9c6/cf9/?text=Image%203.2" alt="">
                        </div>

                        <div class="col-3 d-flex justify-content-center">
                                <img class="img-carousel"
                                    src="https://via.placeholder.com/800x600/9c6/cf9/?text=Image%203.3" alt="">
                        </div>
						<div class="col-3 d-flex justify-content-center">
                                <img class="img-carousel"
                                    src="https://via.placeholder.com/800x600/9c6/cf9/?text=Image%203.4" alt="">
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <a class="btn-floating" href="#peliculas" data-bs-slide="next"><i
                class="fa fa-chevron-right fa-2x" aria-hidden="true"></i></a>
    </div>

	<!-- ANIMES -->
	<h5>ANIMES</h5>
    <div class="container d-flex flex-row align-items-center">

        <a class="btn-floating" href="#animes" data-bs-slide="prev"><i
                class="fa fa-chevron-left fa-2x" aria-hidden="true"></i></a>

        <div id="animes" class="carousel slide carousel-equal-heights my-4" data-bs-ride="carousel"
            data-bs-interval="false">
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <div class="row">
                        <div class="col-3 d-flex justify-content-center">
							<img class="img-carousel"
								src="https://via.placeholder.com/800x600/69c/9fc/?text=Image%201.1" alt="">
                        </div>
                        <div class="col-3 d-flex justify-content-center">
							<img class="img-carousel"
							src="https://via.placeholder.com/800x600/69c/9fc/?text=Image%201.2" alt="">
                        </div>
						
                        <div class="col-3 d-flex justify-content-center">
							<img class="img-carousel"
							src="https://via.placeholder.com/800x600/69c/9fc/?text=Image%201.3" alt="">
                        </div>
						<div class="col-3 d-flex justify-content-center">
							<img class="img-carousel"
								src="https://via.placeholder.com/800x600/69c/9fc/?text=Image%201.4" alt="">
						</div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="row">
                        <div class="col-3 d-flex justify-content-center">
                                <img class="img-carousel"
                                    src="https://via.placeholder.com/800x600/c69/f9c/?text=Image%202.1" alt="">
                        </div>

                        <div class="col-3 d-flex justify-content-center">
                                <img class="img-carousel"
                                    src="https://via.placeholder.com/800x600/c69/f9c/?text=Image%202.2" alt="">
                        </div>

                        <div class="col-3 d-flex justify-content-center">
                                <img class="img-carousel"
                                    src="https://via.placeholder.com/800x600/c69/f9c/?text=Image%202.3" alt="">
                        </div>
						<div class="col-3 d-flex justify-content-center">
                                <img class="img-carousel"
                                    src="https://via.placeholder.com/800x600/c69/f9c/?text=Image%202.4" alt="">
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="row">
                        <div class="col-3 d-flex justify-content-center">
                                <img class="img-carousel"
                                    src="https://via.placeholder.com/800x600/9c6/cf9/?text=Image%203.1" alt="">
                        </div>

                        <div class="col-3 d-flex justify-content-center">
                                <img class="img-carousel"
                                    src="https://via.placeholder.com/800x600/9c6/cf9/?text=Image%203.2" alt="">
                        </div>

                        <div class="col-3 d-flex justify-content-center">
                                <img class="img-carousel"
                                    src="https://via.placeholder.com/800x600/9c6/cf9/?text=Image%203.3" alt="">
                        </div>
						<div class="col-3 d-flex justify-content-center">
                                <img class="img-carousel"
                                    src="https://via.placeholder.com/800x600/9c6/cf9/?text=Image%203.4" alt="">
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <a class="btn-floating" href="#animes" data-bs-slide="next"><i
                class="fa fa-chevron-right fa-2x" aria-hidden="true"></i></a>
    </div>
</section>
@endsection