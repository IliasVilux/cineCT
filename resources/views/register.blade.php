@extends('noHeaderFooter')
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

    @if (Auth::user())
        <div class="alert alert-success" role="alert">
            Actualmente ya tienes tu session iniciada <a href="{{ route('home') }}">Clica aqui</a> para volver a la
            session o aqui <a href="{{ route('signout.user') }}">cerrar sessión</a>
        </div>
    @else
        <section class="section-signin-register d-flex flex-wrap justify-content-center h-100 p-5">
            <div class="col-12 col-lg-8 p-sm-5">
                <ul class="nav nav-tabs" id="myTab">
                    <li class="nav-item">
                        <a href="#logIn" class="nav-link active" data-bs-toggle="tab">Log In</a>
                    </li>
                    <li class="nav-item">
                        <a href="#signUp" class="nav-link" data-bs-toggle="tab">Sign Up</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="logIn">
                        <div class="card text-dark">
                            <img src="storage/img/200x200.png" alt="LOGO" height="100px" width="100px">
                            <div class="card-body">
                                <form class="row g-3 needs-validation d-flex flex-column align-items-center p-2 p-sm-5 m-2"
                                    method="POST" action="{{ route('login.user') }}">
                                    @if (Session::has('authErrorMsg'))
                                        <div class="mt-2 alert alert-danger">{{ Session::get('authErrorMsg') }}</div>
                                    @endif
                                    @csrf

                                    <div class="login-errors">

                                        @if ($errors->has('email'))
                                            <div class="mt-2 alert alert-danger">
                                                Este email no es correcto
                                            </div>
                                        @endif

                                        @if ($errors->has('password'))
                                            <div class="mt-2 alert alert-danger">
                                                La contrasenya es incorrecta
                                            </div>
                                        @endif

                                    </div>
                                    <div class="col-12">

                                        <p>Como quieres identificarte?</p>

                                        @if ($errors->has('nick'))
                                            <div class="mt-2 alert alert-danger">
                                                El nombre de usuario introducido no pertenece a ninguna cuenta
                                            </div>
                                        @endif

                                        <ul class="nav nav-pills mb-4" id="pills-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="auth_with_email-tab" data-toggle="pill"
                                                    href="#auth_with_email" role="tab" aria-controls="auth_with_email"
                                                    aria-selected="true">Con Email</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="auth_with_nickname-tab" data-toggle="pill"
                                                    href="#auth_with_nickname" role="tab" aria-controls="auth_with_nickname"
                                                    aria-selected="false">Con Nickname</a>
                                            </li>
                                        </ul>

                                        <div class="tab-content" id="pills-tabContent">
                                            <div class="tab-pane fade show active" id="auth_with_email" role="tabpanel"
                                                aria-labelledby="auth_with_email-tab">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="text" class="form-control" id="email" name="email"
                                                    placeholder="Your email" autofocus>
                                            </div>
                                            <div class="tab-pane fade" id="auth_with_nickname" role="tabpanel"
                                                aria-labelledby="auth_with_nickname-tab">
                                                <div class="col-12">
                                                    <label for="nick" class="form-label">Nickname</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="hashtagUsername">@</span>
                                                        </div>
                                                        <input type="text" class="form-control" id="nick" name="nick"
                                                            placeholder="username" autofocus>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="password" class="form-label">Password</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="password" name="password"
                                                placeholder="Password">
                                            <input type="checkbox" onclick="switchPassword()" name="showPassword"
                                                id="showPassword" style="display:none;">
                                            <label for="showPassword"><i id="icon-switch"
                                                    class="fa fa-eye p-3"></i></label>
                                        </div>

                                    </div>
                                    <div class="form-check d-flex justify-content-start mb-4">
                                        <input class="form-check-input" type="checkbox" id="rememberData" />
                                        <label class="form-check-label mx-2" value="1" for="rememberData"> Remember me
                                        </label>
                                    </div>

                                    <button class="btn btn-primary btn-lg btn-block" id="btn-login"
                                        type="submit">Login</button>

                                    <hr class="mt-4">

                                    <p class="small mb-0"><a class="text-dark-50" href="#!">Forgot password?</a></p>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="signUp">
                        <div class="card text-dark">
                            <div class="card-body">
                                <form method="POST" action="{{ route('register.user') }}"
                                    class="row g-3 needs-validation d-flex flex-column align-items-center p-2 p-sm-5 m-2">
                                    @csrf

                                    <div class="register-erros">
                                        @if ($errors->has('register_name'))
                                            <div class="mt-2 alert alert-danger">
                                                El nombre no es correcto, debe tener al menos 4 caracteres
                                            </div>
                                        @endif
                                        @if ($errors->has('register_surname'))
                                            <div class="mt-2 alert alert-danger">
                                                El apellido no es correcto, debe tener al menos 4 caracteres
                                            </div>
                                        @endif
                                        @if ($errors->has('register_nick'))
                                            <div class="mt-2 alert alert-danger">
                                                El nombre de usuario no es correcto, debe tener al menos 4 caracteres
                                            </div>
                                        @endif
                                        @if ($errors->has('register_email'))
                                            <div class="mt-2 alert alert-danger">
                                                El email no es correcto
                                            </div>
                                        @endif
                                        @if ($errors->has('register_password'))
                                            <div class="mt-2 alert alert-danger">
                                                El contraseña no es correcta, debe tener al menos 8 caracteres y una
                                                mayúscula las dos contrasenñas tienen que coincidir
                                            </div>
                                        @endif
                                        @if ($errors->has('register_password_repeat'))
                                            <div class="mt-2 alert alert-danger">
                                                Las dos contrasenñas tienen que coincidir
                                            </div>
                                        @endif
                                    </div>

                                    <div class="row p-0">
                                        <div class="col-12 col-md-6 mb-2">
                                            <label for="register_name" class="form-label">Nombre</label>
                                            <input type="text" class="form-control" id="register_name"
                                                name="register_name" placeholder="Mark" value="{{ old('register_name') }}"
                                                autofocus>
                                        </div>
                                        <div class="col-12 col-md-6 mb-2">
                                            <label for="register_surname" class="form-label">Apellido</label>
                                            <input type="text" class="form-control" id="register_surname"
                                                name="register_surname" placeholder="Ruffalo"
                                                value="{{ old('register_surname') }}" autofocus>
                                        </div>
                                        <div class="col-12 col-md-6 mb-2">

                                            <label for="nick" class="form-label">Nickname</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="hashtagUsername">@</span>
                                                </div>
                                                <input type="text" class="form-control" id="register_nick"
                                                    name="register_nick" placeholder="mark20"
                                                    value="{{ old('register_nick') }}" autofocus>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 mb-2">
                                            <label for="register_email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="register_email"
                                                name="register_email" placeholder="youremail@gmail.com"
                                                value="{{ old('register_email') }}" autofocus>
                                        </div>
                                        <div class="col-12 col-md-6 mb-2">
                                            <label for="register_password" class="form-label">Contraseña</label>
                                            <input type="password" class="form-control" id="register_password"
                                                name="register_password" placeholder="New Password" autofocus>
                                        </div>
                                        <div class="col-12 col-md-6 mb-2">
                                            <label for="register_password_repeat" class="form-label">Repetir
                                                Contraseña</label>
                                            <input type="password" class="form-control" id="register_password_repeat"
                                                name="register_password_repeat" placeholder="Repeat Password" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-check d-flex justify-content-start mb-4">
                                        <input class="form-check-input" type="checkbox" value="" id="rememberRegister" />
                                        <label class="form-check-label mx-2" for="rememberRegister"> Remember password
                                        </label>
                                    </div>

                                    <button class="btn btn-primary btn-lg btn-block" id="btn-register"
                                        type="submit">Register</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    @endif

    <script>

        var loginBtn = document.getElementById('btn-login');
        var loginWithEmailSelected = document.getElementById('auth_with_email-tab');
        var loginWithLoginSelected = document.getElementById('auth_with_nickname-tab');

        loginBtn.onclick = () =>{
            checkLoginInputs();
        }

        function checkLoginInputs()
        {
            var loginEmail = document.getElementById('email');
            var loginNick = document.getElementById('nick');

            return (loginWithEmailSelected.ariaSelected = 'true'){
                loginNick.value = '';
            }else{
                loginEmail.value = '';
            }
        }

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
    </script>
@endsection
