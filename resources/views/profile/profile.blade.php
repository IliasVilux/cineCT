@extends('headerFooter')
@section('content')
<head>
	<link rel="stylesheet" href="../storage/css/general.css">
    <link rel="stylesheet" href="../storage/css/profile.css">
</head>
<section class="container">
    <h1>MI PERFIL</h1>
    <div>
        <a href="{{url('/profileImg')}}">
            <img class="img-carousel" src="{{url('storage/img/Dexter.jpg')}}">
        </a>
    </div>

</section>
@endsection