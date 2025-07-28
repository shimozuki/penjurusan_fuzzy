@extends('layouts.user')

@section('title','cari data user page bansos')

@section('content')
<style>
    .captcha img {
        width: 80%;
    }

    .petunjuk ul {
        list-style: none;
        line-height: 0.8cm;
    }
</style>
<div class="container-fluid px-5 bg-light">
    <div class="d-flex justify-content-between py-3 px-0 align-items-center">
        <span class="text-open-sans-regular">Pencarian data</span>
        {{ Breadcrumbs::render('cari_data',$pengumuman) }}
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <p class="text-uppercase text-open-sans-bold">cari data (penerima manfaat) bansos</p>
                    <form action="{{route('user.search', $pengumuman->id)}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="nama_warga">Nama Warga (Penerima Manfaat)</label>
                            <input type="text" name="nama_warga" class="form-control nama_warga 
                            @error('nama_warga')
                                {{$message}}
                            @enderror" placeholder="Nama Warga" value="{{old('nama_warga')}}">
                            @error('nama_warga')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group captcha row">
                            <div class="col-lg-6">
                                <label for="">Captcha</label><br>
                                <span>{!!captcha_img()!!}</span>
                                <button type="button" class="btn btn-danger" class="reload" id="reload">
                                    <i class="fas fa-sync-alt"></i>
                                </button>
                                <br>
                                <input id="captcha" type="text" class="form-control" placeholder="Input captcha"
                                    name="captcha">
                                @error('captcha')
                                <small class="text-danger">Wrong Captcha, Write Captcha again</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group bg-navbar d-flex justify-content-between p-3">
                            <button type="reset" class="btn btn-danger"><i class="fas fa-sync-alt"></i> Batal</button>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Cari
                                Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4 ">
            <div class="card">
                <div class="card-body petunjuk">
                    <div class="d-flex flex-column justify-content-between min-height-400">
                        <div>
                            <p class="text-open-sans-semi-bold">Petunjuk Pencarian</p>
                            <ul>
                                <li>1. Masukan Nama warga sesuai KTP</li>
                                <li>2. Masukan jumlah dari perhitungan captcha dengan benar</li>
                                <li>3. Jika terdapat angka yang kurang jelas silahkan klik tombol <i
                                        class="fas fa-sync-alt"></i> untuk mendapatkan
                                    angka yang jelas </li>
                                <li>4. Klik tombol CARI DATA</li>
                            </ul>
                        </div>
                        <div>
                            <p class="text-open-sans-semi-bold">
                                <u>Note :</u><br>
                                <small>Sistem cek bansos mencari nama sesuai KTP pemohon<br>
                                    (Penerima Manfaat) sesuai yang diinputkan
                                </small>
                            </p>
                        </div>
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

        function loadCaptcha()
        {
            $.ajax({
                type: 'GET',
                url: '{{route("user.reloadCaptcha",$pengumuman->id)}}',
                success: function (data) {
                    console.log(data);
                    $(".captcha span").html(data.captcha);
                }
            });
        }

        $(document).on('click','#reload',function(){
            loadCaptcha();
        })

        $(document).on('keyup','.nama_warga',function(){
            $(this).val($(this).val().toUpperCase());
        });
    })
</script>
@endpush
@endsection