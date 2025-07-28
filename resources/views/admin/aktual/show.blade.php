@extends('layouts.admin')

@section('title','detail alternatif page admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Alternatif</h1>
        {{ Breadcrumbs::render('detail_aktual', $warga) }}
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                @include('layouts.admin.partial.session')
                <div class="card-header text-center bg-info text-white">
                    <i class="fas fa-table"></i> Detail Alternatif
                </div>
                <div class="card-body">
                    <a href="{{url('admin/aktual?penyeleksian_id='.$penyeleksian_id)}}" class="btn btn-primary mb-3"><i
                            class="fas fa-backward"></i> Kembali
                    </a>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between">
                                <span>Nama Warga</span>
                                <span>{{ ucwords($warga->nama_warga) }}</span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between">
                                <span>Alamat Warga</span>
                                <span>{{ ucwords($warga->alamat_warga) }}</span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between">
                                <span>Status pernikahan</span>
                                <span>{{ucwords($warga->pernikahan_warga)}}</span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between">
                                <span>Pekerjaaan</span>
                                <span>{{ucwords($warga->pekerjaan_warga)}}</span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between">
                                <span>Penghasilan suami</span>
                                <span>{{ number_format($warga->penghasilansuami_warga,0)}}</span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between">
                                <span>Penghasilan istri</span>
                                <span>{{ number_format($warga->penghasilanistri_warga,0)}}</span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between">
                                <span>Penghasilan pribadi</span>
                                <span>{{ number_format($warga->penghasilanpribadi_warga,0)}}</span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between">
                                <span>Total penghasilan</span>
                                <span>{{ number_format($warga->totalpenghasilan_warga,0)}}</span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between">
                                <span>Jumlah tanggungan</span>
                                <span>{{ ($warga->tanggungan_warga) }}</span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between">
                                <span>Umur</span>
                                <span>{{ ($warga->umur_warga) }}</span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between">
                                <span>Pendidikan terakhir</span>
                                <span>{{ strtoupper($warga->pendidikanterakhir_warga) }}</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection