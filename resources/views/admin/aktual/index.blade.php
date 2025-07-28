@extends('layouts.admin')

@section('title','Data aktual page admin')

@section('content')
<style>
    .table.table-bordered.dataTable.no-footer {
        width: 100% !important;
    }
</style>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Aktual</h1>
        {{ Breadcrumbs::render('aktual') }}
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                @include('layouts.admin.partial.session')
                <div class="card-header text-center bg-info text-white">
                    <i class="fas fa-table"></i> Aktual
                </div>
                <div class="card-body">
                    <a href="{{route('admin.penyeleksian.index')}}" class="btn btn-warning mb-3"><i
                            class="fas fa-backward"></i>
                        Kembali
                    </a>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <select name="verifikasi_data_id" class="form-control select_verifikasi_data_id" id="">
                                    <option value="">-- Verifikasi data --</option>
                                    @foreach ($verifikasi as $v_verifikasi)
                                    <option value="{{$v_verifikasi->id}}">{{$v_verifikasi->judul_verifikasi}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <button type="button" class="btn btn-primary btn-save-session"><i class="fas fa-save"></i>
                                Save Session</button>
                            <button type="button" class="btn btn-primary btn-submit"><i class="fas fa-paper-plane"></i>
                                Submit</button>
                            <button type="button" class="btn btn-success" data-toggle="modal"
                                data-target="#modalImport"><i class="fas fa-file-excel"></i>
                                Import</button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="checkall">
                                            <label class="form-check-label" for="checkall">
                                            </label>
                                        </div>
                                    </th>
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
            <div class="card mt-2">
                <div class="card-header text-center bg-info text-white">
                    <i class="fas fa-table"></i> Data Aktual
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTableAktual">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no=1;    
                                ?>
                                @foreach ($aktual as $v_aktual)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{ucwords($v_aktual->nama_warga)}}</td>
                                    <td>{{ucwords($v_aktual->alamat_warga)}}</td>
                                    <td>
                                        <div class="text-center">
                                            <a href="{{url('admin/aktual/delete/'.$v_aktual->id.'?penyeleksian_id='.$penyeleksian_id)}}"
                                                class="btn btn-danger btn-delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalImport" tabindex="-1" aria-labelledby="modalImportLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalImportLabel">Import Data Aktual</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('admin/aktual/import?penyeleksian_id='.$penyeleksian_id)}}" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Import File</label>
                        <input type="file" class="form-control" name="import" required accept=".xlsx, .xls, .csv">
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
        loadTable();
        $('#dataTableAktual').DataTable();
        function loadTable(verifikasi_data_id = null)
        {
            $('#dataTable').DataTable({
                ajax: {
                    url: '{{url("admin/aktual?penyeleksian_id=".$penyeleksian_id)}}',
                    data:{
                        verifikasi_data_id: verifikasi_data_id
                    },
                    type: 'get',
                    dataType: 'json'
                },
                columns: [
                    {data: 'check_warga', name: 'check_warga'},
                    {data: 'DT_RowIndex', name: 'no'},
                    {data: 'nama_warga', name: 'nama_warga'},
                    {data: 'alamat_warga', name: 'alamat_warga'},
                    // {data: 'no_hp_warga', name: 'no_hp_warga'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        }

        $(document).on('click','#checkall',function(){
            if($(this).is(':checked')){
                $('.checkitem').prop('checked',true);
            } else {
                $('.checkitem').prop('checked',false);
            }
        })

        $(document).on('click','.checkitem',function(){
            let checked_item = $('.checkitem:checked').length;
            let checked = $('.checkitem').length;

            if(checked_item == checked){
                $('#checkall').prop('checked',true);
            } else {
                $('#checkall').prop('checked',false);
            }
        })

        $(document).on('change','.select_verifikasi_data_id',function(){
            let val = $(this).val();
            $('#dataTable').DataTable().destroy();
            if(val != ''){
                loadTable(val);
            } else {
                loadTable();
            }
        })

        $(document).on('click','.btn-save-session',function(){
            var checked = [];
            var not_checked = [];
            var val = '';
            var input = $('.checkitem');
            
            $.each(input, function(i,v){
               if($(this).is(':checked')){
                    checked.push($(this).val());
               } else {
                    not_checked.push($(this).val());
               }
            })

            $.ajax({
                url: '{{route("admin.aktual.saveSession")}}',
                type: 'get',
                dataType: 'json',
                data:{
                    checked,
                    not_checked
                },
                success:function(data){
                    $('#dataTable').DataTable().destroy();
                    loadTable();
                },error:function(x,t,m){
                    console.log(x.responseText);
                }
            })
        })
        $(document).on('click','.btn-submit',function(e){
            e.preventDefault();
            const root = "{{url('admin/aktual/submit?penyeleksian_id='.$penyeleksian_id)}}";
            if(confirm('Apakah sudah benar memilih beberapa warga penerima bansos ?')){
                window.location.href= root;
            }
        })

        $(document).on('click','.btn-delete',function(e){
            e.preventDefault();
            if(confirm('Yakin ingin hapus data ini?')){
                let url = $(this).attr('href');
                window.location.href = url;
            }
        })
    })
</script>
@endpush
@endsection