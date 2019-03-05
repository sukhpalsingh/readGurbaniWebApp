@extends('layouts.learn')

@section('content')

<div class="row pr-4">
    <div class="col-sm-12">
        <a href="/training-manager/courses/create" class="float-right btn btn-sm btn-primary"><i class="fas fa-plus"></i> Add Course</a>
    </div>
</div>
<div class="row pr-4 mt-2">
    <div class="col-sm-12">
        <ul class="list-group">
        @foreach ($courses as $course)
            <li class="list-group-item">
                <a href="/training-manager/courses/{{ $course->id }}/edit" class="gurmukhi-font-2">
                    {{ $course->name_punjabi }}
                </a>
                <a href="/training-manager/courses/{{ $course->id }}/chapters" class="float-right">
                    <i class="fas fa-clipboard-list"></i>
                </a>
            </li>
        @endforeach
        </ul>
    </div>
</div>

@endsection
