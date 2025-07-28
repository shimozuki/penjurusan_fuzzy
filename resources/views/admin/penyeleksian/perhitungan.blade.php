@extends('layouts.admin')

@section('title','perhitungan page admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Hasil perhitungan</h1>
        {{ Breadcrumbs::render('perhitungan_penyeleksian', $penyeleksian) }}
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                @include('layouts.admin.partial.session')

                <div class="card-header text-center bg-info text-white">
                    <i class="fas fa-table"></i> Hasil penyeleksian
                </div>
                <div class="card-body">
                    <a href="{{route('admin.penyeleksian.index')}}" class="btn btn-primary mb-3"><i
                            class="fas fa-backward"></i> Kembali
                    </a>
                    <h5>Matriks Perbandingan</h5>
                    @error('kriteria_id')
                    <small class="text-danger">The kriteria must filled</small>
                    @enderror
                    <form action="{{route('admin.penyeleksian.submitHitung')}}" method="post">
                        <input type="hidden" name="count_kriteria" value="{{count($kriteria)}}">
                        <input type="hidden" name="id" value="{{$penyeleksian->id}}">

                        @csrf

                        <table class="table table-bordered">
                            <thead>
                                <thead>
                                    <tr>
                                        <th colspan="3" class="text-center">Pilih mana yang lebih diprioritaskan
                                        </th>
                                        <th class="text-center">Pilih nilai bobot kriteria</th>
                                    </tr>
                                </thead>
                            </thead>
                            <tbody>
                                <?php 
                                $bandingKriteria = session()->get('ahp.banding_kriteria');
                                $bobotKriteria = session()->get('ahp.bobot_kriteria');
    
                                ?>
                                @foreach ($kuisioner_kriteria as $id_kriteria_1 => $r_kuisioner)
                                <?php 
                        $getKriteria1 = CheckHelp::get_kriteria($id_kriteria_1);
                        ?>
                                @foreach ($r_kuisioner as $id_kriteria_2 => $v_kuisioner)
                                <?php 
                        $getKriteria2 = CheckHelp::get_kriteria($id_kriteria_2);
                        ?>
                                <tr>
                                    <td>
                                        {{ ucwords($getKriteria1->nama_kriteria)}}
                                    </td>
                                    <td>
                                        <?php                                        
                                        $data_checked = '';
                                        $invers_checked = '';
                                        $bobot_kriteria_kuisioner = '';
                                        if(isset($bandingKriteria[$getKriteria1->id][$getKriteria2->id])){
                                            if($bandingKriteria[$getKriteria1->id][$getKriteria2->id] == 'data'){
                                                $data_checked = 'checked';
                                            }
                                        }  
                                        if(isset($bandingKriteria[$getKriteria1->id][$getKriteria2->id])){
                                            if($bandingKriteria[$getKriteria1->id][$getKriteria2->id] == 'invers_data'){
                                                $invers_checked = 'checked';
                                            }
                                        }

                                        if(isset($bobotKriteria[$getKriteria1->id][$getKriteria2->id])){
                                            $bobot_kriteria_kuisioner = $bobotKriteria[$getKriteria1->id][$getKriteria2->id];
                                        }  
                                        ?>
                                        <div class="text-center">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="banding_kriteria[{{$getKriteria1->id}}][{{$getKriteria2->id}}]"
                                                    id="data{{$getKriteria1->id}}{{$getKriteria2->id}}" value="data"
                                                    required {{$data_checked}}>
                                                <label class="form-check-label"
                                                    for="data{{$getKriteria1->id}}{{$getKriteria2->id}}"></label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="banding_kriteria[{{$getKriteria1->id}}][{{$getKriteria2->id}}]"
                                                    id="invers_data{{$getKriteria1->id}}{{$getKriteria2->id}}"
                                                    value="invers_data" required {{$invers_checked}}>
                                                <label class="form-check-label"
                                                    for="invers_data{{$getKriteria1->id}}{{$getKriteria2->id}}"></label>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        {{ ucwords($getKriteria2->nama_kriteria) }}
                                    </td>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                name="bobot_kriteria[{{$getKriteria1->id}}][{{$getKriteria2->id}}]"
                                                id="input_kriteria{{$getKriteria1->id}}{{$getKriteria2->id}}1" value="1"
                                                required {{$bobot_kriteria_kuisioner=='1' ? 'checked' : '' }}>
                                            <label class="form-check-label"
                                                for="input_kriteria{{$getKriteria1->id}}{{$getKriteria2->id}}1">1</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                name="bobot_kriteria[{{$getKriteria1->id}}][{{$getKriteria2->id}}]"
                                                id="input_kriteria{{$getKriteria1->id}}{{$getKriteria2->id}}2" value="2"
                                                required {{$bobot_kriteria_kuisioner=='2' ? 'checked' : '' }}>
                                            <label class="form-check-label"
                                                for="input_kriteria{{$getKriteria1->id}}{{$getKriteria2->id}}2">2</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                name="bobot_kriteria[{{$getKriteria1->id}}][{{$getKriteria2->id}}]"
                                                id="input_kriteria{{$getKriteria1->id}}{{$getKriteria2->id}}3" value="3"
                                                required {{$bobot_kriteria_kuisioner=='3' ? 'checked' : '' }}>
                                            <label class="form-check-label"
                                                for="input_kriteria{{$getKriteria1->id}}{{$getKriteria2->id}}3">3</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                name="bobot_kriteria[{{$getKriteria1->id}}][{{$getKriteria2->id}}]"
                                                id="input_kriteria{{$getKriteria1->id}}{{$getKriteria2->id}}4" value="4"
                                                required {{$bobot_kriteria_kuisioner=='4' ? 'checked' : '' }}>
                                            <label class="form-check-label"
                                                for="input_kriteria{{$getKriteria1->id}}{{$getKriteria2->id}}4">4</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                name="bobot_kriteria[{{$getKriteria1->id}}][{{$getKriteria2->id}}]"
                                                id="input_kriteria{{$getKriteria1->id}}{{$getKriteria2->id}}5" value="5"
                                                required {{$bobot_kriteria_kuisioner=='5' ? 'checked' : '' }}>
                                            <label class="form-check-label"
                                                for="input_kriteria{{$getKriteria1->id}}{{$getKriteria2->id}}5">5</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                name="bobot_kriteria[{{$getKriteria1->id}}][{{$getKriteria2->id}}]"
                                                id="input_kriteria{{$getKriteria1->id}}{{$getKriteria2->id}}6" value="6"
                                                required {{$bobot_kriteria_kuisioner=='6' ? 'checked' : '' }}>
                                            <label class="form-check-label"
                                                for="input_kriteria{{$getKriteria1->id}}{{$getKriteria2->id}}6">6</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                name="bobot_kriteria[{{$getKriteria1->id}}][{{$getKriteria2->id}}]"
                                                id="input_kriteria{{$getKriteria1->id}}{{$getKriteria2->id}}7" value="7"
                                                required {{$bobot_kriteria_kuisioner=='7' ? 'checked' : '' }}>
                                            <label class="form-check-label"
                                                for="input_kriteria{{$getKriteria1->id}}{{$getKriteria2->id}}7">7</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                name="bobot_kriteria[{{$getKriteria1->id}}][{{$getKriteria2->id}}]"
                                                id="input_kriteria{{$getKriteria1->id}}{{$getKriteria2->id}}8" value="8"
                                                required {{$bobot_kriteria_kuisioner=='8' ? 'checked' : '' }}>
                                            <label class="form-check-label"
                                                for="input_kriteria{{$getKriteria1->id}}{{$getKriteria2->id}}8">8</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                name="bobot_kriteria[{{$getKriteria1->id}}][{{$getKriteria2->id}}]"
                                                id="input_kriteria{{$getKriteria1->id}}{{$getKriteria2->id}}9" value="9"
                                                required {{$bobot_kriteria_kuisioner=='9' ? 'checked' : '' }}>
                                            <label class="form-check-label"
                                                for="input_kriteria{{$getKriteria1->id}}{{$getKriteria2->id}}9">9</label>
                                        </div>
                                    </td>
                                </tr>

                                @endforeach
                                @endforeach
                            </tbody>
                        </table>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-calculator"></i>
                                Hitung</button>
                        </div>

                        {{-- <input type="hidden" name="count_kriteria" value="{{count($kriteria)}}">
                        <input type="hidden" name="id" value="{{$penyeleksian->id}}">
                        @csrf
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

                                        @for ($j = 1; $j <= $index_k; $j++) <td>0</td>
                                            @endfor

                                            @for ($i = $index_k; $i < count($kriteria); $i++) @if ($i==$index_k) <td>
                                                1
                                                </td>
                                                @else
                                                <td>
                                                    <select name="kriteria_id[]" id="" class="form-control">
                                                        <option value="">- bobot -</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="1/2">1/2</option>
                                                        <option value="1/3">1/3</option>
                                                        <option value="1/4">1/4</option>
                                                        <option value="1/5">1/5</option>
                                                        <option value="1/6">1/6</option>
                                                        <option value="1/7">1/7</option>
                                                        <option value="1/8">1/8</option>
                                                        <option value="1/9">1/9</option>
                                                    </select>
                                                </td>
                                                @endif
                                                @endfor
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-calculator"></i>
                                Hitung</button>
                        </div> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
<script>
    $(document).ready(function(){
        $('#dataTable').DataTable();
    })
</script>
@endpush
@endsection