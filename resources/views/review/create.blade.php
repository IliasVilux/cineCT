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
           
        </div>
    </div>
</div>
@endsection