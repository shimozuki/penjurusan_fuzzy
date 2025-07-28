<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Check;
use App\Http\Controllers\Controller;
use App\Models\VerifikasiData;
use Illuminate\Http\Request;
use Datatables;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as Xlsximport;

class VerifikasiDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $verifikasi = VerifikasiData::select('*');

            return Datatables::of($verifikasi)
                ->addIndexColumn()
                ->addColumn('status_verifikasi', function ($verifikasi) {
                    return  $verifikasi->status_verifikasi == '1' ?  '<span class="badge badge-success">Diverifikasi</span>' : '<span class="badge badge-warning">Belum Diverifikasi</span>';
                })
                ->addColumn('tanggal', function ($verifikasi) {
                    return  Check::get_tanggal_show($verifikasi->tanggal);
                })
                ->addColumn('action', function ($verifikasi) {
                    return '
                    <a href="' . url('/admin/alternatif?verifikasi_id=' . $verifikasi->id) . '" class="btn btn-sm btn-info"><i class="fas fa-users"></i> Warga</a>
                    <a href="' . route('admin.verifikasi.edit', $verifikasi->id) . '" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i> Edit</a>
                    <form class="d-inline" method="post" action="' . route('admin.verifikasi.destroy', $verifikasi->id) . '">
                    <input type="hidden" name="_token" value="' . csrf_token() . '">
                   ' . method_field('delete') . '
                        <button type="submit" onclick="return confirm(\'Yakin ingin menghapus item ini?\')" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> Hapus</a>
                    </form>

                    ';
                })
                ->rawColumns(['status_verifikasi', 'action'])
                ->make();
        }
        return view('admin.verifikasi.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.verifikasi.create');
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
            'tanggal' => 'required',
            'waktu' => 'required',
            'judul_verifikasi' => 'required',
            'status_verifikasi' => 'required'
        ]);
        unset($validated['tanggal']);
        $tanggal = Check::get_tanggal_insert($request->input('tanggal'));
        $data = array_merge($validated, ['tanggal' => $tanggal]);

        // verifikasi
        $verifikasi = VerifikasiData::create($data);

        if ($verifikasi) {
            Check::logInsert('Berhasil menambahkan data verifikasi dengan id = ' . $verifikasi->id);
            $request->session()->flash('success', 'Berhasil menambah data verifikasi');
        } else {
            $request->session()->flash('error', 'Gagal menambah data verifikasi');
        }
        return redirect()->route('admin.verifikasi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $verifikasi = VerifikasiData::find($id);
        return view('admin.verifikasi.show', [
            'verifikasi' => $verifikasi
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
        $verifikasi = VerifikasiData::find($id);
        return view('admin.verifikasi.edit', [
            'verifikasi' => $verifikasi,
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
            'tanggal' => 'required',
            'waktu' => 'required',
            'judul_verifikasi' => 'required',
            'status_verifikasi' => 'required',
        ]);
        unset($validated['tanggal']);
        $tanggal = Check::get_tanggal_insert($request->input('tanggal'));

        $dataVerifikasi = array_merge($validated, ['tanggal' => $tanggal]);
        $update = VerifikasiData::where('id', '=', $id)
            ->update($dataVerifikasi);

        if ($update) {
            Check::logInsert('Berhasil mengubah data verifikasi dengan id = ' . $id);
            $request->session()->flash('success', 'Berhasil mengubah data verifikasi');
        } else {
            $request->session()->flash('error', 'Gagal mengubah data verifikasi');
        }
        return redirect()->route('admin.verifikasi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $verifikasi = VerifikasiData::destroy($id);
        if ($verifikasi) {
            Check::logInsert('Berhasil menghapus data verifikasi dengan id = ' . $id);
            session()->flash('success', 'Berhasil menghapus data verifikasi');
        } else {
            session()->flash('error', 'Gagal menghapus data verifikasi');
        }
        return redirect()->route('admin.verifikasi.index');
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
                        'tanggal' => Check::get_tanggal_insert($sheetData[$i]['0']),
                        'judul_verifikasi' => $sheetData[$i]['1'],
                        'waktu' => date('H:i:s'),
                    ];
                }
            }
            $insert = VerifikasiData::insert($data);
            if ($insert > 0) {
                session()->flash('success', 'Berhasil ' . count($count) . ' import data menu');
            } else {
                session()->flash('error', 'Gagal import');
            }
            return redirect()->route('admin.verifikasi.index');
        }
    }
}
