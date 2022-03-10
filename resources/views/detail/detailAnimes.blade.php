@extends('headerFooter')
@section('content')

<head>
    <link rel="stylesheet" href="../../storage/css/detail.css">
</head>
<section class="container">
    <a href="{{ url('/') }}" class="btn btn-primary" title="Home">
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

    <div class="rating-wrapper">

        <label for="5-star-rating" class="star-rating">
            <i class="fas fa-star d-inline-block"></i>
        </label>

        <label for="4-star-rating" class="star-rating star">
            <i class="fas fa-star d-inline-block"></i>
        </label>

        <label for="3-star-rating" class="star-rating star">
            <i class="fas fa-star d-inline-block"></i>
        </label>

        <label for="2-star-rating" class="star-rating star">
            <i class="fas fa-star d-inline-block"></i>
        </label>

        <label for="1-star-rating" class="star-rating star">
            <i class="fas fa-star d-inline-block"></i>
        </label>

    </div>

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
                                        src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(10).webp" alt="avatar"
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
                                                <img class="rounded-circle shadow-1-strong"
                                                    src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(11).webp"
                                                    alt="avatar" width="65" height="65" />
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
                                                <img class="rounded-circle shadow-1-strong"
                                                    src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(32).webp"
                                                    alt="avatar" width="65" height="65" />
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
                                        src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(12).webp" alt="avatar"
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
                                                <img class="rounded-circle shadow-1-strong"
                                                    src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(31).webp"
                                                    alt="avatar" width="65" height="65" />
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
                                                <img class="rounded-circle shadow-1-strong"
                                                    src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(29).webp"
                                                    alt="avatar" width="65" height="65" />
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
                                                <img class="rounded-circle shadow-1-strong"
                                                    src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(32).webp"
                                                    alt="avatar" width="65" height="65" />
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