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
                    @foreach ($scriptures as $scripture)
                        <div class="mb-2">
                            <p class="gurmukhi-font-2 gurmukhi-text mb-1" style="font-size: 42px">
                                {{ $scripture->gurmukhi }}
                            </p>
                            <p class="gurmukhi-font-2 teeka-text mb-1" style="font-size: 33px">
                                {{ $scripture->translation_punjabi }}
                            </p>
                            <p class="english-text mb-1 d-none" style="font-size: 32px">
                                {{ $scripture->translation_english }}
                            </p>
                        </div>
                    @endforeach

                    <div class="col-md-12 text-center mt-5 mb-5" id="navigation">
        
                        @if (!empty($prevShabad))
                            <a href="/sundar-gutka/{{ $id }}/shabads/{{ $prevShabad->shabad_id }}" class="mr-2"><i class="fas fa-2x fa-arrow-circle-left"></i></a>
                        @endif

                        @if (!empty($nextShabad))
                            <a href="/sundar-gutka/{{ $id }}/shabads/{{ $nextShabad->shabad_id }}" class="mr-2"><i class="fas fa-2x fa-arrow-circle-right"></i></a>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
