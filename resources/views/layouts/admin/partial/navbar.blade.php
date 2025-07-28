<?php 
$konfigurasi = CheckHelp::get_konfigurasi();
$profile = CheckHelp::get_profile();

?>
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->
    <strong>
        <?php 
        $logo = asset('img/logo/'.$konfigurasi->gambar_konfigurasi);
        if(file_exists($logo)){
            $gambar = $logo;
        } else {
            $gambar = asset('img/logo/default.png');
        }
        ?>
        <img src="{{$gambar}}" width="40px;" alt=""> {{$konfigurasi->nama_aplikasi}}
    </strong>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{$profile->nama_profile}}</span>
                <?php
                $gambar = $profile->gambar_profile != null ? public_path().'/img/users/'.$profile->gambar_profile : false;
                if(file_exists($gambar)){
                    $gambarFix = asset('img/users/'.$profile->gambar_profile);
                } else {
                    $gambarFix = asset('img/users/default.png');
                }
    
                ?>
                <img class="img-profile rounded-circle" src="{{$gambarFix}}">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{route('admin.profile.index')}}">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>

                <a class="dropdown-item" href="{{route('admin.log.index')}}">
                    <i class="fas fa-lock fa-sm fa-fw mr-2 text-gray-400"></i>
                    Activity
                </a>
                <a class="dropdown-item" href="{{route('admin.konfigurasi.index')}}">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Settings
                </a>

                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>

    </ul>

</nav>