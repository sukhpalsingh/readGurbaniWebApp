@extends('layouts.base')

@section('layout')
    <style type="text/css">
        
    </style>
    <div class="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <img src="images/logo.png" style="height: 60px;" /> <span style="font-weight: bold; font-size: 20px;">Gurbani</span>
            </div>

            <ul class="list-unstyled components">
                <li class="active">
                    <a href="#analytics" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Analytics</a>
                    <ul class="collapse list-unstyled" id="analytics">
                        <li>
                            <a href="/dashboard/analytics/requests">Requests</a>
                        </li>
                    </ul>
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
    @yield('content')
@endsection