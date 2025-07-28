<?php
$uri = Request::segment(1);
$subUri = Request::segment(2);
?>
<ul class="navbar-nav bg-gradient-success    sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin.dashboard.index')}}">
        <div class="sidebar-brand-text mx-3">SMK IIS</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    @if ($uri == 'admin' && $subUri == 'dashboard')
    @endif

    <!-- Nav Item - Dashboard -->
    <li class="nav-item 
    @if ($uri == 'admin' && $subUri == 'dashboard')
    active
    @endif">
        <a class="nav-link" href="{{route('admin.dashboard.index')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Tables -->
    <li class="nav-item @if ($uri == 'admin' && $subUri == 'profile')
    active
    @endif">
        <a class="nav-link" href="{{route('admin.profile.index')}}">
            <i class="fas fa-fw fa-user-tie"></i>
            <span>Profile</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item @if ($uri == 'admin' && $subUri == 'kriteria')
        active
        @endif">
        <a class="nav-link" href="{{route('admin.kriteria.index')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Kriteria</span></a>
    </li>
    <!-- Nav Item - Tables -->
    <li class="nav-item @if ($uri == 'admin' && $subUri == 'subkriteria')
        active
        @endif">
        <a class="nav-link" href="{{route('admin.subkriteria.index')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Sub kriteria</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <!-- <li class="nav-item @if ($uri == 'admin' && $subUri == 'verifikasi')
                active
                @endif">
        <a class="nav-link" href="{{route('admin.verifikasi.index')}}">
            <i class="fas fa-fw fa-clipboard-list"></i>
            <span>Verifikasi</span></a>
    </li> -->

    <!-- Nav Item - Tables -->
    <li class="nav-item @if ($uri == 'admin' && $subUri == 'penyeleksian')
                active
                @endif">
        <a class="nav-link" href="{{route('admin.penyeleksian.index')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Penyeleksian</span></a>
    </li>

    <!-- Nav Item - Tables -->
    @if (session()->has('penilaian.id'))
    <li class="nav-item @if ($uri == 'admin' && $subUri == 'perhitungan' || $subUri == 'perhitunganFuzzy')
                            active
                            @endif">
        <?php
        $penilaian = session()->get('penilaian');
        ?>
        <a class="nav-link" href="{{route('admin.perhitungan.index')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Perhitungan</span></a>
    </li>
    @endif


    <!-- Nav Item - Tables -->
    <!-- <li class="nav-item @if ($uri == 'admin' && $subUri == 'pengumuman')
                    active
                    @endif">
        <a class="nav-link" href="{{route('admin.pengumuman.index')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Pengumuman</span></a>
    </li> -->

    <!-- Nav Item - Tables -->
    <li class="nav-item @if ($uri == 'admin' && $subUri == 'user')
                            active
                            @endif">
        <a class="nav-link" href="{{route('admin.user.index')}}">
            <i class="fas fa-fw fa-user-lock"></i>
            <span>Users</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item @if ($uri == 'admin' && $subUri == 'konfigurasi')
                            active
                            @endif">
        <a class="nav-link" href="{{route('admin.konfigurasi.index')}}">
            <i class="fas fa-fw fa-cogs"></i>
            <span>Konfigurasi</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item @if ($uri == 'admin' && $subUri == 'log')
                                active
                                @endif">
        <a class="nav-link" href="{{route('admin.log.index')}}">
            <i class="fas fa-fw fa-cogs"></i>
            <span>Log</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item @if ($uri == 'admin' && $subUri == 'logout')
                            active
                            @endif">
        <a class="nav-link btn-logout" href="#">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

</ul>
@push('script')
<script>
    $(document).ready(function() {
        $(document).on('click', '.btn-logout', function(e) {
            e.preventDefault();

            if (confirm('Yakin ingin keluar dari sistem ?')) {
                $.ajax({
                    url: "{{route('logout')}}",
                    type: 'post',
                    success: function() {
                        window.location.href = "{{url('/')}}";
                    }
                })
            }
        })
    })
</script>
@endpush