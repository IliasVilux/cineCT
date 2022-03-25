@extends('headerFooter')
@section('content')

<head>
    <link rel="stylesheet" href="{{asset('css/detail.css')}}">
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="js/jquery.rating.pack.js"></script>
    <script>
    $(document).ready(function() {
        $('input.star').rating();
    });
    </script>
    <style>
        div#social-links {
            margin: 0 auto;
            max-width: 500px;
        }
        div#social-links ul li {
            display: inline-block;
        }          
        div#social-links ul li a {
            padding: 20px;
            margin: 1px;
            font-size: 30px;
            color: #9966ff;
        }
    </style>
</head>
<section class="container">
    <a href="{{ url('/content/contentSeries') }}" class="btn btn-primary" title="Home">
        Home
    </a>

    {!! $shareComponent !!}

    <h1 class="detail-title">{{$serie->name}}</h1>

    <div class="d-flex flex-row align-items-center justify-content-around">
        <div class="d-flex flex-column align-items-center">
            <h3><b>Genero</b></h3>
            <strong class="fw-bold fs-3"> {{$serie->genre_id}}</strong>
        </div>
        <div class="d-flex flex-column align-items-center">
            <h3><b>Fecha de lanzamiento</b></h3>
            <strong class="fw-bold fs-3"> {{$serie->release_date}}</strong>
        </div>
        <div class="d-flex flex-column align-items-center">
            <h3><b>Temporadas</b></h3>
            <strong class="fw-bold fs-3"> {{$serie->seasons}}</strong>
        </div>

        <div class="d-flex flex-column align-items-center">
            <h3><b>Episodios</b></h3>
            <strong class="fw-bold fs-3"> {{$serie->total_episodes}}</strong>
        </div>
        <div class="d-flex flex-column align-items-center">
            <h3><b>Puntuación</b></h3>
            <div class="d-flex flex-row">
                <h4><i class="fas fa-star"></i><strong class="fw-bold fs-3"> {{$serie->puntuation}}</strong>/10<h4>
            </div>
        </div>
    </div>

    <div class="d-flex flex-row justify-content-around mt-4">
        @if($serie->poster_path == NULL)
        <img src="{{url('storage/img/NoImg.jpg')}}" class="img-thumbnail" alt="">
        @else
        <img src="{{$serie->poster_path}}" class="img-thumbnail" alt="Img {{$serie->name}}">
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

    <p class="description fs-2 pt-5">{{$serie->description}}</p>
    <!-- <h3><b>Creado:</b> {{$serie->created_at}}</h3>
    <h3><b>Ultima actualización:</b> {{$serie->updated_at}}</h3> -->

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
                            <div class="col" id="comment-container">
                                @foreach ($comments as $comment)
                                    @if ($comment->film_id == $film->id && !empty($comment->description))
                                        <div class="d-flex flex-start mb-4">
                                            <div>
                                                <img class="rounded-circle shadow-1-strong me-3"
                                                    src="{{ $profile[0]->path }}" alt="13" width="65" height="65" />
                                            </div>
                                            <div class="flex-grow-1 flex-shrink-1">
                                                <div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <p class="mb-1">{{ $comment->user->name }} <span
                                                                class="text-muted">- 2 hours ago</span></p>
                                                        <a href="#!"><i class="fas fa-reply fa-xs"></i><span
                                                                class="text-muted">reply</span></a>
                                                    </div>
                                                    <p class="small mb-0">{{ $comment->description }}</p>
                                                </div>
                                                {{-- <div class="d-flex flex-start mt-4">
                                                <a class="me-3" href="#"> <img class="rounded-circle shadow-1-strong me-3" src="{{$profile[3]->path}}" alt="13"width="65" height="65" /></a>
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
                                             </div> --}}
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="alert alert-success d-none" id="msg_div" role="alert">

                        </div>
                    </div>
                </div>
                @if ($errors->has('description'))
                    <div class="mt-2 alert alert-danger">
                        No puedes publicar un comentario sin vacío!
                    </div>
                @endif
                <div id="notify_user"></div>
                <form method="POST" action="" id="create-comment" class="create_comment">
                    @csrf
                    <textarea name="description" id="description" cols="50" rows="1" placeholder="Escribe aqui tu comentario"></textarea>
                    <button class="btn btn-primary" type="submit" id="commentSubmit">Publicar</button>
                </form>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">

    $("#notify_user").css("display", "none");

    jQuery('#create-comment').submit(function(e) {
        e.preventDefault();$("#commentSubmit").attr("disabled", true); // deshabilitamos el boton de publicar
        var url = '{{ route('comment.save', ['id' => $film->id]) }}';
        var data = jQuery('#create-comment').serialize(); // obtenemos toda la data del form
        jQuery('#commentSubmit').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'); //agregamos un spinner al boton al darle click, mientras no complete la peticion se seguirá mostrando el spinner
        jQuery.ajax({
            url: url,
            data: data,
            type: 'POST',
            success: function(response) {                    
                console.log(response);
                jQuery('#notify_user').html(`<div class="alert alert-success" role="alert">${response.msg}</div>`);
                jQuery('#notify_user').fadeIn("slow");
                jQuery('#create-comment')[0].reset(); // una vez la peticion se complete y no de error, el input se reiniciarà :D
                jQuery('.spinner-border').remove(); // una vez haya echo la petición y lo haya guardado en la bases de datos procedemos a eliminar el spinner
                jQuery('#commentSubmit').html('Publicar'); //eliminamos el spinner
                jQuery('#notify_user').fadeOut(3000);
                setTimeout(() => {jQuery('#commentSubmit').attr('disabled', false);},3200); // removemos el desabled para que el usuario pueda interactuar de nuevo con el boton
                
                let commentHtml = 
                `<div class="d-flex flex-start mb-4">
                    <div><img class="rounded-circle shadow-1-strong me-3" src="{{ $profile[0]->path }}" alt="13" width="65" height="65" /></div>
                    <div class="flex-grow-1 flex-shrink-1"><div>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="mb-1">${ response.comment['user_id'] } <span class="text-muted">- 2 hours ago</span></p> 
                            <a href="#!"><i class="fas fa-reply fa-xs"></i><span class="text-muted">reply</span></a> 
                        </div>
                        <p class="small mb-0">${ response.comment['description'] }</p>
                        </div>
                    </div>
                </div>`
                
                jQuery('#comment-container').append(commentHtml);
            },
            error: function(response) {
                jQuery('#notify_user').html(`<div class="alert alert-danger" role="alert">No puedes publicar un comentario vacío!</div>`);
                jQuery('#notify_user').fadeIn("slow");
                jQuery('.spinner-border').remove();
                jQuery('#commentSubmit').html('Publicar');
                jQuery('#notify_user').fadeOut(3000);
                setTimeout(() => {jQuery('#commentSubmit').attr('disabled', false);}, 3300);
            }
        })

    });
    

</script>
<!-- END COMMENT SECTION -->
@endsection