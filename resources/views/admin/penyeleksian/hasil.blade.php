@extends('layouts.admin')

@section('title','hasil penyeleksian page admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Hasil Penyeleksian</h1>
        {{ Breadcrumbs::render('hasil_penyeleksian', $penyeleksian) }}
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                @include('layouts.admin.partial.session')
                <div class="card-header text-center bg-info text-white">
                    <i class="fas fa-table"></i> Hasil Penyeleksian
                </div>
                <div class="card-body">
                    <a href="{{route('admin.penyeleksian.index')}}" class="btn btn-primary mb-3"><i
                            class="fas fa-backward"></i> Kembali
                    </a>
                    <a href="{{route('admin.penyeleksian.cetakPdf', $penyeleksian->id)}}" class="btn btn-danger mb-3"><i
                            class="fas fa-file-pdf"></i> PDF
                    </a>
                    <h6>Tanggal Penilaian : {{ CheckHelp::get_tanggal_show($penyeleksian->tanggal_penilaian) }} <br>
                        Berita acara : {{$penyeleksian->judul_penilaian}}
                    </h6>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable">
                            <thead>
                                <tr>
                                    <th>Rank</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Bobot</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($hasil->hasilDetail()->get() as $v_h_detail)
                                <?php 
                                $warga = CheckHelp::get_warga($v_h_detail->warga_id);
                                ?>
                                <tr>
                                    <td>{{$v_h_detail->rank_hasil}}</td>
                                    <td>{{ucwords($warga->nama_warga)}}</td>
                                    <td>{{ucwords($warga->alamat_warga)}}</td>
                                    <td>{{$v_h_detail->bobot_hasil}}</td>
                                    <td>{!! $v_h_detail->status == '1' ? '<span
                                            class="badge badge-success">Diterima</span>' : ($v_h_detail->status == '0' ?
                                        '<span class="badge badge-danger">Ditolak</span>' : '<span
                                            class="badge badge-warning">Belum ditentukan</span>') !!}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-header text-center bg-info text-white font-weight-bold">
                    <i class="fas fa-table"></i> <i>Confusion Matrix</i>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>Confusion</td>
                                <td>Menerima</td>
                                <td>Tidak menerima</td>
                            </tr>
                            <tr>
                                <td>Menerima</td>
                                <td>
                                    <div class="text-center">
                                        {{$tp}}
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        {{$fp}}
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Tidak Menerima</td>
                                <td>
                                    <div class="text-center">
                                        {{$fn}}
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        {{$tn}}
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mt-3">
                        <p class="m-0 p-0 font-weight-bold text-info" style="font-size: 24px;">Akurasi :
                            {{ round($akurasi,2); }} %
                        </p>
                        {{-- <p class="m-0 p-0 font-weight-bold ">Precision :
                            {{ round($precision,2); }} %
                        </p>
                        <p class="m-0 p-0 font-weight-bold ">Recall :
                            {{ round($recall,2); }} %
                        </p>
                        <p class="m-0 p-0 font-weight-bold ">F1 :
                            {{ round($f1,2); }} %
                        </p> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
<script>
    $(document).ready(function(){
        $('#dataTable').DataTable({
            "order": [[ 0, "asc" ]]
        });
    })
</script>
@endpush
@endsection