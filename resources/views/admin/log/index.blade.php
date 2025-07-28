@extends('layouts.admin')

@section('title','log page admin')

@section('content')
<style>
    .table.table-bordered.dataTable.no-footer {
        width: 100% !important;
    }
</style>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">log</h1>
        {{ Breadcrumbs::render('log') }}
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                @include('layouts.admin.partial.session')
                <div class="card-header text-center bg-info text-white">
                    <i class="fas fa-table"></i> log
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Admin</th>
                                    <th>Aktivitas</th>
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


@push('script')
<script>
    $(document).ready(function(){
        $('#dataTable').DataTable({
            ajax: '{{route("admin.log.index")}}',
            columns: [
                {data: 'DT_RowIndex', name: 'no'},
                {data: 'users_id', name: 'users_id'},
                {data: 'aktivitas', name: 'aktivitas'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    })
</script>
@endpush
@endsection