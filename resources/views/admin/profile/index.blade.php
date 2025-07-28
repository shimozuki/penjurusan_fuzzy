@extends('layouts.admin')

@section('title','Profile page')

@section('content')
<?php 
$profile = CheckHelp::get_profile();
?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profile</h1>
        {{ Breadcrumbs::render('profile') }}
    </div>

    <!-- Content Row -->
    <div class="row">
        {{-- session --}}
        <div class="col-lg-12">
            @include('layouts.admin.partial.session')
        </div>
        @error('gambar_profile')
        <div class="col-lg-12">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Failed !</strong> {{$message}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        @enderror

        @error('password_old')
        <div class="col-lg-12">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Failed !</strong> {{$message}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        @enderror
        @error('password')
        <div class="col-lg-12">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Failed !</strong> {{$message}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        @enderror
        @error('password_confirmation')
        <div class="col-lg-12">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Failed !</strong> {{$message}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        @enderror

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header text-center bg-info text-white">
                    <i class="fas fa-user-tie"></i> Profile
                </div>
                <div class="card-body">
                    <?php
                    $gambar = $profile->gambar_profile != null ?  public_path().'/img/users/'.$profile->gambar_profile : false;
                    if(file_exists($gambar)){
                        $gambarFix = asset('img/users/'.$profile->gambar_profile);
                    } else {
                        $gambarFix = asset('img/users/default.png');
                    }
              
                    ?>
                    <div class="text-center">
                        <img src="{{$gambarFix}}" width="100%;" alt="">
                    </div>
                    <div class="my-3">
                        <a href="#" class="btn btn-primary form-control" data-toggle="modal"
                            data-target="#modalGantiPoto">Ganti Poto</a>
                    </div>
                    <div>
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Nama</span>
                                <span>{{$profile->nama_profile}}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Level</span>
                                <span>{{$profile->level}}</span>
                            </li>
                        </ul>
                    </div>
                    <div class="my-3">
                        <a href="#" class="btn btn-primary form-control" data-toggle="modal"
                            data-target="#modalGantiPassword">Ganti Password</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <form action="{{route('admin.profile.update')}}" method="post">
                @csrf
                <input type="hidden" name="users_id" value="{{$profile->users_id}}">
                <div class="card">
                    <div class="card-header text-center bg-info text-white">
                        <i class="fas fa-user-edit"></i> Edit Profile
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="nama_profile">Nama</label>
                                    <input type="text"
                                        class="form-control @error('nama_profile') border border-danger @enderror"
                                        name="nama_profile" value="{{$profile->nama_profile}}"
                                        placeholder="Nama profile">
                                    @error('nama_profile')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="no_hp">No. Handphone</label>
                                    <input type="text"
                                        class="form-control @error('no_hp') border border-danger @enderror" name="no_hp"
                                        value="{{$profile->no_hp}}" placeholder="Nama profile">
                                    @error('no_hp')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" class="form-control @error('alamat') border border-danger @enderror"
                                id="alamat" rows="5" placeholder="Alamat">
                            {{$profile->alamat}}
                        </textarea>
                        </div>
                        <div class="form-group">
                            <button type="reset" class="btn btn-danger"><i class="fas fa-sync-alt"></i> Reset</button>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i>
                                Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Content Row -->

</div>


<!-- Modal -->
<div class="modal fade" id="modalGantiPoto" tabindex="-1" aria-labelledby="modalGantiPotoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="modalGantiPotoLabel"><i class="fas fa-image"></i> Ganti Photo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('admin.profile.changeFoto')}}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="users_id" value="{{$profile->users_id}}">
                @csrf
                <div class="modal-body">
                    <input type="file" name="gambar_profile" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i>
                        Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-papper-line"></i> Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalGantiPassword" tabindex="-1" aria-labelledby="modalGantiPasswordLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="modalGantiPasswordLabel"><i class="fas fa-key"></i> Ganti Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('admin.profile.changePassword')}}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="users_id" value="{{$profile->users_id}}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="password_old">Password Lama</label>
                        <input type="password" name="password_old" class="form-control" placeholder="Password lama">
                    </div>
                    <div class="form-group">
                        <label for="password">Password Baru</label>
                        <input type="password" name="password" class="form-control" placeholder="Password baru">
                    </div>
                    <div class="form-group">
                        <label for="password_confirm">Password Lama</label>
                        <input type="password" name="password_confirmation" class="form-control"
                            placeholder="Password confirm">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i>
                        Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-papper-line"></i> Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@push('script')
<script>
    var pane = $('#alamat');
            pane.val($.trim(pane.val()).replace(/\s*[\r\n]+\s*/g, '\n')
            .replace(/(<[^\/][^>]*>)\s*/g, '$1' ) .replace(/\s*( <\/[^>]+>)/g, '$1' ));
</script>
@endpush
@endsection