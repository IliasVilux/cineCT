@extends('headerFooter')
@section('content')

    <head>
        <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
    </head>

    @if (count($likes) === 0)
        <div class="notification-alert">
            <h4>Recent activity</h4>
            <div><i class="fab fa-gratipay"></i></div>
            <p>When someone likes on your reviews, you'll see it here</p>
        </div>
    @else
        <h2 class="text-center p-3 mb-4 mt-2">{{ trans('titles.activity') }}</h2>
        @foreach ($likes as $like)
                <div class="user-activity mb-2">
                    @if ($like->review->film)
                        <a href="{{ route('film.films', ['id' => $like->review->film->id]) }}">
                    @elseif($like->review->serie)
                        <a href="{{ route('serie.series', ['id' => $like->review->serie->id]) }}">
                    @else
                        <a href="{{ route('anime.animes', ['id' => $like->review->anime->id]) }}">
                    @endif
                    <div class="d-flex mb-2">
                        <div>
                            <img class="rounded-circle shadow-1-strong me-3"
                                src="https://i.pinimg.com/originals/bf/a5/3b/bfa53b2488eb224410ac1edfbecb2a34.png" alt="13"
                                width="65" height="65" />
                        </div>
                        <div>
                            <div class="user-activity__information">
                                <p class="mb-1"><strong>{{ $like->user->nick }}</strong> liked your review: <span class="text-secondary">{{$like->review->description}}</span>
                                    <span class="d-block text-secondary ml-2">{{ \DateTimeFormat::timeFilter($like->created_at) }}</span>
                                </p>
                                {{-- 
                                <div class="review-detail">
                                    @if ($like->review->film)
                                        <div><img src="{{ $like->review->film->poster_path }}" class="review-image-information" alt="Img"></div>
                                    @elseif($like->review->serie)
                                        <div><img src="{{ $like->review->serie->poster_path }}" class="review-image-information" alt="Img"></div>
                                    @else
                                        <div><img src="{{ $like->review->anime->poster_path }}" class="review-image-information" alt="Img"></div>
                                    @endif  
                                </div>
                            --}}
                                </div>

                            </div>
                        </div>
                    </div>
                    </a>
                </div>
        @endforeach
        {{-- Pagination --}}
        <div class="d-flex justify-content-center my-4">
            {{ $likes->links() }}
        </div>
    @endif

@endsection
