<div class="card text-center bg-dark session-card">
    <div class="card-body">
        <img class="rounded-circle shadow-1-strong me-3 my-3" src="{{ Auth::user()->image->path }}" alt="a" width="125"height="125">
        <p class="card-text">Holaa <strong>{{ Auth::user()->name }}</strong>, actualmente ya tienes tu session iniciada, qué
            quieres hacer?</p>
        <div class="d-flex flex-column">
            <a href="{{ route('home') }}" class="btn btn-violet mb-2">Volver</a>
            <a href="{{ route('signout.user') }}" class="btn btn-violet">Cerrar sessión</a>
        </div>
    </div>
</div>