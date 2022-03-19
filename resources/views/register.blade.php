@extends('noHeaderFooter')
@section('content')

<head>
    <link rel="stylesheet" href="{{asset('css/register.css')}}">
</head>
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
                            novalidate>
                            <div class="col-12">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" placeholder="Your email" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Password"
                                    required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="form-check d-flex justify-content-start mb-4">
                                <input class="form-check-input" type="checkbox" value="" id="remember" />
                                <label class="form-check-label mx-2" for="remember"> Remember password </label>
                            </div>

                            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>

                            <hr class="mt-4">

                            <p class="small mb-0"><a class="text-dark-50" href="#!">Forgot password?</a></p>

                        </form>
                    </div>
                </div>

            </div>
            <div class="tab-pane fade" id="signUp">
                <div class="card text-dark">
                    <div class="card-body">
                        <form class="row g-3 needs-validation d-flex flex-column align-items-center p-2 p-sm-5 m-2"
                            novalidate>
                            <div class="row p-0">
                                <div class="col-12 col-md-6 mb-2">
                                    <label for="name" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="name" placeholder="Mark" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-2">
                                    <label for="emailRegister" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="emailRegister"
                                        placeholder="youremail@gmail.com" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="passwordRegister" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="passwordRegister"
                                        placeholder="New Password" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="passwordRegister2" class="form-label">Repetir Password</label>
                                    <input type="password" class="form-control" id="passwordRegister2"
                                        placeholder="Repeat Password" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="form-check d-flex justify-content-start mb-4">
                                <input class="form-check-input" type="checkbox" value="" id="rememberRegister" />
                                <label class="form-check-label mx-2" for="rememberRegister"> Remember password </label>
                            </div>

                            <button class="btn btn-primary btn-lg btn-block" type="submit">Register</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection