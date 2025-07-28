<?php
$konfigurasi = CheckHelp::get_konfigurasi();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{$konfigurasi->keterangan}}">
    <meta name="author" content="{{$konfigurasi->nama_aplikasi}}">

    <title>@yield('title')</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('assets')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('assets')}}/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-6 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <?php
                                        $logo = public_path('img/logo/' . $konfigurasi->gambar_konfigurasi);
                                        if (file_exists($logo)) {
                                            $gambar = asset('img/logo/' . $konfigurasi->gambar_konfigurasi);
                                        } else {
                                            $gambar = asset('img/logo/default.png');
                                        }
                                        ?>
                                        <img src="{{$gambar}}" alt="{{$konfigurasi->nama_aplikasi}}" width="50%;">
                                        <br><br>
                                        <h1 class="h4 text-gray-900 mb-4">{{$konfigurasi->nama_aplikasi}}</h1>
                                    </div>
                                    @yield('content')
                                    <hr>
                                    {{-- <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('assets')}}/vendor/jquery/jquery.min.js"></script>
    <script src="{{asset('assets')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('assets')}}/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('assets')}}/js/sb-admin-2.min.js"></script>

</body>

</html>