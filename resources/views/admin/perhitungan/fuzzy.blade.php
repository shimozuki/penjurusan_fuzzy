@extends('layouts.admin')

@section('title','perhitungan page admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Proses Perhitungan Fuzzy</h1>
        {{ Breadcrumbs::render('hitungfuzzy_ahp') }}
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                @include('layouts.admin.partial.session')

                <div class="card-header text-center bg-info text-white">
                    <i class="fas fa-table"></i> Proses Perhitungan Fuzzy AHP
                </div>
                <div class="card-body">
                    <h5>Matriks Perbandingan</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Kriteria</th>
                                    @foreach ($kriteria as $v_kriteria)
                                    <th>{{ucwords($v_kriteria->nama_kriteria)}}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kriteria as $index_k => $v_kriteria)
                                <tr>
                                    <td>{{ucwords($v_kriteria->nama_kriteria)}}</td>
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

                    <h5>Table Tringular Fuzzy Number</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th rowspan="2" class="align-middle">Kriteria</th>
                                    @foreach ($kriteria as $vKriteria)
                                    <th colspan="3" class="text-center">{{ucwords($vKriteria->nama_kriteria)}}</th>
                                    @endforeach
                                </tr>
                                <tr>
                                    <?php 
                                        $count = count($kriteria);
                                        $banyakKolom = $count*3;

                                        $j = 1;
                                        $k = 2;
                                        $l = 3;
                                        for($i=1; $i<=$count; $i++){
                                            $L[] = $j;
                                            $M[] = $k;
                                            $U[] = $l;
                                            
                                            $j += 3;
                                            $k += 3;
                                            $l += 3;
                                        }
                                    for($i=1; $i<=$banyakKolom; $i++){   
                                        ?>
                                    <th class="text-center">
                                        @if (in_array($i, $L))
                                        L
                                        @endif
                                        @if (in_array($i, $M))
                                        M
                                        @endif
                                        @if (in_array($i, $U))
                                        U
                                        @endif
                                    </th>
                                    <?php
                                        }
                                    ?>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kriteria as $index_k => $vKriteria)
                                <tr>
                                    <td>{{ucwords($vKriteria->nama_kriteria)}}</td>

                                    @foreach ($data_ahp[$index_k] as $dAhp)
                                    <?php 
                                        $tfn = FuzzyAhp::tringularFuzzy($dAhp);
                                        $cariSi[$index_k][] = $tfn; 
                            
                                        foreach ($tfn as  $vTfn) {
                                            echo '<td>' . CheckHelp::numFormat($vTfn) . '</td>';
                                        }
                                     ?>
                                    @endforeach
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-lg-6">
                            <h5>Menentukan nilai sintesis fuzzy</h5>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th rowspan="2" class="align-middle">Kriteria</th>
                                            <th colspan="3" class="text-center">Jumlah per parameter</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center">L</th>
                                            <th class="text-center">M</th>
                                            <th class="text-center">U</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        @foreach ($kriteria as $index_k => $vKriteria)
                                        <?php 
                                $lSi = [];
                                $mSi = [];
                                $uSi = [];
                                ?>
                                        <tr>
                                            <td>{{ucwords($vKriteria->nama_kriteria)}}</td>
                                            @foreach ($cariSi[$index_k] as $rSi)
                                            <?php 
                                    $lSi[] = $rSi[0];
                                    $mSi[] = $rSi[1];
                                    $uSi[] = $rSi[2];
                                    ?>
                                            @endforeach
                                            <?php 
                                    $L = array_sum($lSi);
                                    $M = array_sum($mSi);
                                    $U = array_sum($uSi);

                                    $totalL[] = $L;
                                    $totalM[] = $M;
                                    $totalU[] = $U;

                                    $hLSI[] = $L;
                                    $hMSI[] = $M;
                                    $hUSI[] = $U;
                                    ?>

                                            <td class="text-center">{{ CheckHelp::numFormat($L) }}</td>
                                            <td class="text-center">{{ CheckHelp::numFormat($M)}}</td>
                                            <td class="text-center">{{ CheckHelp::numFormat($U) }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td class="font-weight-bold">Total</td>
                                            <td class="font-weight-bold text-center">
                                                {{ CheckHelp::numFormat(array_sum($totalL))}}</td>
                                            <td class="font-weight-bold text-center">
                                                {{ CheckHelp::numFormat(array_sum($totalM))}}</td>
                                            <td class="font-weight-bold text-center">
                                                {{ CheckHelp::numFormat(array_sum($totalU))}}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">1 / Total</td>
                                            <td class="font-weight-bold text-center">
                                                <?php 
                                        $bobotL = CheckHelp::numFormat( 1 / array_sum($totalL));
                                        ?>
                                                {{ $bobotL }}
                                            </td>
                                            <td class="font-weight-bold text-center">
                                                <?php 
                                        $bobotM = CheckHelp::numFormat(1 / array_sum($totalM));    
                                        ?>
                                                {{ $bobotM }}
                                            </td>
                                            <td class="font-weight-bold text-center">
                                                <?php
                                        $bobotU = CheckHelp::numFormat(1 / array_sum($totalU));
                                        ?>
                                                {{ $bobotU }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Invers (Kebalikan)</td>
                                            <td class="font-weight-bold text-center">
                                                {{ $bobotU }}</td>
                                            <td class="font-weight-bold text-center">
                                                {{ $bobotM }}</td>
                                            <td class="font-weight-bold text-center">
                                                {{ $bobotL }}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <h5>Hasil Perhitungan sintesis fuzzy</h5>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th rowspan="2" class="align-middle text-center">Sintesis Fuzzy</th>
                                            <th colspan="3" class="text-center">Jumlah per parameter</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center">L</th>
                                            <th class="text-center">M</th>
                                            <th class="text-center">U</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <?php 
                                        $no=1;    
                                        ?>
                                        @foreach ($hLSI as $inSi => $rSI)
                                        <tr>
                                            <td class="text-center">S{{$no++}}</td>
                                            <?php 
                                            $sintesisFuzzyL = CheckHelp::numFormat($rSI * $bobotU);
                                            $sintesisFuzzyM = CheckHelp::numFormat($hMSI[$inSi] * $bobotM);
                                            $sintesisFuzzyU = CheckHelp::numFormat($hUSI[$inSi] * $bobotL);

                                            $SIl[] = $sintesisFuzzyL;
                                            $SIm[] = $sintesisFuzzyM;
                                            $SIu[] = $sintesisFuzzyU;
                                            ?>
                                            <td class="text-center">{{ $sintesisFuzzyL }}</td>
                                            <td class="text-center">{{ $sintesisFuzzyM }}</td>
                                            <td class="text-center">{{ $sintesisFuzzyU }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                    <br>


                    <div class="row">
                        <div class="col-lg-12">
                            <h5>Menentukan nilai vektor (v)</h5>
                        </div>

                        {{-- menentukan nilai sintesis fuzzy --}}
                        @foreach ($SIl as $inSil1 => $rSil1)
                        @foreach ($SIl as $inSil2 => $rSil2)
                        @if ($inSil1 != $inSil2)
                        @if ($SIm[$inSil1] >= $SIm[$inSil2])
                        <?php 
                                            $vektorFuzzy[$inSil1][$inSil2] = 1;
                                            ?>
                        @elseif($SIl[$inSil2] >= $SIu[$inSil1])
                        <?php 
                                            $vektorFuzzy[$inSil1][$inSil2] = 0;
                                            ?>
                        @else
                        <?php 
                                            $lastCondition = ($SIl[$inSil2] - $SIu[$inSil1]) / 
                                            (($SIm[$inSil1] - $SIu[$inSil1]) - ($SIm[$inSil2] - $SIl[$inSil2]));

                                            $vektorFuzzy[$inSil1][$inSil2] = CheckHelp::numFormat($lastCondition);
                                            ?>
                        @endif
                        @endif
                        @endforeach
                        @endforeach

                        {{-- masukan nilai vektor --}}
                        @foreach ($vektorFuzzy as $inVektor1 => $rVektor)
                        <?php
                        $no=1;
                        ?>
                        <div class="col-lg-4">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    @foreach ($rVektor as $inVektor2 => $vVektor)
                                    <tr>
                                        <td>V{{$inVektor1 + 1}}<sub>{{$no++}}</sub></td>
                                        <td>{{$vVektor}}</td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-lg-6">
                            <?php 
                                $countVektor = count($vektorFuzzy);
                                for($i=0; $i<$countVektor; $i++){
                                    $min[] = min($vektorFuzzy[$i]);
                                }
                                $jMin = array_sum($min);
                            ?>
                            <h5>Nilai ordinat (d')</h5>
                            <div class="table-responsive">
                                <table class="table-bordered table">
                                    @foreach ($min as $in => $v_min)
                                    <tr>
                                        <td>S{{$in+1}}</td>
                                        <td>{{$v_min}}</td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td class="font-weight-bold">Jumlah</td>
                                        <td class="font-weight-bold">{{$jMin}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <?php 
                                $min = [];
                                $countVektor = count($vektorFuzzy);
                                for($i=0; $i<$countVektor; $i++){
                                    $min[] = min($vektorFuzzy[$i]);
                                }
                                $jMin = array_sum($min);
                            ?>
                            <h5>Bobot Vektor Fuzzy</h5>

                            {{-- urutkan dari atas --}}
                            <?php
                            foreach ($kriteria as $inKriteria => $vKriteria):
                            $normalisasiBobot = CheckHelp::numFormat($min[$inKriteria] / $jMin);
                            $bobotVektorFuzzy[] = $normalisasiBobot;

                            $dataKriteria[] = [
                                'id' => $vKriteria->id,
                                'nama_kriteria' => $vKriteria->nama_kriteria,
                                'bobot_kriteria' => $normalisasiBobot
                            ];  
                            endforeach;
                            rsort($bobotVektorFuzzy);
                            
                            $dataKriteriaFix = [];
                            ?>

                            @foreach ($bobotVektorFuzzy as $index => $v_bobot)
                            @foreach ($dataKriteria as $v_kriteria)
                            @if ($v_bobot == $v_kriteria['bobot_kriteria'])
                            <?php 
                            $dataKriteriaFix[$v_kriteria['id']] = [
                                'nama_kriteria' => $v_kriteria['nama_kriteria'],
                                'bobot_kriteria' => $v_kriteria['bobot_kriteria'],
                            ];
                            ?>
                            @endif
                            @endforeach
                            @endforeach

                            <div class="table-responsive">
                                <table class="table-bordered table">
                                    @foreach ($dataKriteriaFix as $index => $v_kriteria)
                                    <tr>
                                        <td>{{ ucwords($v_kriteria['nama_kriteria']) }}</td>
                                        <td>{{ $v_kriteria['bobot_kriteria'] }}</td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                    <br>
                    {{-- session put bobot vektor fuzzy --}}
                    <?php 
                    session()->put([
                        'kriteria' => $dataKriteriaFix
                    ]);
                    ?>

                    {{-- data verifikasi --}}
                    <div class="row">
                        <div class="col-lg-12">
                            <h5>Data Verifikasi</h5>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="tableVerifikasi">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Tanggal</th>
                                            <th>Waktu</th>
                                            <th>Judul Verifikasi</th>
                                            <th style="width: 10%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if(session()->has('save_choose')){
                                            $save_choose = session()->get('save_choose');
                                            $save_choose = array_column($save_choose,'verifikasi_id');
                                        } else {
                                            $save_choose = [];
                                        }
                                        ?>
                                        @foreach ($verifikasi as $index => $v_verifikasi)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{ CheckHelp::get_tanggal_show($v_verifikasi->tanggal)}}</td>
                                            <td>{{$v_verifikasi->waktu}}</td>
                                            <td>{{$v_verifikasi->judul_verifikasi}}</td>
                                            <td>
                                                <?php 
                                                $dataVerifikasi = $v_verifikasi->warga()->get()->toArray();
                                                if($dataVerifikasi != null): 
                                                ?>
                                                <div class="form-check">
                                                    <input class="form-check-input checkbox"
                                                        data-verifikasi_id="{{$v_verifikasi->id}}" type="checkbox"
                                                        value="{{$v_verifikasi->id}}" id="verifikasi{{$index}}"
                                                        @if(count($save_choose)> 0)
                                                    @if(in_array($v_verifikasi->id, $save_choose))
                                                    {{'checked'}}
                                                    @endif
                                                    @endif
                                                    >
                                                    <label class="form-check-label" for="verifikasi{{$index}}">
                                                    </label>
                                                </div>
                                                <?php else: ?>
                                                <div class="form-group">
                                                    <a href="{{url('admin/alternatif?verifikasi_id='.$v_verifikasi->id)}}"
                                                        class="badge badge-info">
                                                        + Tambah data warga
                                                    </a>
                                                </div>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <a href="{{route('admin.perhitungan.rekomendasiWarga')}}" class="btn btn-primary">
                                <i class="fas fa-paper-plane"></i> Submit Perhitungan
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('script')
<script>
    $(document).ready(function(){
        $('#tableVerifikasi').DataTable();
        
        $(document).on('click','.checkbox',function(){
            if ($(this).is(':checked')) {
            var verifikasi_id = $(this).data('verifikasi_id');
            } else {
            var verifikasi_id = null;
            var verifikasi_id_null = $(this).data('verifikasi_id');
            }

            $.ajax({
                url: '{{route("admin.perhitungan.saveSession")}}',
                dataType:'json',
                data:{
                    verifikasi_id: verifikasi_id,
                    null_verifikasi_id: verifikasi_id_null
                },
                type: 'get',
                success:function(data){
                    console.log(data);
                },error:function(x,t,m){
                    console.log(x.responseText);
                }
            })
        })
    })
</script>
@endpush
@endsection