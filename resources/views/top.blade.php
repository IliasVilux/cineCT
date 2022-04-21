@extends('headerFooter')
@section('content')

    <head>
        <link rel="stylesheet" href="{{ asset('css/top.css') }}">
    </head>
    <section class="container top_content my-5">
        
        <section class="top_content--banner">

        </section>

        <h3 class="mb-3">Top {{ trans('titles.films') }}</h3>
        <section class="cinet_top--content">
        @foreach ($films->take(10) as $film)
            <a class="p-2" href="{{route('film.films', ['id' => $film->id])}}">
                <div class="cinet_top--detail">
                    <div><img src="{{$film->poster_path}}" alt=""></div>
                </div>
                <p>{{$film->name}}<span>{{$film->puntuation}}</span></p>
            </a>
        @endforeach
        <button class="btn btn-outline-primary mt-4" type="btn"> <a class="text-decoration-none" href="{{route('film.all-films')}}">{{ trans('home.view_more') }}</a></button>
        </section>

        <h3 class="mt-5">Top {{ trans('titles.series') }}</h3>
        <section class="cinet_top--content">
        @foreach ($series->take(10) as $serie)
            <a class="p-2" href="{{route('serie.series', ['id' => $serie->id])}}">
                <div class="cinet_top--detail">
                    <div><img src="{{$serie->poster_path}}" alt=""></div>
                </div>
                <p>{{$serie->name}}<span>{{$serie->puntuation}}</span></p>
            </a>
        @endforeach
        <button class="btn btn-outline-primary mt-4" type="btn"> <a class="text-decoration-none" href="{{route('serie.all-series')}}">{{ trans('home.view_more') }}</a></button>
        </section>

        <h3 class="mt-5">Top {{ trans('titles.animes') }}</h3>
        <section class="cinet_top--content">
        @foreach ($animes->take(10) as $anime)
            <a class="p-2" href="{{route('anime.animes', ['id' => $anime->id])}}">
                <div class="cinet_top--detail">
                    <div><img src="{{$anime->poster_path}}" alt=""></div>
                </div>
                <p>{{$anime->name}}<span>{{$anime->puntuation}}</span></p>
            </a>
        @endforeach
        <button class="btn btn-outline-primary mt-4" type="btn"> <a class="text-decoration-none" href="{{route('anime.all-animes')}}">{{ trans('home.view_more') }}</a></button>
        </section>

    </section>
@endsection
