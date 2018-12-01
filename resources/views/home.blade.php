@extends('layouts.app')

@section('content')

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-sm-8">
            <div class="card text-center">
                <img class="card-img-top" src="images/gurbani_bg1.jpeg" alt="Card image cap">
                <div class="card-body">
                    <h2>
                        <a href="/read">Read Gurbani</a>
                    </h2>
                    <p class="card-text">Read gurbani is a healing process. Guru's teaching purify your body and soul.</p>
                    <div class="text-center text-uppercase">
                        <a href="/read" class="btn btn-default btn-1">Start reading</a>
                    </div>
                </div>
            </div>
            <div class="card text-center mt-5">
                <img class="card-img-top" src="images/gurbnai_kirtan_bg.jpeg" alt="Gurbani Kirtan">
                <div class="card-body">
                    <h2>
                        <a href="/listen">Gurbani Kirtan</a>
                    </h2>
                    <p class="card-text">Listen to gurbani now and get peace within your mind and soul.</p>
                    <div class="text-center text-uppercase">
                        <a href="listen" class="btn btn-default btn-1">Start listening</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-text-1 text-center">SHOULD I SIGN UP</h4>
                    <p class="card-text">
                        After signup, you can save your favourites against your account or attend a class.
                    </p>
                    <div class="text-center text-uppercase">
                        <a href="/create" class="btn btn-default btn-1">Sign Up Now</a>
                    </div>
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-body">
                    <h4 class="header-text-1 text-center text-uppercase">Gurbani Santhya</h4>
                    <p class="card-text">
                        Here you can learn gurbani santhya for accurate pronunciation of gurbani.
                        All the classes offered here are free of cost.
                        Find more about gurbani santhya in classes.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
