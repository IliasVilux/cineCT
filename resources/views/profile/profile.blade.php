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
        <p id="lang" style="display: none;">{{ Auth::user()->lang }}</p>
        <select class="form-select" name="language">
            <!-- <option hidden value="null">Escoge un idioma</option> -->
            <option id="es" value="es">Castellano</option>
            <option id="ca" value="ca">Catalán</option>
            <option id="en" value="en">Inglés</option>
        </select>
        </div>
        <div class="col-12 col-sm-6 p-4">
            <a href="{{ route('change.password') }}" type="button" class="btn btn-light col-12 my-2">Cambiar contraseña</a>
        </div>
        <div class="col-12">
            <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#myModal">Eliminar Cuenta</a>
        </div>
        <div class="modal fade text-dark" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Eliminar cuenta</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    Estás seguro de que quieres eilinar tu cuenta?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-bs-dismiss="modal">Cancelar</button>
                    <a href="{{ route('delete.account') }}" type="button" class="btn btn-danger">Eliminar</a>
                </div>
                </div>
            </div>
        </div>
        <div class="col-12 px-4 d-flex justify-content-center">
            <button type="submit" class="btn btn-primary col-12 col-sm-6">Guardar</button>
        </div>
    </form>
</section>

<script>
    let lang = document.getElementById('lang').innerHTML;
    switch (lang){
        case 'es': document.getElementById('es').selected = true; break;
        case 'ca': document.getElementById('ca').selected = true; break;
        case 'en': document.getElementById('en').selected = true; break;
    }
</script>
@endsection