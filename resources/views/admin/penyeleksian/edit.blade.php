@extends('layouts.admin')

@section('title','edit penyeleksian page admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">edit penyeleksian</h1>
        {{ Breadcrumbs::render('edit_penyeleksian', $penyeleksian) }}
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-center bg-info text-white">
                    <i class="fas fa-table"></i> Form penyeleksian
                </div>
                <div class="card-body">
                    <a href="{{route('admin.penyeleksian.index')}}" class="btn btn-primary mb-3"><i
                            class="fas fa-backward"></i> Kembali</a>
                    <form action="{{route('admin.penyeleksian.update', $penyeleksian->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="tanggal_penilaian">Tanggal penilaian</label>
                            <input type="text"
                                class="form-control datepicker @error('tanggal_penilaian') border border-danger @enderror"
                                placeholder="Tanggal penilaian"
                                value="{{CheckHelp::get_tanggal_show($penyeleksian->tanggal_penilaian)}}"
                                name="tanggal_penilaian">
                            @error('tanggal_penilaian')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="judul_penilaian">Judul penilaian</label>
                            <input type="text"
                                class="form-control @error('judul_penilaian') border border-danger @enderror"
                                placeholder="Judul penilaian" value="{{$penyeleksian->judul_penilaian}}"
                                name="judul_penilaian">
                            @error('judul_penilaian')
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
@push('script')
<script>
    $(document).ready(function(){
        $('.datepicker').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
            
        })
})
</script>

@endpush
@endsection