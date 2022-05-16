@extends('/general/headerFooter')
@section('content')

<head>
    <link rel="stylesheet" href="{{asset('css/.css')}}">
</head>

<section class="container">
@if(!Auth::user())
<h3>Para crear tu lista de favoritos necessitas estar logueado, <a href="{{route('register.user')}}">INICIA SESSIÓN</a></h3>

@else
    <p class="d-none">{{$cont = 0}}</p>
    <div class="container-fluid d-flex justify-content-between align-items-center">
            <h1>MIS LISTAS</h1>
            <a href="{{ url('/content/contentAnimes') }}" class="btn button-purple my-4" title="Back">
            {{ trans('titles.back') }}
            </a>
        </div>
    @foreach($userFavs as $favList)
        <div>
            @if($favList->top_list == 1)
                <a href="lista-fav/{{$favList->id}}" class="image-link col-4 col-md-3 col-lg-2 p-2 search-content-info">
                    <div class="mt-4 p-2 w-100 bg-dark text-white rounded button-gold cursor">
                        <h4 class="ms-2">{{$favList->name}}</h4>
                    </div>  
                </a>
            @else
                <a href="lista-fav/{{$favList->id}}">
                    <div class="mt-4 p-2 w-100 bg-dark text-white rounded button-list cursor">
                        <h4 class="ms-2">{{$favList->name}}</h4>
                    </div>
                </a>
            @endif
            <br>
        </div>
        <p class="d-none">{{$cont++}}</p>
    @endforeach

    @endif
</section>
<!-- END COMMENT SECTION -->
@endsection