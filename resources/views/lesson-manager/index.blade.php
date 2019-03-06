@extends('layouts.learn')

@section('content')

<div class="row pr-4">
    <div class="col-sm-12">
        <a href="/training-manager/courses/{{ $courseId }}/lessons/create" class="float-right btn btn-sm btn-secondary"><i class="fas fa-plus"></i> Add Lesson</a>
    </div>
</div>
<div class="row pr-4 mt-2">
    <div class="col-sm-12">
        <ul class="list-group">
        @foreach ($lessons as $lesson)
            <li class="list-group-item">
                <a href="/training-manager/courses/{{ $courseId }}/lessons/{{ $lesson->id }}/edit" class="gurmukhi-font-2">
                    {{ $lesson->name_punjabi }}

                    <a href="/training-manager/courses/{{ $courseId }}/lessons/{{ $lesson->id }}/videos" class="float-right"><i class="fas fa-video"></i></a>
                </a>
            </li>
        @endforeach
        </ul>
    </div>
</div>

@endsection
