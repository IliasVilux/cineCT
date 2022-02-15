@extends('layout')
<head>
    <link rel="stylesheet" href="storage/css/HomeStyle.css">
</head>
@section('content')
<section>
<img class="banner" src="{{ url('storage/img/OnePiece.jpg')}}">
    <h5>Series</h5>
    <div class="row">
        <img class="defaultSize" src="{{ url('storage/img/OnePiece.jpg')}}">
        <img class="defaultSize" src="{{ url('storage/img/OnePiece.jpg')}}">
        <img class="defaultSize" src="{{ url('storage/img/OnePiece.jpg')}}">
    </div>
</section>
<section>
    <h5>Películas</h5>
    <div class="row">
        <img class="defaultSize" src="{{ url('storage/img/OnePiece.jpg')}}">
        <img class="defaultSize" src="{{ url('storage/img/OnePiece.jpg')}}">
        <img class="defaultSize" src="{{ url('storage/img/OnePiece.jpg')}}">
    </div>
</section>
<section>
    <h5>Animes</h5>
    <div class="row">
        <img class="defaultSize" src="{{ url('storage/img/OnePiece.jpg')}}">
        <img class="defaultSize" src="{{ url('storage/img/OnePiece.jpg')}}">
        <img class="defaultSize" src="{{ url('storage/img/OnePiece.jpg')}}">
    </div>
</section>
@endsection