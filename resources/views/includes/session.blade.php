<div class="card text-center bg-dark session-card">
    <div class="card-body">
        <h5 class="card-title"><i class="fas fa-info-circle"></i></h5>
        <p class="card-text">Holaa <strong>{{ Auth::user()->name }}</strong>, actualmente ya tienes tu session iniciada, qué
            quieres hacer?</p>
        <div class="d-flex flex-column">
            <a href="{{ route('home') }}" class="btn btn-violet mb-2"><i class="fas fa-home"></i> Volver</a>
            <a href="{{ route('signout.user') }}" class="btn btn-violet"><i class="fas fa-sign-out-alt"></i>Cerrar sessión</a>
        </div>
    </div>
</div>