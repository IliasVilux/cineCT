@extends('headerFooter')
@section('content')

    <head>
        <link rel="stylesheet" href="{{ asset('css/general.css') }}">
        <link rel="stylesheet" href="{{ asset('css/content.css') }}">
        <link rel="stylesheet" href="{{ asset('css/top.css') }}">
    </head>
    <section class="top">
        <div class="top-content--logo">
            <div>
                <img src="/img/CinectLogo.svg">
                <span>TOP 10</span>
            </div>
        </div>
        <section class="cinet_top-10--content">
        <?php $contador = 1?>
        @foreach ($films->take(10) as $film)
        <a href="{{route('film.films', ['id' => $film->id])}}">
            <div class="cinet_top-10--detail">
                <span>{{$contador++}}</span>    
                <div><img src="{{$film->poster_path}}" alt=""></div>
            </div>
        </a>
        @endforeach
        </section>

    </section>
    <!-- END COMMENT SECTION -->
@endsection
