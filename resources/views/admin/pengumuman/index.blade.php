@extends('layouts.admin')

@section('title','pengumuman page admin')

@section('content')
<style>
    .table.table-bordered.dataTable.no-footer {
        width: 100% !important;
    }
</style>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">pengumuman</h1>
        {{ Breadcrumbs::render('pengumuman') }}
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                @include('layouts.admin.partial.session')
                <div class="card-header text-center bg-info text-white">
                    <i class="fas fa-table"></i> pengumuman
                </div>
                <div class="card-body">
                    <a href="{{route('admin.pengumuman.create')}}" class="btn btn-primary mb-3"><i
                            class="fas fa-plus"></i> Tambah
                    </a>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Tanggal</th>
                                    <th>Judul</th>
                                    <th>Status</th>
                                    <th>Kegiatan</th>
                                    <th>Penerima</th>
                                    <th width="20%;">Action</th>
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



@push('script')
<script>
    $(document).ready(function(){
        $('#dataTable').DataTable({
            ajax: '{{route("admin.pengumuman.index")}}',
            columns: [
                {data: 'DT_RowIndex', name: 'no'},
                {data: 'tanggal_pengumuman', name: 'tanggal_pengumuman'},
                {data: 'judul_pengumuman', name: 'judul_pengumuman'},
                {data: 'status_pengumuman', name: 'status_pengumuman'},
                {data: 'judul_penilaian', name: 'judul_penilaian'},
                {data: 'kuota_pengumuman', name: 'kuota_pengumuman'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    })
</script>
@endpush
@endsection