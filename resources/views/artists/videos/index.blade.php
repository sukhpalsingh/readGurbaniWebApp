@extends('layouts.video')

@section('content')

<div class="container-fluid">
    <div id="filter-panel" class="row mt-2 d-none">
        <div class="filter-panel col-md-12 p-0">
            <div class="panel panel-default">
                <div class="panel-body pt-2 pb-2">
                    <form id="video-filters-form" name="video-filters-form" action="/artists/{{ $videoSearchKeyword->id }}/videos" class="form-inline" method="_GET">
                        <div class="form-group">
                            <label for="upload_date" class="control-label ml-3 mr-2">Upload date</label>
                            @include(
                                'form.select',
                                [
                                    'attributes' => [
                                        'id' => 'upload_date',
                                        'name' => 'upload_date',
                                        'onchange' => "$('#video-filters-form').submit();",
                                    ],
                                    'options' => [
                                        ['', 'All Time'],
                                        ['today', 'Today'],
                                        ['this_week', 'This week'],
                                        ['this_month', 'This month'],
                                        ['this_year', 'This year'],
                                    ],
                                    'value' => $formData['upload_date'] ?? ''
                                ]
                            )
                        </div>
                        <div class="form-group">
                            <label for="sort_by" class="control-label ml-3 mr-2">Sort By</label>
                            @include(
                                'form.select',
                                [
                                    'attributes' => [
                                        'id' => 'sort_by',
                                        'name' => 'sort_by',
                                        'onchange' => "$('#video-filters-form').submit();",
                                    ],
                                    'options' => [
                                        ['most_recent', 'Most Recent'],
                                        ['most_viewed', 'Most Viewed'],
                                    ],
                                    'value' => $formData['sort_by'] ?? ''
                                ]
                            )
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-7">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/videos">Videos</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $videoSearchKeyword->name }}</li>
                </ol>
            </nav>
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
    </div>
</div>

@endsection
