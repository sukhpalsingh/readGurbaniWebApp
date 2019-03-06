@extends('layouts.base')

@section('layout')

<div class="sidebar">
    <div class="sidebar-inner">
        <div class="sidebar-logo">
            <img src="/images/logo.png" style="height: 40px;" /> <span style="font-weight: bold; font-size: 20px;">Gurbani</span>
        </div>
        <ul class="sidebar-menu mt-3">
            <li class="nav-item">
                <a class="nav-link active" href="/training-manager/courses"><i class="fas fa-graduation-cap"></i> COURSES</a>
            </li>
        </ul>
    </div>
</div>

<div class="page-container">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="">Training Manager</a>
            </div>
        </div>
    </nav>
    @yield ('content')
</div>

@endsection