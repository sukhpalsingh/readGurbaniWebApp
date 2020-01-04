@extends('layouts.tv')

@section('content')

<div class="container-fluid mt-2">
    <div class="row">
        <div class="col-md-6">
            <div class="card active" id="listen-card">
                <img src="images/tv-listen-kirtan-card-bg.png" class="card-img-top" alt="...">
            </div>
        </div>
        <div class="col-md-6">
            <div class="card" id="watch-card">
                <img src="images/tv-watch-kirtan-card-bg.png" class="card-img-top" alt="...">
            </div>
        </div>
        <div id="test">test</div>
    </div>    
</div>

<script type="text/javascript">
    $('body').keyup(function(event) {
        if (event.which === 465) {
            $('#listen-card').removeClass('active');
            $('#watch-card').addClass('active');
        } else if (event.which === 412) {
            $('#watch-card').removeClass('active');
            $('#listen-card').addClass('active');
        }
        $('#test').html(event.which);
    });
</script>
@endsection
