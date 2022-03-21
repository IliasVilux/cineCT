@extends('headerFooter')
@section('content')

<head>
    <link rel="stylesheet" href="{{asset('css/detail.css')}}">
</head>

<section class="container">
@if(!Auth::user())
<h3>Para crear tu lista de favoritos necessitas estar logueado, <a href="{{route('register.user')}}">INICIA SESSIÓN</a></h3>

@else
    <h1>MIS LISTAS</h1>
    <a href="{{ url('/') }}" class="btn btn-primary" title="Home">
        Home
    </a>

    @endif
</section>
<!-- END COMMENT SECTION -->
@endsection