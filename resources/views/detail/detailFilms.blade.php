@extends('headerFooter')
@section('content')

    <head>
        <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
                crossorigin="anonymous"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}" />

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
        <a href="{{ url('/content/contentFilms') }}" class="btn btn-primary" title="Home">Home</a>

        {!! $shareComponent !!}
        <h1 class="detail-title">{{ $film->name }}</h1>

        <div class="d-flex flex-row align-items-center justify-content-around">
            <div class="d-flex flex-column align-items-center">
                <h3><b>Genero</b></h3>
                <strong class="fw-bold fs-3"> {{ $film->genre_id }}</strong>
            </div>
            <div class="d-flex flex-column align-items-center">
                <h3><b>Fecha de lanzamiento</b></h3>
                <strong class="fw-bold fs-3"> {{ $film->release_date }}</strong>
            </div>
            <div class="d-flex flex-column align-items-center">
                <h3><b>Duración</b></h3>
                <strong class="fw-bold fs-3"> {{ $film->duration }} min</strong>
            </div>

            <div class="d-flex flex-column align-items-center">
                <h3><b>Puntuación</b></h3>
                <div class="d-flex flex-row">
                    <h4><i class="fas fa-star"></i><strong class="fw-bold fs-3"> {{ $film->puntuation }}</strong>/10
                        <h4>
                </div>
            </div>

        </div>
        <div class="d-flex flex-row justify-content-around mt-4">
            @if ($film->poster_path == null)
                <img src="{{ url('storage/img/NoImg.jpg') }}" class="img-thumbnail" alt="">
            @else
                <img src="{{ $film->poster_path }}" class="img-thumbnail" alt="Img {{ $film->name }}">
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
            echo '<div class="alert alert-success">Rating recibido: <strong>' . $_GET['stars'] . '</strong>.</div>';
        }
        ?>

        <!-- START CONTENT -->

        <!-- <h3><b>Creado:</b> {{ $film->created_at }}</h3>
                                                                <h3><b>Ultima actualización:</b> {{ $film->updated_at }}</h3> -->

        <p class="description fs-2 pt-5">{{ $film->description }}</p>

        <a class="btn btn-primary" class="add-comment" href="#create-comment">Añadir comentario</a>
    </section>
    <!-- END CONTENT -->
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
                                                        <p class="small mb-0 comment">{{ $comment->description }}</p>
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
                    <div class="text-center pt-3 "><span id="character-counter"></span></div>
                    <form method="POST" action="" id="create-comment" class="create_comment">
                        @csrf
                        <textarea name="description" id="description" cols="50" rows="3" placeholder="Escribe un comentario"></textarea>
                        <button class="btn" type="submit" id="commentSubmit">Publicar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        $("#notify_user").css("display", "none");

        jQuery('#create-comment').submit(function(e) {
            e.preventDefault();
            $("#commentSubmit").attr("disabled", true); // deshabilitamos el boton de publicar
            var url = '{{ route('comment.save', ['id' => $film->id]) }}';
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
                    jQuery( "#commentSubmit" ).removeClass( "loagindEffect" );
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
                    3900); // removemos el 'desabled 'para que el usuario pueda interactuar de nuevo con el botón

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
                    jQuery( "#commentSubmit" ).removeClass( "loagindEffect" );
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
                
                location.reload();
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

    <!-- END COMMENT SECTION -->
@endsection
