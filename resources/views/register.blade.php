@extends('noHeaderFooter')
@section('content')

    <head>
        <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    </head>

    @if (Auth::user())
        <div class="alert alert-success" role="alert">
            Actualmente ya tienes tu session iniciada <a href="{{ route('home') }}">Clica aqui</a> para volver a la
                session o aqui <a href="{{route('signout.user')}}">cerrar sessión</a>
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
                                    method="POST" action="{{ route('login.user') }}" novalidate>
                                    @if (Session::has('msgError'))
                                        <div class="alert alert-warning">{{ Session::get('msgError') }}</div>
                                    @endif
                                    @csrf
                                    <div class="col-12">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" class="form-control" id="email" name="email"
                                            placeholder="Your email" required>
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-12">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Password" required>
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-check d-flex justify-content-start mb-4">
                                        <input class="form-check-input" type="checkbox" value="" id="remember" />
                                        <label class="form-check-label mx-2" for="remember"> Remember password </label>
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
                                <form method="POST" action="{{ route('register.user') }}" onsubmit="validateRegister()"
                                    class="row g-3 needs-validation d-flex flex-column align-items-center p-2 p-sm-5 m-2"
                                    novalidate>
                                    @csrf
                                    <div class="row p-0">
                                        <div class="col-12 col-md-6 mb-2">
                                            <label for="register_name" class="form-label">Nombre</label>
                                            <input type="text" class="form-control" id="register_name"
                                                name="register_name" placeholder="Mark" required>
                                            @if ($errors->has('register_name'))
                                                <span class="text-danger">{{ $errors->first('register_name') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-12 col-md-6 mb-2">
                                            <label for="register_surname" class="form-label">Apellido</label>
                                            <input type="text" class="form-control" id="register_surname"
                                                name="register_surname" placeholder="Ruffalo" required>
                                            @if ($errors->has('register_surname'))
                                                <span
                                                    class="text-danger">{{ $errors->first('register_surname') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-12 col-md-6 mb-2">
                                            <label for="register_nick" class="form-label">Nick</label>
                                            <input type="text" class="form-control" id="register_nick"
                                                name="register_nick" placeholder="hulk20" required>
                                            @if ($errors->has('register_nick'))
                                                <span class="text-danger">{{ $errors->first('register_nick') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-12 col-md-6 mb-2">
                                            <label for="register_email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="register_email"
                                                name="register_email" placeholder="youremail@gmail.com" required>
                                            @if ($errors->has('register_email'))
                                                <span
                                                    class="text-danger">{{ $errors->first('register_email') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="register_password" class="form-label">Password</label>
                                            <input type="password" class="form-control" id="register_password"
                                                name="register_password" placeholder="New Password" required>
                                            @if ($errors->has('register_password'))
                                                <span
                                                    class="text-danger">{{ $errors->first('register_password') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="register_password_repeat" class="form-label">Repetir
                                                Password</label>
                                            <input type="password" class="form-control" id="register_password_repeat"
                                                name="register_password_repeat" placeholder="Repeat Password" required>
                                            @if ($errors->has('register_password'))
                                                <span
                                                    class="text-danger">{{ $errors->first('register_password') }}</span>
                                            @endif
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
        function validateRegister() {

            var registerNickname = document.getElementById('register_name');
            var registerSurname = document.getElementById('register_surname');
            var registerName = document.getElementById('register_nick');
            var registerEmail = document.getElementById('register_email');
            var registerPassword = document.getElementById('register_password');
            var registerPasswordConfirmation = document.getElementById('register_password_repeat');

            if(registerNickname.value == "" && registerSurname.value == "" && registerName.value == "" && registerEmail.value == "" && registerPassword.value == ""  && registerPasswordConfirmation.value == ""){
                alert("Los valores no pueden estar nulos!");
                registerNickname.style.border = '1px solid red';
            }
        }


        function validateLogin() {

        }

    </script>
@endsection
