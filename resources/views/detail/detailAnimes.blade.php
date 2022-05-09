@extends('/general/headerFooter')
@section('content')

    <head>
        <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
        <link rel="stylesheet" href="{{ asset('css/general.css') }}">
        <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    @if (Session::has('AnimeAdded'))
        <div class="alert alert-success" role="alert">
            <strong>{{ Session::get('AnimeAdded') }}!</strong>
        </div>
    @endif
    <section class="container">
        <a href="{{ url('/content/contentAnimes') }}" class="btn button-purple my-4" title="Back"> {{trans('home.back')}}</a>

        <h1 class="detail-title">{{ $anime->name }}</h1>

        </div>
        </article>
        <div class="dropdown">
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                {{ trans('titles.add_favs') }}
            </button>
            <ul class="dropdown-menu">
                <li><a type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#myModal">{{ trans('titles.new_list') }}</a></li>
                @foreach ($userLists as $list)
                    <li><a class="dropdown-item" href="#">{{ $list->name }}</a></li>
                @endforeach
            </ul>
        </div>
        <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog text-dark">
                <div class="modal-content">

                    <form action="/detail/detailAnimes/{{ $anime->id }}/addNewList">
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" id="newListName" name="newListName" class="form-control"
                                    placeholder="Nombre de la lista">
                            </div>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button class="btn button-purple">{{ trans('titles.new_list') }}</button>
                            <a type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ trans('titles.close') }}</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <article>
            <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-share-alt"></i></button> -->
            <a type="button" class="btn btn-primary" href="#demo" data-bs-toggle="collapse"><i
                    class="fas fa-share-alt"></i></a>
            <!-- Modal -->
            <!-- <div class="modal fade-scale" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                {!! $shareComponent !!}
                            </div>
                        </div>
                    </div> -->
            <div id="demo" class="collapse">{!! $shareComponent !!}</div>
        </article>

        <article class="mt-4">
            @if ($anime->poster_path == null)
                <img src="/img/NoImg.jpg" class="img-thumbnail col-6 col-md-5 col-lg-4 mb-md-0" alt="">
            @else
                <img src="{{ $anime->poster_path }}" class="img-thumbnail col-6 col-md-5 col-lg-4 mb-md-0"
                    alt="Img {{ $anime->name }}">
            @endif
            <article class="col-6 more-info bg-dark p-3" id="datasheet">

                    <div class="d-none d-sm-flex nowrap">
                        <h6 class="pe-2"><b>{{ trans('titles.genre') }}:</b></h6>
                        <p>{{ $anime->genre->name }}</p>
                    </div>
                    <div class="d-none d-sm-flex nowrap">
                        <h6 class="pe-2"><b>{{ trans('titles.release') }}:</b></h6>
                        <p> {{ $anime->release_date }}</p>
                    </div>
                    <div class="d-none d-sm-flex nowrap">
                        <h6 class="pe-2"><b>{{ trans('titles.duration') }}:</b></h6>
                        <p> {{ $anime->duration }} min</p>
                    </div>
                    <div class="d-none d-sm-flex nowrap">
                        <h6 class="pe-2"><b>{{ trans('titles.total_episodes') }}:</b></h6>
                        <p> {{ $anime->total_episodes }}</p>
                    </div>
                    <div class="d-none d-sm-flex nowrap">
                        <h6 class="pe-2"><b>{{ trans('titles.rating') }}:</b></h6>
                        <p><i class="fas fa-star"></i>
                        <p> {{ $anime->puntuation }}</p>/10<p>
                    </div>

                    <div class="d-flex flex-column align-items-start">
                        <h6 class="pe-2"><b>{{ trans('titles.how_much') }}</b></h6>
                        <form method="GET" class="d-flex flex-column align-items-center col-12 mb-xl-2">
                            <div class="rating col-12 d-flex justify-content-center">
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
                            <button type="submit" class="btn button-purple col-6 mb-2 mb-xl-0">{{trans('content.send_rating')}}</button>
                        </form>
                    </div>
                    <?php
                    if (isset($_GET['stars'])) {
                        echo '<div class="alert alert-success">Rating recibido: <strong>' . $_GET['stars'] . '</strong>.</div>';
                    } elseif (isset($_GET['stars']) == '');
                    ?>
                    <div class="d-flex flex-row justify-content-center">
                            <a href="/detail/detailAnimes/{{ $anime->id }}/addFav"><button type="button"
                                    class="btn button-purple">{{trans('content.add_favourite')}}</button></a>
                            <div class="social-media-links mx-2">
                                <a class="btn button-purple" data-bs-toggle="collapse" href="#shareComponent" role="button"
                                    aria-expanded="false" aria-controls="shareComponent">
                                    <i class="fas fa-share-alt"></i>
                                </a>
                            </div>
                        </div>
                        <div class="collapse text-center" id="shareComponent">
                            {!! $shareComponent !!}
                        </div>
                    </article>
            </article>

            <div class="px-2">
                <h5 class="pt-4"><b>Resumen</b></h5>
                <p class="description col-12 d-flex">{{ $anime->description }}</p>

                <article class="d-sm-none">
                    <div class="d-flex flex-column">
                        <h5 class="pe-2"><b>Género:</b></h5>
                        <p>{{ $anime->genre->name }}</p>
                    </div>
                    <div class="d-flex flex-column">
                        <h5 class="pe-2"><b>Fecha de lanzamiento:</b></h5>
                        <p> {{ $anime->release_date }}</p>
                    </div>
                    <div class="d-flex flex-column">
                        <h5 class="pe-2"><b>Duración:</b></h5>
                        <p> {{ $anime->duration }} min</p>
                    </div>
                    <div class="d-flex flex-column">
                        <h5 class="pe-2"><b>Puntuación:</b></h5>
                        <p><i class="fas fa-star"></i> {{ $anime->puntuation }}/10<p>
                    </div>
                </article>
            </div>        


        <article class="d-flex flex-column flex wrap align-items-center p-3">
            <h3 class="text-uppercase pb-3">Tráiler</h3>
            <!-- START TRAILER SECTION -->
            @if ($anime->trailer_link != null)
                <iframe class="w-75" height="500"
                    src="https://www.youtube.com/embed/{{ $anime->trailer_link }}" allowfullscreen></iframe>
                <div class="alert alert-dark w-75 my-3" role="alert">
                    {{trans('warnings.video_error')}}
                    <a href="https://www.youtube.com/results?search_query={{ $anime->name }} trailer">Youtube</a>.
                </div>
            @endif
            <!-- END TRAILER SECTION -->
        </article>
        <article class="pb-3">
            <div class="text-center pt-3 "><span id="character-counter"></span></div>
            <form method="POST" action="" id="create-comment" class="create_comment">
                @csrf
                <textarea name="description" id="description" cols="50" rows="3" placeholder="Escribe un comentario"></textarea>
                <button class="btn button-purple mt-3" type="submit" id="commentSubmit">{{ trans('titles.publish') }}</button>
            </form>
            <div id="notify_user"></div>
            @if ($errors->has('description'))
                <div class="mt-2 alert alert-danger">
                    {{ trans('warnings.empty_msg') }}
                </div>
            @endif
        </article>
    </section>

    <!-- START COMMMENT SECTION -->
    <section class="gradient-custom">
        <div class="container my-5 py-5">
            <div class="row d-flex justify-content-center">
                <div class="col-12">
                    <div class="card card-comment bg-dark">
                        <div class="card-body card-body-comment p-4">
                            <h4 class="text-center mb-4 pb-2">{{ trans('titles.commentSection') }}</h4>

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
            </div>
    </section>
    <!-- END COMMENT SECTION -->
    <script type="text/javascript">
        $("#notify_user").css("display", "none");

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

                    let commentID = response.comment['id'];
                    let commentDescription = response.comment['description'];
                    let commentHtml =
                    `<div class="d-flex flex-start mb-4" id="content_id-${commentID}">
                        <div><img class="rounded-circle shadow-1-strong me-3" src="{{Auth::user()->image->path}}" width="65"height="65"></div>
                        <div class="flex-grow-1 flex-shrink-1"><div>
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="mb-1">{{ Auth::user()->nick }} <span class="text-muted" id="last-comment"></span></p> 
                                <a href="#!"><i class="fas fa-reply fa-xs"></i><span class="text-muted">reply</span></a> 
                            </div>
                            <p class="small mb-0 comment">${ commentDescription }</p>
                            </div>
                            <div class="like-container">
                                <span class="far fa-heart like-review btn-like" id="btn-like" data-id="${ commentID }"></span>
                                <span id="like-counter">0 likes</span>
                                <form class="mt-2" method="POST" action="/review/delete/${commentID}">
                                    @csrf
                                    <input type="hidden" id="${ commentID }" name="user-comment" value="${ commentID }">
                                    <button class="btn btn-outline-primary" type="submit">{{trans('titles.delete_review')}}</button>
                                </form>
                            </div>
                        </div>
                    </div>`

                    jQuery('#comment-container').append(commentHtml);
                    jQuery('#character-counter').css("display", "none");
                    
                    setTimeout(() => {
                        jQuery('body,html').animate({scrollTop: $(document).height()}, 5);
                    },500);
                    
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

        function like() {
            jQuery('.btn-like').unbind('click').click(function () {
                $(this).addClass('btn-dislike').removeClass('btn-like');
                $(this).addClass('fas').removeClass('far');
                $(this).css("color", "red");
                let comment_id = $(this).data('id');
                let ruta = `/like/${comment_id}`;
                //console.log(ruta);
                $.ajax({
                    type: "POST",
                    url: ruta,
                    data: {
                        '_token': $('input[name=_token]').val(),
                        review_id: comment_id,
                    },
                    success: function(data) {
                        //console.log(data.message);
                        if(data.like){
                            console.log("Has dado like de forma correcta");
                        }else {    
                            console.log("Error al dar like");
                        }   
                    }
                });
                dislike();

            })
        }

        like();

        
        function dislike() 
        {
            jQuery('.btn-dislike').unbind('click').click(function () {
                $(this).addClass('btn-like').removeClass('btn-dislike');
                $(this).addClass('far').removeClass('fas');
                $(this).css("color", "#FFFFFF");
                let comment_id = $(this).data('id');
                let ruta = `/dislike/${comment_id}`;
                $.ajax({
                    type: "POST",
                    url: ruta,
                    data: {
                        '_token': $('input[name=_token]').val(),
                        review_id: comment_id,
                    },
                    success: function(data){
                        if (data.like) {
                        console.log("Has dado dislike de forma correcta");
                        } else {
                            console.log("Error al dar dislike");
                        }
                    }
                });
                like();
            })
        }
        
        dislike();
    </script>
@endsection
