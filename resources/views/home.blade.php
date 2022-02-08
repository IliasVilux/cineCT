@extends('layoutAll')
@section('content')
<section class="container">
    <h1>MENU</h1>
    <a href="{{ url('/detail') }}" class="btn btn-primary" title="Detail">
        Detail
    </a>
</section>
<section class="container">
    <h1>HOLA</h1>
    <img src="{{url('storage/img/img.png')}}" height="200px">
    <img src="{{url('storage/img/img2.png')}}" height="200px">
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut semper sapien. Aenean augue nibh, mollis eu neque a, ullamcorper dictum massa. Donec iaculis ultrices turpis, sed auctor nibh aliquet et. Morbi tincidunt felis est, quis consectetur leo hendrerit in. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse vel nibh sapien. Nulla ultricies magna elit, vitae feugiat magna scelerisque ut. Vestibulum sit amet fermentum libero. Praesent viverra consectetur hendrerit. Cras bibendum ligula et nunc molestie tristique. Nunc libero tortor, commodo quis nisl quis, rutrum porta eros. Proin auctor, diam vel auctor faucibus, felis dui imperdiet lacus, quis volutpat lorem neque eu tortor. Mauris varius arcu ut ex bibendum, eget consequat orci placerat. Aenean ut tellus efficitur, scelerisque odio fringilla, tincidunt dolor. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum sed eleifend nunc.</p>
</section>
@endsection