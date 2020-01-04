@extends('dashboard.base')

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard/albums-manager">Albums</a></li>
        <li class="breadcrumb-item active" aria-current="page">
            @if ($diskAlbum->id > 0)
                Edit Album
            @else
                New Album
            @endif
        </li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header text-center bg-info text-white">
                @if ($diskAlbum->id > 0)
                    Edit Album
                @else
                    New Album
                @endif
            </div>
            <div class="card-body">
                <form name="new-album-form" class="form-horizontal"
                    @if ($diskAlbum->id > 0)
                        action="/dashboard/albums-manager/{{ $diskAlbum->id }}"
                    @else
                        action="/dashboard/albums-manager"
                    @endif
                    method="POST"
                >
                    {{ csrf_field() }}
                    @if ($diskAlbum->id > 0) {{ method_field('PUT') }} @endif
                    <div class="form-group row">
                        <label for="name_pan" class="col-sm-2 col-form-label text-right web-lipi-heavy">nwm</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control web-lipi-heavy" id="name_pan" name="name_pan" value="{{ $diskAlbum->name_pan }}">
                        </div>
                        <label for="name_eng" class="col-sm-2 col-form-label text-right">Name</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="name_eng" name="name_eng" value="{{ $diskAlbum->name_eng }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="disk_category_id" class="col-sm-2 col-form-label text-right">Category</label>
                        <div class="col-sm-4">
                            <select class="form-control" id="disk_category_id" name="disk_category_id">
                                @foreach ($categories as $category)
                                    <option
                                        value="{{ $category->id }}"
                                        @if ($diskAlbum->disk_category_id === $category->id) selected="selected" @endif
                                    >{{ $category->name_eng }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label for="disk_genre_id" class="col-sm-2 col-form-label text-right">Genre</label>
                        <div class="col-sm-4">
                            <select class="form-control" id="disk_genre_id" name="disk_genre_id">
                                @foreach ($genres as $genre)
                                    <option
                                        value="{{ $genre->id }}"
                                        @if ($diskAlbum->disk_genre_id === $genre->id) selected="selected" @endif
                                    >{{ $genre->name_eng }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="serial" class="col-sm-2 col-form-label text-right">Serial</label>
                        <div class="col-sm-2">
                            <input
                                type="text"
                                class="form-control"
                                id="serial"
                                value="{{ $diskAlbum->serial }}"
                                name="serial"
                            />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-info">Save</button>
                            <a href="/dashboard/albums-manager/{{ $diskAlbum->id }}/cover/create" class="btn btn-info">
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
                    action="/dashboard/albums-manager/{{ $diskAlbum->id }}"
                    method="POST"
                >
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <input type="hidden" name="id" value="{{ $diskAlbum->id }}" />
                </form>
            </div>
        </div>
    </div>
</div>

@if ($diskAlbum->id > 0)
    <div class="mt-3">
        <h4>
            Tracks
            <a
                href="/dashboard/albums-manager/{{ $diskAlbum->id }}/tracks/create"
                class="btn btn-info btn-sm float-right"
            ><i class="fas fa-plus"></i> Add Track</a>
        </h4>
        @if ($tracks->count() === 0)
            <div class="alert alert-info">
                No track exists for the album. Add one now.
            </div>
        @else
            <table class="table table-bordered bg-white text-center mt-4">
                <thead>
                    <tr>
                        <th class="web-lipi-heavy">nwm</th>
                        <th>Name</th>
                        <th>Duration</th>
                        <th>Artist</th>
                        <th>Serial</th>
                        <th style="width: 10px">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tracks as $track)
                        <tr>
                            <td class="web-lipi-heavy">{{ $track->name_pan }}</td>
                            <td>{{ $track->name_eng }}</td>
                            <td>{{ $track->duration }} mins</td>
                            <td>{{ $track->disk_artist_id }}</td>
                            <td>{{ $track->serial }}</td>
                            <td>
                                <a href="/dashboard/albums-manager/{{ $diskAlbum->id }}/tracks/{{ $track->id }}/edit"
                                    class="btn btn-link float-right text-secondary"
                                >
                                    <i class="far fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endif

@endsection