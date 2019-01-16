@extends('layouts.read')

@section('content')

<div class="container-fluid mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <a href="/shabads/{{ ($id - 1) }}" class="col-sm-1"><i class="fas font-size-2x fa-arrow-circle-left"></i></a>
            <div class="gurmukhi-font-2 font-size-2x col-sm-10 text-center">
                <span id="shabad-info"></span>
            </div>
            <a href="/shabads/{{ ($id + 1) }}" class="col-sm-1"><i class="fas font-size-2x fa-arrow-circle-right"></i></a>
        </ol>
    </nav>
    <div class="row mt-2">
        <div class="col-md-12 text-center" id="content">
        
        </div>
        <div class="col-md-12 text-center mt-5 mb-5 d-none" id="navigation">
            <a href="/shabads/{{ ($id - 1) }}" class="mr-2"><i class="fas fa-2x fa-arrow-circle-left"></i></a>
            <a href="/shabads/{{ ($id + 1) }}" class="ml-2"><i class="fas fa-2x fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        settings.readUserPreferences();
        shabad.show({{ $id }});
    });
</script>

@endsection
