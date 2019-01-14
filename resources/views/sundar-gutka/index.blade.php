@extends('layouts.blank')

@section('content')

<div class="container-fluid">
    <div class="row bg-white pl-5 pr-5 pt-2 pb-2">
        <a class="navbar-brand" href="/" class="col-md-2">
            <img src="/images/logo.png" style="height: 40px;" /> <span style="font-weight: bold; font-size: 20px;">Gurbani</span>
        </a>
        <div class="col-md-10 text-center"><h3 class="gurmukhi-font-2 pt-2">suMdr gutkw swihb</h3></div>
    </div>

    <div class="container-fluid">
        <div class="row mt-2">
            <div class="col-md-12 text-center" id="content">
                <div class='list-group gurmukhi-font-2 mb-2 text-left'>
                    @foreach ($baanis as $baani)
                        <a class="list-group-item" href="/sundar-gukta/{{ $baani->id }}">
                            {{ $baani->punjabi }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
