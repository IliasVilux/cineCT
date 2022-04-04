@extends('headerFooter')
@section('content')

<head>
    <link rel="stylesheet" href="{{asset('css/general.css')}}">
</head>
<section class="container">
    <h1 class="mt-4">{{trans('profile.title_profile')}}</h1>
    <div class="d-flex justify-content-center">
        <a href="{{asset('/profileImg')}}">
            <img class="img-carousel" src="{{asset('img/NoImg.jpg')}}" width="200px">
        </a>
    </div>
    <a href="{{asset('/profileImg')}}" class="col-12 d-flex justify-content-center" >
        <button class="btn btn-primary mt-3 col-3">{{trans('profile.change_img')}}</button>
    </a>


    <form class="row g-3 my-4" id="save" action="{{ route('user.update') }}" method="POST">
        @csrf
        <div class="col-12 col-sm-6 p-0 m-0 mb-3 pe-2">
            <label for="username" class="form-label">{{trans('profile.username')}}</label>
            <input type="text" class="form-control" name="username" id="username" value="{{ Auth::user()->nick }}">
        </div>
        <div class="col-12 col-sm-6 p-0 m-0 mb-3 ps-2">
            <label for="realName" class="form-label">{{trans('profile.name')}}</label>
            <input type="text" class="form-control" name="realName" id="realName" value="{{ Auth::user()->name.' '.Auth::user()->surname}}" disabled>
        </div>
        <div class="col-12 col-sm-6 p-0 m-0 pe-2">
        <label class="form-label">{{trans('profile.language')}}</label>
        <p id="lang" style="display: none;">{{ Auth::user()->lang }}</p>
        <select class="form-select" name="language">
            <option id="es" value="es">Castellano</option>
            <option id="ca" value="ca">Català</option>
            <option id="en" value="en">English</option>
        </select>
        </div>
        <div class="col-12 col-sm-6 m-0 ps-2" style="padding-top: 25px;">
            <a href="{{ route('change.password') }}" type="button" class="btn btn-light col-12 my-2">{{trans('profile.change_pass')}}</a>
        </div>
        <div class="col-12 d-flex justify-content-center">
            <button type="submit" class="btn btn-primary col-3">{{trans('profile.save')}}</button>
        </div>
    </form>
</section>

<script>
    let lang = document.getElementById('lang').innerHTML;
    console.log(lang);
    switch (lang){
        case 'es': document.getElementById('es').selected = true; break;
        case 'ca': document.getElementById('ca').selected = true; break;
        case 'en': document.getElementById('en').selected = true; break;
    }
    console.log(lang);
</script>
@endsection