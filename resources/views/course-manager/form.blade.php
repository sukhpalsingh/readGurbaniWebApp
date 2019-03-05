@extends('layouts.blank')

@section('content')

<div class="sidebar">
    <div class="sidebar-inner">
        <div class="sidebar-logo">
            <img src="/images/logo.png" style="height: 40px;" /> <span style="font-weight: bold; font-size: 20px;">Gurbani</span>
        </div>
        <ul class="sidebar-menu">
            <li class="nav-item">
                <a class="nav-link active" href="/training-manager/courses"><i class="fas fa-graduation-cap"></i> Courses</a>
            </li>
        </ul>
    </div>
</div>

<div class="page-container">
    <div class="header navbar">
        <div class="header-container">
            <ul class="float-right">
                <li class="nav-item">
                    <a href="" class="btn btn-sm btn-secondary">Training Manager</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <form class="form form-horizontal bg-white ml-2 mr-4 p-4" name="training-course-form" action="/training-manager/courses" method="POST">
                {{ csrf_field() }}
                @if (isset($course))
                    <h2>Edit Course</h2>
                @else
                    <h2>New Course</h2>
                @endif
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
                </div>
                <input type="submit" value="Save" class="btn btn-sm btn-secondary" />
            </form>
        </div>
    </div>
</div>

@endsection