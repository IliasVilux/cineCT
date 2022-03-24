@extends('headerFooter')
@section('content')

<head>
    <link rel="stylesheet" href="{{asset('css/general.css')}}">
    <link rel="stylesheet" href="{{asset('css/profile.css')}}">
</head>
<section class="container">
    <h1>MI PERFIL</h1>
    <div class="d-flex justify-content-center">
        <a href="{{asset('/profileImg')}}">
            <img class="img-carousel" src="{{asset('img/Dexter.jpg')}}">
        </a>
    </div>

    <form class="row g-3 my-4 mx-5" id="save" action="{{ route('user.update') }}" method="POST">
        @csrf
        <div class="col-12 col-sm-6 px-4">
            <label for="username" class="form-label">Nombre de usuario</label>
            <input type="text" class="form-control" name="username" id="username" value="{{ Auth::user()->nick }}">
        </div>
        <div class="col-12 col-sm-6 px-4">
            <label for="realName" class="form-label">Nombre Completo</label>
            <input type="text" class="form-control" name="realName" id="realName" value="{{ Auth::user()->name.' '.Auth::user()->surname}}" disabled>
        </div>
        <div class="col-12 col-sm-6 px-4">
        <label class="form-label">Idioma</label>
        <select class="form-select" name="language">
            <option hidden value="">Escoge un idioma</option>
            <option value="spanish">Castellano</option>
            <option value="catalan">Catalán</option>
            <option value="english">Inglés</option>
        </select>
        </div>
        <div class="col-12 col-sm-6 p-4">
            <button type="button" class="btn btn-light col-12 my-2">Cambiar contraseña</button>
        </div>
        <div class="col-12 px-4 d-flex justify-content-center">
            <button type="submit" class="btn btn-primary col-12 col-sm-6">Guardar</button>
        </div>
    </form>
</section>
@endsection