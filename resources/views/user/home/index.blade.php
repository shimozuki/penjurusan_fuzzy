@extends('layouts.user')

@section('title','user page bansos')

@section('content')
<div class="container-fluid px-5 bg-light">
    <div class="d-flex justify-content-between py-3 px-0 align-items-center">
        <span class="text-open-sans-regular">Pencarian data</span>
        {{ Breadcrumbs::render('home_user') }}
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center flex-column justify-content-around min-height-600">
                        <span class="text-open-sans-semi-bold">
                            <i class="fas fa-bullhorn"></i> Cari data (Penerima Manfaat) BANSOS
                        </span>
                        <div class="text-open-sans-bold w-100">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No.</th>
                                            <th class="text-center">Tanggal</th>
                                            <th class="text-center">Judul</th>
                                            <th class="text-center" width="15%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pengumuman as $v_pengumuman)
                                        <tr>
                                            <td class="text-center">{{$loop->iteration}}</td>
                                            <td class="text-center">
                                                {{CheckHelp::get_tanggal_show($v_pengumuman->tanggal_pengumuman)}}</td>
                                            <td class="text-center">{{$v_pengumuman->judul_pengumuman}}</td>
                                            <td class="text-center">
                                                <a href="{{route('user.lihat',$v_pengumuman->id)}}"
                                                    class="btn btn-info"><i class="fas fa-eye"></i> Lihat</a>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <span class="text-open-sans-regular text-center">
                            Silahkan pilih daftar pengumuman bansos yang tersedia <br>
                            dan cari data dengan memasukan Nama sesuai KTP peserta bansos <br>
                            Terima kasih :)
                        </span>
                    </div>
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