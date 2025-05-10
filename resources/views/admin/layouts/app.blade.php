<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layouts.head')
</head>

<body>

    <body data-sidebar="dark">
        <div id="layout-wrapper">

            @include('admin.layouts.header')
            @include('admin.layouts.sidebar')

            <main id="main" class="main">
                @yield('content')
            </main>
        </div>

        @include('admin.layouts.right_sidebar')
        @include('admin.layouts.footer')

        <!-- Vendor JS Files -->
        <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
      
        <!-- apexcharts -->
        <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
      
        <!-- file-manager js -->
        <script src="{{ asset('assets/js/pages/file-manager.init.js') }}"></script>
      
        <!-- Template Main JS File -->
        <script src="{{ asset('assets/js/app.js') }}"></script>

        <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>

        <script src="{{ asset('assets/js/pages/dashboard.init.js') }}"></script>
    </body>

</html>
