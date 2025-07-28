@extends('layouts.admin')

@section('title','alternatif page admin')

@section('content')
<style>
    .table.table-bordered.dataTable.no-footer {
        width: 100% !important;
    }
</style>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Alternatif</h1>
        {{ Breadcrumbs::render('alternatif') }}
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                @include('layouts.admin.partial.session')
                <div class="card-header text-center bg-info text-white">
                    <i class="fas fa-table"></i> Alternatif
                </div>
                <div class="card-body">
                    <a href="{{route('admin.verifikasi.index')}}" class="btn btn-warning mb-3"><i
                            class="fas fa-backward"></i>
                        Kembali
                    </a>
                    <a href="{{url('/admin/alternatif/create?verifikasi_id='.$verifikasi_id)}}"
                        class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambah
                    </a>
                    <a href="#" data-toggle="modal" data-target="#modalImpor" class="btn btn-success mb-3"><i
                            class="fas fa-file-excel"></i>
                        Import
                    </a>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Warga</th>
                                    <th>Alamat</th>
                                    {{-- <th>No. Handhpone</th> --}}
                                    <th width="25%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalImpor" tabindex="-1" aria-labelledby="modalImporLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalImporLabel">Import Alternatif</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('admin/alternatif/import?verifikasi_id='.$verifikasi_id)}}" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Import File</label>
                        <input type="file" class="form-control" name="import">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"> <i
                            class="fas fa-window-close"></i> Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('script')
<script>
    $(document).ready(function(){
        $('#dataTable').DataTable({
            ajax: '{{url("admin/alternatif?verifikasi_id=".$verifikasi_id)}}',
            columns: [
                {data: 'DT_RowIndex', name: 'no'},
                {data: 'nama_warga', name: 'nama_warga'},
                {data: 'alamat_warga', name: 'alamat_warga'},
                // {data: 'no_hp_warga', name: 'no_hp_warga'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    })
</script>
@endpush
@endsection