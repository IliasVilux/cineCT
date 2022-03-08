@extends('headerFooter')
@section('content')
<head>
	<link rel="stylesheet" href="../storage/css/general.css">
    <link rel="stylesheet" href="../storage/css/profile.css">
</head>
<section class="container">
    <h1>MI PERFIL</h1>
    <div class="d-flex justify-content-center">
        <a href="{{url('/profileImg')}}">
            <img class="img-carousel" src="{{url('storage/img/Dexter.jpg')}}">
        </a>
    </div>
    <div class="col-12 d-flex flex-wrap justify-content-center">
        <div class="col-5 d-flex justify-content-center flex-column p-5">
            <label for="username">Nombre de usuario</label>
            <input type="text" name="username"></input>
        </div>
        <div class="col-5 d-flex justify-content-center flex-column p-5">
            <label for="name">Nombre real</label>
            <input type="text" name="name"></input>
        </div>
        <div class="col-5 d-flex justify-content-center flex-column p-5">
            <label for="language">Idioma de la web</label>
            <select name="language">
                <option value="spanish">Castellano</option>
                <option value="catalan">Catalán</option>
                <option value="english">Inglés</option>
            </select>
        </div>
        <div class="col-5 d-flex justify-content-center flex-column p-5">
            <button class="m-0">
                <p class="m-0">Cambiar contraseña</p>
            </button>
        </div>
    </div>
</section>
@endsection