@extends('layouts.admin')

@section('title','perhitungan page admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Proses Perhitungan</h1>
        {{ Breadcrumbs::render('hitung_ahp') }}
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                @include('layouts.admin.partial.session')

                <div class="card-header text-center bg-info text-white">
                    <i class="fas fa-table"></i> Proses Perhitungan AHP
                </div>
                <div class="card-body">
                    <h5>Matriks Perbandingan</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Kriteria</th>
                                    @foreach ($kriteria as $v_kriteria)
                                    <th>{{$v_kriteria->nama_kriteria}}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kriteria as $index_k => $v_kriteria)
                                <tr>
                                    <td>{{$v_kriteria->nama_kriteria}}</td>
                                    @foreach ($data_ahp[$index_k] as $in_ahp => $r_ahp)
                                    <?php 
                                            $inArray[$in_ahp][] = $r_ahp;
                                        ?>
                                    <td>{{$r_ahp}}</td>
                                    @endforeach
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <td class="font-weight-bold">Total</td>


                                @foreach ($inArray as $in => $vArray)
                                <?php 
                                            $merge = 0;    
                                        ?>
                                @foreach ($vArray as $toArray)
                                <?php 
                                                    $totalFix[$in] = $merge+=$toArray;
                                                ?>
                                @endforeach
                                @endforeach
                                <?php 
                                           foreach ($totalFix as $key => $vTotal) { ?>
                                <td class="font-weight-bold">{{$vTotal}}</td>
                                <?php
                                           }
                                        ?>
                            </tfoot>
                        </table>
                    </div>
                    <br>

                    <h5>Nilai elemen setiap kolom / total kolom</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Kriteria</th>
                                    @foreach ($kriteria as $v_kriteria)
                                    <th>{{$v_kriteria->nama_kriteria}}</th>
                                    @endforeach
                                    <th>Jumlah Per Baris</th>
                                    <th>Nilai prioritas</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kriteria as $index_k => $v_kriteria)
                                <?php 
                                    $sumRow = 0;
                                    $arrRow = [];
                                    $num = 1;
                                    
                                ?>
                                <tr>
                                    <td>{{$v_kriteria->nama_kriteria}}</td>
                                    @foreach ($data_ahp[$index_k] as $in_ahp => $r_ahp)
                                    <td>
                                        <?php 
                                            $hitung = $r_ahp / $totalFix[$in_ahp];
                                            $hitung = CheckHelp::numFormat($hitung);
                                            $sumRow += $hitung;
                                            $arrRow[] = $sumRow;
                                            echo $hitung;   
                                        ?>
                                    </td>
                                    @endforeach
                                    <td>
                                        {{$sumRow}}
                                    </td>
                                    <td>
                                        <?php 
                                            $countRow = count($arrRow);
                                            $prioritasRow = $sumRow / $countRow;
                                            $prioritasRow = CheckHelp::numFormat($prioritasRow);
                                            $arrPrioritas[$index_k] = $prioritasRow;
                                            echo $prioritasRow;
                                        ?>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <br>


                    <div class="row">
                        <div class="col-lg-4">
                            <h5>Nilai CM</h5>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">CM</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kriteria as $index_k => $v_kriteria)
                                        <?php 
                                        $hitung = 0;
                                        ?>
                                        <tr>
                                            <td class="text-center">
                                                @foreach ($data_ahp[$index_k] as $in_ahp => $r_ahp)
                                                <?php 
                                                    $hitung += ($r_ahp * $arrPrioritas[$in_ahp]);
                                                ?>
                                                @endforeach
                                                <?php 
                                                $hasil = $hitung / $arrPrioritas[$index_k];
                                                $hasil = CheckHelp::numFormat($hasil);
                                                $total[] = $hasil;
                                                echo $hasil;
                                                ?>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td class="text-center font-weight-bold">
                                                <?php 
                                                $count = count($total);
                                                $sum = array_sum($total);
                                                $average = $sum / $count;
                                                echo $average;    
                                                ?>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <h5>Nilai CI</h5>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">CI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center font-weight-bold">
                                                <?php 
                                                $countKriteria = count($kriteria);
                                                $ci = ($average - $countKriteria) / ($countKriteria - 1);
                                                echo CheckHelp::numFormat($ci);
                                                ?>
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <h5>Nilai CR</h5>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">CR</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center font-weight-bold">
                                                <?php 
                                                $countKriteria = count($kriteria);
                                                $ri = FuzzyAhp::randomIndex($countKriteria);
                                                $cr = $ci / $ri;
                                                $cr = CheckHelp::numFormat($cr);
                                                echo $cr;
                                                session()->put('ahp.cr', $cr);
                                                ?>
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <a class="btn btn-primary" href="{{route('admin.perhitungan.fuzzyAhp')}}">
                                <i class="fas fa-arrow-right"></i> Selanjutnya
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection