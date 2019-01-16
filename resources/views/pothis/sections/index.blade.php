@extends('layouts.read')

@section('content')

<div class="container-fluid">
    <div class="row pt-3">
        <div class="col-md-12 text-center"><h3 class="gurmukhi-font-2 pt-2">{{ $gurbaniSource->punjabi }} </h3></div>
    </div>

    <div class="container-fluid">
        <div class="row mt-2">
            <div class="col-md-12 text-center" id="content">
                <div class='list-group gurmukhi-font-2 mb-2 text-left'>
                    @foreach ($raags as $raag)
                        <a class="list-group-item" href="/pothis/{{ $gurbaniSource->identifier }}/sections/{{ $raag->id }}">
                            {{ $raag->punjabi }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
