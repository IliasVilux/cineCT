@extends('/general/noHeaderFooter')
@section('content')

    <head>
        <link rel="stylesheet" href="{{ asset('css/register.css') }}">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
                integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
                integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
                integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script>
    </head>

    @if (Session::has('signOut'))
        <div class="alert alert-success" role="alert" id="signOut">
            <strong>{{ Session::get('signOut') }}</strong>
        </div>
    @endif


    @if (Auth::user())
        @include('includes.session')
    @else
        <section class="section-signin-register d-flex flex-wrap justify-content-center h-100 p-4 pt-5">
            <div class="col-12 col-md-10 col-lg-9">
                <ul class="nav nav-tabs" id="myTab">
                    <li class="nav-item col-6">
                        <a href="#logIn" class="nav-link active button_login_register" data-bs-toggle="tab">{{ trans('register.log_in') }}</a>
                    </li>
                    <li class="nav-item col-6">
                        <a href="#signUp" class="nav-link" data-bs-toggle="tab">{{ trans('register.sign_up') }}</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="logIn">
                        <div class="card text-dark p-2 p-sm-4 p-lg-5">
                            <div class="d-flex justify-content-center">
                                <img class="logo mt-2" src="/img/CinectLogoDark.svg" alt="LOGO">
                            </div>
                            <div class="card-body p-0">
                                <form class="row g-3 needs-validation d-flex flex-column align-items-center m-2"
                                    method="POST" action="{{ route('login.user') }}">
                                    @if (Session::has('authErrorMsg'))
                                        <div class="mt-2 alert alert-danger">{{ Session::get('authErrorMsg') }}</div>
                                    @endif
                                    @csrf

                                    <div class="login-errors">

                                        @if ($errors->has('email'))
                                            <div class="mt-2 alert alert-danger">
                                                {{ trans('warnings.email_wrong') }}
                                            </div>
                                        @endif

                                        @if ($errors->has('password'))
                                            <div class="mt-2 alert alert-danger">
                                                {{ trans('warnings.pass_wrong') }}
                                            </div>
                                        @endif

                                    </div>
                                    <div class="col-12 mt-0 p-0">

                                        <p>{{ trans('register.method') }}</p>

                                        @if ($errors->has('nick'))
                                            <div class="mt-2 alert alert-danger">
                                                {{ trans('warnings.user_no_account') }}
                                            </div>
                                        @endif

                                        <ul class="nav nav-pills mb-4" id="pills-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link selectId active" id="auth_with_email-tab"
                                                    data-toggle="pill" href="#auth_with_email" role="tab"
                                                    aria-controls="auth_with_email"
                                                    aria-selected="true">{{ trans('register.email') }}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link selectId" id="auth_with_nickname-tab" data-toggle="pill"
                                                    href="#auth_with_nickname" role="tab" aria-controls="auth_with_nickname"
                                                    aria-selected="false">{{ trans('register.username') }}</a>
                                            </li>
                                        </ul>

                                        <div class="tab-content" id="pills-tabContent">
                                            <div class="tab-pane fade show active" id="auth_with_email" role="tabpanel"
                                                aria-labelledby="auth_with_email-tab">
                                                <label for="email"
                                                    class="form-label">{{ trans('register.email') }}</label>
                                                <input type="text" class="form-control" id="email" name="email"
                                                    placeholder="Your email" autofocus>
                                            </div>
                                            <div class="tab-pane fade" id="auth_with_nickname" role="tabpanel"
                                                aria-labelledby="auth_with_nickname-tab">
                                                <div class="col-12">
                                                    <label for="nick"
                                                        class="form-label">{{ trans('register.username') }}</label>
                                                    <input type="text" class="form-control" id="nick" name="nick"
                                                        placeholder="Your username" autofocus>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 p-0">
                                        <label for="password" class="form-label">{{ trans('register.pass') }}</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="password" name="password"
                                                placeholder="Your password">
                                            <input type="checkbox" onclick="switchPassword()" name="showPassword"
                                                id="showPassword" class="d-none">
                                            <label for="showPassword"><i class="fa fa-eye p-2 p-sm-3"></i></label>
                                        </div>

                                    </div>
                                    <div class="form-check d-flex justify-content-start my-sm-4">
                                        <input class="form-check-input" type="checkbox" id="rememberData" />
                                        <label class="form-check-label mx-2" value="1"
                                            for="rememberData">{{ trans('register.remember') }}</label>
                                    </div>

                                    <button class="btn button-purple btn-sm btn-block mt-0 rounded-3" id="btn-login"
                                        type="submit">{{ trans('register.login') }}</button>

                                    <hr class="my-3">

                                    <p class="small m-0"><a class="text-dark-50"
                                            href="#!">{{ trans('register.forgot_pass') }}</a></p>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="signUp">
                        <div class="card text-dark p-2 p-sm-4 p-lg-5">
                            <div class="d-flex justify-content-center">
                                <img class="logo mt-2" src="/img/CinectLogoDark.svg" alt="LOGO">
                            </div>
                            <div class="card-body p-0">
                                <form method="POST" action="{{ route('register.user') }}"
                                    class="row g-3 needs-validation d-flex flex-column align-items-center m-2">
                                    @csrf

                                    <div class="register-erros">
                                        @if ($errors->has('register_name'))
                                            <div class="mt-2 alert alert-danger">
                                                {{ trans('warnings.name_wrong') }}
                                            </div>
                                        @endif
                                        @if ($errors->has('register_surname'))
                                            <div class="mt-2 alert alert-danger">
                                                {{ trans('warnings.last_name_wrong') }}
                                            </div>
                                        @endif
                                        @if ($errors->has('register_nick'))
                                            <div class="mt-2 alert alert-danger">
                                                {{ trans('warnings.user_used') }}
                                            </div>
                                        @endif
                                        @if ($errors->has('register_email'))
                                            <div class="mt-2 alert alert-danger">
                                                {{ trans('warnings.email_used') }}
                                            </div>
                                        @endif
                                        @if ($errors->has('register_password'))
                                            <div class="mt-2 alert alert-danger">
                                                {{ trans('warnings.email_used') }}
                                            </div>
                                        @endif
                                        @if ($errors->has('register_password_repeat'))
                                            <div class="mt-2 alert alert-danger">
                                                {{ trans('warnings.same_pass') }}
                                            </div>
                                        @endif
                                    </div>

                                    <div class="row p-0">
                                        <div class="col-12 col-md-6 mb-2 mb-sm-3 p-0 pe-sm-0 pe-md-3">
                                            <label for="register_name"
                                                class="form-label">{{ trans('register.name') }}</label>
                                            <input type="text" class="form-control" id="register_name"
                                                name="register_name" placeholder="Mark"
                                                value="{{ old('register_name') }}" autofocus>
                                        </div>
                                        <div class="col-12 col-md-6 mb-2 mb-sm-3 p-0">
                                            <label for="register_surname"
                                                class="form-label">{{ trans('register.last_name') }}</label>
                                            <input type="text" class="form-control" id="register_surname"
                                                name="register_surname" placeholder="Ruffalo"
                                                value="{{ old('register_surname') }}" autofocus>
                                        </div>
                                        <div class="col-12 col-md-6 mb-2 mb-sm-3 p-0 pe-sm-0 pe-md-3">

                                            <label for="nick"
                                                class="form-label">{{ trans('register.username') }}</label>
                                            <input type="text" class="form-control" id="register_nick"
                                                name="register_nick" placeholder="mark20"
                                                value="{{ old('register_nick') }}" autofocus>
                                        </div>
                                        <div class="col-12 col-md-6 mb-2 mb-sm-3 p-0">
                                            <label for="register_email"
                                                class="form-label">{{ trans('register.email') }}</label>
                                            <input type="email" class="form-control" id="register_email"
                                                name="register_email" placeholder="youremail@gmail.com"
                                                value="{{ old('register_email') }}" autofocus>
                                        </div>
                                        <div class="col-12 col-md-6 p-0 mb-2 mb-sm-3 mb-md-0 pe-sm-0 pe-md-3">
                                            <label for="register_password"
                                                class="form-label">{{ trans('register.pass') }}</label>
                                            <input type="password" class="form-control" id="register_password"
                                                name="register_password" placeholder="New password" autofocus>
                                        </div>
                                        <div class="col-12 col-md-6 p-0">
                                            <label for="register_password_repeat"
                                                class="form-label">{{ trans('register.pass2') }}</label>
                                            <input type="password" class="form-control" id="register_password_repeat"
                                                name="register_password_repeat" placeholder="Repeat password" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-check d-flex justify-content-start align-items-center my-2 my-sm-4">
                                        <input class="form-check-input mb-1" type="checkbox" value="" id="rememberRegister" />
                                        <label class="form-check-label mx-2"
                                            for="rememberRegister">{{ trans('register.remember') }}</label>
                                    </div>

                                    <button class="btn button-purple btn-sm btn-block m-0 rounded-3" id="btn-register"
                                        type="submit">{{ trans('register.register') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    @endif

    <script>
        var loginBtn = document.getElementById('btn-login');

        var loginEmail = document.getElementById('email');
        var loginNick = document.getElementById('nick');

        var loginWithEmailSelected = document.getElementById('auth_with_email-tab');
        var loginWithNickSelected = document.getElementById('auth_with_nickname-tab');

        //let currentEmailAriaSelectedValue = loginWithEmailSelected.ariaSelected;
        //let currentNickAriaSelectedValue = loginWithNickSelected.ariaSelected;

        loginWithEmailSelected.onclick = () => {loginNick.value = ''}

        loginWithNickSelected.onclick = () => {loginEmail.value = ''}

        const switchPassword = () => {
            var showPassword = document.getElementById('showPassword');
            var passwordInput = document.getElementById('password');
            var eyeIcon = document.getElementById('icon-switch')

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        }

        if(document.getElementById('signOut')){
            setTimeout( () => {
                document.getElementById('signOut').style.display = "none";
            },3900);
        }

    </script>
@endsection
