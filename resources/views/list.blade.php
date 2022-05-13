@extends('/general/headerFooter')
@section('content')

<head>
    <link rel="stylesheet" href="{{asset('css/detail.css')}}">
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
    <h1>MIS LISTAS</h1>
    <p class="d-none">{{$cont = 0}}</p>
    @foreach($userFavs as $favList)
        <div>
            @if($favList->top_list == 1)
                <a href="lista-fav/{{$favList->id}}">
                    <div class="mt-4 p-5 w-100 bg-dark text-white rounded button-gold cursor">
                        <h1>{{$favList->name}}</h1>
                    </div>  
                </a>
            @else
                <a href="lista-fav/{{$favList->id}}">
                    <div class="mt-4 p-5 w-100 bg-dark text-white rounded button-purple cursor">
                        <h1>{{$favList->name}}</h1>
                    </div>
                </a>
            @endif
            <br>
        </div>
        <p class="d-none">{{$cont++}}</p>
    @endforeach

    <a href="{{ url('/') }}" class="btn button-purple" title="Home">
        Home
    </a>

    @endif
</section>
<!-- END COMMENT SECTION -->
@endsection