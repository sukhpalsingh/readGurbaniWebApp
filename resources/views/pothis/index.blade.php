@extends('layouts.read')

@section('content')

<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-sm-4">
            <div class="card text-center">
                <img class="card-img-top" src="images/gurbani_bg1.jpeg" alt="Card image cap">
                <div class="card-body">
                    <h4>
                        <a href="/read">Shri Guru Granth Sahib Ji</a>
                    </h4>
                    <p class="card-text">Compiled by the tenth religious Guru of Sikhism, regarded by Sikhs as the final, sovereign, and eternal living guru</p>
                    <div class="text-center text-uppercase">
                        <a href="/pothis/G/sections" class="btn btn-default btn-1 mr-2">Index</a>
                        <a href="/pothis/G/angs/1" class="btn btn-default btn-1">Ang Paath</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card text-center">
                <img class="card-img-top" src="images/gurbani_bg2.jpeg" alt="Card image cap">
                <div class="card-body">
                    <h4>
                        <a href="/read">Dasam Granth Sahib Ji</a>
                    </h4>
                    <p class="card-text">Scripture of Sikhism, containing texts composed by the tenth Sikh Guru, Guru Gobind Singh.</p>
                    <div class="text-center text-uppercase">
                        <a href="/pothis/D/sections" class="btn btn-default btn-1 mr-2">Index</a>
                        <a href="/pothis/D/angs/1" class="btn btn-default btn-1">Ang Paath</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
