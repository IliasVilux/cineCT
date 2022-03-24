@extends('headerFooter')
@section('content')

<head>
    <link rel="stylesheet" href="{{asset('css/content.css')}}">
</head>
<section class="slider">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item full active">
                <img class="full-img" src="/img/SquidGame.jpg" alt="">
            </div>
            <div class="carousel-item full">
                <img class="full-img" src="/img/uncharted.jpg" alt="">
            </div>
            <div class="carousel-item full">
                <img class="full-img" src="/img/Kimetsu.jpg" alt="">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>
<section class="d-flex flex-wrap justify-content-around align-items-center">
    <button class="button-category">
        <p class="m-0">Samurai</p>
    </button>
    <button class="button-category">
        <p class="m-0">Shounen</p>
    </button>
    <button class="button-category">
        <p class="m-0">Seinen</p>
    </button>
    <button class="button-category">
        <p class="m-0">Shoujo</p>
    </button>

    <button class="button-category">
        <p class="m-0">Demons</p>
    </button>
    <button class="button-category">
        <p class="m-0">Sci-fi</p>
    </button>
    <button class="button-category">
        <p class="m-0">Mecha</p>
    </button>
    <button class="button-category">
        <p class="m-0">Josei</p>
    </button>
</section>
<section class="container py-4">
    <div class="d-flex justify-content-between py-3 px-5">
        <h5 class="col-6">Animes</h5>
        <?php 
       /* $quantAnimes = count($anime); //54
        $totalPages = ceil($quantAnimes/7);
        $page = $_GET['page'];

        $previous = $page-1;
        $next = $page+1;


        if($page < 1) {
            header('Location: /content/contentAnimes?page=1');
        } 
        if($page > $totalPages) {
            header('Location: /content/contentAnimes?page='.$totalPages.'');
        }

        if(!is_numeric($page)) {
            header('Location: /content/contentAnimes?page=1');
        }

        echo '<nav aria-label="Page navigation example">
        <ul class="pagination justify-content-start">';

            if ($page == 1) {
            echo '<li class="page-item disabled" id="previous">
            <a class="page-link" href="/content/contentAnimes?page='.$previous.'" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
            </a>
            </li>';
            } else {
                echo '<li class="page-item" id="previous">
                <a class="page-link" href="/content/contentAnimes?page='.$previous.'" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
                </li>';
            } 
                for ($i=1; $i <= $totalPages; $i++) {
                    echo' <li class="page-item"><a class="page-link" href="/content/contentAnimes?page='.$i.'">'.$i.'</a></li>';
                }
            if ($page == $totalPages) {
                echo '<li class="page-item disabled" id="next">
                <a class="page-link" href="/content/contentAnimes?page='.$next.'" aria-label="Next">
            
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
                </li>';
            } else {
            echo '<li class="page-item" id="next">
            <a class="page-link" href="/content/contentAnimes?page='.$next.'" aria-label="Next">
        
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
            </a>
            </li>';
            }

        echo'</ul>
        </nav>';*/
        ?>


    </div>

    @if(!empty($anime))
    <div class="content d-flex flex-wrap align-items-streach justify-content-center">

        @foreach($anime as $animes)
        <a href="/detail/detailAnimes/{{$animes->id}}" class="image-link col-2 p-2">
            @if($animes->poster_path === NULL)
            <img src="../storage/img/NoImg.jpg" alt="">
            @else
            <img src="{{$animes->poster_path}}" alt="">
            @endif
        </a>
        @endforeach
    </div>
    @else
    <h2 style="color: red;">No hi ha cap registre!!!</h2>
    @endif

</section>
{{-- Pagination --}}
<div class="d-flex justify-content-center">
    <!-- $anime->links() -->
</div>
@endsection