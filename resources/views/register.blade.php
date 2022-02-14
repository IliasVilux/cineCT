@extends('layout')
@section('content')
<section class="section-signin-register vh-100 p-5">
<div class="p-5">
      <ul class="nav nav-tabs" id="myTab">
        <li class="nav-item">
          <a href="#signIn" class="nav-link active" data-bs-toggle="tab">Iniciar Sessión</a>
        </li>
        <li class="nav-item">
          <a href="#register" class="nav-link" data-bs-toggle="tab">Registrarse</a>
        </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane fade show active" id="signIn">
          <div class="card">
            <div class="card-body p-5">
            <form class="row g-3 needs-validation d-flex flex-column align-items-center p-5" novalidate>
              <div class="col-12">
                <label for="validationCustom01" class="form-label">Email</label>
                <input type="text" class="form-control" id="validationCustom01" placeholder="Mark" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
              <div class="col-12">
                <label for="validationCustom01" class="form-label">Password</label>
                <input type="password" class="form-control" id="validationCustom01" placeholder="Password" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
              <div class="form-check d-flex justify-content-start mb-4">
              <input class="form-check-input" type="checkbox" value="" id="form1Example3"/>
              <label class="form-check-label mx-2" for="form1Example3"> Remember password </label>
            </div>

            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>

            <hr class="my-4">

            <p class="small mb-5 pb-lg-2"><a class="text-dark-50" href="#!">Forgot password?</a></p>
            </form>
            </div>
          </div>

        </div>
        <div class="tab-pane fade" id="register">
        <div class="card">
            <div class="card-body p-5">
            <form class="row g-3 needs-validation d-flex flex-column align-items-center p-5" novalidate>
              <div class="col-12">
                <label for="validationCustom01" class="form-label">Email</label>
                <input type="text" class="form-control" id="validationCustom01" placeholder="Mark" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
              <div class="col-12">
                <label for="validationCustom01" class="form-label">Password</label>
                <input type="password" class="form-control" id="validationCustom01" placeholder="Password" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
              <div class="form-check d-flex justify-content-start mb-4">
              <input class="form-check-input" type="checkbox" value="" id="form1Example3"/>
              <label class="form-check-label mx-2" for="form1Example3"> Remember password </label>
            </div>

            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>

            <hr class="my-4">

            <p class="mb-0">Don't have an account? <a href="#!" class="text-dark-50 fw-bold">Sign Up</a></p>
            </form>
            </div>
          </div>
      </div>
    </div>
</section>
@endsection