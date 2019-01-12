@extends('layouts.blank')

@section('content')

<link href="https://fonts.googleapis.com/css?family=Mukta+Mahee" rel="stylesheet">

<div class="container-fluid">
    <div class="row bg-white pl-5 pr-5 pt-2 pb-2">
        <a class="navbar-brand" href="/" class="col-md-2">
            <img src="/images/logo.png" style="height: 40px;" /> <span style="font-weight: bold; font-size: 20px;">Gurbani</span>
        </a>
        <div class="col-md-10 text-center"><h3 class="gurmukhi-font-2 pt-2">{{ $gurbaniSource->punjabi }} </h3></div>
    </div>

    <div class="container-fluid">
        <div class="row mt-2">
            <div class="col-md-12 text-center" id="content">
                <h3 class="text-left mt-3 mb-3">
                    <a href="/pothis/{{ $gurbaniSource->identifier }}/sections" class="gurmukhi-font-2">{{ $gurbaniSource->punjabi }}</a>
                    <i class="fas fa-chevron-right ml-2"></i><i class="fas fa-chevron-right mr-2"></i>
                    <span class="gurmukhi-font-2">{{ $raag->punjabi }}</span>
                </h3>
                <div class='list-group gurmukhi-font-2 mb-2 text-left'>
                    <?php
                        $previousWriterId = null;
                    ?>
                    @foreach ($scriptures as $scripture)
                        <?php
                            $gurbaniWriter = $scripture->gurbaniWriter;
                            if ($previousWriterId !== $gurbaniWriter->id) {
                                $previousWriterId = $gurbaniWriter->id;
                                $marginClass = isset($serial) ? 'mt-5' : '';
                                $serial = 1;
                                echo "
                                    <div class='list-group-item bg-dark text-center text-white $marginClass'>
                                        $gurbaniWriter->punjabi
                                    </div>
                                ";
                            } else {
                                $serial++;
                            }
                        ?>
                        <a class="list-group-item" href="/shabads/{{ $scripture->shabad_id }}">
                            {{ $serial }}. {{ $scripture->gurmukhi }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
