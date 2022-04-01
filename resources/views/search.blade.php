@extends('headerFooter')
@section('content')

    <head>
        <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
        <link rel="stylesheet" href="{{ asset('css/content.css') }}">
        <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    </head>
    <section class="container">
        <h1 class="pt-2 pb-2">BUSCADOR</h1>
        <a href="{{ url('home') }}" class="btn btn-primary mb-3" title="Home">
            Home
        </a>
        <form action="{{ route('search-content') }}" method="GET">
            <div class="input-group">
                <input type="text" class="form-control" id="search-content" name="search" placeholder="Dragon ball">
                <button class="btn btn-outline-light" type="submit" id="submitSearch"><i class="fas fa-search"></i></button>
            </div>
        </form>
    </section>

    <section class="container py-4">
        @if (!empty($content['films']) || !empty($content['series']) || !empty($content['animes']))
            <p style="text-align:start; margin-bottom:20px; padding-left:5px; border-left:3px solid #5A3C97">Resultados
                encontrados con: <strong>{{ $search }}</strong></p>
            <div class="content d-flex flex-wrap align-items-streach justify-content-center searchcontent">
                @for ($data = 0; $data < count($content); $data++)
                    @foreach ($content[array_keys($content)[$data]] as $key => $value)
                        <a href="/detail/detail{{ ucfirst(array_keys($content)[$data]) }}/{{ $value->id }}"
                            class="image-link col-2 p-2">


                            @if ($value->poster_path === null)
                                <img src="/img/NoImg.jpg" alt="No image">
                            @else
                                <img src="{{ $value->poster_path }}" alt="{{ array_keys($content)[$data] }}">
                            @endif

                        </a>
                    @endforeach
                @endfor
            </div>
        @else
            @if ($errors->has('search'))
                <div class="mt-2 alert alert-danger">
                    Error
                </div>
            @endif
            @if (isset($search))
                <h5 class="text-center">No se ha encontrado ningun resultador con <span
                        style="opacity:0.8;">{{ $search }}</span></h5>
            @endif
        @endif
    </section>


    <script type="text/javascript">

        


    </script> 

@endsection
