@extends('layouts.read')

@section('content')

<div class="container-fluid mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item gurmukhi-font-2">
                <a href="/pothis/{{ $gurbaniSource->identifier }}/sections">{{ $gurbaniSource->punjabi }}</a>
            </li>
            <li class="breadcrumb-item active gurmukhi-font-2" aria-current="page">{{ $raag->punjabi }}</li>
        </ol>
    </nav>

    <div class="row mt-2">
        <div class="col-md-12 text-center" id="content">
            <h3 class="text-left mt-3 mb-3">
                
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

@endsection
