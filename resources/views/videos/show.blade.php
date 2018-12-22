@extends('layouts.video')

@section('content')

<div class="container-fluid">
    <div class="row mt-4">
        <div class="col-md-8 pl-4">
            <iframe
                class="w-100"
                height="400px"
                src="https://www.youtube.com/embed/{{$video->video_id}}"
                frameborder="0" 
                allowfullscreen
            >
            </iframe>
            <p>{{$video->title}}</p>
            <p class="text-muted">{{$video->description}}</p>
            
        </div>
        <div class="col-md-4">
        </div>
    </div>
</div>

@endsection
