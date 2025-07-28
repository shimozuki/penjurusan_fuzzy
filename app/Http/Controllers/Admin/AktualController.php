<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Check;
use App\Http\Controllers\Controller;
use App\Models\Aktual;
use App\Models\Kriteria;
use App\Models\Objektif;
use App\Models\Sub_kriteria;
use App\Models\VerifikasiData;
use App\Models\Warga;
use Illuminate\Http\Request;
use Datatables;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as Xlsximport;


class AktualController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $alternatif = Warga::select('*');
            $verifikasi_data_id = request()->input('verifikasi_data_id');
            if ($verifikasi_data_id != null) {
                $alternatif->where('verifikasi_data_id', $verifikasi_data_id);
            }
            $alternatif = $alternatif->get();
            $penyeleksian = request()->input('penyeleksian_id');

            return Datatables::of($alternatif)
                ->addIndexColumn()
                ->addColumn('check_warga', function ($alternatif) {
                    $saveWargaSession = session()->get('saveWargaSession');
                    if ($saveWargaSession == null) {
                        $saveWargaSession = [];
                    }
                    $checked = '';
                    if (in_array($alternatif->id, $saveWargaSession)) {
                        $checked = 'checked';
                    }
                    $output = '
                    <div class="form-check">
                        <input class="form-check-input checkitem" type="checkbox" value="' . $alternatif->id . '" ' . $checked . '>
                        <label class="form-check-label" for="checkitem">
                        </label>
                    </div>
                    ';
                    return $output;
                })
                ->addColumn('nama_warga', function ($alternatif) {
                    $output = ucwords($alternatif->nama_warga);
                    return $output;
                })
                ->addColumn('alamat_warga', function ($alternatif) {
                    $output = ucwords($alternatif->alamat_warga);
                    return $output;
                })
                ->addColumn('action', function ($alternatif) {
                    $penyeleksian = request()->input('penyeleksian_id');
                    return '
                    <div class="text-center">
                    <a href="' . url('admin/aktual', $alternatif->id) . '?penyeleksian_id=' . $penyeleksian . '" class="btn btn-sm btn-info"><i class="fas fa-eye"></i> Detail</a>
                    </div>

                    ';
                })
                ->rawColumns(['check_warga', 'action'])
                ->make();
        }
        $verifikasi = VerifikasiData::all();
        $penyeleksian_id = $request->input('penyeleksian_id');
        $aktual = Aktual::where('penilaian_id', $penyeleksian_id)
            ->join('warga', 'warga.id', '=', 'aktual.warga_id')
            ->select('aktual.*', 'warga.nama_warga', 'warga.alamat_warga')
            ->get();
        $session = [];
        if (count($aktual) > 0) {
            foreach ($aktual as $key => $v_aktual) {
                $session[] = $v_aktual->warga_id;
            }
            session()->put('saveWargaSession', $session);
        }
        return view('admin.aktual.index', [
            'penyeleksian_id' => $request->input('penyeleksian_id'),
            'verifikasi' => $verifikasi,
            'aktual' => $aktual
        ]);
    }

    public function submit()
    {
        $session = session()->get('saveWargaSession');
        $penyeleksian_id = request()->input('penyeleksian_id');
        if ($session == null) {
            session()->flash('error', 'Silahkan anda pilih beberapa warga terlebih dahulu');
            return redirect()->to(url('admin/aktual?penyeleksian_id=' . $penyeleksian_id));
        }
        $checkAktual = Aktual::where('penilaian_id', $penyeleksian_id)->count();
        if ($checkAktual > 0) {
            Aktual::where('penilaian_id', $penyeleksian_id)->delete();
        }
        $data = [];
        foreach ($session as $key => $value) {
            $data[] = [
                'penilaian_id' => $penyeleksian_id,
                'warga_id' => $value
            ];
        }
        $insert = Aktual::insert($data);
        if ($insert) {
            session()->forget('saveWargaSession');
            session()->flash('success', 'Berhasil menambahkan data aktual sebanyak ' . count($data));
            return redirect()->to(url('admin/aktual?penyeleksian_id=' . $penyeleksian_id));
        } else {
            session()->flash('error', 'Gagal menambahkaan data aktual');
            return redirect()->to(url('admin/aktual?penyeleksian_id=' . $penyeleksian_id));
        }
    }

    public function saveSession()
    {
        // request()->session()->forget('saveWargaSession');
        $checked = request()->input('checked');
        $not_checked = request()->input('not_checked');
        if (request()->session()->has('saveWargaSession')) {
            $session = request()->session()->get('saveWargaSession');
            if ($checked != null) {
                foreach ($checked as $key => $value) {
                    if (!in_array($value, $session)) {
                        array_push($session, $value);
                    }
                }
            }
            $unset_key = [];
            if ($not_checked != null) {
                foreach ($session as $key => $value) {
                    if (in_array($value, $not_checked)) {
                        $unset_key[] = array_search($value, $session);
                    }
                }
            }

            if (count($unset_key) > 0) {
                foreach ($unset_key as $key => $value) {
                    unset($session[$value]);
                }
            }

            request()->session()->put('saveWargaSession', $session);
        } else {
            request()->session()->put('saveWargaSession', $checked);
            $session = request()->session()->get('saveWargaSession');
        }

        echo json_encode($session);
    }

    public function delete($id)
    {
        $aktual = Aktual::destroy($id);
        $penyeleksian_id = request()->input('penyeleksian_id');
        if ($aktual) {
            session()->flash('success', 'Berhasil hapus data aktual');
            return redirect()->to(url('admin/aktual?penyeleksian_id=' . $penyeleksian_id));
        } else {
            session()->flash('error', 'Gagal hapus data aktual');
            return redirect()->to(url('admin/aktual?penyeleksian_id=' . $penyeleksian_id));
        }
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
            $penyeleksian_id = request()->input('penyeleksian_id');
            for ($i = 1; $i < count($sheetData); $i++) {
                $cek = $sheetData[$i]['0'];
                if ($cek != null) {
                    $count[] = $i;
                    $nama_warga = strtolower($sheetData[$i]['1']);
                    $check_warga = Warga::where('nama_warga', $nama_warga)->first();
                    $data[] = [
                        'warga_id' => $check_warga->id,
                        'penilaian_id' => $penyeleksian_id
                    ];
                }
            }
            $insert = Aktual::insert($data);
            if ($insert > 0) {
                session()->flash('success', 'Berhasil ' . count($count) . ' import data aktual');
            } else {
                session()->flash('error', 'Gagal import');
            }
            return redirect()->to(url('admin/aktual?penyeleksian_id=' . $penyeleksian_id));
        }
    }
}
