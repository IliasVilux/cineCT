@extends('headerFooter')
@section('content')

<head>
    <link rel="stylesheet" href="storage/css/detail.css">
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="js/jquery.rating.pack.js"></script>
    <script>
    $(document).ready(function() {
        $('input.star').rating();
    });
    </script>
</head>
<section class="container">
    <a href="{{ url('/content/contentAnimes') }}" class="btn btn-primary" title="Home">
        Home
    </a>

    <h1 class="detail-title">{{$anime->name}}</h1>

    <div class="d-flex flex-row align-items-center justify-content-around">
        <div class="d-flex flex-column align-items-center">
            <h3><b>Genero</b></h3>
            <strong class="fw-bold fs-3"> {{$anime->genre_id}}</strong>
        </div>
        <div class="d-flex flex-column align-items-center">
            <h3><b>Fecha de lanzamiento</b></h3>
            <strong class="fw-bold fs-3"> {{$anime->release_date}}</strong>
        </div>
        <div class="d-flex flex-column align-items-center">
            <h3><b>Duración</b></h3>
            <strong class="fw-bold fs-3"> {{$anime->duration}} min</strong>
        </div>

        <div class="d-flex flex-column align-items-center">
            <h3><b>Episodios</b></h3>
            <strong class="fw-bold fs-3"> {{$anime->total_episodes}}</strong>
        </div>
        <div class="d-flex flex-column align-items-center">
            <h3><b>Puntuación</b></h3>
            <div class="d-flex flex-row">
                <h4><i class="fas fa-star"></i><strong class="fw-bold fs-3"> {{$anime->puntuation}}</strong>/10<h4>
            </div>
        </div>
    </div>

    <div class="d-flex flex-row justify-content-around mt-4">
        @if($anime->poster_path == NULL)
        <img src="{{url('storage/img/NoImg.jpg')}}" class="img-thumbnail" alt="">
        @else
        <img src="{{$anime->poster_path}}" class="img-thumbnail" alt="Img {{$anime->name}}">
        @endif
    </div>

    <form method="GET">
        <div class="rating">
            <input name="stars" id="e5" type="radio" value="5"><label for="e5">☆</label>
            <input name="stars" id="e4" type="radio" value="4"><label for="e4">☆</label>
            <input name="stars" id="e3" type="radio" value="3"><label for="e3">☆</label>
            <input name="stars" id="e2" type="radio" value="2"><label for="e2">☆</label>
            <input name="stars" id="e1" type="radio" value="1"><label for="e1">☆</label>
        </div>
        <button type="submit" name="submitRatingStar" class="btn btn-primary btn-sm">Enviar</button>
    </form>

    <?php
        if (isset($_GET['submitRatingStar'])) {
            echo '<div class="alert alert-success">Rating recibido: <strong>'.$_GET['stars'].'</strong>.</div>';
        }
    ?>

    <p class="description fs-2 pt-5">{{$anime->description}}</p>

    <!-- <h3><b>Creado:</b> {{$anime->created_at}}</h3>
        <h3><b>Ultima actualización:</b> {{$anime->updated_at}}</h3> -->

</section>

<!-- START COMMMENT SECTION -->
<section class="gradient-custom">
    <div class="container my-5 py-5">
        <div class="row d-flex justify-content-center">
            <div class="col-12">
                <div class="card card-comment bg-dark">
                    <div class="card-body card-body-comment p-4">
                        <h4 class="text-center mb-4 pb-2">Nested comments section</h4>

                        <div class="row">
                            <div class="col">
                                <div class="d-flex flex-start">
                                    <img class="rounded-circle shadow-1-strong me-3"
                                        src="{{$profile[0]->path}}" alt="13"
                                        width="65" height="65" />
                                    <div class="flex-grow-1 flex-shrink-1">
                                        <div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <p class="mb-1">
                                                    Maria Smantha <span class="text-muted">- 2 hours ago</span>
                                                </p>
                                                <a href="#!"><i class="fas fa-reply fa-xs"></i><span class="text-muted">
                                                        reply</span></a>
                                            </div>
                                            <p class="small mb-0">
                                                It is a long established fact that a reader will be distracted by
                                                the readable content of a page.
                                            </p>
                                        </div>

                                        <div class="d-flex flex-start mt-4">
                                            <a class="me-3" href="#">
                                            <img class="rounded-circle shadow-1-strong me-3"
                                        src="{{$profile[3]->path}}" alt="13"
                                        width="65" height="65" />
                                            </a>
                                            <div class="flex-grow-1 flex-shrink-1">
                                                <div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <p class="mb-1">
                                                            Simona Disa <span class="text-muted">- 3 hours ago</span>
                                                        </p>
                                                    </div>
                                                    <p class="small mb-0">
                                                        letters, as opposed to using 'Content here, content here',
                                                        making it look like readable English.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-start mt-4">
                                            <a class="me-3" href="#">
                                                <img class="rounded-circle shadow-1-strong me-3"
                                        src="{{$profile[2]->path}}" alt="13"
                                        width="65" height="65" />
                                            </a>
                                            <div class="flex-grow-1 flex-shrink-1">
                                                <div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <p class="mb-1">
                                                            John Smith <span class="text-muted">- 4 hours ago</span>
                                                        </p>
                                                    </div>
                                                    <p class="small mb-0">
                                                        the majority have suffered alteration in some form, by
                                                        injected humour, or randomised words.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex flex-start mt-4">
                                <img class="rounded-circle shadow-1-strong me-3"
                                        src="{{$profile[1]->path}}" alt="13"
                                        width="65" height="65" />
                                    <div class="flex-grow-1 flex-shrink-1">
                                        <div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <p class="mb-1">
                                                    Natalie Smith <span class="text-muted">- 2 hours ago</span>
                                                </p>
                                                <a href="#!"><i class="fas fa-reply fa-xs"></i><span class="text-muted">
                                                        reply</span></a>
                                            </div>
                                            <p class="small mb-0">
                                                The standard chunk of Lorem Ipsum used since the 1500s is
                                                reproduced below for those interested. Sections 1.10.32 and
                                                1.10.33.
                                            </p>
                                        </div>

                                        <div class="d-flex flex-start mt-4">
                                            <a class="me-3" href="#">
                                            <img class="rounded-circle shadow-1-strong me-3"
                                        src="{{$profile[8]->path}}" alt="13"
                                        width="65" height="65" />
                                            </a>
                                            <div class="flex-grow-1 flex-shrink-1">
                                                <div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <p class="mb-1">
                                                            Lisa Cudrow <span class="text-muted">- 4 hours ago</span>
                                                        </p>
                                                    </div>
                                                    <p class="small mb-0">
                                                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus
                                                        scelerisque ante sollicitudin commodo. Cras purus odio,
                                                        vestibulum in vulputate at, tempus viverra turpis.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-start mt-4">
                                            <a class="me-3" href="#">
                                            <img class="rounded-circle shadow-1-strong me-3"
                                        src="{{$profile[4]->path}}" alt="13"
                                        width="65" height="65" />
                                            </a>
                                            <div class="flex-grow-1 flex-shrink-1">
                                                <div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <p class="mb-1">
                                                            Maggie McLoan <span class="text-muted">- 5 hours ago</span>
                                                        </p>
                                                    </div>
                                                    <p class="small mb-0">
                                                        a Latin professor at Hampden-Sydney College in Virginia,
                                                        looked up one of the more obscure Latin words, consectetur
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-start mt-4">
                                            <a class="me-3" href="#">
                                            <img class="rounded-circle shadow-1-strong me-3"
                                        src="{{$profile[6]->path}}" alt="13"
                                        width="65" height="65" />
                                            </a>
                                            <div class="flex-grow-1 flex-shrink-1">
                                                <div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <p class="mb-1">
                                                            John Smith <span class="text-muted">- 6 hours ago</span>
                                                        </p>
                                                    </div>
                                                    <p class="small mb-0">
                                                        Autem, totam debitis suscipit saepe sapiente magnam officiis
                                                        quaerat necessitatibus odio assumenda, perferendis quae iusto
                                                        labore laboriosam minima numquam impedit quam dolorem!
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END COMMENT SECTION -->
@endsection