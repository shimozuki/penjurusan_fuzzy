@extends('layouts.admin')

@section('title','Edit Sub kriteria page admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit sub kriteria</h1>
        {{ Breadcrumbs::render('edit_subkriteria', $subkriteria) }}
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-center bg-info text-white">
                    <i class="fas fa-table"></i> Form Sub kriteria
                </div>
                <div class="card-body">
                    <a href="{{route('admin.subkriteria.index')}}" class="btn btn-primary mb-3"><i
                            class="fas fa-backward"></i> Kembali</a>
                    <form action="{{route('admin.subkriteria.update', $subkriteria->id)}}" method="post">
                        <input type="hidden" name="id" value="{{$subkriteria->id}}">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="kriteria_id">Kriteria</label>
                            <select name="kriteria_id" class="form-control @error('kriteria_id')
                                border border-danger
                            @enderror" id="">
                                <option value="">-- Kriteria --</option>
                                @foreach ($kriteria as $v_kriteria)
                                <option value="{{$v_kriteria->id}}" {{ $subkriteria->kriteria_id == $v_kriteria->id ?
                                    'selected' : ''}}>
                                    {{$v_kriteria->nama_kriteria}}</option>
                                @endforeach
                            </select>
                            @error('kriteria_id')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kode_sub_kriteria">Kode Sub kriteria</label>
                            <input type="text"
                                class="form-control @error('kode_sub_kriteria') border border-danger @enderror"
                                placeholder="Kode sub kriteria" value="{{$subkriteria->kode_sub_kriteria}}"
                                name="kode_sub_kriteria">
                            @error('kode_sub_kriteria')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama_sub_kriteria">Nama Sub kriteria</label>
                            <input type="text"
                                class="form-control @error('nama_sub_kriteria') border border-danger @enderror"
                                placeholder="Nama sub kriteria" value="{{$subkriteria->nama_sub_kriteria}}"
                                name="nama_sub_kriteria">
                            @error('nama_sub_kriteria')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="bobot_sub_kriteria">Bobot Sub kriteria</label>
                            <select type="text"
                                class="form-control @error('bobot_sub_kriteria') border border-danger @enderror"
                                name="bobot_sub_kriteria">
                                <option value="">-- Bobot --</option>
                                <option value="1" {{$subkriteria->bobot_sub_kriteria == 1 ? 'selected' : ''}}>1</option>
                                <option value="3" {{$subkriteria->bobot_sub_kriteria == 3 ? 'selected' : ''}}>3</option>
                                <option value="5" {{$subkriteria->bobot_sub_kriteria == 5 ? 'selected' : ''}}>5</option>
                                <option value="7" {{$subkriteria->bobot_sub_kriteria == 7 ? 'selected' : ''}}>7</option>
                                <option value="9" {{$subkriteria->bobot_sub_kriteria == 9 ? 'selected' : ''}}>9</option>
                            </select>
                            @error('bobot_sub_kriteria')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="reset" class="btn btn-danger"><i class="fas fa-sync-alt"></i> Reset</button>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i>
                                Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection