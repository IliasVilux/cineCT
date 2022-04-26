@extends('headerFooter')
@section('content')

<head>
    <link rel="stylesheet" href="{{asset('css/detail.css')}}">
    <link rel="stylesheet" href="{{asset('css/content.css')}}">
    <style>
        .cursor{
            cursor: pointer;
        }
    </style>
</head>

<section class="container">
@if(!Auth::user())
    <h3>Para crear tu lista de favoritos necessitas estar logueado, <a href="{{route('register.user')}}">INICIA SESSIÓN</a></h3>
@else
    <h1>{{$data['list']->name}}</h1>

    <div class="content d-flex flex-wrap align-items-stretch justify-content-center">
    @foreach($data['animes'] as $anime)
        <a href="/detail/detailAnimes/{{$anime->id}}" class="image-link col-3 col-sm-2 p-2">
            @if($anime->poster_path === NULL)
            <img class="img-content col-12" src="/img/NoImg.jpg" alt="">
            @else
            <img class="img-content col-12" src="{{$anime->poster_path}}" alt="">
            @endif
        </a>
    @endforeach
    @foreach($data['series'] as $serie)
        <a href="/detail/detailSeries/{{$serie->id}}" class="image-link col-3 col-sm-2 p-2">
            @if($serie->poster_path === NULL)
            <img class="img-content col-12" src="/img/NoImg.jpg" alt="">
            @else
            <img class="img-content col-12" src="{{$serie->poster_path}}" alt="">
            @endif
        </a>
    @endforeach
    @foreach($data['films'] as $film)
        <a href="/detail/detailFilms/{{$film->id}}" class="image-link col-3 col-sm-2 p-2">
            @if($film->poster_path === NULL)
            <img class="img-content col-12" src="/img/NoImg.jpg" alt="">
            @else
            <img class="img-content col-12" src="{{$film->poster_path}}" alt="">
            @endif
        </a>
    @endforeach
    </div>

    <a href="{{ url('/') }}" class="btn button-purple" title="Home">
        Home
    </a>
    @if($data['list']->top_list == 1)
        <a href="{{$data['list']->id}}/deleteFavorite" class="btn button-purple" title="Home">
            Eliminar lista destacada
        </a>
    @else
        <a href="{{$data['list']->id}}/addFavorite" class="btn button-purple" title="Home">
            Guardar como lista destacada
        </a>
    @endif
@endif
</section>
<!-- END COMMENT SECTION -->
@endsection