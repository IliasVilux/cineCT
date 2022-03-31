@extends('headerFooter')
@section('content')

<head>
    <link rel="stylesheet" href="{{asset('css/detail.css')}}">
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
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
    <a href="{{ url('/content/contentAnimes') }}" class="btn btn-primary" title="Home">
        Back
    </a>

    {!! $shareComponent !!}
    <h1 class="detail-title">{{$anime->name}}</h1>

    <article class="more-info bg-dark p-3">
        <div class="d-flex nowrap">
            <h5 class="pe-2"><b>Género:</b></h5>
            <p>{{$anime->genre_id}}</p>
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
        <div>
            <h5 class="pe-2"><b>Cuánto te ha gustado?</b></h5>
            <form method="GET" class="d-flex justify.content-start">
                <div class="rating d-inline ">
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
                <button type="submit" class="btn btn-primary btn-sm">Enviar</button>
            </form>
            <?php
            if (isset($_GET['stars'])) {
                echo '<div class="alert alert-success">Rating recibido: <strong>'.$_GET['stars'].'</strong>.</div>';
            }elseif ((isset($_GET['stars']) == "")){

            }
            ?>
        </div>
    </article>
    <article>
        <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-share-alt"></i></button> -->
        <a type="button" class="btn btn-primary" href="#demo" data-bs-toggle="collapse"><i class="fas fa-share-alt"></i></a>
        <!-- Modal -->
        <!-- <div class="modal fade-scale" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    {!! $shareComponent !!}
                </div>
            </div>
        </div> -->
        <div id="demo" class="collapse">{!! $shareComponent !!}</div>
        <div class="collapse" id="collapseExample">
            <div class="card card-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
            </div>
        </div>
    </article>

    <article class="mt-4">
        @if($anime->poster_path == NULL)
        <img src="/img/NoImg.jpg" class="img-thumbnail" alt="">
        @else
        <img src="{{$anime->poster_path}}" class="img-thumbnail" alt="Img {{$anime->name}}">
        @endif
    </article>





    <p class="description pt-5">{{$anime->description}}</p>

    <!-- <h3><b>Creado:</b> {{$anime->created_at}}</h3>
        <h3><b>Ultima actualización:</b> {{$anime->updated_at}}</h3> -->
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
<!-- END COMMENT SECTION -->
<script type="text/javascript">
    $("#notify_user").css("display", "none");

    var contador = 0;
    jQuery('#create-comment').submit(function(e) {
        e.preventDefault();
        $("#commentSubmit").attr("disabled", true);
        var url = '{{ route('comment.save.anime', ['id' => $anime->id]) }}';
        var data = jQuery('#create-comment')
            .serialize(); 
        jQuery('#commentSubmit').html(
            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'
        ); 

        $('#commentSubmit').addClass('loagindEffect');

        jQuery.ajax({
            url: url,
            data: data,
            type: 'POST',
            success: function(response) {
                jQuery("#commentSubmit").removeClass("loagindEffect");
                jQuery('#notify_user').html(
                    `<div class="alert alert-success" role="alert"><i class="fas fa-check-circle"></i>${response.msg}</div>`
                ); 
                jQuery('#notify_user').fadeIn("slow");
                jQuery('#create-comment')[0]
                    .reset(); 
                jQuery('.spinner-border')
                    .remove(); 
                jQuery('#commentSubmit').html('Publicar');
                jQuery('#notify_user').fadeOut(3000);
                setTimeout(() => {
                        jQuery('#commentSubmit').attr('disabled', false);
                    },
                    3900
                    ); 

                    contador++;
                    
                    let commentHtml =
                        `<div class="d-flex flex-start mb-4">
                        <div><img class="rounded-circle shadow-1-strong me-3" src="{{ $profile[0]->path }}" alt="13" width="65" height="65" /></div>
                        <div class="flex-grow-1 flex-shrink-1"><div>
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="mb-1">{{ Auth::user()->name }} <span class="text-muted" id="last-comment-${contador}"></span></p> 
                                <a href="#!"><i class="fas fa-reply fa-xs"></i><span class="text-muted">reply</span></a> 
                            </div>
                            <p class="small mb-0 comment">${ response.comment['description'] }</p>
                            </div>
                        </div>
                    </div>`
                    //console.log(response.comment);

                    jQuery('#comment-container').append(commentHtml);
                    var sinceDate = '{{\DateTimeFormat::timeFilter($comment->created_at)}}'
                    jQuery(`#last-comment-${contador}`).html(sinceDate);
                   
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

@endsection