@extends('layouts.admin')

@section('title','Rekomendasi penerima page admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Rekomendasi Penerima</h1>
        {{ Breadcrumbs::render('rekomendasi_ahp') }}
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                @include('layouts.admin.partial.session')

                <div class="card-header text-center bg-info text-white">
                    <i class="fas fa-table"></i> Rekomendasi Penerima
                </div>
                <div class="card-body">
                    <?php

                    $penilaian = session()->get('penilaian');
                    $get_penilaian = CheckHelp::get_penilaian_id($penilaian['id']);
                    ?>
                    <strong class="float-right">
                        Berita Acara : {{$get_penilaian->judul_penilaian}}
                    </strong>

                    <h5>Data Warga</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    @foreach ($data_header as $v_header)
                                    <th>{{ucwords($v_header['nama_kriteria'])}}</th>
                                    @endforeach
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($data_reg as $v_reg)
                                <tr>
                                    <td>{{ucwords($loop->iteration)}}</td>
                                    <td>{{ucwords($v_reg['nama_warga'])}}</td>
                                    <td>{{ucwords($v_reg[0])}}</td>
                                    <td>{{ucwords($v_reg[1])}}</td>
                                    <td>{{($v_reg[2])}}</td>
                                    <td>{{number_format($v_reg[3],0)}}</td>
                                    <td>
                                        {{$v_reg[4]}}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <h5>Bobot Warga</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable2">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    @foreach ($data_header as $v_header)
                                    <th>{{ucwords($v_header['nama_kriteria'])}}</th>
                                    @endforeach
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($bobot_reg as $v_bobot_reg)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$v_bobot_reg['nama_warga']}}</td>
                                    <td>{{$v_bobot_reg[0]}}</td>
                                    <td>{{$v_bobot_reg[1]}}</td>
                                    <td>{{$v_bobot_reg[2]}}</td>
                                    <td>{{$v_bobot_reg[3]}}</td>
                                    <td>
                                        {{$v_bobot_reg[4]}}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <br>
                    <h5>Rekomendasi Warga</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable3">
                            <thead>
                                <tr>
                                    <th>Rank</th>
                                    <th>Nama</th>
                                    <th>Bobot</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php 
                                $rank = 1;
                                $dataHasil = [];
                                ?>
                                @foreach ($rekomendasi as $id_warga => $v_bobot_rec)
                                <?php
                                $dataHasil = [
                                    'warga_id' => $id_warga,
                                    'rank_hasil' => $rank,
                                    'bobot_hasil' => $v_bobot_rec['bobot_warga'],
                                ];
                                ?>
                                <tr>
                                    <td>{{$rank}}</td>
                                    <td>{{ucwords($v_bobot_rec['nama_warga'])}}</td>
                                    <td>{{$v_bobot_rec['bobot_warga']}}</td>
                                </tr>
                                <?php 
                                $rank++;
                                $insertHasil[] = $dataHasil;
                                ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group text-center">
                        <form action="{{route('admin.perhitungan.submitPerhitungan')}}" method="post">
                            @csrf
                            <input type="hidden" name="cr_hasil" value="{{session()->get('ahp.cr')}}">
                            <input type="hidden" name="penilaian_id" value="{{session()->get('penilaian.id')}}">
                            <?php 
                            session()->put('submit_rekomendasi', $insertHasil);    
                            ?>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Submit
                                Hasil</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('script')
<script>
    $(document).ready(function(){
        $('#dataTable').DataTable();
        $('#dataTable2').DataTable();
        $('#dataTable3').DataTable();
    })
</script>
@endpush
@endsection