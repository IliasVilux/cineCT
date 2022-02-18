@extends('headerFooter')
@section('content')
<head>
<<<<<<< HEAD
	<link rel="stylesheet" href="storage/css/home.css">
</head>
<section class="container">
    <h1>MENU</h1>
    <a href="{{ url('/detail') }}" class="btn btn-primary" title="Detail">
        Detail
    </a>
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
=======
    <link rel="stylesheet" href="storage/css/HomeStyle.css">
</head>
<section>
    <img class="banner" src="{{ url('storage/img/img.png')}}">
    <h5>Series</h5>
    <div class="wrapper">
        <section id="section1">
            <a href="#section3">‹</a>
            <div class="item">
                <img class="defaultSize" src="{{ url('storage/img/img.png')}}">
            </div>
            <div class="item">
                <img class="defaultSize" src="{{ url('storage/img/img.png')}}">
            </div>
            <div class="item">
                <img class="defaultSize" src="{{ url('storage/img/img.png')}}">
            </div>
            <div class="item">
                <img class="defaultSize" src="{{ url('storage/img/img.png')}}">
            </div>
            <div class="item">
                <img class="defaultSize" src="{{ url('storage/img/img.png')}}">
            </div>
            <a href="#section2">›</a>
        </section>
        <section id="section2">
            <a href="#section1">‹</a>
            <div class="item">
                <img class="defaultSize" src="{{ url('storage/img/img2.png')}}">
            </div>
            <div class="item">
                <img class="defaultSize" src="{{ url('storage/img/img2.png')}}">
            </div>
            <div class="item">
                <img class="defaultSize" src="{{ url('storage/img/img2.png')}}">
            </div>
            <div class="item">
                <img class="defaultSize" src="{{ url('storage/img/img2.png')}}">
            </div>
            <div class="item">
                <img  class="defaultSize"src="{{ url('storage/img/img2.png')}}">
            </div>
            <a href="#section3">›</a>
        </section>
        <section id="section3">
            <a href="#section2">‹</a>
            <div class="item">
                <img class="defaultSize" src="{{ url('storage/img/img3.png')}}">
            </div>
            <div class="item">
                <img class="defaultSize" src="{{ url('storage/img/img3.png')}}">
            </div>
            <div class="item">
                <img class="defaultSize" src="{{ url('storage/img/img3.png')}}">
            </div>
            <div class="item">
                <img class="defaultSize" src="{{ url('storage/img/img3.png')}}">
            </div>
            <div class="item">
                <img  class="defaultSize"src="{{ url('storage/img/img3.png')}}">
            </div>
            <a href="#section1">›</a>
        </section>
    </div>
</section>
<section>
    <h5>Películas</h5>
    <div class="row">
        <img class="defaultSize" src="{{ url('storage/img/img.png')}}">
        <img class="defaultSize" src="{{ url('storage/img/img.png')}}">
        <img class="defaultSize" src="{{ url('storage/img/img.png')}}">
    </div>
</section>
<section>
    <h5>Animes</h5>
    <div class="row">
        <img class="defaultSize" src="{{ url('storage/img/img.png')}}">
        <img class="defaultSize" src="{{ url('storage/img/img.png')}}">
        <img class="defaultSize" src="{{ url('storage/img/img.png')}}">
>>>>>>> main
    </div>
</section>
@endsection