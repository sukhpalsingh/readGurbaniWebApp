@extends('layouts.learn')

@section('content')

<div class="row pr-4">
    <div class="col-sm-12">
        <a href="/training-manager/courses/{{ $courseId }}/lessons/{{ $lessonId}}/videos/create" class="float-right btn btn-sm btn-secondary"><i class="fas fa-plus"></i> Add Video</a>
    </div>
</div>
<div class="row pr-4 mt-2">
    <div class="col-sm-12">
        <ul class="list-group">
        @foreach ($lessonVideos as $lessonVideo)
            <li class="list-group-item">
                <a href="/training-manager/courses/{{ $courseId }}/lessons/{{ $lessonId }}/videos/{{ $lessonVideo->id }}/edit" class="gurmukhi-font-2">
                    {{ $lessonVideo->name_punjabi }}
                </a>
            </li>
        @endforeach
        </ul>
    </div>
</div>

@endsection
