@extends('dashboard.base')

@section('buttons')

<a href="/dashboard/albums-manager/create" class="btn btn-sm btn-success">
    Create Album <i class="fas fa-plus"></i>
</a>

@endsection

@section('content')

<table class="table table-bordered bg-white text-center mt-4">
    <thead>
        <tr>
            <th class="web-lipi-heavy">nwm</th>
            <th>Name</th>
            <th>Category</th>
            <th>Genre</th>
            <th>Serial</th>
            <th style="width: 10px">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($albums->items() as $album)
            <tr>
                <td class="web-lipi-heavy">{{ $album->name_pan }}</td>
                <td>{{ $album->name_eng }}</td>
                <td>{{ $album->disk_category_id }}</td>
                <td>
                    {{ $album->disk_genre_id }}
                </td>
                <td>
                    {{ $album->serial }}
                </td>
                <td>
                    <a href="/dashboard/albums-manager/{{ $album->id }}/edit" class="btn btn-link float-right text-secondary">
                        <i class="far fa-edit"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection