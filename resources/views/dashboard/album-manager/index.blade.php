@extends('dashboard.base')

@section('buttons')

<a href="/dashboard/albums-manager/create" class="btn btn-sm btn-success">
    Create Album <i class="fas fa-plus"></i>
</a>

@endsection

@section('content')

@if ($albums->total() === 0)

<div id="drawing" style="margin-left: 10px; margin-top: 10px; border: 1px solid;"></div>

<script type='text/javascript'>
    var draw = SVG('drawing').size(480, 480);


    var gradient1 = draw.gradient('radial', function(stop) {
        stop.at(0, '#222')
        stop.at(3, '#ccc')
    });

    var gradient2 = draw.gradient('linear', function(stop) {
        stop.at(4, '#eee')
        stop.at(3, '#aaa')
    });

    var cirle = draw.circle(480);
        cirle.fill('#fff');

    var pattern = draw.pattern(30, 30, function(add) {
        add.rect(28,28).fill('#ccc');
        add.rect(2, 2).move(28,28).fill('#000');
    });

    draw.polyline(createHalfCircle(240, 100, 10, 10))
        .fill(pattern)
        .move(0, 240);

    draw.text("mn dI KOj")
        .move(150, 60).font({fill: '#666', family: 'prabhki', size: 70});

    draw.text("CD-3")
        .move(360, 180).font({fill: '#ccc', family: 'arial', size: 20, weight: 600})
        .fill('#bbb');

    draw.rect(332, 62)
        .fill('#fff')
        .move(88, 298);

    var string = "sMq isMG jI mskIn";
    var text = draw.text(string)
        .font({fill: '#888', family: 'web-lipi-heavy', size: 10});

    var size = text.font('size');
    while(text.length() < 303) {
        if (size > 30) {
            break;
        }
        text.font({size: ++size});
    }

    var x = ((332 - text.length()) / 2) + 90;
    text.move(x, 310);

    // add reference
    var text = draw.text('Please respect gurbani cds & share with others').font({fill: '#999', size: 12, family: 'Verdana' });
    var path = 'M 120 40 C 190 -5, 310 -15, 415 80';
    text.path(path);

    var imagePath = "{{ asset('images/artists') . '/sant_singh_ji_maskeen.png' }}";
    draw.image(imagePath, 120, 140)
        .move(30, 100);

    function createHalfCircle (radius, steps, centerX, centerY) {
        values = [];
        var xValues = [centerX];
        var yValues = [centerY];
        for (var i = 0; i < steps; i++) {
            if ((centerY + radius * Math.sin(2 * Math.PI * i / steps)) < 10) {
                continue;
            }
            values[i] = [
                (centerX + radius * Math.cos(2 * Math.PI * i / steps)),
                (centerY + radius * Math.sin(2 * Math.PI * i / steps))
            ];
        }
        return values;
    }
</script>

@else
    
                    <table class="table table-bordered bg-white text-center">
                        <thead>
                            <tr>
                                <th class="web-lipi-heavy">nwm</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Genre</th>
                                <th>Serial</th>
                                <th style="width: 10px">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($albums->items() as $album)
                                <tr>
                                    <td class="web-lipi-heavy">{{ $album->name_pan }}</td>
                                    <td>{{ $album->name_eng }}</td>
                                    <td>{{ $album->disk_category_id }}</td>
                                    <td>
                                        {{ $album->disk_genre_id }}
                                    </td>
                                    <td>
                                        {{ $album->serial }}
                                    </td>
                                    <td>
                                        <a href="/dashboard/albums-manager/{{ $album->id }}/edit" class="btn btn-link float-right text-secondary">
                                            <i class="far fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
    
@endif

@endsection