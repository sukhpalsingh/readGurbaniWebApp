@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-8">
        <div class="card m-5 p-5">
            <div class="card-title">Edit video details</div>
            <form>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right" for="videoId">Name</label>
                    <div class="col-sm-9">
                        <input id="title" name="title" type="text" class="form-control input-sm">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right" for="videoId">Description</label>
                    <div class="col-sm-9">
                        <textarea id="description" name="description" class="form-control input-sm"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right" for="videoId">Video Id</label>  
                    <div class="col-sm-9">
                        <input id="videoId" name="videoId" type="text" class="form-control input-sm">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-10 offset-sm-2">
                        <button type="submit" id="singlebutton" name="singlebutton" class="btn btn-sm btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
