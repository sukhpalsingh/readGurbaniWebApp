@extends('dashboard.base')

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard/albums-manager">Albums</a></li>
        <li class="breadcrumb-item active" aria-current="page">New Album</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header text-center bg-info text-white">New Album</div>
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
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection