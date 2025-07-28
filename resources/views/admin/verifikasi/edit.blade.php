@extends('layouts.admin')

@section('title','edit verifikasi page admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">edit verifikasi</h1>
        {{ Breadcrumbs::render('edit_verifikasi', $verifikasi) }}
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-center bg-info text-white">
                    <i class="fas fa-table"></i> Form verifikasi
                </div>
                <div class="card-body">
                    <a href="{{route('admin.verifikasi.index')}}" class="btn btn-primary mb-3"><i
                            class="fas fa-backward"></i> Kembali</a>
                    <form action="{{route('admin.verifikasi.update',$verifikasi->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="tanggal">Tanggal</label>
                                    <input type="text"
                                        class="form-control datepicker @error('tanggal') border border-danger @enderror"
                                        placeholder="Tanggal"
                                        value="{{ CheckHelp::get_tanggal_show( $verifikasi->tanggal) }}" name="tanggal">
                                    @error('tanggal')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="waktu">Waktu</label>
                                    <input type="text"
                                        class="form-control timepicker @error('waktu') border border-danger @enderror"
                                        placeholder="waktu" value="{{$verifikasi->waktu }}" name="waktu">
                                    @error('waktu')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="judul_verifikasi">Judul verifikasi</label>
                            <input type="text"
                                class="form-control @error('judul_verifikasi') border border-danger @enderror"
                                placeholder="Judul Verifikasi" value="{{$verifikasi->judul_verifikasi }}"
                                name="judul_verifikasi">
                            @error('judul_verifikasi')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="status_verifikasi">Status</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status_verifikasi"
                                    id="status_verifikasi1" value="1" {{old('status_verifikasi') ??
                                    $verifikasi->status_verifikasi == '1' ? 'checked' : '' }}>
                                <label class="form-check-label" for="status_verifikasi1">
                                    Sudah Diverifikasi
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status_verifikasi"
                                    id="status_verifikasi2" value="0" {{old('status_verifikasi') ??
                                    $verifikasi->status_verifikasi == '0' ? 'checked' : '' }}>
                                <label class="form-check-label" for="status_verifikasi2">
                                    Belum Diverifikasi
                                </label>
                            </div>
                            @error('status_verifikasi')
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
        var pane = $('#alamat_warga');
        pane.val($.trim(pane.val()).replace(/\s*[\r\n]+\s*/g, '\n')
        .replace(/(<[^\/][^>]*>)\s*/g, '$1' ) .replace(/\s*( <\/[^>]+>)/g, '$1' ));
    })
   
</script>
@endpush
@endsection