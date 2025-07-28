<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Check;
use App\Http\Controllers\Controller;
use App\Models\Log;
use Datatables;
use Illuminate\Http\Request;

class logController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $log = Log::select(['id', 'users_id', 'aktivitas']);
            return Datatables::of($log)
                ->addIndexColumn()
                ->addColumn('action', function ($log) {
                    return '
                    <form class="d-inline" method="post" action="' . route('admin.log.destroy', $log->id) . '">
                    <input type="hidden" name="_token" value="' . csrf_token() . '">
                   ' . method_field('delete') . '
                        <button type="submit" onclick="return confirm(\'Yakin ingin menghapus item ini?\')" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> Hapus</a>
                    </form>
                    ';
                })
                ->addColumn('users_id', function ($log) {
                    $users = Check::get_users($log->users_id);
                    return $users->nama_profile;
                })
                ->make();
        }
        return view('admin.log.index');
    }
    public function destroy($id)
    {
        $delete = Log::destroy($id);
        if ($delete) {
            session()->flash('success', 'Berhasil menghapus data log');
        } else {
            session()->flash('error', 'Gagal menghapus data log');
        }
        return redirect()->route('admin.log.index');
    }
}
