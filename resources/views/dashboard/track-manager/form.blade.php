@extends('dashboard.base')

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard/albums-manager">Albums</a></li>
        <li class="breadcrumb-item"><a href="/dashboard/albums-manager" class="web-lipi-heavy">{{ $album->name_pan }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">
            @if ($albumTrack->id > 0)
                Edit Track Details
            @else
                Add Track Details
            @endif
        </li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header text-center bg-info text-white">
                @if ($albumTrack->id > 0)
                    Edit Track
                @else
                    Add Track
                @endif
            </div>
            <div class="card-body">
                <form name="new-album-form" class="form-horizontal"
                    @if ($albumTrack->id > 0)
                        action="/dashboard/albums-manager/{{ $album->id }}/tracks/{{ $albumTrack->id }}"
                    @else
                        action="/dashboard/albums-manager/{{ $album->id }}/tracks"
                    @endif
                    method="POST"
                >
                    {{ csrf_field() }}

                    <input type="hidden" name="disk_album_id" value="{{ $album->id }}" />

                    @if ($albumTrack->id > 0)
                        {{ method_field('PUT') }}
                    @endif

                    <div class="form-group row">
                        <label for="name_pan" class="col-sm-2 col-form-label text-right web-lipi-heavy">nwm</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control web-lipi-heavy" id="name_pan" name="name_pan" value="{{ $albumTrack->name_pan }}">
                        </div>
                        <label for="name_eng" class="col-sm-2 col-form-label text-right">Name</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="name_eng" name="name_eng" value="{{ $albumTrack->name_eng }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="disk_artist_id" class="col-sm-2 col-form-label text-right">Artist</label>
                        <div class="col-sm-4">
                            <select class="form-control" id="disk_artist_id" name="disk_artist_id">
                                @foreach ($artists as $artist)
                                    <option
                                        value="{{ $artist->id }}"
                                        @if ($albumTrack->disk_artist_id === $artist->id) selected="selected" @endif
                                    >{{ $artist->name_eng }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label for="duration" class="col-sm-2 col-form-label text-right">Duration</label>
                        <div class="col-sm-4">
                            <input
                                type="text"
                                class="form-control"
                                id="duration"
                                value="{{ $albumTrack->duration }}"
                                name="duration"
                            />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="url" class="col-sm-2 col-form-label text-right">Url</label>
                        <div class="col-sm-10">
                            <input
                                type="text"
                                class="form-control"
                                id="url"
                                value="{{ $albumTrack->url }}"
                                name="url"
                            />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="serial" class="col-sm-2 col-form-label text-right">Serial</label>
                        <div class="col-sm-2">
                            <input
                                type="text"
                                class="form-control"
                                id="serial"
                                value="{{ $albumTrack->serial }}"
                                name="serial"
                            />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-info">Save</button>
                            <a href="/dashboard/albums-manager/{{ $albumTrack->id }}/cover" class="btn btn-info">
                                <i class="fas fa-compact-disc fa-1x"></i> Generate Cover
                            </a>
                            <button
                                type="button"
                                class="btn btn-danger"
                                onclick="if (window.confirm('Are you sure to delete this album?')) { $('#new-album-delete-form').submit(); }"
                            >Delete</button>
                        </div>
                    </div>
                </form>
                <form
                    id='new-album-delete-form'
                    name="new-album-delete-form"
                    action="/dashboard/albums-manager/{{ $albumTrack->id }}"
                    method="POST"
                >
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <input type="hidden" name="id" value="{{ $albumTrack->id }}" />
                </form>
            </div>
        </div>
    </div>
</div>

@endsection