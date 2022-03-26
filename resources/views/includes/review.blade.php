@if ($comment->film_id == $film->id && !empty($comment->description))
    <div class="d-flex flex-start mb-4">
        <div>
            <img class="rounded-circle shadow-1-strong me-3" src="{{ $profile[0]->path }}" alt="13" width="65"
                height="65" />
        </div>
        <div class="flex-grow-1 flex-shrink-1">
            <div>
                <div class="d-flex justify-content-between align-items-center">
                    <p class="mb-1">{{ $comment->user->name }} <span class="text-muted">- 2 hours
                            ago</span></p>
                    <a href="#!"><i class="fas fa-reply fa-xs"></i><span class="text-muted">reply</span></a>
                </div>
                <p class="small mb-0 comment">{{ $comment->description }}</p>
            </div>
            {{--
            <!----START REPLY COMMENT---->
            <div class="d-flex flex-start mt-4">
                <a class="me-3" href="#"> <img class="rounded-circle shadow-1-strong me-3"
                        src="{{ $profile[3]->path }}" alt="13" width="65" height="65" /></a>
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
@endif
