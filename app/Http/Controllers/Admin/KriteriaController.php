<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Check;
use App\Http\Controllers\Controller;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use Datatables;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as Xlsximport;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $kriteria = Kriteria::select(['id', 'kode_kriteria', 'nama_kriteria']);
            return Datatables::of($kriteria)
                ->addIndexColumn()
                ->addColumn('nama_kriteria', function ($kriteria) {
                    $output = ucwords($kriteria->nama_kriteria);
                    return $output;
                })
                ->addColumn('action', function ($kriteria) {
                    return '<a href="' . route('admin.kriteria.edit', $kriteria->id) . '" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i> Edit</a>
                    <form class="d-inline" method="post" action="' . route('admin.kriteria.destroy', $kriteria->id) . '">
                    <input type="hidden" name="_token" value="' . csrf_token() . '">
                   ' . method_field('delete') . '
                        <button type="submit" onclick="return confirm(\'Yakin ingin menghapus item ini?\')" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> Hapus</a>
                    </form>
                    ';
                })
                ->make();
        }
        return view('admin.kriteria.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kriteria.create');
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
            'kode_kriteria' => 'required|unique:kriteria',
            'nama_kriteria' => 'required',
        ]);

        $insert = Kriteria::create($validated);
        if ($insert) {
            Check::logInsert('Berhasil menambahkan data kriteria dengan id = ' . $insert->id);
            $request->session()->flash('success', 'Berhasil menambah data kriteria');
        } else {
            $request->session()->flash('error', 'Gagal menambah data kriteria');
        }
        return redirect()->route('admin.kriteria.index');
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
        $kriteria = Kriteria::find($id);
        return view('admin.kriteria.edit', [
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
            'kode_kriteria' => ['required', function ($attribute, $value, $fail) {
                $kodeKriteria = $_POST['kode_kriteria'];
                $id = $_POST['id'];
                $get = Kriteria::where('id', '<>', $id)
                    ->where('kode_kriteria', '=', $kodeKriteria)->get()->count();

                if ($get > 0) {
                    $fail('The Kode Kriteria already use');
                }
            },],
            'nama_kriteria' => 'required',
        ]);

        $update = Kriteria::where('id', '=', $id)
            ->update($validated);

        if ($update) {
            Check::logInsert('Berhasil mengubah data kriteria dengan id = ' . $id);
            $request->session()->flash('success', 'Berhasil mengubah data kriteria');
        } else {
            $request->session()->flash('error', 'Gagal mengubah data kriteria');
        }
        return redirect()->route('admin.kriteria.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $kriteria = Kriteria::destroy($id);
        if ($kriteria) {
            Check::logInsert('Berhasil menghapus data kriteria dengan id = ' . $id);
            session()->flash('success', 'Berhasil menghapus data kriteria');
        } else {
            session()->flash('error', 'Gagal menghapus data kriteria');
        }
        return redirect()->route('admin.kriteria.index');
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
                        'kode_kriteria' => strtoupper($sheetData[$i]['0']),
                        'nama_kriteria' => strtolower($sheetData[$i]['1']),
                    ];
                }
            }
            $insert = Kriteria::insert($data);
            if ($insert > 0) {
                session()->flash('success', 'Berhasil ' . count($count) . ' import data menu');
            } else {
                session()->flash('error', 'Gagal import');
            }
            return redirect()->route('admin.kriteria.index');
        }
    }
}
