@extends('layouts.user')

@section('title','cari data user page bansos')

@section('content')

<div class="container-fluid px-5 bg-light">
    <div class="d-flex justify-content-between py-3 px-0 align-items-center">
        <span class="text-open-sans-regular">Pencarian data</span>
        {{ Breadcrumbs::render('hasil_data',$pengumuman) }}
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex align-items-center min-height-600 justify-content-center">
                        <p class="text-open-sans-bold text-center ln-8">
                            <span class="text-uppercase text-danger">Nama yang anda inputkan tidak ditemukan</span> <br>
                            Untuk informasi lebih lanjut, <br>
                            Silahkan hubungi Kepala Lingkungan setempat atau datang ke Kantor Lurah Kisaran Baru untuk mengetahui info lebih lanjut<br>
                            Terima kasih :)
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection