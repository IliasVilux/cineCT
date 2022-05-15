<div class="card text-center bg-dark session-card">
    <div class="card-body">
        <img class="rounded-circle shadow-1-strong me-3 my-3" src="{{ Auth::user()->image->path }}" alt="a" width="125"height="125">
        <p class="card-text">{{ trans('warnings.hi') }}<strong>{{ Auth::user()->name }}</strong>{{ trans('warnings.open_session') }}</p>
        <div class="d-flex flex-column">
            <a href="{{ route('home') }}" class="btn btn-violet mb-2">{{ trans('warnings.back') }}</a>
            <a href="{{ route('signout.user') }}" class="btn btn-violet">{{ trans('warnings.close_session') }}</a>
        </div>
    </div>
</div>