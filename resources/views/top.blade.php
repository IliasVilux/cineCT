@extends('headerFooter')
@section('content')

<head>
    <link rel="stylesheet" href="../storage/css/general.css">
    <link rel="stylesheet" href="../storage/css/content.css">
    <link rel="stylesheet" href="../storage/css/top.css">
</head>
<h1>TOP SERIES / PELÍCULAS / ANIMES</h1>
<section class="container py-4">
    <h5>Series</h5>
    @if(!empty($serie))
    <div class="content d-flex flex-wrap align-items-streach justify-content-center">
        @foreach($serie as $serie)
        <a href="/detail/detailSeries/{{$serie->id}}" class="image-link col-2 p-2">
            @if($serie->poster_path === NULL)
            <img src="../storage/img/NoImg.jpg" alt="">
            @else
            <img src="{{$serie->poster_path}}" alt="">
            @endif
        </a>
        @endforeach
    </div>
    @else
    <h2 style="color: red;">No hi ha cap registre!!!</h2>
    @endif

</section>
<!-- END COMMENT SECTION -->
@endsection