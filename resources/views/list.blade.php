@extends('headerFooter')
@section('content')

<head>
    <link rel="stylesheet" href="{{asset('css/detail.css')}}">
</head>

<section class="container">
@if(!Auth::user())
<h3>Para crear tu lista de favoritos necessitas estar logueado, <a href="{{route('register.user')}}">INICIA SESSIÓN</a></h3>

@else
    <h1>MIS LISTAS</h1>
    <p class="d-none">{{$cont = 0}}</p>
    @foreach($userFavs['animes'] as $anime)
        <div class="d-flex">
            <a href="/detail/detailAnimes/{{$anime->anime_id}}" class="link-img-carousel">
                <img src="{{$arrayAnimes[$cont][0]->poster_path}}" class="img-carousel px-3" alt="Img {{$arrayAnimes[$cont][0]->name}}">
            </a>
            <h1></h1>
            {{$anime}}
            <br>
        </div>
        {{$cont++}}
    @endforeach

    <br><br>

    <p class="d-none">{{$cont = 0}}</p>
    @foreach($userFavs['films'] as $film)
        <div class="d-flex">
            <a href="/detail/detailFilms/{{$film->film_id}}" class="link-img-carousel">
                <img src="{{$arrayFilms[$cont][0]->poster_path}}" class="img-carousel px-3" alt="Img {{$arrayFilms[$cont][0]->name}}">
            </a>
            <h1></h1>
            {{$film}}
            <br>
        </div>
        {{$cont++}}
    @endforeach

    <br><br>

    <p class="d-none">{{$cont = 0}}</p>
    @foreach($userFavs['series'] as $serie)
        <div class="d-flex">
            <a href="/detail/detailSeries/{{$serie->serie_id}}" class="link-img-carousel">
                <img src="{{$arraySeries[$cont][0]->poster_path}}" class="img-carousel px-3" alt="Img {{$arraySeries[$cont][0]->name}}">
            </a>
            <h1></h1>
            {{$serie}}
            <br>
        </div>
        {{$cont++}}
    @endforeach
    <a href="{{ url('/') }}" class="btn button-purple" title="Home">
        Home
    </a>

    @endif
</section>
<!-- END COMMENT SECTION -->
@endsection