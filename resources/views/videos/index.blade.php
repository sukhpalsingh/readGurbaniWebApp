@extends('layouts.video')

@section('content')

<div class="container-fluid">
    <div class="row mt-2">
        <div id="filter-panel" class="filter-panel col-md-12 p-0">
            <div class="panel panel-default">
                <div class="panel-body pt-2 pb-2">
                    <form class="form-inline">
                        <div class="form-group">
                            <label for="upload_date" class="control-label ml-3 mr-2">Upload date</label>
                            <select id="upload_date" class="form-control">
                                <option>All Time</option>
                                <option>Today</option>
                                <option>This week</option>
                                <option>This month</option>
                                <option>This Year</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sort_by" class="control-label ml-3 mr-2">Sort By</label>
                            <select id="sort_by" class="form-control">
                                <option value="most_recent">Most Recent</option>
                                <option value="most_viewed">Most Viewed</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-8">
            @foreach ($videos as $video)
            <a href="/videos/{{$video->id}}">
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <img class="card-img-top" style="height: 10rem;" src="https://i.ytimg.com/vi/{{$video->video_id}}/mqdefault.jpg" alt="Card image cap">
                            </div>
                            <div class="col-md-6">
                                <p class="card-title">{{$video->title}}</p>
                                <p class="card-text"><small class="text-muted">{{$video->channel_title}} {{$video->published_at}}</small></p>
                                <p class="card-text"><small class="text-muted">{{$video->description}}</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach

            {{ $videos->links('pagination.default', ['pagination' => $pagination]) }}
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Artists
                </div>
                <div class="card-body">
                    @foreach($artists as $artist)
                        <p>
                            <a href="/videos/artists/{{ $artist->id }}">{{ $artist->name }}</a>
                        </p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
