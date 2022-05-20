@extends('/general/headerFooter')
@section('content')
<div class="container change-password-container">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <h1 class="detail-title">{{ trans('profile.update_password') }}</h1>
            <a href="{{ url('/user/profile') }}" class="btn button-purple my-4">
            {{ trans('titles.profile') }}
            </a>
        </div>
        <div class="col-12 px-5 my-3 mb-5">
        <form method="POST" action="{{ route('change.password') }}">
            @csrf 

                @foreach ($errors->all() as $error)
                <p class="text-danger">{{ $error }}</p>
                @endforeach 

            <div class="d-flex flex-column">
                <label for="password" class="col-form-label text-md-right">{{ trans('profile.pass') }}</label>
                    <input id="current_password" type="password" class="form-control col-lg" placeholder="{{ trans('profile.current_password') }}" name="current_password" autocomplete="current-password">
            </div>

            <div class="d-flex flex-column my-3">
                <label for="password" class="col-form-label text-md-right">{{ trans('profile.new_password') }}</label>
                    <input id="update_password" type="password" class="form-control col-lg" placeholder="{{ trans('profile.new_password2') }}" name="update_password" autocomplete="current-password">
            </div>

            <div class="d-flex flex-column">
                <label for="password" class="col-form-label text-md-right">{{ trans('profile.repeat_password') }}</label>
                    <input id="update_confirm_password" type="password" class="form-control col-lg" placeholder="{{ trans('profile.repeat_password2') }}" name="update_confirm_password" autocomplete="current-password">
            </div>

            <div class="row mb-0 mt-4">
                <div>
                    <button type="submit" class="btn btn-violet text-light">
                        {{ trans('profile.update_password') }}
                    </button>
                    <a type="submit" class="btn btn-outline-danger text-light" href="{{route('user.update')}}">
                        {{ trans('profile.cancel') }}
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection