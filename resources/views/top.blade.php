@extends('headerFooter')
@section('content')

    <head>
        <link rel="stylesheet" href="{{ asset('css/general.css') }}">
        <link rel="stylesheet" href="{{ asset('css/content.css') }}">
        <link rel="stylesheet" href="{{ asset('css/top.css') }}">
    </head>
    <section class="container top-container my-5">
        <section class="cinet_top-10--content">
        @foreach ($films->take(10) as $film)
        <a href="{{route('film.films', ['id' => $film->id])}}">
            <div class="cinet_top-10--detail p-2">
                <div><img src="{{$film->poster_path}}" alt=""></div>
            </div>
        </a>
        @endforeach
        </section>

    </section>
    <!-- END COMMENT SECTION -->
@endsection
