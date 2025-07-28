<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Check;
use App\Http\Controllers\Controller;
use App\Models\Kriteria;
use App\Models\Objektif;
use App\Models\Sub_kriteria;
use App\Models\Warga;
use Illuminate\Http\Request;
use Datatables;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as Xlsximport;


class AlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $alternatif = Warga::where('verifikasi_data_id', '=', request()->input('verifikasi_id'))->get();
            return Datatables::of($alternatif)
                ->addIndexColumn()
                ->addColumn('nama_warga', function ($alternatif) {
                    $output = ucwords($alternatif->nama_warga);
                    return $output;
                })
                ->addColumn('alamat_warga', function ($alternatif) {
                    $output = ucwords($alternatif->alamat_warga);
                    return $output;
                })
                ->addColumn('action', function ($alternatif) {
                    $verifikasi = request()->input('verifikasi_id');
                    return '
                    <a href="' . url('admin/alternatif', $alternatif->id) . '?verifikasi_id=' . $verifikasi . '" class="btn btn-sm btn-info"><i class="fas fa-eye"></i> Detail</a>

                    <a href="' . url('admin/alternatif/' . $alternatif->id . '/edit?verifikasi_id=' . $verifikasi) . '" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i> Edit</a>
                    <form class="d-inline" method="post" action="' . route('admin.alternatif.destroy', $alternatif->id) . '">
                    <input type="hidden" name="_token" value="' . csrf_token() . '">
                    <input type="hidden" name="verifikasi_id" value="' . $verifikasi . '">
                    
                   ' . method_field('delete') . '
                        <button type="submit" onclick="return confirm(\'Yakin ingin menghapus item ini?\')" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> Hapus</a>
                    </form>

                    ';
                })
                ->make();
        }
        return view('admin.alternatif.index', [
            'verifikasi_id' => $request->input('verifikasi_id')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kriteria = Kriteria::all();
        return view('admin.alternatif.create', [
            'kriteria' => $kriteria,
            'verifikasi_id' => request()->input('verifikasi_id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'nama_warga' => 'required',
            'alamat_warga' => 'required',
            'pernikahan_warga' => 'required',
            'pekerjaan_warga' => 'required',
            // 'penghasilansuami_warga' => 'required',
            // 'penghasilanistri_warga' => 'required',
            // 'penghasilanpribadi_warga' => 'required',
            'totalpenghasilan_warga' => 'required',
            'tanggungan_warga' => 'required',
            'umur_warga' => 'required',
            'pendidikanterakhir_warga' => 'required',
        ]);

        // warga
        $penghasilansuami_warga = $request->input('penghasilansuami_warga') != null ? $request->input('penghasilansuami_warga') : 0;
        $penghasilanistri_warga = $request->input('penghasilanistri_warga') != null ? $request->input('penghasilanistri_warga') : 0;
        $penghasilanpribadi_warga = $request->input('penghasilanpribadi_warga') != null ? $request->input('penghasilanpribadi_warga') : 0;
        $totalpenghasilan_warga = $request->input('totalpenghasilan_warga') != null ? $request->input('totalpenghasilan_warga') : 0;
        $warga = Warga::create([
            'nama_warga' => $request->input('nama_warga'),
            'alamat_warga' => $request->input('alamat_warga'),
            'pernikahan_warga' => $request->input('pernikahan_warga'),
            'pekerjaan_warga' => $request->input('pekerjaan_warga'),
            'penghasilansuami_warga' => str_replace(',', '', $penghasilansuami_warga),
            'penghasilanistri_warga' => str_replace(',', '', $penghasilanistri_warga),
            'penghasilanpribadi_warga' => str_replace(',', '', $penghasilanpribadi_warga),
            'totalpenghasilan_warga' => str_replace(',', '', $totalpenghasilan_warga),
            'tanggungan_warga' => $request->input('tanggungan_warga'),
            'umur_warga' => $request->input('umur_warga'),
            'pendidikanterakhir_warga' => $request->input('pendidikanterakhir_warga'),
            'verifikasi_data_id' => $request->input('verifikasi_id')
        ]);

        // subkriteria
        // subkriteria pernikahan
        $kawin = trim($request->input('pernikahan_warga'));
        $kawinDb = Kriteria::where('nama_kriteria', '=', 'pernikahan')->first()->subKriteria()->get();

        $dataSubKriteria = [];
        foreach ($kawinDb as $key => $v_kawinDb) {
            if ($v_kawinDb->nama_sub_kriteria == $kawin) {
                $dataSubKriteria[] = $v_kawinDb->id;
            }
        }

        // subkriteria pendidikan
        $pendidikan = trim($request->input('pendidikanterakhir_warga'));
        $pendidikanDb = Kriteria::where('nama_kriteria', '=', 'pendidikan terakhir')->first()->subKriteria()->get();
        foreach ($pendidikanDb as $key => $v_pendidikanDb) {
            if ($v_pendidikanDb->nama_sub_kriteria == $pendidikan) {
                $dataSubKriteria[] = $v_pendidikanDb->id;
            }
        }

        $sub_kriteria_warga = Warga::find($warga->id);
        $sub_kriteria_warga->subKriteria()->attach($dataSubKriteria);


        // objektif
        // tanggungan keluarga
        $tKeluarga = Kriteria::where('nama_kriteria', '=', 'tanggungan keluarga')->first();
        $sKriteriaTKeluarga = Sub_kriteria::where('kriteria_id', '=', $tKeluarga->id)->get();

        $dataObjektif = [];
        $tanggunganKeluarga = $request->input('tanggungan_warga');
        foreach ($sKriteriaTKeluarga as $key => $v_tkeluarga) {
            $extStripKeluarga = explode('-', $v_tkeluarga->nama_sub_kriteria);
            $extMoreKeluarga = explode('>', $v_tkeluarga->nama_sub_kriteria);

            if (isset($extStripKeluarga[1])) {
                if ($extStripKeluarga[0] <= $tanggunganKeluarga && $tanggunganKeluarga <= $extStripKeluarga[1]) {
                    $dataObjektif[] = [
                        'nama_objektif' => Check::get_kriteria($v_tkeluarga->kriteria_id)->nama_kriteria,
                        'value_objektif' => $tanggunganKeluarga,
                        'bobot_objektif' => $v_tkeluarga->bobot_sub_kriteria
                    ];
                }
            }

            if (isset($extMoreKeluarga[1])) {
                if ($tanggunganKeluarga > $extMoreKeluarga[1]) {
                    $dataObjektif[] = [
                        'nama_objektif' => Check::get_kriteria($v_tkeluarga->kriteria_id)->nama_kriteria,
                        'value_objektif' => $tanggunganKeluarga,
                        'bobot_objektif' => $v_tkeluarga->bobot_sub_kriteria
                    ];
                }
            }
        }

        // umur
        $Umur = Kriteria::where('nama_kriteria', '=', 'umur')->first();
        $sKriteriaUmur = Sub_kriteria::where('kriteria_id', '=', $Umur->id)->get();
        $umur = $request->input('umur_warga');
        foreach ($sKriteriaUmur as $key => $v_Umur) {
            $extStripUmur = explode('-', $v_Umur->nama_sub_kriteria);
            $extUmur = explode('>', $v_Umur->nama_sub_kriteria);

            if (isset($extStripUmur[1])) {
                if ($extStripUmur[0] <= $umur && $umur <= $extStripUmur[1]) {
                    $dataObjektif[] = [
                        'nama_objektif' => Check::get_kriteria($v_Umur->kriteria_id)->nama_kriteria,
                        'value_objektif' => $umur,
                        'bobot_objektif' => $v_Umur->bobot_sub_kriteria
                    ];
                }
            }

            if (isset($extUmur[1])) {
                if ($umur > $extUmur[1]) {
                    $dataObjektif[] = [
                        'nama_objektif' => Check::get_kriteria($v_Umur->kriteria_id)->nama_kriteria,
                        'value_objektif' => $umur,
                        'bobot_objektif' => $v_Umur->bobot_sub_kriteria
                    ];
                }
            }
        }

        // pekerjaan
        $penghasilan = Kriteria::where('nama_kriteria', '=', 'pekerjaan')->first();
        $sKriteriapenghasilan = Sub_kriteria::where('kriteria_id', '=', $penghasilan->id)
            ->get();

        $totalpenghasilan_warga = str_replace(',', '', $request->input('totalpenghasilan_warga'));
        foreach ($sKriteriapenghasilan as $key => $v_penghasilan) {
            $extStrippenghasilan = explode('<=', $v_penghasilan->nama_sub_kriteria);
            $stripPenghasilan = trim($extStrippenghasilan[1]);
            if ($totalpenghasilan_warga <= $stripPenghasilan) {
                $dataObjektif[] = [
                    'nama_objektif' => Check::get_kriteria($v_penghasilan->kriteria_id)->nama_kriteria,
                    'value_objektif' => $totalpenghasilan_warga,
                    'bobot_objektif' => $v_penghasilan->bobot_sub_kriteria
                ];
                break;
            }
        }

        foreach ($dataObjektif as $key => $value) {
            $insertObjektif[] = [
                'nama_objektif' => $value['nama_objektif'],
                'value_objektif' => $value['value_objektif'],
                'bobot_objektif' => $value['bobot_objektif'],
                'warga_id' => $warga->id,
            ];
        }
        $insObjektif = Objektif::insert($insertObjektif);



        if ($warga || $sub_kriteria_warga || $insObjektif) {
            Check::logInsert('Berhasil menambahkan data warga dengan id = ' . $warga->id);
            $request->session()->flash('success', 'Berhasil menambah data alternatif');
        } else {
            $request->session()->flash('error', 'Gagal menambah data alternatif');
        }
        return redirect('admin/alternatif?verifikasi_id=' . request()->input('verifikasi_id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $warga = Warga::find($id);
        return view('admin.alternatif.show', [
            'warga' => $warga,
            'verifikasi_id' => request()->input('verifikasi_id')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kriteria = Kriteria::all();
        $alternatif = Warga::find($id);
        return view('admin.alternatif.edit', [
            'alternatif' => $alternatif,
            'kriteria' => $kriteria,
            'verifikasi_id' => request()->input('verifikasi_id'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validated = $request->validate([
            'nama_warga' => 'required',
            'alamat_warga' => 'required',
            'pernikahan_warga' => 'required',
            'pekerjaan_warga' => 'required',
            // 'penghasilansuami_warga' => 'required',
            // 'penghasilanistri_warga' => 'required',
            // 'penghasilanpribadi_warga' => 'required',
            'totalpenghasilan_warga' => 'required',
            'tanggungan_warga' => 'required',
            'umur_warga' => 'required',
            'pendidikanterakhir_warga' => 'required',
        ]);

        // warga
        $penghasilansuami_warga = $request->input('penghasilansuami_warga') != null ? $request->input('penghasilansuami_warga') : 0;
        $penghasilanistri_warga = $request->input('penghasilanistri_warga') != null ? $request->input('penghasilanistri_warga') : 0;
        $penghasilanpribadi_warga = $request->input('penghasilanpribadi_warga') != null ? $request->input('penghasilanpribadi_warga') : 0;
        $totalpenghasilan_warga = $request->input('totalpenghasilan_warga') != null ? $request->input('totalpenghasilan_warga') : 0;
        $warga = Warga::find($id)->update([
            'nama_warga' => $request->input('nama_warga'),
            'alamat_warga' => $request->input('alamat_warga'),
            'pernikahan_warga' => $request->input('pernikahan_warga'),
            'pekerjaan_warga' => $request->input('pekerjaan_warga'),
            'penghasilansuami_warga' => str_replace(',', '', $penghasilansuami_warga),
            'penghasilanistri_warga' => str_replace(',', '', $penghasilanistri_warga),
            'penghasilanpribadi_warga' => str_replace(',', '', $penghasilanpribadi_warga),
            'totalpenghasilan_warga' => str_replace(',', '', $totalpenghasilan_warga),
            'tanggungan_warga' => $request->input('tanggungan_warga'),
            'umur_warga' => $request->input('umur_warga'),
            'pendidikanterakhir_warga' => $request->input('pendidikanterakhir_warga'),
            'verifikasi_data_id' => $request->input('verifikasi_id')
        ]);

        // subkriteria
        // subkriteria pernikahan
        $kawin = trim($request->input('pernikahan_warga'));
        $kawinDb = Kriteria::where('nama_kriteria', '=', 'pernikahan')->first()->subKriteria()->get();

        $dataSubKriteria = [];
        foreach ($kawinDb as $key => $v_kawinDb) {
            if ($v_kawinDb->nama_sub_kriteria == $kawin) {
                $dataSubKriteria[] = $v_kawinDb->id;
            }
        }

        // subkriteria pendidikan
        $pendidikan = trim($request->input('pendidikanterakhir_warga'));
        $pendidikanDb = Kriteria::where('nama_kriteria', '=', 'pendidikan terakhir')->first()->subKriteria()->get();
        foreach ($pendidikanDb as $key => $v_pendidikanDb) {
            if ($v_pendidikanDb->nama_sub_kriteria == $pendidikan) {
                $dataSubKriteria[] = $v_pendidikanDb->id;
            }
        }
        $sub_kriteria_warga = Warga::find($id);
        $sub_kriteria_warga->subKriteria()->detach();
        $sub_kriteria_warga->subKriteria()->attach($dataSubKriteria);

        // objektif
        // tanggungan keluarga
        $tKeluarga = Kriteria::where('nama_kriteria', '=', 'tanggungan keluarga')->first();
        $sKriteriaTKeluarga = Sub_kriteria::where('kriteria_id', '=', $tKeluarga->id)->get();

        $dataObjektif = [];
        $tanggunganKeluarga = $request->input('tanggungan_warga');
        foreach ($sKriteriaTKeluarga as $key => $v_tkeluarga) {
            $extStripKeluarga = explode('-', $v_tkeluarga->nama_sub_kriteria);
            $extMoreKeluarga = explode('>', $v_tkeluarga->nama_sub_kriteria);

            if (isset($extStripKeluarga[1])) {
                if ($extStripKeluarga[0] <= $tanggunganKeluarga && $tanggunganKeluarga <= $extStripKeluarga[1]) {
                    $dataObjektif[] = [
                        'nama_objektif' => Check::get_kriteria($v_tkeluarga->kriteria_id)->nama_kriteria,
                        'value_objektif' => $tanggunganKeluarga,
                        'bobot_objektif' => $v_tkeluarga->bobot_sub_kriteria
                    ];
                }
            }

            if (isset($extMoreKeluarga[1])) {
                if ($tanggunganKeluarga > $extMoreKeluarga[1]) {
                    $dataObjektif[] = [
                        'nama_objektif' => Check::get_kriteria($v_tkeluarga->kriteria_id)->nama_kriteria,
                        'value_objektif' => $tanggunganKeluarga,
                        'bobot_objektif' => $v_tkeluarga->bobot_sub_kriteria
                    ];
                }
            }
        }

        // umur
        $Umur = Kriteria::where('nama_kriteria', '=', 'umur')->first();
        $sKriteriaUmur = Sub_kriteria::where('kriteria_id', '=', $Umur->id)->get();
        $umur = $request->input('umur_warga');
        foreach ($sKriteriaUmur as $key => $v_Umur) {
            $extStripUmur = explode('-', $v_Umur->nama_sub_kriteria);
            $extUmur = explode('>', $v_Umur->nama_sub_kriteria);

            if (isset($extStripUmur[1])) {
                if ($extStripUmur[0] <= $umur && $umur <= $extStripUmur[1]) {
                    $dataObjektif[] = [
                        'nama_objektif' => Check::get_kriteria($v_Umur->kriteria_id)->nama_kriteria,
                        'value_objektif' => $umur,
                        'bobot_objektif' => $v_Umur->bobot_sub_kriteria
                    ];
                }
            }

            if (isset($extUmur[1])) {
                if ($umur > $extUmur[1]) {
                    $dataObjektif[] = [
                        'nama_objektif' => Check::get_kriteria($v_Umur->kriteria_id)->nama_kriteria,
                        'value_objektif' => $umur,
                        'bobot_objektif' => $v_Umur->bobot_sub_kriteria
                    ];
                }
            }
        }

        // pekerjaan
        $penghasilan = Kriteria::where('nama_kriteria', '=', 'pekerjaan')->first();
        $sKriteriapenghasilan = Sub_kriteria::where('kriteria_id', '=', $penghasilan->id)
            ->get();

        $totalpenghasilan_warga = str_replace(',', '', $request->input('totalpenghasilan_warga'));
        foreach ($sKriteriapenghasilan as $key => $v_penghasilan) {
            $extStrippenghasilan = explode('<=', $v_penghasilan->nama_sub_kriteria);
            $stripPenghasilan = trim($extStrippenghasilan[1]);
            if ($totalpenghasilan_warga <= $stripPenghasilan) {
                $dataObjektif[] = [
                    'nama_objektif' => Check::get_kriteria($v_penghasilan->kriteria_id)->nama_kriteria,
                    'value_objektif' => $totalpenghasilan_warga,
                    'bobot_objektif' => $v_penghasilan->bobot_sub_kriteria
                ];
                break;
            }
        }

        foreach ($dataObjektif as $key => $value) {
            $insertObjektif[] = [
                'nama_objektif' => $value['nama_objektif'],
                'value_objektif' => $value['value_objektif'],
                'bobot_objektif' => $value['bobot_objektif'],
                'warga_id' => $id,
            ];
        }
        $objektif = Warga::find($id);
        $objektif->objektif()->delete();
        $insObjektif = Objektif::insert($insertObjektif);



        if ($warga || $sub_kriteria_warga || $insObjektif) {
            Check::logInsert('Berhasil mengubah data warga dengan id = ' . $id);
            $request->session()->flash('success', 'Berhasil mengubah data alternatif');
        } else {
            $request->session()->flash('error', 'Gagal mengubah data alternatif');
        }
        return redirect('admin/alternatif?verifikasi_id=' . request()->input('verifikasi_id'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $warga = Warga::find($id);
        $warga->subKriteria()->detach();

        $alternatif = Warga::destroy($id);
        if ($alternatif || $warga) {
            Check::logInsert('Berhasil menghapus data warga dengan id = ' . $id);
            session()->flash('success', 'Berhasil menghapus data alternatif');
        } else {
            session()->flash('error', 'Gagal menghapus data alternatif');
        }
        return redirect('admin/alternatif?verifikasi_id=' . request()->input('verifikasi_id'));
    }

    public function import()
    {
        $file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');


        if (isset($_FILES['import']['name']) && in_array($_FILES['import']['type'], $file_mimes)) {
            $arr_file = explode('.', $_FILES['import']['name']);
            $extension = end($arr_file);

            if ('csv' == $extension) {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } else {
                $reader = new Xlsximport;
            }
            $spreadsheet = $reader->load($_FILES['import']['tmp_name']);
            $sheetData = $spreadsheet->getActiveSheet()->toArray();


            for ($i = 2; $i < count($sheetData); $i++) {
                $cek = $sheetData[$i][0];
                if ($cek != null) {
                    $count[] = $i;
                    // warga
                    $pernikahan_warga = strtolower($sheetData[$i]['3']);
                    $pekerjaan_warga = strtolower($sheetData[$i]['4']);
                    $pendidikan_warga = strtolower($sheetData[$i]['11']);
                    $totalpenghasilan_warga = str_replace(',', '', $sheetData[$i]['8']);
                    $tanggungan_warga = $sheetData[$i]['9'];
                    $umur_warga = $sheetData[$i]['10'];
                    $dataWarga = [
                        'nama_warga' => strtolower($sheetData[$i]['1']),
                        'alamat_warga' => strtolower($sheetData[$i]['2']),
                        'pernikahan_warga' => $pernikahan_warga,
                        'pekerjaan_warga' => $pekerjaan_warga,
                        'penghasilansuami_warga' => str_replace(',', '', $sheetData[$i]['5']),
                        'penghasilanistri_warga' => str_replace(',', '', $sheetData[$i]['6']),
                        'penghasilanpribadi_warga' => str_replace(',', '', $sheetData[$i]['7']),
                        'totalpenghasilan_warga' => $totalpenghasilan_warga,
                        'tanggungan_warga' => $tanggungan_warga,
                        'umur_warga' => $umur_warga,
                        'pendidikanterakhir_warga' => $pendidikan_warga,
                        'verifikasi_data_id' => request()->input('verifikasi_id'),
                    ];
                    $warga = Warga::create($dataWarga);

                    // subkriteria pernikahan
                    $kawin = trim($pernikahan_warga);
                    $kawinDb = Kriteria::where('nama_kriteria', '=', 'pernikahan')->first()->subKriteria()->get();

                    $dataSubKriteria = [];
                    foreach ($kawinDb as $key => $v_kawinDb) {
                        if ($v_kawinDb->nama_sub_kriteria == $kawin) {
                            $dataSubKriteria[] = $v_kawinDb->id;
                        }
                    }

                    // subkriteria pendidikan
                    $pendidikan = trim($pendidikan_warga);
                    $pendidikanDb = Kriteria::where('nama_kriteria', '=', 'pendidikan terakhir')->first()->subKriteria()->get();
                    foreach ($pendidikanDb as $key => $v_pendidikanDb) {
                        if ($v_pendidikanDb->nama_sub_kriteria == $pendidikan) {
                            $dataSubKriteria[] = $v_pendidikanDb->id;
                        }
                    }
                    $sub_kriteria_warga = Warga::find($warga->id);
                    $sub_kriteria_warga->subKriteria()->attach($dataSubKriteria);

                    // objektif
                    $tanggungan = $tanggungan_warga;
                    $tanggunganDb = Kriteria::where('nama_kriteria', '=', 'tanggungan keluarga')->first()->subKriteria()->get();

                    $dataObjektif = [];
                    foreach ($tanggunganDb as $key => $v_tanggunganDb) {
                        $exStrip = explode('-', $v_tanggunganDb->nama_sub_kriteria);
                        $exMore = explode('>', $v_tanggunganDb->nama_sub_kriteria);

                        if (isset($exStrip[1])) {
                            if ($exStrip[0] <= $tanggungan && $tanggungan <= $exStrip[1]) {
                                $dataObjektif = [
                                    'nama_objektif' => Check::get_kriteria($v_tanggunganDb->kriteria_id)->nama_kriteria,
                                    'value_objektif' => $tanggungan,
                                    'bobot_objektif' => $v_tanggunganDb->bobot_sub_kriteria,
                                    'warga_id' => $warga->id
                                ];
                            }
                        }

                        if (isset($exMore[1])) {
                            if ($tanggungan > $exMore[1]) {
                                $dataObjektif = [
                                    'nama_objektif' => Check::get_kriteria($v_tanggunganDb->kriteria_id)->nama_kriteria,
                                    'value_objektif' => $tanggungan,
                                    'bobot_objektif' => $v_tanggunganDb->bobot_sub_kriteria,
                                    'warga_id' => $warga->id
                                ];
                            }
                        }
                    }
                    $insObjektif = Objektif::create($dataObjektif);

                    $pekerjaan = $pekerjaan_warga;
                    $pekerjaanDb = Kriteria::where('nama_kriteria', '=', 'pekerjaan')->first()->subKriteria()->get();

                    foreach ($pekerjaanDb as $key => $v_pekerjaanDb) {
                        $nama_sub_kriteria = ($v_pekerjaanDb->nama_sub_kriteria);
                        $nama_sub_kriteria = explode('<=', $nama_sub_kriteria);
                        $nama_sub_kriteria = trim($nama_sub_kriteria[1]);

                        if ($totalpenghasilan_warga <= $nama_sub_kriteria) {
                            $dataObjektif = [
                                'nama_objektif' => Check::get_kriteria($v_pekerjaanDb->kriteria_id)->nama_kriteria,
                                'value_objektif' => $totalpenghasilan_warga,
                                'bobot_objektif' => $v_pekerjaanDb->bobot_sub_kriteria,
                                'warga_id' => $warga->id
                            ];
                            break;
                        }
                    }
                    $insObjektif = Objektif::create($dataObjektif);

                    $umur = $umur_warga;
                    $umurDb = Kriteria::where('nama_kriteria', '=', 'umur')->first()->subKriteria()->get();
                    $dataObjektif = [];
                    foreach ($umurDb as $key => $v_umurDb) {
                        $exStrip = explode('-', $v_umurDb->nama_sub_kriteria);
                        $exMore = explode('>', $v_umurDb->nama_sub_kriteria);
                        if (isset($exStrip[1])) {
                            if ($exStrip[0] <= $umur && $umur <= $exStrip[1]) {
                                $dataObjektif = [
                                    'nama_objektif' => Check::get_kriteria($v_umurDb->kriteria_id)->nama_kriteria,
                                    'value_objektif' => $umur,
                                    'bobot_objektif' => $v_umurDb->bobot_sub_kriteria,
                                    'warga_id' => $warga->id
                                ];
                            }
                        }
                        if (isset($exMore[1])) {
                            if ($umur > $exMore[1]) {
                                $dataObjektif = [
                                    'nama_objektif' => Check::get_kriteria($v_umurDb->kriteria_id)->nama_kriteria,
                                    'value_objektif' => $umur,
                                    'bobot_objektif' => $v_umurDb->bobot_sub_kriteria,
                                    'warga_id' => $warga->id
                                ];
                            }
                        }
                    }

                    $insObjektif = Objektif::create($dataObjektif);
                }
            }

            if ($warga || $insObjektif) {
                session()->flash('success', 'Berhasil ' . count($count) . ' import data menu');
            } else {
                session()->flash('error', 'Gagal import');
            }
            $verifikasi_id = request()->input('verifikasi_id');
            return redirect('admin/alternatif?verifikasi_id=' . $verifikasi_id);
        }
    }
}
