@extends('headerFooter')
@section('content')
<head>
    <link rel="stylesheet" href="{{asset('css/review.css')}}">
</head>
<div class="film-card">
    <div class="content">
        <div class="film-card__image"><img src="{{$film->poster_path}}" alt=""></div>
        <div class="film-card__information">
            <h1 class="p-2">{{$film->name}}</h1>
            <p>{{$film->description}}</p>
            <form method="POST" action="{{ route('review.save', ['id' => $film->id]) }}">
                @csrf
                <textarea name="description" id="description" cols="50" rows="2" placeholder="Escribe aqui tu comentario"></textarea>
                <div class="d-block buttons">
                    <button class="btn btn-primary" type="submit">Guardar</button>
                    <a class="btn btn-danger" href="">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection