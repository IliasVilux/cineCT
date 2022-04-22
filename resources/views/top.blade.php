@extends('headerFooter')
@section('content')

    <head>
        <link rel="stylesheet" href="{{ asset('css/top.css') }}">
        <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    </head>
    <section class="container top_content my-5">

        <div class="cinect-carousel">
            <div class="cinect-carousel--container">
                <div class="cinect-carousel--container--content">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <?php $contador = 1 ?>
                        @foreach ($films->take(10) as $film)
                            <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-film_{{$film->original_id}}" aria-expanded="false" aria-controls="flush-collapseOne">
                                    <div class="accordion-button--img"><img src="{{$film->poster_path}}" alt=""></div>
                                </button>
                            </h2>
                            <div id="flush-film_{{$film->original_id}}" class="accordion-collapse collapse content-detail" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <span><?=$contador++?></span>
                                    <a href="{{route('film.films', ['id' => $film->id])}}">{{$film->name}}</a>
                                </div>
                            </div>
                            </div>
                        @endforeach

                        @foreach ($animes->take(10) as $anime)
                            <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-film_{{$anime->original_id}}" aria-expanded="false" aria-controls="flush-collapseOne">
                                    <div class="accordion-button--img"><img src="{{$anime->poster_path}}" alt=""></div>
                                </button>
                            </h2>
                            <div id="flush-film_{{$anime->original_id}}" class="accordion-collapse collapse content-detail" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <span><?=$contador++?></span>
                                    <a href="{{route('anime.animes', ['id' => $anime->id])}}">{{$anime->name}}</a>
                                </div>
                            </div>
                            </div>
                        @endforeach

                        @foreach ($series->take(10) as $serie)
                            <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-film_{{$serie->original_id}}" aria-expanded="false" aria-controls="flush-collapseOne">
                                <div class="accordion-button--img"><img src="{{$serie->poster_path}}" alt=""></div>
                                </button>
                            </h2>
                            <div id="flush-film_{{$serie->original_id}}" class="accordion-collapse collapse content-detail" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <span><?=$contador++?></span>
                                    <a href="{{route('serie.series', ['id' => $serie->id])}}">{{$serie->name}}</a>
                                </div>
                            </div>
                            </div>
                        @endforeach

                      </div>
                </div>
            </div>
        </div>

        <h3 class="mb-3">Top {{ trans('titles.films') }}</h3>
        <section class="cinet_top--content">
            @foreach ($films->take(10) as $film)
                <a class="p-2" href="{{ route('film.films', ['id' => $film->id]) }}">
                    <div class="cinet_top--detail">
                        <div><img src="{{ $film->poster_path }}" alt=""></div>
                    </div>
                    <p>{{ $film->name }}<span>{{ $film->puntuation }}</span></p>
                </a>
            @endforeach
            <button class="btn btn-outline-primary mt-4" type="btn"> <a class="text-decoration-none"
                    href="{{ route('film.all-films') }}">{{ trans('home.view_more') }}</a></button>
        </section>

        <h3 class="mt-5">Top {{ trans('titles.series') }}</h3>
        <section class="cinet_top--content">
            @foreach ($series->take(10) as $serie)
                <a class="p-2" href="{{ route('serie.series', ['id' => $serie->id]) }}">
                    <div class="cinet_top--detail">
                        <div><img src="{{ $serie->poster_path }}" alt=""></div>
                    </div>
                    <p>{{ $serie->name }}<span>{{ $serie->puntuation }}</span></p>
                </a>
            @endforeach
            <button class="btn btn-outline-primary mt-4" type="btn"> <a class="text-decoration-none"
                    href="{{ route('serie.all-series') }}">{{ trans('home.view_more') }}</a></button>
        </section>

        <h3 class="mt-5">Top {{ trans('titles.animes') }}</h3>
        <section class="cinet_top--content">
            @foreach ($animes->take(10) as $anime)
                <a class="p-2" href="{{ route('anime.animes', ['id' => $anime->id]) }}">
                    <div class="cinet_top--detail">
                        <div><img src="{{ $anime->poster_path }}" alt=""></div>
                    </div>
                    <p>{{ $anime->name }}<span>{{ $anime->puntuation }}</span></p>
                </a>
            @endforeach
            <button class="btn btn-outline-primary mt-4" type="btn"> <a class="text-decoration-none"
                    href="{{ route('anime.all-animes') }}">{{ trans('home.view_more') }}</a></button>
        </section>

    </section>

    <script type="text/javascript">
       
    </script>
@endsection
