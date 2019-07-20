@extends('layouts.base')

@section('layout')
    <link href="{{ mix('/css/dashboard.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ mix('/js/dashboard.js') }}" type="text/javascript"></script>
    <div class="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <img src="images/logo.png" style="height: 60px;" /> <span style="font-weight: bold; font-size: 20px;">Gurbani</span>
            </div>

            <ul class="list-unstyled components">
                <li class="@if($tab === 'analytics' ) active @endif">
                    <a href="#analytics" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Analytics</a>
                    <ul class="collapse list-unstyled" id="analytics">
                        <li>
                            <a href="/dashboard/analytics/requests">Requests</a>
                        </li>
                    </ul>
                </li>
                <li class="@if($tab === 'disk-manager' ) active @endif">
                    <a href="/dashboard/disk-manager">Disk Manager</a>
                </li>
                <li>
                    <a href="/">Site</a>
                </li>
            </ul>
        </nav>

        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                    </button>

                </div>
            </nav>
            @yield('content')
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });
    </script>
@endsection