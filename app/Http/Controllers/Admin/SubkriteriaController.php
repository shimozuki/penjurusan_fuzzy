<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Check;
use App\Http\Controllers\Controller;
use App\Models\Kriteria;
use App\Models\Sub_kriteria;
use Illuminate\Http\Request;
use Datatables;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as Xlsximport;

class SubkriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $Subkriteria = Sub_kriteria::join('kriteria', 'kriteria.id', '=', 'sub_kriteria.kriteria_id')
                ->select('sub_kriteria.*', 'kriteria.nama_kriteria', 'kriteria.kode_kriteria');

            return Datatables::of($Subkriteria)
                ->addIndexColumn()
                ->addColumn('nama_kriteria', function ($Subkriteria) {
                    $output = ucwords($Subkriteria->nama_kriteria);
                    return $output;
                })
                ->addColumn('nama_sub_kriteria', function ($Subkriteria) {
                    $output = ucwords($Subkriteria->nama_sub_kriteria);
                    return $output;
                })
                ->addColumn('action', function ($Subkriteria) {
                    return '<a href="' . route('admin.subkriteria.edit', $Subkriteria->id) . '" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i> Edit</a>
                    <form class="d-inline" method="post" action="' . route('admin.subkriteria.destroy', $Subkriteria->id) . '">
                    <input type="hidden" name="_token" value="' . csrf_token() . '">
                   ' . method_field('delete') . '
                        <button type="submit" onclick="return confirm(\'Yakin ingin menghapus item ini?\')" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> Hapus</a>
                    </form>

                    ';
                })
                ->make();
        }
        return view('admin.subkriteria.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kriteria = Kriteria::all();
        return view('admin.subkriteria.create', [
            'kriteria' => $kriteria
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
            'kode_sub_kriteria' => 'required|unique:sub_kriteria',
            'nama_sub_kriteria' => 'required',
            'bobot_sub_kriteria' => 'required',
            'kriteria_id' => 'required',
        ]);

        $insert = Sub_kriteria::create($validated);
        if ($insert) {
            Check::logInsert('Berhasil menambahkan data sub kriteria dengan id = ' . $insert->id);
            $request->session()->flash('success', 'Berhasil menambah data Sub kriteria');
        } else {
            $request->session()->flash('error', 'Gagal menambah data Sub kriteria');
        }
        return redirect()->route('admin.subkriteria.index');
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
        $kriteria = Kriteria::all();
        $Subkriteria = Sub_kriteria::find($id);
        return view('admin.subkriteria.edit', [
            'subkriteria' => $Subkriteria,
            'kriteria' => $kriteria
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
            'kode_sub_kriteria' => ['required', function ($attribute, $value, $fail) {
                $kodeSubkriteria = $_POST['kode_sub_kriteria'];
                $id = $_POST['id'];
                $get = Sub_kriteria::where('id', '<>', $id)
                    ->where('kode_sub_kriteria', '=', $kodeSubkriteria)->get()->count();

                if ($get > 0) {
                    $fail('The Kode Sub kriteria already use');
                }
            },],
            'nama_sub_kriteria' => 'required',
            'kriteria_id' => 'required',
            'bobot_sub_kriteria' => 'required',
        ]);

        $update = Sub_kriteria::where('id', '=', $id)
            ->update($validated);

        if ($update) {
            Check::logInsert('Berhasil menambahkan data sub kriteria dengan id = ' . $id);
            $request->session()->flash('success', 'Berhasil mengubah data Sub kriteria');
        } else {
            $request->session()->flash('error', 'Gagal mengubah data Sub kriteria');
        }
        return redirect()->route('admin.subkriteria.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $Subkriteria = Sub_kriteria::destroy($id);
        if ($Subkriteria) {
            Check::logInsert('Berhasil menghapus data sub kriteria dengan id = ' . $id);
            session()->flash('success', 'Berhasil menghapus data Sub kriteria');
        } else {
            session()->flash('error', 'Gagal menghapus data Sub kriteria');
        }
        return redirect()->route('admin.subkriteria.index');
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
                    $nama_kriteria = $sheetData[$i]['0'];
                    $kriteria = Kriteria::where('nama_kriteria', '=', strtolower($nama_kriteria))->first();

                    $data[] = [
                        'kriteria_id' => $kriteria->id,
                        'kode_sub_kriteria' => strtoupper($sheetData[$i]['1']),
                        'nama_sub_kriteria' => strtolower($sheetData[$i]['2']),
                        'bobot_sub_kriteria' => strval($sheetData[$i]['3']),
                    ];
                }
            }
            $insert = Sub_kriteria::insert($data);
            if ($insert > 0) {
                session()->flash('success', 'Berhasil ' . count($count) . ' import data menu');
            } else {
                session()->flash('error', 'Gagal import');
            }
            return redirect()->route('admin.subkriteria.index');
        }
    }
}
