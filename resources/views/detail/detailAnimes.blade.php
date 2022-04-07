@extends('headerFooter')
@section('content')

<head>
    <link rel="stylesheet" href="{{asset('css/detail.css')}}">
    <link rel="stylesheet" href="{{asset('css/general.css')}}">
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
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
        padding: 18px;
        font-size: 30px;
        color: #9966ff;
    }
    </style>
</head>
@if (Session::has('AnimeAdded'))
<div class="alert alert-success" role="alert">
    <strong>{{ Session::get('AnimeAdded') }}!</strong>
</div>
@endif
<section class="container">
    <a href="{{ url('/content/contentAnimes') }}" class="btn button-purple my-4" title="Back"> Back</a>

    <h1 class="detail-title">{{$anime->name}}</h1>

    <article class="d-flex flex-column flex-sm-row flex-sm-wrap justify-content-between mt-4">
        @if($anime->poster_path == NULL)
        <img src="/img/NoImg.jpg" class="img-thumbnail col-12 col-md-5 mb-4 mb-md-0" alt="">
        @else
        <img src="{{$anime->poster_path}}" class="img-thumbnail col-12 col-md-5 mb-4 mb-md-0" alt="Img {{$anime->name}}">
        @endif
        <article class="col-12 col-md-6 more-info bg-dark p-3">
            <div>
                <div class="d-flex nowrap">
                    <h5 class="pe-2"><b>Género:</b></h5>
                    <p>{{$anime->genre->name}}</p>
                </div>
                <div class="d-flex nowrap">
                    <h5 class="pe-2"><b>Fecha de lanzamiento:</b></h5>
                    <p> {{$anime->release_date}}</p>
                </div>
                <div class="d-flex nowrap">
                    <h5 class="pe-2"><b>Duración:</b></h5>
                    <p> {{$anime->duration}} min</p>
                </div>
                <div class="d-flex nowrap">
                    <h5 class="pe-2"><b>Episodios:</b></h5>
                    <p> {{$anime->total_episodes}}</p>
                </div>
                <div class="d-flex nowrap">
                    <h5 class="pe-2"><b>Puntuación:</b></h5>
                    <p><i class="fas fa-star"></i>
                    <p> {{$anime->puntuation}}</p>/10<p>
                </div>
                <div class="d-flex flex-column align-items-start">
                    <h5 class="pe-2"><b>Cuánto te ha gustado?</b></h5>
                    <form method="GET" class="d-flex flex-column flex-xl-row align-items-center">
                        <div class="rating col-12 me-3">
                            <input name="stars" id="e1" type="radio" value="10"><label for="e1">☆</label>
                            <input name="stars" id="e2" type="radio" value="9"><label for="e2">☆</label>
                            <input name="stars" id="e3" type="radio" value="8"><label for="e3">☆</label>
                            <input name="stars" id="e4" type="radio" value="7"><label for="e4">☆</label>
                            <input name="stars" id="e5" type="radio" value="6"><label for="e5">☆</label>
                            <input name="stars" id="e6" type="radio" value="5"><label for="e6">☆</label>
                            <input name="stars" id="e7" type="radio" value="4"><label for="e7">☆</label>
                            <input name="stars" id="e8" type="radio" value="3"><label for="e8">☆</label>
                            <input name="stars" id="e9" type="radio" value="2"><label for="e9">☆</label>
                            <input name="stars" id="e10" type="radio" value="1"><label for="e10">☆</label>
                        </div>
                        <button type="submit" class="btn button-purple btn-sm col-6 mb-2 mb-xl-0">Enviar</button>
                    </form>
                </div>
                <?php
                if (isset($_GET['stars'])) {
                    echo '<div class="alert alert-success">Rating recibido: <strong>'.$_GET['stars'].'</strong>.</div>';
                }elseif ((isset($_GET['stars']) == ""))
                ?>
                <div class="d-flex flex-row">
                    <a href="/detail/detailAnimes/{{$anime->id}}/addFav"><button type="button"
                            class="btn button-purple btn-md">Añadir a favoritos</button></a>
                    <div class="social-media-links mx-2">
                        <a class="btn button-purple" data-bs-toggle="collapse" href="#shareComponent" role="button"
                            aria-expanded="false" aria-controls="shareComponent">
                            <i class="fas fa-share-alt"></i>
                        </a>
                    </div>
                </div>
                <div class="collapse my-3" id="shareComponent">
                    {!! $shareComponent !!}
                </div>
        </article>
        <p class="description pt-5">{{$anime->description}}</p>
    </article>

    <article class="pb-3">
        <form method="POST" action="" id="create-comment" class="create_comment">
            @csrf
            <textarea name="description" id="description" cols="50" rows="3"
                placeholder="Escribe un comentario"></textarea>
            <button class="btn button-purple mt-3" type="submit" id="commentSubmit">Publicar</button>
        </form>
    </article>
    <article class="d-flex flex-column flex wrap align-items-center p-3">
        <h3 class="text-uppercase pb-3">Tráiler</h3>
        <!-- START TRAILER SECTION -->
        @if($anime->trailer_link != null)
        <iframe class="w-75" height="500" src="https://www.youtube.com/embed/{{$anime->trailer_link}}"
            allowfullscreen></iframe>
        <div class="alert alert-dark w-75 my-3" role="alert">
            Si el vídeo da error es porque el link no funciona. Pero te invitamos a buscar el trailer en <a
                href="https://www.youtube.com/results?search_query={{$anime->name}} trailer">Youtube</a> y descubrir más
            sobre este anime.
        </div>
        @endif
        <!-- END TRAILER SECTION -->
    </article>
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
                                @if ($comment->anime_id == $anime->id && !empty($comment->description))
                                @include('includes.review', ['comment' => $comment])
                                @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="alert alert-success d-none" id="msg_div" role="alert">

                        </div>
                    </div>
                </div>
            </div>
            @if ($errors->has('description'))
            <div class="mt-2 alert alert-danger">
                No puedes publicar un comentario sin vacío!
            </div>
            @endif
            <div id="notify_user"></div>
            <div class="text-center pt-3 "><span id="character-counter"></span></div>
        </div>
    </div>
    </div>
</section>

<script type="text/javascript">
        $("#notify_user").css("display", "none");

        jQuery('#create-comment').submit(function(e) {
            e.preventDefault();
            $("#commentSubmit").attr("disabled", true); // deshabilitamos el boton de publicar
            var url = '{{ route('comment.save.anime', ['id' => $anime->id]) }}';
            var data = jQuery('#create-comment')
                .serialize(); // serializamos los datos para trabajr con ellos en el backend
            jQuery('#commentSubmit').html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'
            ); //agregamos un spinner al boton al darle click, mientras no complete la peticion se seguirá mostrando el spinner

            $('#commentSubmit').addClass('loagindEffect');

            jQuery.ajax({
                url: url,
                data: data,
                type: 'POST',
                success: function(response) {
                    jQuery("#commentSubmit").removeClass("loagindEffect");
                    jQuery('#notify_user').html(
                        `<div class="alert alert-success" role="alert"><i class="fas fa-check-circle"></i>${response.msg}</div>`
                    ); //el msg hace referencia al 'msg' en el return en el controlador (en este caso al ReviewController)
                    jQuery('#notify_user').fadeIn("slow");
                    jQuery('#create-comment')[0]
                        .reset(); // una vez la peticion se complete , el textarea se reiniciarà :D
                    jQuery('.spinner-border')
                        .remove(); // una vez haya echo la petición y lo haya guardado en la bases de datos, el spiner lo elimanos
                    jQuery('#commentSubmit').html('Publicar');
                    jQuery('#notify_user').fadeOut(3000);
                    setTimeout(() => {
                            jQuery('#commentSubmit').attr('disabled', false);
                        },
                        3900
                        ); // removemos el 'desabled 'para que el usuario pueda interactuar de nuevo con el botón

                    let commentHtml =
                        `<div class="d-flex flex-start mb-4">
                    <div><img class="rounded-circle shadow-1-strong me-3" src="{{ $profile[0]->path }}" alt="13" width="65" height="65" /></div>
                    <div class="flex-grow-1 flex-shrink-1"><div>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="mb-1">{{ Auth::user()->name }} <span class="text-muted">- 2 hours ago</span></p> 
                            <a href="#!"><i class="fas fa-reply fa-xs"></i><span class="text-muted">reply</span></a> 
                        </div>
                        <p class="small mb-0 comment">${ response.comment['description'] }</p>
                        </div>
                    </div>
                </div>`

                    jQuery('#comment-container').append(commentHtml);
                    jQuery('#character-counter').css("display", "none");

                },
                error: function(response) {
                    jQuery("#commentSubmit").removeClass("loagindEffect");
                    showInputErrors();
                    jQuery('#notify_user').fadeIn("slow");
                    jQuery('.spinner-border').remove();
                    jQuery('#commentSubmit').html('Publicar');
                    jQuery('#notify_user').fadeOut(4000);
                    setTimeout(() => {
                        jQuery('#commentSubmit').attr('disabled', false);
                    }, 4900);
                }
            })

        });


        const showInputErrors = () => {

            const description = $('#description').val();


            if (description == '') {
                jQuery('#notify_user').html(
                    `<div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-circle"></i>Tu comentario esta vacío.</div>`
                );
            } else if (description.length > 255) {
                jQuery('#notify_user').html(
                    `<div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-circle"></i>Tu comentario es demasiado largo.</div>`
                );
            } else {
                jQuery('#notify_user').html(
                    `<div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-circle"></i>Ha ocurrido un error al publicar tu comentario.</div>`
                );

                //location.reload();
            }

        }

        const characterLiveCount = () => {
            const description = document.getElementById('description');
            const characterCounter = document.getElementById('character-counter');

            description.addEventListener("input", () => {
                let count = (description.value).length;
                document.getElementById("character-counter").textContent = `Caracteres: ${count}/255`;
                if (count >= 0 && count < 165) {
                    characterCounter.style.color = "white";
                } else if (count >= 165 && count <= 255) {
                    characterCounter.style.color = "yellow";
                } else {
                    characterCounter.style.color = "red";
                }

                if (count == 0) {
                    characterCounter.style.display = "none";
                } else {
                    characterCounter.style.display = "inline";
                }
            });

        }

        characterLiveCount();
    </script>
@endsection
