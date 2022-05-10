@extends('headerFooter')
@section('content')

    <head>
        <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
        <script type="text/javascript" src="http://www.google.com/jsapi"></script>
        <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">
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
    @if (Session::has('FilmAdded'))
        <div class="alert alert-success" role="alert">
            <strong>{{ Session::get('FilmAdded') }}!</strong>
        </div>
    @endif
    <section class="container">
        <a href="{{ url('/content/contentFilms') }}" class="btn button-purple my-4" title="Back">
            {{ trans('titles.back') }}
        </a>

        <h1 class="detail-title">{{ $film->name }}</h1>

        <article class="d-flex flex-column flex-sm-row flex-sm-wrap justify-content-between mt-4">
            @if ($film->poster_path == null)
                <img src="/img/NoImg.jpg" class="img-thumbnail col-12 col-md-5 col-lg-4 mb-4 mb-md-0" alt="">
            @else
                <img src="{{ $film->poster_path }}" class="img-thumbnail col-12 col-md-5 col-lg-4 mb-4 mb-md-0"
                    alt="Img {{ $film->name }}">
            @endif
            <article class="col-12 col-md-6 more-info bg-dark p-3">
                <div class="p-4">
                    <div class="d-flex nowrap">
                        <h5 class="pe-2"><b>{{ trans('titles.genre') }}:</b></h5>
                        <p id="film-genre">{{ \ContentGenre::TranslateGenre($film->genre->name) }}</p>
                    </div>
                    <div class="d-flex nowrap">
                        <h5 class="pe-2"><b>{{ trans('titles.release') }}:</b></h5>
                        <p> {{ $film->release_date }}</p>
                    </div>
                    <div class="d-flex nowrap">
                        <h5 class="pe-2"><b>{{ trans('titles.duration') }}:</b></h5>
                        <p> {{ $film->duration }} min</p>
                    </div>
                    <div class="d-flex nowrap">
                        <h5 class="pe-2"><b>{{ trans('titles.rating') }}:</b></h5>
                        <p><i class="fas fa-star"></i>
                        <p> {{ $film->puntuation }}</p>/10<p>
                    </div>
                    <div class="d-flex flex-column align-items-start">
                        <h5 class="pe-2"><b>{{ trans('titles.how_much') }}</b></h5>
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
                            <button type="submit"
                                class="btn button-purple btn-sm col-6 mb-2 mb-xl-0">{{ trans('content.send_rating') }}</button>
                        </form>
                    </div>
                    <?php
                    if (isset($_GET['stars'])) {
                        echo '<div class="alert alert-success">Rating recibido: <strong>' . $_GET['stars'] . '</strong>.</div>';
                    } elseif (isset($_GET['stars']) == '');
                    ?>
                    <div class="d-flex flex-row my-2">
                        <a href="/detail/detailFilms/{{ $film->id }}/addFav"><button type="button"
                                class="btn button-purple btn-md">{{ trans('content.add_favourite') }}</button></a>
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
            <p class="description pt-5" id="film-description">{{ $film->description }}</p>
        </article>
        <button class="btn btn-violet" onclick="translateDatabaseInfo()">{{ trans('home.show_translate') }}</button>

        <article class="pb-3">
            <div class="text-center pt-3 "><span id="character-counter"></span></div>
            <form method="POST" action="" id="create-comment" class="create_comment">
                @csrf
                <textarea name="description" id="description" cols="50" rows="3" placeholder="Escribe un comentario"></textarea>
                <button class="btn button-purple mt-3" type="submit"
                    id="commentSubmit">{{ trans('titles.publish') }}</button>
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
                                @if (count($comments) !== 0)
                                    <div class="d-flex justify-content-end comment-container__sort-container mb-3" id="short_by_likes">
                                        <a class="btn btn-order" style="border:1px solid #5A3C97; color:#ffffff;"
                                            id="{{ $film->id }}">
                                            <span class="comment-container__sort-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                    fill="currentColor" class="bi bi-filter-left" viewBox="0 0 16 16">
                                                    <path
                                                        d="M2 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
                                                </svg>
                                            </span>
                                            {{ trans('content.order_review') }}
                                        </a>
                                    </div>
                                @endif
                                <div class="col" id="comment-container">

                                    
                                    {{-- 
                                    @foreach ($commentsOrderByLikes as $commentsOrder)
                                        <?php $comment = $commentsOrder['comments'];?>
                                            @include('includes.review', ['comment' => $comment])
                                    @endforeach
                                    --}}
                                     
                                    @foreach ($comments as $comment)
                                        @if ($comment->film_id == $film->id && !empty($comment->description))
                                            @include('includes.review', ['comment' => $comment])
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="alert alert-success d-none" id="msg_div" role="alert"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        $("#notify_user").css("display", "none");

        if(jQuery('.loading-comments-order-by-likes')) {
            jQuery('.loading-comments-order-by-likes').remove();
        }

        jQuery('#create-comment').submit(function(e) {
            e.preventDefault();
            $("#commentSubmit").attr("disabled", true);
            var url = '{{ route('comment.save.film', ['id' => $film->id]) }}';
            var data = jQuery('#create-comment').serialize();
            jQuery('#commentSubmit').html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');

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
                    jQuery('#create-comment')[0].reset();
                    jQuery('.spinner-border').remove();
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
                        <div><img class="rounded-circle shadow-1-strong me-3" src="{{ Auth::user()->image->path }}" width="65"height="65"></div>
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
                                    <button class="btn btn-outline-primary" type="submit">{{ trans('titles.delete_review') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>`


                    jQuery('#comment-container').append(commentHtml);
                    jQuery('#character-counter').css("display", "none");

                    setTimeout(() => {
                        jQuery('body,html').animate({
                            scrollTop: $(document).height()
                        }, 5);
                    }, 500);

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
            jQuery('.btn-like').unbind('click').click(function() {
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
                        if (data.like) {
                            console.log("Has dado like de forma correcta");
                        } else {
                            console.log("Error al dar like");
                        }
                    }
                });
                dislike();

            })
        }

        like();


        function dislike() {
            jQuery('.btn-dislike').unbind('click').click(function() {
                $(this).addClass('btn-like').removeClass('btn-dislike');
                $(this).addClass('far').removeClass('fas');
                $(this).css("color", "#FFFFFF");
                let comment_id = $(this).data('id');
                let ruta = `/dislike/${comment_id}`;
                console.log(comment_id);
                $.ajax({
                    type: "POST",
                    url: ruta,
                    data: {
                        '_token': $('input[name=_token]').val(),
                        review_id: comment_id,
                    },
                    success: function(data) {
                        if (data.like) {
                            console.log("Has dado dislike de forma correcta");
                        } else {
                            console.log("Error al dar dislike");
                        }
                    },
                });
                like();
            })
        }

        dislike();


        //Short by likes with ajax
        jQuery('#short_by_likes').click(function() {
            let orderByLikes = 'order';
            jQuery('#comment-container').html(
                `<div class="text-center loading-comments-order-by-likes">
                    <div class="spinner-border text-light" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>`);
            $.ajax({
                    type: "GET",
                    url: `/detail/detailFilms/{{$film->id}}/${orderByLikes}`,
                    data: {
                        '_token': $('input[name=_token]').val(),
                        orderByLikes: orderByLikes,
                    },
                    success: function(response) {
                        if(response.status) {
                            jQuery('.loading-comments-order-by-likes').remove();
                            let allComments = response.commentsOrderByLikes;
                            let jsonResponse = [JSON.stringify(allComments)];
                            let commmentsContent = [];
                            
                            for (let k in allComments) {
                                commmentsContent.push(allComments[k]);
                            }

                            let contador = 0;
                            let allCommentsJson = [];
                            commmentsContent.forEach(function(comment, index) {
                                index = Object.keys(allComments)[contador];
                                //console.log(allComments[index]);
                                allCommentsJson.push(allComments[index]);
                                contador++;
                            })

                            allCommentsJson.forEach(function(commentJson, index) {
                                //metodoBurbuja(allCommentsJson[index])
                            })

                            //sortReponse(allCommentsJson);

                            console.table(allCommentsJson);
                            //metodoBurbuja(allCommentsJson);
                            //console.log(commmentsContent);
                            jQuery("#comment-container").html(jsonResponse)
                        }
                    },
                });

        });

        function translateDatabaseInfo() {
            let currentActiveLang = '<?= app()->getLocale() ?>';
            let contentDescription = document.getElementById("film-description");
            let contentGenre = document.getElementById("film-genre");
            let dataBaseContentLang = 'en';
            alert(currentActiveLang);

        }

        function sortReponse(data)
        {
            var sorted = [];
            $(data).each(function(k, v) {
                for(var key in v) {
                    sorted.push({key: key, value: v[key]})
                }
            });

            return sorted.sort(function(a, b){
                if (a.value < b.value) return -1;
                if (a.value > b.value) return 1;
                return 0;
            });
        }

        

        
    </script>
@endsection
