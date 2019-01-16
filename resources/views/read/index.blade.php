@extends('layouts.read')

@section('content')

<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-md-8 m-auto">
            <div class="input-group">
                <div class="input-group-append">
                    <a href="#" class="input-group-text"><i class="fas fa-cog"></i></a>
                </div>
                <input
                    id="search-keyword"
                    type="text"
                    class="form-control input-sm punjabi-font-1"
                    placeholder=""
                    value=""
                    autocomplete="off"
                >
                <div class="input-group-append">
                    <a href="javascript: search.list()" class="input-group-text"><i class="fas fa-search"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-12 text-center" id="content">
        
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#search-keyword').on('keypress', function (e) {
         if(e.which === 13) {
             console.log('neter');

            //Disable textbox to prevent multiple submit
            $(this).attr("disabled", "disabled");

            //Enable the textbox again if needed.
            $(this).removeAttr("disabled");

            search.list();
         }
   });
</script>

@endsection
