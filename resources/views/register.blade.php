@extends('layout')
@section('content')
<section class="section-signin-register d-flex flex-wrap justify-content-center h-100 p-5">
<div class="col-12 col-lg-8 p-5">
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
          <div class="card">
            <div class="card-body">
            <form class="row g-3 needs-validation d-flex flex-column align-items-center p-5 m-2" novalidate>
              <div class="col-12">
                <label for="validationCustom01" class="form-label">Email</label>
                <input type="text" class="form-control" id="validationCustom01" placeholder="Your email" required>
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

            <p class="small mb-5"><a class="text-dark-50" href="#!">Forgot password?</a></p>
            <p class="small text-align-center bg-warning">Don't have an account? <a href="#signIn" class="text-dark-50 fw-bold" data-bs-toggle="tab">Sign Up</a></p>
            </form>
            </div>
          </div>

        </div>
        <div class="tab-pane fade" id="signUp">
        <div class="card">
            <div class="card-body">
            <form class="row g-3 needs-validation d-flex flex-column align-items-center p-5 m-2" novalidate>
              <div class="row p-0">
              <div class="col-6 mb-2">
                <label for="validationCustom01" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="validationCustom01" placeholder="Mark" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
              <div class="col-6 mb-2">
                <label for="validationCustom01" class="form-label">Email</label>
                <input type="email" class="form-control" id="validationCustom01" placeholder="youremail@gmail.com" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
              </div>
              <div class="row p-0">
              <div class="col-6">
                <label for="validationCustom01" class="form-label">Password</label>
                <input type="password" class="form-control" id="validationCustom01" placeholder="New Password" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
              <div class="col-6">
                <label for="validationCustom01" class="form-label">Repetir Password</label>
                <input type="password" class="form-control" id="validationCustom01" placeholder="Repeat Password" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
              </div>
              <div class="form-check d-flex justify-content-start mb-4">
              <input class="form-check-input" type="checkbox" value="" id="form1Example3"/>
              <label class="form-check-label mx-2" for="form1Example3"> Remember password </label>
            </div>

            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>

            <hr class="my-4">

            <p class="small text-align-center bg-warning">Already have an account? <a href="#logIn" class="text-dark-50 fw-bold" data-bs-toggle="tab">Log In</a></p>
            </form>
            </div>
          </div>
      </div>
    </div>
</section>
@endsection