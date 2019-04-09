@extends('layouts.video')

@section('content')

<div class="container-fluid">
    <div class="row mt-4">
        <div class="col-md-8 pl-4">
            <div class="row">
                <div class="col-md-12">
                    <iframe
                        class="w-100"
                        height="400px"
                        src="https://www.youtube.com/embed/{{$video->video_id}}?autoplay=1"
                        frameborder="0" 
                        allowfullscreen
                    >
                    </iframe>
                </div>
            </div>
            <h5 class="mt-3">{{$video->title}}</h5>
            <p>
                @if ($video->views > 0)
                    {{ number_format($video->views) }} views
                @else
                    No views
                @endif
            </p>
            <h6>{{ $video->channel_title }}</h6>
            <p class="text-muted">{{$video->description}}</p>
        </div>
        <div class="col-md-4">
        </div>
    </div>
</div>

@endsection
