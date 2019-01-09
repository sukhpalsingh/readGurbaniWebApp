@extends('layouts.blank')

@section('content')

<header>
    <div class="navbar-white">
        <div class="container">
            <div class="row w-100 pt-1 pb-1">
                <div class="col-md-1 col-xs-2">
                    <a class="navbar-brand mr-0" href="/read" title="Home page">
                        <img src="/images/logo.png" style="height: 30px;" />
                    </a>
                </div>
                <div class="col-md-1 col-xs-2">
                    <a class="navbar-brand mr-0" href="/read" title="Back to search">
                        <i class="fas fa-search"></i>
                    </a>
                </div>
                <div class="gurmukhi-font-2 font-size-2x col-md-10 mt-1 col-xs-8">
                    <a href="/shabads/{{ ($id - 1) }}" class="mr-2"><i class="fas fa-arrow-circle-left"></i></a>
                    <span id="shabad-info"></span>
                    <a href="/shabads/{{ ($id + 1) }}" class="ml-2"><i class="fas fa-arrow-circle-right"></i></a>
                    <a href="javascript: settings.show()" class="ml-2 float-right"><i class="fas fa-cog"></i></a>
                </div>
            </div>
        </div>
    </div>
</header>

<div id="settings" class="position-absolute top-0 d-none">
    <div class="card m-0 p-0">
        <div class="card-body">
            <h5 class="card-title font-weight-bold mb-3">Settings</h5>
            <table class="table table-striped">
                <tr>
                    <td>
                        <h5 class="card-title">Gurmukhi</h5>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                
                            </div>
                            <div class="form-group col-md-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button type="button" class="btn btn-secondary btn-sm" onclick="settings.descreaseFont('gurmukhi');">
                                            <i class="fas fa-minus-square"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control" value="" id="gurmukhi-font-size-setting">
                                    <div class="input-group-prepend">
                                        <button type="button" class="btn btn-secondary btn-sm" onclick="settings.increaseFont('gurmukhi');">
                                            <i class="fas fa-plus-square"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h5 class="card-title">Teeka</h5>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="form-check">     
                                    <div class="custom-control custom-switch mt-2">
                                        <input type="checkbox" class="custom-control-input" id="teeka-display-setting" onchange="settings.toggleDisplay('teeka');">
                                        <label class="custom-control-label" for="teeka-display-setting"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button type="button" class="btn btn-secondary btn-sm" onclick="settings.descreaseFont('teeka');">
                                            <i class="fas fa-minus-square"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control" value="" id="teeka-font-size-setting">
                                    <div class="input-group-prepend">
                                        <button type="button" class="btn btn-secondary btn-sm" onclick="settings.increaseFont('teeka');">
                                            <i class="fas fa-plus-square"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h5 class="card-title">Translation</h5>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="form-check">     
                                    <div class="custom-control custom-switch mt-2">
                                        <input type="checkbox" class="custom-control-input" id="english-display-setting" onchange="settings.toggleDisplay('english');">
                                        <label class="custom-control-label" for="english-display-setting"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button type="button" class="btn btn-secondary btn-sm" onclick="settings.descreaseFont('english');">
                                            <i class="fas fa-minus-square"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control" value="" id="english-font-size-setting">
                                    <div class="input-group-prepend">
                                        <button type="button" class="btn btn-secondary btn-sm" onclick="settings.increaseFont('english');">
                                            <i class="fas fa-plus-square"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
            <input type="button" class="button btn-danger btn-sm" value="Reset" onclick="settings.reset()">
            <input type="button" class="button btn-success btn-sm" value="Close" onclick="settings.show()">
        </div>
    </div>
</div>

<div class="container-fluid">
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
