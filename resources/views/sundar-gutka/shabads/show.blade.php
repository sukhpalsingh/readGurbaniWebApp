@extends('layouts.read')

@section('content')

<div class="container-fluid">
    <div class="row mt-2">
        <div class="col-md-12 text-center" id="content">
            <div class='list-group mb-2 text-center'>
                @foreach ($scriptures as $scripture)
                    <div class="mb-2">
                        <p class="gurmukhi-font-2 gurmukhi-text mb-1">
                            {{ $scripture->gurmukhi }}
                        </p>
                        <p class="gurmukhi-font-2 teeka-text mb-1">
                            {{ $scripture->translation_punjabi }}
                        </p>
                        <p class="english-text mb-1">
                            {{ $scripture->translation_english }}
                        </p>
                    </div>
                @endforeach

                <div class="col-md-12 text-center mt-5 mb-5" id="navigation">
    
                    @if (!empty($prevShabad))
                        <a href="/sundar-gutka/{{ $id }}/shabads/{{ $prevShabad->serial }}" class="mr-2"><i class="fas fa-2x fa-arrow-circle-left"></i></a>
                    @endif

                    @if (!empty($nextShabad))
                        <a href="/sundar-gutka/{{ $id }}/shabads/{{ $nextShabad->serial }}" class="mr-2"><i class="fas fa-2x fa-arrow-circle-right"></i></a>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        settings.readUserPreferences();
        settings.apply();
    });
</script>

@endsection
