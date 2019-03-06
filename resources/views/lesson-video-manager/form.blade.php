@extends('layouts.learn')

@section('content')

<div class="card  ml-2 mr-4 px-4 py-3">
    <div class="header">
        @if (isset($lessonVideo))
            <h4 class="title">Edit Lesson Video</h4>
        @else
            <h4 class="title">New Lesson Video</h4>
        @endif
    </div>
    <div class="content pt-3">
        <form
            class="form form-horizontal bg-white"
            name="training-course-form"
            action="/training-manager/courses/{{ $courseId }}/lessons/{{ $lessonId }}/videos{{ isset($lessonVideo) ? '/' . $lessonVideo->id : ''}}"
            method="POST"
        >
            {{ csrf_field() }}

            @if (isset($lessonVideo))
                {{ method_field('PUT') }}
            @endif

            <div class="form-group row">
                <div class="col-sm-12">
                    <input type="text" class="form-control" name="video_id" placeholder="Video Id"
                        value="{{ isset($lessonVideo) ? $lessonVideo->video_id : '' }}"
                    />
                </div>
                <div class="col-sm-6 mt-3">
                    <input type="text" class="form-control gurmukhi-font-2" name="name_punjabi" placeholder="nwm"
                        value="{{ isset($lessonVideo) ? $lessonVideo->name_punjabi : '' }}"
                    />
                </div>
                <div class="col-sm-6 mt-3">
                    <input type="text" class="form-control" name="name_english" placeholder="Name (English)"
                        value="{{ isset($lessonVideo) ? $lessonVideo->name_english : '' }}"
                    />
                </div>
                <div class="col-sm-12 mt-3">
                    <label>Description (Punjabi)</label>
                </div>
                <div class="col-sm-12">
                    <textarea class="form-control gurmukhi-font-2" name="description_punjabi" placeholder="vyrvw">{{ isset($lessonVideo) ? $lessonVideo->description_punjabi : '' }}</textarea>
                </div>
                <div class="col-sm-12 mt-3">
                    <label>Description (English)</label>
                </div>
                <div class="col-sm-12">
                    <textarea class="form-control" name="description_english" placeholder="Description (English)">{{ isset($lessonVideo) ? $lessonVideo->description_english : '' }}</textarea>
                </div>
                <div class="col-sm-4 mt-3">
                    <input type="text" class="form-control" name="order" placeholder="Order" value="{{ isset($lessonVideo) ? $lessonVideo->order : '' }}" />
                </div>
                <div class="col-sm-4 mt-3">
                    <input type="text" class="form-control" name="length" placeholder="Length" value="{{ isset($lessonVideo) ? $lessonVideo->length : '' }}" />
                </div>
            </div>
            <input type="submit" value="Save" class="btn btn-sm btn-secondary" />
        </form>
    </div>
</div>

@endsection