@extends('dashboard.base')

@section('content')
<div id="mapid" style="height: 80%;"></div>
<script type="text/javascript">
    var map = L.map('mapid').setView([51.505, -0.09], 3);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    @foreach ($ipLocations as $ipLocation)
        @if (!empty($ipLocation->longitude))
            L.marker([{{ $ipLocation->longitude }}, {{ $ipLocation->latitude }}]).addTo(map);
        @endif
    @endforeach
</script>
@endsection