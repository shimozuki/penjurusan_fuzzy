@extends('layouts.admin')

@section('title','Tambah user page admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah user</h1>
        {{ Breadcrumbs::render('tambah_user') }}
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-center bg-info text-white">
                    <i class="fas fa-table"></i> Form user
                </div>
                <div class="card-body">
                    <a href="{{route('admin.user.index')}}" class="btn btn-primary mb-3"><i class="fas fa-backward"></i>
                        Kembali</a>
                    <form action="{{route('admin.user.store')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control @error('username') border border-danger @enderror"
                                placeholder="Username" value="{{old('username')}}" name="username">
                            @error('username')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password"
                                class="form-control @error('password') border border-danger @enderror"
                                placeholder="Password" value="{{old('password')}}" name="password">
                            @error('password')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Password Confirmation</label>
                            <input type="password"
                                class="form-control @error('password_confirmation') border border-danger @enderror"
                                placeholder="Password confirmation" value="{{old('password_confirmation')}}"
                                name="password_confirmation">
                            @error('password_confirmation')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="status_aktif"
                                    value="aktif">
                                <label class="form-check-label" for="status_aktif">Aktif</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="status"
                                    value="non aktif">
                                <label class="form-check-label" for="status">Non aktif</label>
                            </div>
                            <br>
                            @error('status')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="nama_profile">Nama Profile</label>
                                    <input type="text"
                                        class="form-control @error('nama_profile') border border-danger @enderror"
                                        placeholder="Nama profile" value="{{old('nama_profile')}}" name="nama_profile">
                                    @error('nama_profile')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label><br>
                                    <?php 
                                    $jenis_kelamin = old('jenis_kelamin');
                                    ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin"
                                            id="jenis_kelamin_L" value="L" {{$jenis_kelamin=='L'?'checked': ''}}>
                                        <label class="form-check-label" for="jenis_kelamin_L">Laki laki</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin"
                                            id="jenis_kelamin_P" value="P" {{$jenis_kelamin=='P '?'checked': ''}}>
                                        <label class="form-check-label" for="jenis_kelamin_P">Perempuan</label>
                                    </div>
                                    @error('jenis_kelamin')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="no_hp">No. Handphone</label>
                                    <input type="number" min="0"
                                        class="form-control @error('no_hp') border border-danger @enderror"
                                        placeholder="No. Handphone" value="{{old('no_hp')}}" name="no_hp">
                                    @error('no_hp')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea id="alamat" class="form-control @error('alamat') border border-danger @enderror"
                                placeholder="alamat" name="alamat">
                                {{old('alamat')}}
                            </textarea>
                            @error('alamat')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Upload Gambar</label>
                            <input type="file" name="gambar_profile" class="form-control">
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
})
</script>

@endpush
@endsection