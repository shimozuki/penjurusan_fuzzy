@extends('layouts.user')

@section('title','cari data user page bansos')

@section('content')

<div class="container-fluid px-5 bg-light">
    <div class="d-flex justify-content-between py-3 px-0 align-items-center">
        <span class="text-open-sans-regular">Pencarian data</span>
        <?php 
        $hasil = CheckHelp::get_hasil($hasil_detail->hasil_id);
        $pengumuman = CheckHelp::pengumuman_penilaian($hasil->penilaian_id);
        ?>
        {{ Breadcrumbs::render('hasil_data',$pengumuman) }}
    </div>
    <?php
    $warga = CheckHelp::get_warga($hasil_detail->warga_id);
    ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column justify-content-around min-height-600 text-center">
                        <span class="text-open-sans-semi-bold">
                            <i class="fas fa-bullhorn"></i> Cari data (Penerima Manfaat) BANSOS
                        </span>
                        <h3 class="text-uppercase text-open-sans-bold">
                            <span>Atas Nama : {{$warga->nama_warga}}</span> <br>
                            <span>Alamat : {{$warga->alamat_warga}}</span> <br>
                        </h3>
                        @if ($hasil_detail->status == '1')
                        <p class="text-open-sans-regular">
                            <strong class="text-success font-weight-bold">Selamat Anda terpilih Menerima Bantuan Sosial
                                Tunai
                                Covid-19</strong> <br>
                            Silahkan lakukan pencarian di <strong>Kantor POS</strong> terdekat. Dengan melengkapi berkas
                            sebagai berikut:<br> <br>
                            <strong>1. Foto Copy KTP</strong> <br>
                            <strong>2. Foto Copy Kartu Keluarga</strong> <br> <br>
                            <span>Demikian informasi yang dapat kami sampaikan terimakasih :)</span>
                        </p>
                        @elseif($hasil_detail->status == '0')
                        <p class="text-open-sans-regular">
                            <strong class="text-danger font-weight-bold">Maaf anda belum beruntung</strong> <br>
                            Silahkan coba lagi, untuk gelombang berikutnya <br>
                            Terima kasih :)
                        </p>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection