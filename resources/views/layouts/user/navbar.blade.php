<nav class="navbar navbar-expand-lg px-5 bg-navbar">
    <a class="navbar-brand" href="{{url('/')}}">
        <?php 
            $gambar = $konfigurasi->gambar_konfigurasi != null ? public_path() . '/img/logo/' . $konfigurasi->gambar_konfigurasi : false;
            if (file_exists($gambar)) {
                $gambarFix = asset('img/logo/' . $konfigurasi->gambar_konfigurasi);
            } else {
                $gambarFix = asset('img/logo/default.png');
            }
            ?>
        <img src="{{$gambarFix}}" height="50px;" alt="{{$konfigurasi->nama_aplikasi}}"> SPK Penerima Bantuan Sosial
        Menggunakan Metode Fuzzy AHP
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <span class="text-white"></span>
            </li>
        </ul>
    </div>
</nav>