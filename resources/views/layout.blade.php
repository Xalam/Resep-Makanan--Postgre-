<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resep Makanan | @yield('title')</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="{{ asset('assets/startbootstrap/vendor/fontawesome-free/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/startbootstrap/css/sb-admin-2.min.css') }}">

    @stack('style')
</head>

<body id="page-top">
    <div id="wrapper">

        @include('sidebar')

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                @include('navbar')

                <div class="container-fluid">

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">@yield('content_header')</h1>
                        @yield('button_right')
                    </div>

                    @yield('content_main')

                </div>
            </div>

            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Resep Makanan 2021</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="{{ asset('assets/startbootstrap/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/startbootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/startbootstrap/js/sb-admin-2.min.js') }}"></script>

    @yield('script')
</body>

</html>
