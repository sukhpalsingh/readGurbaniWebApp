@extends('layouts.blank')

@section('content')

<header>
    <nav class="navbar navbar-expand-lg navbar-white">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="images/logo.png" style="height: 60px;" /> <span style="font-weight: bold; font-size: 20px;">Gurbani</span>
            </a>
            <form class="form col-md-4 col-sm-7">
                <div class="input-group">
                    <div class="input-group-append">
                        <a href="#" class="input-group-text"><i class="fas fa-cog"></i></a>
                    </div>
                    <input
                        type="text"
                        class="form-control input-sm"
                        placeholder=""
                    >
                    <div class="input-group-append">
                        <a href="#" class="input-group-text"><i class="fas fa-search"></i></a>
                    </div>
                </div>
            </form>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-3 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/"><i class="fas fa-bookmark"></i> Sundar Gutka</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/"><i class="fas fa-book"></i> Pothi Sahib</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<div class="container-fluid">
    <div class="row mt-2">
        <div class="col-md-12" id="content">
        
        </div>
    </div>
</div>

@endsection
