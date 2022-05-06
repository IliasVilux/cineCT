@extends('/general/headerFooter')
@section('content')

<head>
    <link rel="stylesheet" href="{{asset('css/general.css')}}">
</head>
<section class="container">
    <h1 class="mt-4">{{trans('profile.title_profile')}}</h1>
    <a href="{{asset('/profileImg')}}" class="d-flex justify-content-center">
            <img class="img-profile col-6 col-sm-5 col-md-4" src="{{asset('img/NoImg.jpg')}}">
        </a>
    <a href="{{asset('/profileImg')}}" class="col-12 d-flex justify-content-center" >
        <button class="btn button-purple mt-3 col-12 col-sm-6">{{trans('profile.change_img')}}</button>
    </a>


    <form class="row g-3 my-4" id="save" action="{{ route('user.update') }}" method="POST">
        @csrf
        <div class="col-12 col-sm-6 p-0 m-0 mb-3 p-2 pe-sm-2">
            <label for="username" class="form-label">{{trans('profile.username')}}</label>
            <input type="text" class="form-control form-control-sm-sm" name="username" id="username" value="{{ Auth::user()->nick }}">
        </div>
        <div class="col-12 col-sm-6 p-0 m-0 mb-3 p-2 ps-sm-2">
            <label for="realName" class="form-label">{{trans('profile.name')}}</label>
            <input type="text" class="form-control form-control-sm-sm" name="realName" id="realName" value="{{ Auth::user()->name.' '.Auth::user()->surname}}" disabled>
        </div>
        <div class="col-12 col-sm-6 p-0 m-0 p-2 pe-sm-2">
        <label class="form-label">{{trans('profile.language')}}</label>
        <p id="lang" style="display: none;">{{ Auth::user()->lang }}</p>
        <select class="form-select form-select-sm-sm" name="language">
            <option id="es" value="es">Castellano</option>
            <option id="ca" value="ca">Català</option>
            <option id="en" value="en">English</option>
        </select>
        </div>
        <div class="col-12 col-sm-6 m-0 ps-2 pt-4">
            <a href="{{ route('change.password') }}" type="button" class="btn button-purple col-12 my-sm-3">{{trans('profile.change_pass')}}</a>
        </div>
        <div class="col-12 p-2 p-sm-0 ms-sm-2">
            <a type="button" class="btn btn-danger col-12 col-sm-3 col-md-2" data-bs-toggle="modal" data-bs-target="#myModal">{{trans('profile.delete_profile')}}</a>
        </div>
        <div class="modal fade text-dark" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{trans('profile.delete_profile')}}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    {{trans('warnings.del_profile_conf')}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-bs-dismiss="modal">{{trans('profile.cancel')}}</button>
                    <a href="{{ route('delete.account') }}" type="button" class="btn btn-danger">{{trans('profile.delete')}}</a>
                </div>
                </div>
            </div>
        </div>
        <div class="col-12 px-4 d-flex justify-content-center">
            <button type="submit" class="btn button-purple col-12 col-sm-6">{{trans('profile.save')}}</button>
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