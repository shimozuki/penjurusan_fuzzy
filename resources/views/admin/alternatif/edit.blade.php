@extends('layouts.admin')

@section('title','edit alternatif page admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">edit alternatif</h1>
        {{ Breadcrumbs::render('edit_alternatif', $alternatif) }}
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-center bg-info text-white">
                    <i class="fas fa-table"></i> Form alternatif
                </div>
                <div class="card-body">
                    <a href="{{url('admin/alternatif?verifikasi_id='.$verifikasi_id)}}" class="btn btn-primary mb-3"><i
                            class="fas fa-backward"></i> Kembali</a>
                    <form action="{{route('admin.alternatif.update', $alternatif->id)}}" method="post"
                        class="form-submit">
                        @csrf
                        @method('put')
                        <input type="hidden" name="alternatif_id" value="{{$alternatif->id}}">
                        <input type="hidden" name="verifikasi_id" value="{{$verifikasi_id}}">
                        <div class="form-group">
                            <label for="nama_warga">Nama warga</label>
                            <input type="text" class="form-control @error('nama_warga') border border-danger @enderror"
                                placeholder="Nama warga" value="{{old('nama_warga') ?? $alternatif->nama_warga}}"
                                name="nama_warga">
                            @error('nama_warga')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="alamat_warga">Alamat warga</label>
                            <textarea id="alamat_warga"
                                class="form-control @error('alamat_warga') border border-danger @enderror"
                                placeholder="Alamat" name="alamat_warga" rows="5">
                                {{old('alamat_warga') ?? $alternatif->alamat_warga}}
                            </textarea>
                            @error('alamat_warga')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="pernikahan_warga">Pernikahan</label>
                            <?php 
                            $pernikahan_warga = old('pernikahan_warga') ?? $alternatif->pernikahan_warga;
                            ?>
                            <select class="form-control @error('pernikahan_warga') border border-danger @enderror"
                                name="pernikahan_warga">
                                <option value="">-- Pernikahan --</option>
                                <option value="kawin" {{$pernikahan_warga=='kawin' ? 'selected' : '' }}> Kawin</option>
                                <option value="belum kawin" {{$pernikahan_warga=='belum kawin' ? 'selected' : '' }}>
                                    Belum
                                    Kawin</option>
                                <option value="cerai hidup" {{$pernikahan_warga=='cerai hidup' ? 'selected' : '' }}>
                                    Cerai
                                    Hidup</option>
                                <option value="cerai mati" {{$pernikahan_warga=='cerai mati' ? 'selected' : '' }}> Cerai
                                    Mati
                                </option>
                            </select>
                            @error('pernikahan_warga')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="pekerjaan_warga">Pekerjaan</label>
                            <input type="text"
                                class="form-control @error('pekerjaan_warga') border border-danger @enderror"
                                placeholder="Pekerjaan warga"
                                value="{{old('pekerjaan_warga') ?? $alternatif->pekerjaan_warga}}"
                                name="pekerjaan_warga">
                            @error('pekerjaan_warga')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="penghasilansuami_warga">Penghasilan suami</label>
                                    <input type="text"
                                        class="form-control numeric_penghasilansuami_warga @error('penghasilansuami_warga') border border-danger @enderror"
                                        placeholder="Penghasilan suami"
                                        value="{{old('penghasilansuami_warga') ?? $alternatif->penghasilansuami_warga}}"
                                        name="penghasilansuami_warga">
                                    @error('penghasilansuami_warga')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="penghasilanistri_warga">Penghasilan istri</label>
                                    <input type="text"
                                        class="form-control numeric_penghasilanistri_warga @error('penghasilanistri_warga') border border-danger @enderror"
                                        placeholder="Penghasilan istri"
                                        value="{{old('penghasilanistri_warga') ?? $alternatif->penghasilanistri_warga}}"
                                        name="penghasilanistri_warga">
                                    @error('penghasilanistri_warga')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="penghasilanpribadi_warga">Penghasilan pribadi</label>
                                    <input type="text"
                                        class="form-control numeric_penghasilanpribadi_warga @error('penghasilanpribadi_warga') border border-danger @enderror"
                                        placeholder="Pekerjaan warga"
                                        value="{{old('penghasilanpribadi_warga') ?? $alternatif->penghasilanpribadi_warga}}"
                                        name="penghasilanpribadi_warga">
                                    @error('penghasilanpribadi_warga')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="totalpenghasilan_warga">Total penghasilan</label>
                                    <input type="text"
                                        class="form-control numeric_totalpenghasilan_warga @error('totalpenghasilan_warga') border border-danger @enderror"
                                        placeholder="Total penghasilan"
                                        value="{{old('totalpenghasilan_warga') ?? $alternatif->totalpenghasilan_warga}}"
                                        name="totalpenghasilan_warga" readonly>
                                    @error('totalpenghasilan_warga')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tanggungan_warga">Tanggungan</label>
                            <input type="text"
                                class="form-control @error('tanggungan_warga') border border-danger @enderror"
                                placeholder="Tanggungan"
                                value="{{old('tanggungan_warga') ?? $alternatif->tanggungan_warga}}"
                                name="tanggungan_warga">
                            @error('tanggungan_warga')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="umur_warga">Umur</label>
                            <input type="text" class="form-control @error('umur_warga') border border-danger @enderror"
                                placeholder="Umur" value="{{old('umur_warga') ?? $alternatif->umur_warga}}"
                                name="umur_warga">
                            @error('umur_warga')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="pendidikanterakhir_warga">Pendidikan terakhir</label>
                            <?php 
                            $pendidikanterakhir_warga = old('pendidikanterakhir_warga') ?? $alternatif->pendidikanterakhir_warga;
                            ?>
                            <select
                                class="form-control @error('pendidikanterakhir_warga') border border-danger @enderror"
                                name="pendidikanterakhir_warga">
                                <option value="">-- Pendidikan Terakhir --</option>
                                <option value="slta/sederajat" {{$pendidikanterakhir_warga=='slta/sederajat'
                                    ? 'selected' : '' }}>SLTA/SEDERAJAT
                                </option>
                                <option value="sltp/sederajat" {{$pendidikanterakhir_warga=='sltp/sederajat'
                                    ? 'selected' : '' }}>SLTP/SEDERAJAT
                                </option>
                                <option value="sd/sederajat" {{$pendidikanterakhir_warga=='sd/sederajat' ? 'selected'
                                    : '' }}>SD/SEDERAJAT
                                </option>
                                <option value="tidak tamat" {{$pendidikanterakhir_warga=='tidak tamat' ? 'selected' : ''
                                    }}>TIDAK TAMAT
                                </option>
                            </select>
                            @error('pendidikanterakhir_warga')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="reset" class="btn btn-danger"><i class="fas fa-sync-alt"></i> Reset</button>
                            <button type="button" class="btn btn-primary btn-hitung"><i class="fas fa-calculator"></i>
                                Total Penghasilan</button>
                            <button type="submit" class="btn btn-primary btn-submit"><i class="fas fa-paper-plane"></i>
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

        new AutoNumeric.multiple(['.numeric_penghasilansuami_warga', '.numeric_penghasilanistri_warga', '.numeric_penghasilanpribadi_warga', '.numeric_totalpenghasilan_warga'], {
            decimalPlaces: 0
        });

       $(document).on('click','.btn-hitung',function(){
        let gajiSuami = getGajiSuami();
        let gajiIstri = getGajiIstri();
        let gajiPribadi = getGajiPribadi();
        console.log(gajiSuami, gajiIstri, gajiPribadi);

        let totalGaji = (parseInt(gajiSuami) + parseInt(gajiIstri) + parseInt(gajiPribadi));
        $('.numeric_totalpenghasilan_warga').val(number_format(totalGaji));
       })

       function getGajiSuami()
       {
        let val = $('.numeric_penghasilansuami_warga').val();
        if(val != ''){
            let split = val.split(',').join('');
            return split;
        }
        return 0;
       }

       function getGajiIstri()
       {
        let val = $('.numeric_penghasilanistri_warga').val();
        if(val != ''){
            let split = val.split(',').join('');
            return split;
        }
        return 0;
       }

       function getGajiPribadi()
       {
        let val = $('.numeric_penghasilanpribadi_warga').val();
        if(val != ''){
            let split = val.split(',').join('');
            return split;
        }
        return 0;
       }

        $(".select2" ).select2({
            theme: "bootstrap"
        });

        $(document).on('click','.btn-submit',function(e){
            e.preventDefault();
            let numeric_totalpenghasilan_warga = $('.numeric_totalpenghasilan_warga').val();
            if(numeric_totalpenghasilan_warga == '' || numeric_totalpenghasilan_warga == null){
                return alert('Harap hitung total penghasilan dahulu');
            }
            $('.form-submit').submit()

        })

        function number_format(number, decimals, dec_point, thousands_sep) {
            // Strip all characters but numerical ones.
            number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
            var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                s = '',
                toFixedFix = function(n, prec) {
                    var k = Math.pow(10, prec);
                    return '' + Math.round(n * k) / k;
                };
            // Fix for IE parseFloat(0.55).toFixed(0) = 0;
            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
            }
            if ((s[1] || '').length < prec) {
                s[1] = s[1] || '';
                s[1] += new Array(prec - s[1].length + 1).join('0');
            }
            return s.join(dec);
        }
       
    })
   
</script>
@endpush
@endsection