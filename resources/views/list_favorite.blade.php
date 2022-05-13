@extends('/general/headerFooter')
@section('content')

<head>
    <link rel="stylesheet" href="{{asset('css/detail.css')}}">
    <link rel="stylesheet" href="{{asset('css/content.css')}}">
    <link rel="stylesheet" href="{{ asset('css/top.css') }}">
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <style>
        .cursor{
            cursor: pointer;
        }
    </style>
</head>

@if(!Auth::user())
    <h3>Para crear tu lista de favoritos necessitas estar logueado, <a href="{{route('register.user')}}">INICIA SESSIÓN</a></h3>
@else
    <p id="idList" style="display: none;">{{ $data['list']->id }}</p>
    <h1>{{$data['list']->name}}</h1>

    <section class="container top_content my-5">
        <section class="cinet_top--content">
            @foreach($data['animes'] as $anime)
            <div class="content--card">
                <a class="p-1" href="{{ route('anime.animes',  ['id' => $anime->id]) }}">
                    <div class="cinet_top--detail">
                        <div>
                            @if($anime->poster_path === NULL)
                            <img src="/img/NoImg.jpg" alt="">
                            @else
                            <img src="{{ $anime->poster_path }}" alt="">
                            @endif
                        </div>
                    </div>
                    <p>{{ $anime->name }}<span>{{ $anime->puntuation }}</span></p>
                </a>
            </div>
            @endforeach
            @foreach($data['series'] as $serie)
            <div class="content--card">
                <a class="p-1" href="{{ route('serie.series',  ['id' => $serie->id]) }}">
                    <div class="cinet_top--detail">
                        <div>
                            @if($serie->poster_path === NULL)
                            <img src="/img/NoImg.jpg" alt="">
                            @else
                            <img src="{{ $serie->poster_path }}" alt="">
                            @endif
                        </div>
                    </div>
                    <p>{{ $serie->name }}<span>{{ $serie->puntuation }}</span></p>
                </a>
            </div>
            @endforeach
            @foreach($data['films'] as $film)
            <div class="content--card">
                <a class="p-1" href="{{ route('film.films',  ['id' => $film->id]) }}">
                    <div class="cinet_top--detail">
                        <div>
                            @if($film->poster_path === NULL)
                            <img src="/img/NoImg.jpg" alt="">
                            @else
                            <img src="{{ $film->poster_path }}" alt="">
                            @endif
                        </div>
                    </div>
                    <p>{{ $film->name }}<span>{{ $film->puntuation }}</span></p>
                </a>
            </div>
            @endforeach
        </section>
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
<!-- END COMMENT SECTION -->
@endsection