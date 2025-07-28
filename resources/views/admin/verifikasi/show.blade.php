@extends('layouts.admin')

@section('title','detail alternatif page admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Alternatif</h1>
        {{ Breadcrumbs::render('detail_alternatif', $warga) }}
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                @include('layouts.admin.partial.session')
                <div class="card-header text-center bg-info text-white">
                    <i class="fas fa-table"></i> Detail Alternatif
                </div>
                <div class="card-body">
                    <a href="{{route('admin.alternatif.index')}}" class="btn btn-primary mb-3"><i
                            class="fas fa-backward"></i> Kembali
                    </a>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between">
                                <span>Nama Warga</span>
                                <span>{{$warga->nama_warga}}</span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between">
                                <span>Alamat Warga</span>
                                <span>{{$warga->alamat_warga}}</span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between">
                                <span>No. Handphone Warga</span>
                                <span>{{$warga->no_hp_warga}}</span>
                            </div>
                        </li>
                        <?php 
                        $subKriteria = $warga->subKriteria()->get();
                        foreach ($subKriteria as $key => $v_subKriteria) { 
                            ?>
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between">
                                <span>{{ CheckHelp::get_kriteria($v_subKriteria->kriteria_id)->nama_kriteria}}</span>
                                <span>{{$v_subKriteria->nama_sub_kriteria}}</span>
                            </div>
                        </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection