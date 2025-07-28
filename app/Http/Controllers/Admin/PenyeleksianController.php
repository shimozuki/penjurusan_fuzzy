<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Check;
use App\Helpers\FuzzyAhp;
use App\Helpers\PrintPdf;
use App\Http\Controllers\Controller;
use App\Models\Aktual;
use App\Models\Hasil;
use App\Models\Kriteria;
use App\Models\Penilaian;
use Illuminate\Http\Request;
use Datatables;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as Xlsximport;

class PenyeleksianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $Penyeleksian = Penilaian::select('penilaian.*', 'profile.nama_profile')
                ->join('users', 'users.id', '=', 'penilaian.users_id', 'left')
                ->join('profile', 'profile.users_id', '=', 'users.id', 'inner')
                ->get();

            return Datatables::of($Penyeleksian)
                ->addIndexColumn()
                ->addColumn('action', function ($Penyeleksian) {
                    $output = '
                    <a href="' . route('admin.penyeleksian.edit', $Penyeleksian->id) . '" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i> Edit</a>

                    <form class="d-inline" method="post" action="' . route('admin.penyeleksian.destroy', $Penyeleksian->id) . '">
                    <input type="hidden" name="_token" value="' . csrf_token() . '">
                   ' . method_field('delete') . '
                        <button type="submit" onclick="return confirm(\'Yakin ingin menghapus item ini?\')" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> Hapus</a>
                        </button>
                    </form>
                    ';
                    $cekHasil = Check::row_penyeleksian_hasil($Penyeleksian->id);
                    if ($cekHasil) {
                        $output .= '<a href="' . route('admin.penyeleksian.hasil', $Penyeleksian->id) . '" class="btn btn-sm btn-info mr-1"><i class="fas fa-book-open"></i> Hasil</a>';
                    }
                    $output .= '<a href="' . route('admin.penyeleksian.perhitungan', $Penyeleksian->id) . '" class="btn btn-sm btn-info"><i class="fas fa-calculator"></i> Perhitungan</a>
                    
                    <a href="' . url('admin/aktual?penyeleksian_id=' . $Penyeleksian->id) . '" class="btn btn-sm btn-primary"><i class="fas fa-users"></i> Data aktual</a>
                    ';
                    return '<div class="text-center">
                    ' . $output . '
                    </div>';
                })
                ->addColumn('tanggal_penilaian', function ($Pengumuman) {
                    $output = Check::get_tanggal_show($Pengumuman->tanggal_penilaian);


                    return $output;
                })

                ->make();
        }
        return view('admin.penyeleksian.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.penyeleksian.create');
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
            'tanggal_penilaian' => 'required',
            'judul_penilaian' => 'required',
        ]);
        $insert = Penilaian::create([
            'tanggal_penilaian' => Check::get_tanggal_insert($request->input('tanggal_penilaian')),
            'judul_penilaian' => $request->input('judul_penilaian'),
            'users_id' => Auth::user()->id,
        ]);
        if ($insert) {
            Check::logInsert('Berhasil menambahkan data penyeleksian dengan id = ' . $insert->id);
            $request->session()->flash('success', 'Berhasil menambah data penyeleksian');
        } else {
            $request->session()->flash('error', 'Gagal menambah data penyeleksian');
        }
        return redirect()->route('admin.penyeleksian.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Penyeleksian = Penilaian::find($id);
        return view('admin.penyeleksian.edit', [
            'penyeleksian' => $Penyeleksian
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
        $validated = $request->validate([
            'tanggal_penilaian' => 'required',
            'judul_penilaian' => 'required',
        ]);

        $update = Penilaian::where('id', '=', $id)
            ->update([
                'tanggal_penilaian' => Check::get_tanggal_insert($request->input('tanggal_penilaian')),
                'judul_penilaian' => $request->input('judul_penilaian'),
                'users_id' => Auth::user()->id,
            ]);

        if ($update) {
            Check::logInsert('Berhasil mengubah data penyeleksian dengan id = ' . $id);
            $request->session()->flash('success', 'Berhasil mengubah data penyeleksian');
        } else {
            $request->session()->flash('error', 'Gagal mengubah data penyeleksian');
        }
        return redirect()->route('admin.penyeleksian.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $Penyeleksian = Penilaian::destroy($id);
        if ($Penyeleksian) {
            Check::logInsert('Berhasil mengubah data penyeleksian dengan id = ' . $id);
            session()->flash('success', 'Berhasil menghapus data penyeleksian');
        } else {
            session()->flash('error', 'Gagal menghapus data penyeleksian');
        }
        return redirect()->route('admin.penyeleksian.index');
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

            for ($i = 1; $i < count($sheetData); $i++) {
                $cek = $sheetData[$i]['0'];
                if ($cek != null) {
                    $count[] = $i;
                    $data[] = [
                        'tanggal_penilaian' => Check::get_tanggal_insert($sheetData[$i]['0']),
                        'judul_penilaian' => $sheetData[$i]['1'],
                        'users_id' => Auth::user()->id,
                    ];
                }
            }

            $insert = Penilaian::insert($data);
            if ($insert > 0) {
                session()->flash('success', 'Berhasil ' . count($count) . ' import data menu');
            } else {
                session()->flash('error', 'Gagal import');
            }
            return redirect()->route('admin.penyeleksian.index');
        }
    }

    public function hasil($id)
    {
        $confusionMatrix = [];
        $aktual = Aktual::all()->pluck('warga_id')->toArray();
        $hasil = Hasil::where('penilaian_id', '=', $id)->first();
        $hasil_detail = $hasil->hasilDetail()->get();

        $tp = 0;
        $fp = 0;
        $tn = 0;
        $fn = 0;
        if ($hasil_detail != null) {
            foreach ($hasil_detail as $key => $v_hasil) {
                if (in_array($v_hasil->warga_id, $aktual)) {
                    $confusionMatrix[1][$v_hasil->status][] = $v_hasil->warga_id;
                } else {
                    $confusionMatrix[0][$v_hasil->status][] = $v_hasil->warga_id;
                }
            }
            $tp = count($confusionMatrix[1][1]);
            $fp = count($confusionMatrix[1][0]);
            $tn = count($confusionMatrix[0][0]);
            $fn = count($confusionMatrix[0][1]);
        }

        $akurasi = (($tp + $tn) / ($tp + $fp + $tn + $fn) * 100);
        $precision = (($tp) / ($tp + $fp) * 100);
        $recall = (($tp) / ($tp + $fn) * 100);
        $f1 = ((2 * $recall * $precision) / ($recall + $precision));

        return view('admin.penyeleksian.hasil', [
            'hasil' => $hasil,
            'penyeleksian' => Penilaian::find($id),
            'akurasi' => $akurasi,
            'precision' => $precision,
            'recall' => $recall,
            'f1' => $f1,
            'tp' => $tp,
            'fp' => $fp,
            'tn' => $tn,
            'fn' => $fn,
        ]);
    }

    public function cetakPdf($id)
    {
        $pdf = new PrintPdf();
        $pdf->name = 'cobaaja.pdf';
        $pdf->size = 'A4';
        $pdf->type = 'portrait';
        $data['penyelesian'] = Penilaian::find($id);
        $data['hasil'] = Hasil::where('penilaian_id', '=', $id)->first();
        $pdf->loadHtml('admin.penyeleksian.pdf', $data);
    }

    // tahap perhitungan
    public function perhitungan($id)
    {
        $kriteria = Kriteria::all();
        $kuisionerKriteria = [];
        $kriteria = $kriteria;
        $dataKriteria = $kriteria;
        foreach ($kriteria as $key => $v_kriteria) {
            foreach ($dataKriteria as $key => $r_kriteria) {
                $kuisionerKriteria[$v_kriteria->id][$r_kriteria->id] = $r_kriteria->id;
            }
        }

        $rowKriteria = [];
        $row = 1;
        foreach ($kuisionerKriteria as $key_1 => $r_kriteria) {
            $column = 1;
            foreach ($r_kriteria as $key_2 => $value) {
                if ($row < $column) {
                    $rowKriteria[$key_1][$key_2] = $key_2;
                }
                $column++;
            }
            $row++;
        }

        return view('admin.penyeleksian.perhitungan', [
            'kriteria' => $kriteria,
            'penyeleksian' => Penilaian::find($id),
            'kuisioner_kriteria' => $rowKriteria
        ]);
    }

    public function submitHitung(Request $request)
    {
        $kriteriaPost = [];
        $banding_kriteria = $request->input('banding_kriteria');
        $bobot_kriteria = $request->input('bobot_kriteria');
        foreach ($bobot_kriteria as $id_kriteria_1 => $v_kriteria) {
            foreach ($v_kriteria as $id_kriteria_2 => $r_kriteria) {
                $checkData = $banding_kriteria[$id_kriteria_1][$id_kriteria_2];
                $getNilai = null;
                if ($checkData == 'data') {
                    $getNilai = $r_kriteria;
                } else {
                    $getNilai = '1/' . $r_kriteria;
                }
                $kriteriaPost[] = $getNilai;
            }
        }

        $_POST['kriteria_id'] = $kriteriaPost;
        $request->validate([
            'kriteria_id' => function ($attribute, $value, $fail) {

                foreach ($value as $r_value) {
                    if ($r_value == null) {
                        $fail('The kriteria must be filled');
                    }
                }
            },
        ]);

        // initial
        $start = -1;
        $induk = 0;
        $count = $request->input('count_kriteria');
        $kriteria = $_POST['kriteria_id'];
        $id = $request->input('id');
        for ($i = $count; $i > 1; $i--) {
            $induk++;
            for ($j = 1; $j < $i; $j++) {
                $start++;
                $arr[$induk][] =  $kriteria[$start];
            }
        }

        $invers = FuzzyAhp::invers($arr);
        foreach ($arr as $key1 => $value1) {
            foreach ($value1 as $key2 => $value2) {
                $arr[$key1][$key2] = Check::numFormat(Check::convertFloat($value2));
            }
        }

        session()->put('penilaian.id', $id);
        session()->put('ahp.row_bobot', $arr);
        session()->put('ahp.invers_bobot', $invers);
        session()->put('ahp.banding_kriteria', $banding_kriteria);
        session()->put('ahp.bobot_kriteria', $bobot_kriteria);

        return redirect()->route('admin.perhitungan.index');
    }
}
