@extends('dashboard.base')

@section('content')

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Ip</th>
                <th>Url</th>
                <th>User Agent</th>
                <th>Response Time</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($requestLogs as $requestLog)
                <tr>
                    <td>{{ $requestLog->id }}</td>
                    <td>{{ $requestLog->ip }}</td>
                    <td>{{ $requestLog->url }}</td>
                    <td>{{ $requestLog->user_agent }}</td>
                    <td>{{ $requestLog->response_time }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
