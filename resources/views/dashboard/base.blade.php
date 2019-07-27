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
                    <a href="#disks-manager" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Disks Manager</a>
                    <ul class="collapse list-unstyled" id="disks-manager">
                        <li>
                            <a href="/dashboard/albums-manager" class="@if($tab === 'albums' ) active @endif">Albums</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="/">Site</a>
                </li>
            </ul>
        </nav>

        <div id="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <button type="button" id="sidebarCollapse" class="btn btn-sm btn-info">
                            <i class="fas fa-align-left"></i>
                        </button>

                        @yield('buttons')
                    </div>
                </div>
                @yield('content')
            </div>
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