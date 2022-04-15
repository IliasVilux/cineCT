    <div class="d-flex flex-start mb-4">
        <div>
            <img class="rounded-circle shadow-1-strong me-3" src="{{ $profile[0]->path }}" alt="13" width="65"
                height="65" />
        </div>
        <div class="flex-grow-1 flex-shrink-1">
            <div>
                <div class="d-flex justify-content-between align-items-center">
                    <p class="mb-1">{{ $comment->user->name }} <span class="text-muted ml-2">{{\DateTimeFormat::timeFilter($comment->created_at)}}</span></p>
                    <a href="#!"><i class="fas fa-reply fa-xs"></i><span class="text-muted">reply</span></a>
                </div>
                <p class="small mb-0 comment">{{ $comment->description }}</p>
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
                    <span class="far fa-heart like-review btn-like" id="btn-like" style="color:#ffffff;" data-id="{{$comment->id}}"></span>
                @endif
                    <span id="like-counter">{{count($comment->like)}} likes</span>
            </div>
            
            {{--
            <!----START REPLY COMMENT---->
            <div class="d-flex flex-start mt-4">
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
            </div>
            <!----END REPLY COMMENT---->
            ---}}
        </div>
    </div>
