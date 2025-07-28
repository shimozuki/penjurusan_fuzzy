<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Check;
use App\Http\Controllers\Controller;
use App\Models\Hasil;
use App\Models\HasilDetail;
use App\Models\Kriteria;
use App\Models\VerifikasiData;
use App\Models\Warga;

class PerhitunganController extends Controller
{
    public function index()
    {
        $kriteria = Kriteria::all();
        $ahp = session()->get('ahp');

        $rowBobot = $ahp['row_bobot'];
        $inversBobot = $ahp['invers_bobot'];

        $maxInvers = count($inversBobot) - 1;
        $lasInvers = count($inversBobot);

        for ($i = 1; $i <= count($rowBobot); $i++) {
            if ($i == 1) {
                $data = $rowBobot[$i];
                array_unshift($data, 1);
                $insData[] = $data;


                $inc =  $i - 1;
                if ($maxInvers == $inc) {
                    $invers = $inversBobot[$lasInvers];
                    $data = $rowBobot[$i];

                    $invers = array_merge($invers, [1]);
                    $insData[] = $invers;
                }
            } else {
                $inc =  $i - 1;
                $invers = $inversBobot[$inc];
                $data = $rowBobot[$i];

                array_push($invers, 1);
                $merge = array_merge($invers, $data);
                $insData[] = $merge;

                if ($maxInvers == $inc) {
                    $invers = $inversBobot[$lasInvers];
                    $data = $rowBobot[$i];


                    $invers = array_merge($invers, [1]);
                    $insData[] = $invers;
                }
            }
        }

        // matriks perbandingan
        session()->put('ahp.matriks', $insData);
        return view('admin.perhitungan.index', [
            'kriteria' => $kriteria,
            'data_ahp' => $insData
        ]);
    }
    public function fuzzyAhp()
    {
        $ahp = session()->get('ahp');

        // cr
        $cr = $ahp['cr'];
        if ($cr > 0.1) {
            session()->flash('error', 'Field bobot kriteria is not consisten, try again');
            return redirect()->route('admin.penyeleksian.index');
        }

        $matriks = $ahp['matriks'];
        $kriteria = Kriteria::all();
        $warga = Warga::all();
        $verifikasi = VerifikasiData::where('status_verifikasi', '=', '0')->get();

        return view('admin.perhitungan.fuzzy', [
            'data_ahp' => $matriks,
            'kriteria' => $kriteria,
            'warga' => $warga,
            'verifikasi' => $verifikasi
        ]);
    }
    public function submitPerhitungan()
    {
        // hasil
        $dataHasil = [
            'cr_hasil' => request()->input('cr_hasil'),
            'penilaian_id' => request()->input('penilaian_id'),
        ];
        $insertHasil = Hasil::create($dataHasil);

        // hasil detail
        $hasilDetail = session()->get('submit_rekomendasi');
        foreach ($hasilDetail as $key => $v_hasilDetail) {
            $dataHasilDetail = array_merge($v_hasilDetail, ['hasil_id' => $insertHasil->id]);
            $dataHasilDetailDB[] = $dataHasilDetail;
        }
        $insertHasilDetail = HasilDetail::insert($dataHasilDetailDB);

        if ($insertHasil || $insertHasilDetail) {
            // update status verifikasi
            $verifikasi = array_column(session()->get('save_choose'), 'verifikasi_id');
            foreach ($verifikasi as $key => $v_verifikasi) {
                $dataVerifikasi = VerifikasiData::findOrFail($v_verifikasi);
                $dataVerifikasi->update([
                    'status_verifikasi' => 1
                ]);
            }

            session()->forget('penilaian');
            session()->forget('ahp');
            session()->forget('kriteria');
            session()->forget('save_choose');
            session()->forget('submit_rekomendasi');

            Check::logInsert('Berhasil menambahkan data hasil perhitungan rekomendasi dengan hasil id = ' . $insertHasil->id);
            session()->flash('success', 'Berhasil membuat rekomendasi penerima bansos');
        } else {
            session()->flash('error', 'Gagal membuat rekomendasi penerima bansos');
        }
        return redirect()->route('admin.penyeleksian.index');
    }

    public function saveSession()
    {
        $verifikasi_id = request()->input('verifikasi_id');
        if (session()->has('save_choose')) {
            $session = session()->get('save_choose');
            $column_verifikasi_id = array_column($session, 'verifikasi_id');
            if (in_array($verifikasi_id, $column_verifikasi_id)) {
                foreach ($session as $r_session) {
                    if ($r_session['verifikasi_id'] == $verifikasi_id) {
                        $data[] = [
                            'verifikasi_id' => $verifikasi_id,
                        ];
                    } else {
                        $data[] = [
                            'verifikasi_id' => $r_session['verifikasi_id'],
                        ];
                    }
                }
                session()->put('save_choose', $data);
                $session = session()->get('save_choose');
                $verifikasi_id = array_column($session, 'verifikasi_id');
                $implode = implode(',', $verifikasi_id);
                echo json_encode($implode);
            } else {
                if ($verifikasi_id == null) {
                    $session = session()->get('save_choose');
                    $null_verifikasi_id = request()->input('null_verifikasi_id');

                    foreach ($session as $key => $value) {
                        if ($value['verifikasi_id'] != $null_verifikasi_id) {
                            $data[] = [
                                'verifikasi_id' => $value['verifikasi_id']
                            ];
                        }
                    }
                    if (isset($data)) {
                        session()->put('save_choose', $data);
                        $session = session()->get('save_choose');
                        $verifikasi_id = array_column($session, 'verifikasi_id');
                        $implode = implode(',', $verifikasi_id);
                        echo json_encode($implode);
                    } else {
                        session()->forget('save_choose');
                        echo json_encode('hapus session verifikasi karena kosong');
                    }
                } else {
                    $data[] = [
                        'verifikasi_id' => $verifikasi_id,
                    ];
                    $array_push = array_merge($data, $session);
                    session()->put('save_choose', $array_push);
                    $session = session()->get('save_choose');
                    $verifikasi_id = array_column($session, 'verifikasi_id');
                    $implode = implode(',', $verifikasi_id);
                    echo json_encode($implode);
                }
            }
        } else {
            $session[0] = [
                'verifikasi_id' => $verifikasi_id
            ];
            session()->put('save_choose', $session);
            $data = session()->get('save_choose');
            echo json_encode($data);
        }
    }

    public function rekomendasiWarga()
    {
        // save choose
        if (!session()->has('save_choose')) {
            session()->flash('error', 'Anda belum memilih data verifikasi');
            return redirect()->route('admin.perhitungan.fuzzyAhp');
        }
        // kriteria
        $kriteria = session()->get('kriteria');
        // verifikasi
        $getVerifikasi = array_column(session()->get('save_choose'), 'verifikasi_id');
        foreach ($getVerifikasi as $key => $value) {
            $verifikasi = VerifikasiData::find($value);

            // warga
            $warga = $verifikasi->warga()->get();
            if ($warga == null) {
                session()->flash('error', 'Anda belum menginput data warga pada verifikasi Silahkan input dahulu');
                return redirect('/admin/alternatif?verifikasi_id=' . $verifikasi->id);
            }
            foreach ($warga as $key => $r_warga) {

                // inisialiasasi warga
                $dataWarga =  [
                    'nama_warga' => $r_warga->nama_warga,
                ];

                $bobotWarga =  [
                    'nama_warga' => $r_warga->nama_warga,
                ];

                $normalisasiWarga = [
                    'nama_warga' => $r_warga->nama_warga,
                    'id' => $r_warga->id
                ];

                // data sub kriteria
                $dataHeader = [];
                $getKriteria = Kriteria::all();
                $subKriteria = $r_warga->subKriteria()->get();
                $pushNormalisasi = 0;
                foreach ($subKriteria as $key => $value) {
                    array_push($dataWarga, $value->nama_sub_kriteria);
                    array_push($bobotWarga, $value->bobot_sub_kriteria);

                    $hitungNormalisasi = 0;
                    $namaKriteria = Check::get_kriteria($value->kriteria_id)->nama_kriteria;
                    foreach ($kriteria as $key => $v_kriteria) {
                        if ($v_kriteria['nama_kriteria'] == $namaKriteria) {
                            $hitungNormalisasi = $v_kriteria['bobot_kriteria'] * $value->bobot_sub_kriteria;
                            $pushNormalisasi += $hitungNormalisasi;
                        }
                    }

                    // header
                    $dataHeader[] = [
                        'nama_kriteria' =>  $namaKriteria,
                    ];
                }

                // data objektif
                $objektif = $r_warga->objektif()->get();
                $countObjektif = count($objektif);
                foreach ($objektif as $key => $value) {
                    array_push($dataWarga, $value->value_objektif);
                    array_push($bobotWarga, $value->bobot_objektif);

                    $hitungNormalisasi = 0;
                    $namaKriteria = $value->nama_objektif;
                    foreach ($kriteria as $key => $v_kriteria) {
                        if ($v_kriteria['nama_kriteria'] == $namaKriteria) {
                            $hitungNormalisasi = $v_kriteria['bobot_kriteria'] * $value->bobot_objektif;
                            $pushNormalisasi += $hitungNormalisasi;
                        }
                    }

                    // header
                    $dataHeader[] = [
                        'nama_kriteria' =>  $value->nama_objektif,
                    ];
                }

                // data warga regional
                $dataReg[] = $dataWarga;
                $bobotReg[] = $bobotWarga;
                $bobotNormalisasi[] = $pushNormalisasi;
                $dataNormalisasiWarga[] = array_merge($normalisasiWarga, [
                    'bobot_vektor' => $pushNormalisasi
                ]);
            }
        }
        rsort($bobotNormalisasi);

        // mengurutkan rekomendasi
        foreach ($bobotNormalisasi as $key => $v_bobot) {
            foreach ($dataNormalisasiWarga as $key => $v_bobot_warga) {
                if ($v_bobot == $v_bobot_warga['bobot_vektor']) {
                    $rekomendasiWarga[$v_bobot_warga['id']] = [
                        'nama_warga' => $v_bobot_warga['nama_warga'],
                        'bobot_warga' => $v_bobot_warga['bobot_vektor'],
                    ];
                }
            }
        }

        // data tabel
        return view('admin.perhitungan.rekomendasi', [
            'data_reg' => $dataReg,
            'bobot_reg' => $bobotReg,
            'rekomendasi' => $rekomendasiWarga,
            'count_objektif' => $countObjektif,
            'data_header' => $dataHeader
        ]);
    }
}
