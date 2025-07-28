<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Check;
use App\Http\Controllers\Controller;
use App\Models\Hasil;
use App\Models\HasilDetail;
use App\Models\Pengumuman;
use App\Models\Penilaian;
use Illuminate\Http\Request;
use Datatables;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $Pengumuman = Pengumuman::join('penilaian', 'penilaian.id', '=', 'pengumuman.penilaian_id')
                ->select('pengumuman.*', 'penilaian.judul_penilaian')
                ->get();

            return Datatables::of($Pengumuman)
                ->addIndexColumn()

                ->addColumn('action', function ($Pengumuman) {
                    $output = '
                    <a href="' . route('admin.pengumuman.edit', $Pengumuman->id) . '" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i> Edit</a>

                    <form class="d-inline" method="post" action="' . route('admin.pengumuman.destroy', $Pengumuman->id) . '">
                    <input type="hidden" name="_token" value="' . csrf_token() . '">
                   ' . method_field('delete') . '
                        <button type="submit" onclick="return confirm(\'Yakin ingin menghapus item ini?\')" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> Hapus</a>
                        </button>
                    </form>

                    <a href="' . url('admin/penyeleksian/' . $Pengumuman->penilaian_id . '/hasil') . '" class="btn btn-sm btn-info" target="_blank"><i class="fas fa-eye"></i> Lihat Hasil</a>
                    ';


                    return $output;
                })
                ->addColumn('tanggal_pengumuman', function ($Pengumuman) {
                    $output = Check::get_tanggal_show($Pengumuman->tanggal_pengumuman);


                    return $output;
                })
                ->addColumn('status_pengumuman', function ($Pengumuman) {
                    $output = $Pengumuman->status_pengumuman == 'buka' ? '<span class="badge badge-success"> Buka </span>' : '<span class="badge badge-info"> Tutup </span>';


                    return $output;
                })
                ->rawColumns(['status_pengumuman', 'action'])
                ->make();
        }
        return view('admin.pengumuman.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $penilaian = Penilaian::all();
        return view('admin.pengumuman.create', [
            'penilaian' => $penilaian
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
            'judul_pengumuman' => 'required',
            'keterangan_pengumuman' => 'required',
            'kuota_pengumuman' => 'required',
            'tanggal_pengumuman' => 'required',
            'penilaian_id' => 'required|unique:pengumuman'
        ]);

        $tanggal = Check::get_tanggal_insert($request->input('tanggal_pengumuman'));
        $insert = Pengumuman::create([
            'judul_pengumuman' => $request->input('judul_pengumuman'),
            'keterangan_pengumuman' => $request->input('keterangan_pengumuman'),
            'kuota_pengumuman' => $request->input('kuota_pengumuman'),
            'tanggal_pengumuman' => $tanggal,
            'status_pengumuman' => $request->input('status_pengumuman'),
            'penilaian_id' => $request->input('penilaian_id'),
        ]);


        if ($insert) {
            $hasilDetail = Hasil::join('hasil_detail', 'hasil.id', '=', 'hasil_detail.hasil_id')
                ->where('hasil.penilaian_id', '=', $request->input('penilaian_id'))
                ->orderBy('hasil_detail.bobot_hasil', 'DESC')
                ->get();
            $kuota = $request->input('kuota_pengumuman');
            foreach ($hasilDetail as $index => $v_hasil_detail) {
                $number = $index + 1;
                if ($number <= $kuota) {
                    $data = [
                        'status' => '1'
                    ];
                    HasilDetail::find($v_hasil_detail->id)->update($data);
                } else {
                    $data = [
                        'status' => '0'
                    ];
                    HasilDetail::find($v_hasil_detail->id)->update($data);
                }
            }

            Check::logInsert('Berhasil menambahkan data pengumuman dengan id = ' . $insert->id);
            $request->session()->flash('success', 'Berhasil menambah data Pengumuman');
        } else {
            $request->session()->flash('error', 'Gagal menambah data Pengumuman');
        }
        return redirect()->route('admin.pengumuman.index');
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
        $Pengumuman = Pengumuman::find($id);
        $penilaian = Penilaian::all();
        return view('admin.pengumuman.edit', [
            'pengumuman' => $Pengumuman,
            'penilaian' => $penilaian
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
            'judul_pengumuman' => 'required',
            'keterangan_pengumuman' => 'required',
            'kuota_pengumuman' => 'required',
            'tanggal_pengumuman' => 'required',
            'penilaian_id' => ['required', function ($attribute, $value, $fail) {
                $id = $_POST['id'];
                $row = Pengumuman::where('id', '<>', $id)
                    ->where('penilaian_id', '=', $value)
                    ->get()->count();
                if ($row > 0) {
                    $fail('This activity before already available');
                }
            }]
        ]);

        $tanggal = Check::get_tanggal_insert($request->input('tanggal_pengumuman'));

        $update = Pengumuman::where('id', '=', $id)
            ->update([
                'judul_pengumuman' => $request->input('judul_pengumuman'),
                'keterangan_pengumuman' => $request->input('keterangan_pengumuman'),
                'kuota_pengumuman' => $request->input('kuota_pengumuman'),
                'tanggal_pengumuman' => $tanggal,
                'status_pengumuman' => $request->input('status_pengumuman'),
                'penilaian_id' => $request->input('penilaian_id'),
            ]);


        if ($update) {
            $hasilDetail = Hasil::join('hasil_detail', 'hasil.id', '=', 'hasil_detail.hasil_id')
                ->where('hasil.penilaian_id', '=', $request->input('penilaian_id'))
                ->orderBy('hasil_detail.bobot_hasil', 'DESC')
                ->get();
            $kuota = $request->input('kuota_pengumuman');
            foreach ($hasilDetail as $index => $v_hasil_detail) {
                $number = $index + 1;
                if ($number <= $kuota) {
                    $data = [
                        'status' => '1'
                    ];
                    HasilDetail::find($v_hasil_detail->id)->update($data);
                } else {
                    $data = [
                        'status' => '0'
                    ];
                    HasilDetail::find($v_hasil_detail->id)->update($data);
                }
            }


            Check::logInsert('Berhasil mengubah data pengumuman dengan id = ' . $id);
            $request->session()->flash('success', 'Berhasil mengubah data Pengumuman');
        } else {
            $request->session()->flash('error', 'Gagal mengubah data Pengumuman');
        }
        return redirect()->route('admin.pengumuman.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $Pengumuman = Pengumuman::destroy($id);
        if ($Pengumuman) {
            Check::logInsert('Berhasil menghapus data pengumuman dengan id = ' . $id);
            session()->flash('success', 'Berhasil menghapus data Pengumuman');
        } else {
            session()->flash('error', 'Gagal menghapus data Pengumuman');
        }
        return redirect()->route('admin.pengumuman.index');
    }
}
