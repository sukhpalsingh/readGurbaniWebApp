@extends('layouts.blank')

@section('content')

<header>
    <nav class="navbar navbar-white">
        <div class="container">
            <div class="row w-100">
                <div class="col-md-2">
                    <a class="navbar-brand mr-0" href="/">
                        <img src="/images/logo.png" style="height: 30px;" />
                    </a>
                </div>
                <div class="gurmukhi-font-2 font-size-2x col-md-10 mt-1">
                    <a href="/shabads/{{ ($id - 1) }}" class="mr-2"><i class="fas fa-arrow-circle-left"></i></a>
                    <span id="shabad-info"></span>
                    <a href="/shabads/{{ ($id + 1) }}" class="ml-2"><i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </nav>
</header>

<div class="container-fluid">
    <div class="row mt-2">
        <div class="col-md-12 text-center" id="content">
        
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        shabad.show({{ $id }});
    });
</script>

@endsection
