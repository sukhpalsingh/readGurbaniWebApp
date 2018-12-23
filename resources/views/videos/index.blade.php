@extends('layouts.video')

@section('content')

<div class="container-fluid">
    <div class="row mt-2">
        <div class="col-md-8">
            @foreach ($videos as $video)
            <div class="card mb-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img class="card-img-top" style="height: 12rem;" src="https://i.ytimg.com/vi/{{$video->video_id}}/mqdefault.jpg" alt="Card image cap">
                        </div>
                        <div class="col-md-6">
                            <p class="card-title"><a href="/videos/{{$video->id}}">{{$video->title}}</a></p>
                            <p class="card-text"><small class="text-muted">{{$video->channel_title}} {{$video->published_at}}</small></p>
                            <p class="card-text"><small class="text-muted">{{$video->description}}</small></p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            {{ $videos->links() }}
        </div>
        <div class="col-md-4">
        </div>
    </div>
</div>

@endsection
