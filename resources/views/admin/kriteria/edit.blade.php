@extends('layouts.admin')

@section('title','Edit Kriteria page admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Kriteria</h1>
        {{ Breadcrumbs::render('edit_kriteria', $kriteria) }}
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-center bg-info text-white">
                    <i class="fas fa-table"></i> Form Kriteria
                </div>
                <div class="card-body">
                    <a href="{{route('admin.kriteria.index')}}" class="btn btn-primary mb-3"><i
                            class="fas fa-backward"></i> Kembali</a>
                    <form action="{{route('admin.kriteria.update',$kriteria->id)}}" method="post">
                        <input type="hidden" name="id" value="{{$kriteria->id}}">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="kode_kriteria">Kode kriteria</label>
                            <input type="text"
                                class="form-control @error('kode_kriteria') border border-danger @enderror"
                                placeholder="Kode kriteria" value="{{$kriteria->kode_kriteria}}" name="kode_kriteria"
                                readonly>
                            @error('kode_kriteria')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama_kriteria">Nama kriteria</label>
                            <input type="text"
                                class="form-control @error('nama_kriteria') border border-danger @enderror"
                                placeholder="Nama kriteria" value="{{$kriteria->nama_kriteria}}" name="nama_kriteria">
                            @error('nama_kriteria')
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