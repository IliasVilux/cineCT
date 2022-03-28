@extends('headerFooter')
@section('content')

<head>
    <link rel="stylesheet" href="{{asset('css/detail.css')}}">
    <link rel="stylesheet" href="{{asset('css/content.css')}}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
</head>
<section class="container">
    <h1>BUSCADOR</h1>
    <a href="{{ url('home') }}" class="btn btn-primary" title="Home">
        Home
    </a>
    <form action="{{route('search.content')}}">
        @csrf
            <div class="input-group">
                <input type="text" class="form-control" id="search" name="search" placeholder="Search">
                <button class="btn btn-outline-light" type="submit"><i class="fas fa-search"></i></button>
            </div>
        </form>
</section>

<section class="container py-4">
    @if(!empty($content))
    <h6 style="text-align:start; margin-bottom:20px; padding-left:5px; border-left:3px solid #5A3C97">Resultados encontrados: <strong>{{$search}}</strong></h6>
    <div class="content d-flex flex-wrap align-items-streach justify-content-center">
        @foreach($content as $content)
        <a href=""></a>
            @if($content->poster_path === NULL)
                <img src="/img/NoImg.jpg" alt="">
            @else
                <img src="{{$content->poster_path}}" alt="">
            @endif
        </a>
        @endforeach
    </div>
    @else
    @if(isset($search))
        <h4 style="color: red; text-align:center;">No hi ha cap registre per {{$search}}</h4>
    @endif
    @endif
</section>

<script>
    
</script>
@endsection