    <div class="d-flex flex-start mb-3" id="content_id-{{$comment->id}}">
        <div>
            <img class="img-review rounded-circle shadow-1-strong me-3" src="{{ $profile[0]->path }}" alt="13"/>
        </div>
        <div class="flex-grow-1 flex-shrink-1">
            <div class="d-flex flex-wrap flex-column align-items-start">
                <div class="col-12">
                    <p class="mb-1">{{ $comment->user->nick }} <span class="text-muted ms-2">{{\DateTimeFormat::timeFilter($comment->created_at)}}</span></p>
                </div>
                <p class="text-break m-0">{{ $comment->description }}</p>
            </div>
            <div class="like-container">

                <!--CHECKING IF USER'S LIKE ALREADY EXISTS-->
                <?php $user_like = false; ?>
                @foreach($comment->like as $like)
                    @if($like->user->id == Auth::user()->id)
                        <?php $user_like = true;?>
                    @endif
                @endforeach

                @if($user_like)
                    <span class="fas fa-heart like-review btn-dislike" id="btn-dislike" style="color:red;" data-id="{{$comment->id}}"></span>
                @else
                    <span class="far fa-heart like-review btn-like" id="btn-like" data-id="{{$comment->id}}"></span>
                @endif
                    <span id="like-counter">{{count($comment->like)}} likes</span>
            </div>
            
            {{--
            <!----START REPLY COMMENT---->
            <!-- <div class="d-flex flex-start mt-4">
                <a class="me-3" href="#"> <img class="rounded-circle shadow-1-strong me-3"
                        src="{{ $profile->path }}" alt="13" width="65" height="65" /></a>
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
            </div> -->
            <!----END REPLY COMMENT---->
            ---}}
        </div>
    </div>
