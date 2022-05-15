@extends('/general/noHeaderFooter')
@section('content')
<div class="card text-center bg-dark session-card">
    <div class="card-body p-3">
        <img class="rounded-circle shadow-1-strong me-3 my-3" src="{{ Auth::user()->image->path }}" alt="a" width="125"height="125">
        <p class="card-text">Holaa <strong>{{ Auth::user()->name }}</strong>, actualmente ya tienes tu session iniciada, qué
            quieres hacer?</p>
        <div class="d-flex flex-column">
            <a href="{{ route('home') }}" class="btn btn-violet mb-2"><i class="fas fa-arrow-left mx-2"></i>Volver</a>
            <a href="{{ route('signout.user') }}" class="btn btn-violet"><i class="fas fa-sign-out-alt mx-2"></i>Cerrar sessión</a>
        </div>
    </div>
</div>
@endsection