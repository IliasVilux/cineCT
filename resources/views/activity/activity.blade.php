@extends('headerFooter')
@section('content')
<head>
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
</head>
<h2 class="text-center p-3">{{trans('titles.activity')}}</h2>

@foreach($activity as $interaction)
    <div>
        <p>
            El usuari@ {{$interaction->user->name}} <b>Ha dado like a una review con id</b> 
            <span>{{$interaction->review_id}} <b>que pertenece a la pelcicula: </b></span>
            <span>{{$interaction->review->film->name}}</span>
        </p>
    </div>
@endforeach



@endsection