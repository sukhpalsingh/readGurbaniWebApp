@extends('layouts.learn')

@section('content')

<div class="card  ml-2 mr-4 px-4 py-3">
    <div class="header">
        @if (isset($lesson))
            <h4 class="title">Edit Lesson</h4>
        @else
            <h4 class="title">New Lesson</h4>
        @endif
    </div>
    <div class="content pt-3">
        <form
            class="form form-horizontal bg-white"
            name="training-course-form"
            action="/training-manager/courses/{{ $courseId }}/lessons" method="POST"
        >
            {{ csrf_field() }}
            
            <div class="form-group row">
                <div class="col-sm-6">
                    <input type="text" class="form-control gurmukhi-font-2" name="name_punjabi" placeholder="nwm"
                        value="{{ isset($course) ? $course->name_punjabi : '' }}"
                    />
                </div>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name_english" placeholder="Name (English)"
                        value="{{ isset($course) ? $course->name_english : '' }}"
                    />
                </div>
                <div class="col-sm-12 mt-3">
                    <label>Description (Punjabi)</label>
                </div>
                <div class="col-sm-12">
                    <textarea class="form-control gurmukhi-font-2" name="description_punjabi" placeholder="vyrvw">{{ isset($course) ? $course->description_punjabi : '' }}</textarea>
                </div>
                <div class="col-sm-12 mt-3">
                    <label>Description (English)</label>
                </div>
                <div class="col-sm-12">
                    <textarea class="form-control" name="description_english" placeholder="Description (English)">{{ isset($course) ? $course->description_english : '' }}</textarea>
                </div>
                <div class="col-sm-4 mt-3">
                    <input type="text" class="form-control" name="order" placeholder="Order" value="{{ isset($course) ? $course->order : '' }}" />
                </div>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="time_required" placeholder="Time Required" value="{{ isset($course) ? $course->order : '' }}" />
                </div>
            </div>
            <input type="submit" value="Save" class="btn btn-sm btn-secondary" />
        </form>
    </div>
</div>

@endsection