@extends('layouts.read')

@section('content')

<div class="container-fluid">
    <div class="row mt-2">
        <div class="col-md-12 text-center" id="content">
            <div class='list-group gurmukhi-font-2 mb-2 text-left'>
                @foreach ($baanis as $baani)
                    <a class="list-group-item" href="/sundar-gutka/{{ $baani['id'] }}/shabads/{{ $baani['shabad-id'] }}">
                        {{ $baani['punjabi'] }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
