@extends('layouts.admin')

@section('title','edit konfigurasi page admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">edit konfigurasi</h1>
        {{ Breadcrumbs::render('edit_konfigurasi', $konfigurasi) }}
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                @include('layouts.admin.partial.session')
                <div class="card-header text-center bg-info text-white">
                    <i class="fas fa-table"></i> Form konfigurasi
                </div>
                <div class="card-body">
                    <a href="{{route('admin.konfigurasi.index')}}" class="btn btn-primary mb-3"><i
                            class="fas fa-backward"></i>
                        Kembali</a>
                    <form action="{{route('admin.konfigurasi.update', $konfigurasi->id)}}" method="post"
                        enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <input type="hidden" name="id" value="{{$konfigurasi->id}}">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="nama_aplikasi">Nama aplikasi</label>
                                    <input type="text"
                                        class="form-control @error('nama_aplikasi') border border-danger @enderror"
                                        placeholder="Nama aplikasi" value="{{$konfigurasi->nama_aplikasi}}"
                                        name="nama_aplikasi">
                                    @error('nama_aplikasi')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="no_hp">No. Handphone</label>
                                    <input type="text"
                                        class="form-control @error('no_hp') border border-danger @enderror"
                                        placeholder="No. Handphone" value="{{$konfigurasi->no_hp}}" name="no_hp">
                                    @error('no_hp')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea id="keterangan" rows="5"
                                class="form-control @error('keterangan') border border-danger @enderror"
                                placeholder="Keterangan" name="keterangan">
                                {{$konfigurasi->keterangan}}
                            </textarea>
                            @error('keterangan')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="created_by">Created By</label>
                                    <input type="text"
                                        class="form-control @error('created_by') border border-danger @enderror"
                                        placeholder="Created by" value="{{$konfigurasi->created_by}}" name="created_by">
                                    @error('created_by')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text"
                                        class="form-control @error('email') border border-danger @enderror"
                                        placeholder="Email" value="{{$konfigurasi->email}}" name="email">
                                    @error('email')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="facebook">Facebook</label>
                                    <input type="text"
                                        class="form-control @error('facebook') border border-danger @enderror"
                                        placeholder="Facebook" value="{{$konfigurasi->facebook}}" name="facebook">
                                    @error('facebook')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="youtube">Youtube</label>
                                    <input type="text"
                                        class="form-control @error('youtube') border border-danger @enderror"
                                        placeholder="youtube" value="{{$konfigurasi->youtube}}" name="youtube">
                                    @error('youtube')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="instagram">Instagram</label>
                                    <input type="text"
                                        class="form-control @error('instagram') border border-danger @enderror"
                                        placeholder="instagram" value="{{$konfigurasi->instagram}}" name="instagram">
                                    @error('instagram')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea id="alamat" class="form-control @error('alamat') border border-danger @enderror"
                                placeholder="alamat" name="alamat">
                                {{$konfigurasi->alamat}}
                            </textarea>
                            @error('alamat')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="gambar_konfigurasi">Logo aplikasi</label>
                            <input type="file" name="gambar_konfigurasi" class="form-control">
                            <?php 
                            $gambar = $konfigurasi->gambar_konfigurasi != null ? public_path() . '/img/logo/' . $konfigurasi->gambar_konfigurasi : false;
                            if (file_exists($gambar)) {
                                $gambarFix = asset('img/logo/' . $konfigurasi->gambar_konfigurasi);
                            } else {
                                $gambarFix = asset('img/logo/default.png');
                            }
                            ?>
                            <img src="{{$gambarFix}}" class="w-25" alt="">
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
        var pane = $('#alamat');
            pane.val($.trim(pane.val()).replace(/\s*[\r\n]+\s*/g, '\n')
            .replace(/(<[^\/][^>]*>)\s*/g, '$1' ) .replace(/\s*( <\/[^>]+>)/g, '$1' ));
        var pane = $('#keterangan');
            pane.val($.trim(pane.val()).replace(/\s*[\r\n]+\s*/g, '\n')
            .replace(/(<[^\/][^>]*>)\s*/g, '$1' ) .replace(/\s*( <\/[^>]+>)/g, '$1' ));
})
</script>

@endpush
@endsection