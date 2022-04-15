@extends('headerFooter')
@section('content')

    <head>
        <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
    </head>

    <h2 class="text-center p-3 mb-4 mt-5">{{ trans('titles.activity') }}</h2>

    @foreach ($activity as $activity)
        <div class="user-activity mb-3">
            @if ($activity->review->film)
                <a href="{{ route('film.films', ['id' => $activity->review->film->id]) }}">
            @elseif($activity->review->serie)
                <a href="{{ route('serie.series', ['id' => $activity->review->serie->id]) }}">
            @else
                <a href="{{ route('anime.animes', ['id' => $activity->review->anime->id]) }}">
            @endif
            <div class="d-flex mb-2">
                <div>
                    <img class="rounded-circle shadow-1-strong me-3"
                        src="https://i.pinimg.com/originals/bf/a5/3b/bfa53b2488eb224410ac1edfbecb2a34.png" alt="13"
                        width="65" height="65" />
                </div>
                <div>
                    <div class="user-activity__information">

                        <p class="mb-1 "><strong>{{ $activity->user->name }}</strong> ha dado like a tu review
                            <span class="text-secondary ml-2">{{ \DateTimeFormat::timeFilter($activity->created_at) }}</span>
                        </p>
                    </div>
                </div>
            </div>
            </a>
        </div>
    @endforeach
@endsection
