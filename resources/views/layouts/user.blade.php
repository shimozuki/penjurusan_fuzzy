<?php 
$konfigurasi = CheckHelp::get_konfigurasi();
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{$konfigurasi->keterangan}}">
    <meta name="author" content="{{$konfigurasi->nama_aplikasi}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}">

    <title>@yield('title')</title>
    <style>
        @font-face {
            font-family: opensans-regular;
            src: url("{{asset('fonts/static/OpenSans/OpenSans-Regular.ttf')}}");
        }

        @font-face {
            font-family: opensans-bold;
            src: url("{{asset('fonts/static/OpenSans/OpenSans-Bold.ttf')}}");
        }

        @font-face {
            font-family: opensans-semi-bold;
            src: url("{{asset('fonts/static/OpenSans/OpenSans-SemiBold.ttf')}}");
        }

        .bg-navbar {
            background: #1E3163;
        }

        .navbar a {
            color: #fff;
        }

        .text-open-sans-regular {
            font-family: opensans-regular;
        }

        .text-open-sans-bold {
            font-family: opensans-bold;
        }

        .text-open-sans-semi-bold {
            font-family: opensans-bold;
        }

        .min-height-600 {
            min-height: 600px;
        }

        .min-height-400 {
            min-height: 400px;
        }

        .area-footer {
            position: relative;
            height: 80px;
            background: #1E3163;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #footer {
            position: relative;
            width: 100%;
            height: 100%;
            bottom: -20vh;
        }

        body {
            overflow-x: hidden;
        }

        .social-media {
            position: absolute;
            right: 5px;
            bottom: 5px;
        }

        .social-media a {
            color: #fff;
        }

        .ln-8 {
            line-height: 0.8cm;
        }
    </style>
</head>

<body>
    {{-- navbar --}}
    @include('layouts.user.navbar')
    {{-- content --}}
    @yield('content')

    @include('layouts.user.footer')



    <script src="{{ asset('assets/js/jquery-3.6.0.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}">
    </script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}">
    </script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}"></script>
    @stack('script')
</body>

</html>