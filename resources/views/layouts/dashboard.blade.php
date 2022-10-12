<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="apple-touch-icon" sizes="76x76" href="logo">
    <link rel="icon" type="image/png" href="logo">
    <title>
        {{ config('app.name') }} - @yield('title')
    </title>
    <!--     Fonts and icons     -->
    <link href="{{ asset('vendor/assets/css/fonts.googleapis.css') }}" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('vendor/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="{{ asset('vendor/assets/js/kit.fontawesome.js') }}" crossorigin="anonymous"></script>
    <link href="{{ asset('vendor/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('vendor/assets/css/argon-dashboard.css?v=2.0.2') }}" rel="stylesheet" />
    {{-- css:external --}}
    @stack('css-external')
    @stack('css-internal')
</head>

<body class="g-sidenav-show  " style="background: linear-gradient(to right,#e3e3f2, #cfc5e7);">
    <div class="min-height-100 position-absolute w-100 bg-primary">
        {{-- <img class="min-height-300 position-absolute w-100" style="height: 20%;"
            src="{{ asset('vendor/assets/img/Lo-Mein-Noodles.jpg') }}" alt=""> --}}
    </div>
    @include('layouts._dashboard.sidebar')
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        @include('layouts._dashboard.navbar')
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            @yield('content')
            @include('layouts._dashboard.footer')
        </div>
    </main>
    <div class="fixed-plugin">
        {{-- <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
            <i class="fa fa-cog py-2"> </i>
        </a> --}}
        <div class="card shadow-lg">
            <div class="card-header pb-0 pt-3 ">
                <div class="float-start">
                    <h5 class="mt-3 mb-0">Argon Configurator</h5>
                    <p>See our dashboard options.</p>
                </div>
                <div class="float-end mt-4">
                    <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                        <i class="fa fa-close"></i>
                    </button>
                </div>
                <!-- End Toggle Button -->
            </div>
            <hr class="horizontal dark my-1">
            <div class="card-body pt-sm-3 pt-0 overflow-auto">
                <!-- Sidebar Backgrounds -->
                <div>
                    <h6 class="mb-0">Sidebar Colors</h6>
                </div>
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <div class="badge-colors my-2 text-start">
                        <span class="badge filter bg-gradient-primary active" data-color="primary"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-dark" data-color="dark"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-info" data-color="info"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-success" data-color="success"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-warning" data-color="warning"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-danger" data-color="danger"
                            onclick="sidebarColor(this)"></span>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="{{ asset('vendor/assets/js/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('vendor/assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('vendor/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('vendor/assets/js/plugins/chartjs.min.js') }}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="{{ asset('vendor/assets/js/buttons.js') }}"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('vendor/assets/js/argon-dashboard.min.js?v=2.0.2') }}"></script>
    @include('sweetalert::alert')
    @stack('javascript-internal')
    @stack('javascript-external')
</body>

</html>
