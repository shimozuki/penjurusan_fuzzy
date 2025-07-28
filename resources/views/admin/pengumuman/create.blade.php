@extends('layouts.admin')

@section('title','Tambah pengumuman page admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah pengumuman</h1>
        {{ Breadcrumbs::render('tambah_pengumuman') }}
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-center bg-info text-white">
                    <i class="fas fa-table"></i> Form pengumuman
                </div>
                <div class="card-body">
                    <a href="{{route('admin.pengumuman.index')}}" class="btn btn-primary mb-3"><i
                            class="fas fa-backward"></i> Kembali</a>
                    <form action="{{route('admin.pengumuman.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="penilaian_id">Dari Kegiatan</label>
                            <?php 
                            $penilaianId = old('penilaian_id');
                            ?>
                            <select class="form-control @error('penilaian_id') border border-danger @enderror"
                                name="penilaian_id">
                                <option value=""> -- Penilaian --</option>
                                @foreach ($penilaian as $v_penilaian)
                                <option value="{{$v_penilaian->id}}" {{$penilaianId==$v_penilaian->id ? 'selected' :
                                    ''}}>
                                    {{$v_penilaian->judul_penilaian}}
                                </option>
                                @endforeach
                            </select>
                            @error('penilaian_id')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="tanggal_pengumuman">Tanggal pengumuman</label>
                                    <input type="text"
                                        class="form-control datepicker @error('tanggal_pengumuman') border border-danger @enderror"
                                        placeholder="Tanggal pengumuman" value="{{old('tanggal_pengumuman')}}"
                                        name="tanggal_pengumuman">
                                    @error('tanggal_pengumuman')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="status_pengumuman">Status pengumuman</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status_pengumuman"
                                            id="status_pengumuman1" value="buka" {{old('status_pengumuman')=='buka'
                                            ? 'checked' : '' }}>
                                        <label class="form-check-label" for="status_pengumuman1">
                                            Buka
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status_pengumuman"
                                            id="status_pengumuman2" value="tutup" {{old('status_pengumuman')=='tutup'
                                            ? 'checked' : '' }}>
                                        <label class="form-check-label" for="status_pengumuman2">
                                            Tutup
                                        </label>
                                    </div>
                                    @error('status_pengumuman')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="judul_pengumuman">Judul pengumuman</label>
                            <input type="text"
                                class="form-control @error('judul_pengumuman') border border-danger @enderror"
                                placeholder="Judul pengumuman" value="{{old('judul_pengumuman')}}"
                                name="judul_pengumuman">
                            @error('judul_pengumuman')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="keterangan_pengumuman">keterangan pengumuman</label>
                            <textarea rows="5" id="keterangan_pengumuman"
                                class="form-control @error('keterangan_pengumuman') border border-danger @enderror"
                                placeholder="keterangan pengumuman" name="keterangan_pengumuman">
                            {{old('keterangan_pengumuman')}}
                            </textarea>
                            @error('keterangan_pengumuman')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kuota_pengumuman">Kuota pengumuman</label>
                            <input type="number"
                                class="form-control @error('kuota_pengumuman') border border-danger @enderror"
                                placeholder="Kuota pengumuman" value="{{old('kuota_pengumuman')}}"
                                name="kuota_pengumuman">
                            @error('kuota_pengumuman')
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
        var pane = $('#keterangan_pengumuman');
            pane.val($.trim(pane.val()).replace(/\s*[\r\n]+\s*/g, '\n')
            .replace(/(<[^\/][^>]*>)\s*/g, '$1' ) .replace(/\s*( <\/[^>]+>)/g, '$1' ));
})
</script>

@endpush
@endsection