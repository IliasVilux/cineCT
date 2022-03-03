@extends('headerFooter')
@section('content')

<head>
    <link rel="stylesheet" href="../storage/css/detail.css">
</head>
<section class="container">
    <h1>BUSCADOR</h1>
    <a href="{{ url('/') }}" class="btn btn-primary" title="Home">
        Home
    </a>
    <div class="input-group">
        <input type="text" class="form-control" placeholder="Search">
        <button class="btn btn-outline-light" type="submit"><i class="fas fa-search"></i></button>
    </div>
</section>
<!-- END COMMENT SECTION -->
@endsection