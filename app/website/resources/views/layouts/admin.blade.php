<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>JOB TKHTTT - Admin</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">
        <!-- Stylesheets-->
        <link href="{{ asset('adminas/css/styles.css') }}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{ asset('adminas/css/main.css') }}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{ asset('adminas/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" media="all" crossorigin="anonymous"/>
        <link href="{{ asset('adminas/css/sweet-alert.css') }}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{ asset('adminas/css/sweetalert2.css') }}" rel="stylesheet" type="text/css" media="all" />


        <script src="{{ asset('adminas/js/all.min.js') }}"></script>
        <script src="{{ asset('adminas/js/sweetalert2.js') }}"></script>
        <script src="{{ asset('adminas/js/sweet-alert.min.js') }}"></script>

    </head>
    <body class="sb-nav-fixed">
        @include('layouts.header_admin')
        <div id="layoutSidenav">
            @include('layouts.sidebar_admin')
            <div id="layoutSidenav_content">
                @yield('main_content')
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted"></div>
                            <div>
                                <a href="#"></a>
                                &middot;
                            </div>
                            <div>
                                <a href="#"></a>
                                &middot;
                            </div>
                            <div>
                                <a href="#"></a>
                                &middot;
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <div id="go-top">
            <a href="#go-top"><i class="fa fa-angle-up"></i></a>
        </div>
        </div>
        <script src="{{ asset('adminas/js/jquery-3.5.1.min.js') }}"></script>
        <script src="{{ asset('adminas/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('adminas/js/scripts.js') }}"></script>
        <script src="{{ asset('adminas/js/Chart.min.js') }}"></script>
        <script src="{{ asset('adminas/js/chart-area-demo.js') }}"></script>
        <script src="{{ asset('adminas/js/chart-bar-demo.js') }}"></script>
        <script src="{{ asset('adminas/js/cjquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('adminas/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('adminas/js/datatables-demo.js') }}"></script>
        <script src="{{ asset('adminas/js/main.js') }}"></script>
    </body>
</html>
