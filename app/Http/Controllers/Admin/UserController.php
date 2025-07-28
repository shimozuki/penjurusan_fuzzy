<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Check;
use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Datatables;
use File;
use Illuminate\Support\Facades\Hash;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as Xlsximport;

class UserController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $User = User::join('profile', 'profile.users_id', '=', 'users.id')
                ->select('users.username', 'users.status', 'users.id', 'profile.nama_profile', 'profile.gambar_profile');

            return Datatables::of($User)
                ->addIndexColumn()

                ->addColumn('action', function ($User) {
                    $output = '
                    <a href="' . route('admin.user.edit', $User->id) . '" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i> Edit</a>

                    <form class="d-inline" method="post" action="' . route('admin.user.destroy', $User->id) . '">
                    <input type="hidden" name="_token" value="' . csrf_token() . '">
                   ' . method_field('delete') . '
                        <button type="submit" onclick="return confirm(\'Yakin ingin menghapus item ini?\')" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> Hapus</a>
                        </button>
                    </form>
                    ';


                    return $output;
                })
                ->addColumn('gambar_profile', function ($User) {

                    $gambar = $User->gambar_profile != null ? public_path() . '/img/users/' . $User->gambar_profile : false;
                    if (file_exists($gambar)) {
                        $gambarFix = asset('img/users/' . $User->gambar_profile);
                    } else {
                        $gambarFix = asset('img/users/default.png');
                    }


                    $output = '
                        <img src="' . $gambarFix . '" class="w-100 img-thumbnail"></img>
                    ';


                    return $output;
                })
                ->rawColumns(['gambar_profile', 'action'])
                ->make();
        }
        return view('admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
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
            'username' => 'required|unique:users',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'gambar_profile' => 'file|max:1024|mimes:jpg,bmp,png,gig,svg,jpeg',
            'status' => 'required',
            'nama_profile' => 'required',
            'jenis_kelamin' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
        ]);

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('gambar_profile');
        $users_id = null;
        $gambar_profile = $this->uploadFile($file, $users_id);

        $user = User::create([
            'username' => $request->input('username'),
            'password' => Hash::make($request->input('password')),
            'level' => 'admin',
            'status' => $request->input('status'),
        ]);

        $profile = Profile::create([
            'nama_profile' => $request->input('nama_profile'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'no_hp' => $request->input('no_hp'),
            'alamat' => $request->input('alamat'),
            'gambar_profile' => $gambar_profile,
            'users_id' => $user->id
        ]);

        if ($user || $profile) {
            Check::logInsert('Berhasil menambahkan data user dengan id = ' . $user->id);
            $request->session()->flash('success', 'Berhasil menambah data User');
        } else {
            $request->session()->flash('error', 'Gagal menambah data User');
        }
        return redirect()->route('admin.user.index');
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
        $User = User::join('profile', 'profile.users_id', '=', 'users.id')
            ->where('users.id', '=', $id)
            ->first();

        return view('admin.user.edit', [
            'user' => $User
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
        if ($request->input('password') != null && $request->input('password_confirmation') != null) {
            $validated = $request->validate([
                'username' => ['required', function ($attribute, $value, $fail) {
                    $username = $_POST['username'];
                    $check = User::where('username', '=', $username)
                        ->where('id', '<>', $_POST['id'])
                        ->get()->count();
                    if ($check > 0) {
                        $fail('Username already used');
                    }
                }],
                'password' => 'required|confirmed',
                'password_confirmation' => 'required',
                'gambar_profile' => 'file|max:1024|mimes:jpg,bmp,png,gig,svg,jpeg',
                'status' => 'required',
                'nama_profile' => 'required',
                'jenis_kelamin' => 'required',
                'no_hp' => 'required',
                'alamat' => 'required',
            ]);
        } else {
            $validated = $request->validate([
                'username' => ['required', function ($attribute, $value, $fail) {
                    $username = $_POST['username'];
                    $check = User::where('username', '=', $username)
                        ->where('id', '<>', $_POST['id'])
                        ->get()->count();
                    if ($check > 0) {
                        $fail('Username already used');
                    }
                }],
                'gambar_profile' => 'file|max:1024|mimes:jpg,bmp,png,gig,svg,jpeg',
                'status' => 'required',
                'nama_profile' => 'required',
                'jenis_kelamin' => 'required',
                'no_hp' => 'required',
                'alamat' => 'required',
            ]);
        }


        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('gambar_profile');
        $users_id = $id;
        $gambar_profile = $this->uploadFile($file, $users_id);

        if ($request->input('password') != null) {
            $update = User::where('id', '=', $id)
                ->update([
                    'username' => $request->input('username'),
                    'password' => Hash::make($request->input('password')),
                    'level' => 'admin',
                    'status' => $request->input('status'),
                ]);
        } else {
            $update = User::where('id', '=', $id)
                ->update([
                    'username' => $request->input('username'),
                    'level' => 'admin',
                    'status' => $request->input('status'),
                ]);
        }


        $profile = Profile::where('users_id', '=', $id)
            ->update([
                'nama_profile' => $request->input('nama_profile'),
                'jenis_kelamin' => $request->input('jenis_kelamin'),
                'no_hp' => $request->input('no_hp'),
                'alamat' => $request->input('alamat'),
                'gambar_profile' => $gambar_profile,
                'users_id' => $id
            ]);

        if ($update) {
            Check::logInsert('Berhasil mengubah data user dengan id = ' . $id);
            $request->session()->flash('success', 'Berhasil mengubah data User');
        } else {
            $request->session()->flash('error', 'Gagal mengubah data User');
        }
        return redirect()->route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete file
        $this->deleteFile($id);
        $User = User::destroy($id);
        if ($User) {
            Check::logInsert('Berhasil menghapus data user dengan id = ' . $id);
            session()->flash('success', 'Berhasil menghapus data User');
        } else {
            session()->flash('error', 'Gagal menghapus data User');
        }
        return redirect()->route('admin.user.index');
    }
    private function uploadFile($file, $users_id)
    {
        // delete file
        $this->deleteFile($users_id);


        if ($file != null) {
            // nama file
            $fileExp =  explode('.', $file->getClientOriginalName());
            $name = $fileExp[0];
            $ext = $fileExp[1];
            $name = time() . '-' . str_replace(' ', '-', $name) . '.' . $ext;

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'img/users/';

            // upload file
            $file->move($tujuan_upload, $name);
        } else {
            $name = null;
        }

        return $name;
    }
    private function deleteFile($users_id = null)
    {
        if ($users_id != null) {
            $profile = Profile::where('users_id', '=', $users_id)->first();
            $gambar = public_path() . '/img/users/' . $profile->gambar_profile;
            if (file_exists($gambar)) {
                if ($profile->gambar_profile != 'default.png') {
                    File::delete($gambar);
                }
            }
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
            for ($i = 1; $i < count($sheetData); $i++) {
                $cek = $sheetData[$i]['0'];
                if ($cek != null) {
                    $count[] = $i;

                    // users
                    $dataUser = [
                        'username' => $sheetData[$i]['0'],
                        'password' => Hash::make($sheetData[$i]['1']),
                        'level' => 'admin',
                        'status' => 'aktif',
                    ];
                    $user = User::create($dataUser);

                    // profile
                    $dataProfile = [
                        'nama_profile' => $sheetData[$i]['2'],
                        'jenis_kelamin' => $sheetData[$i]['3'],
                        'no_hp' => $sheetData[$i]['4'],
                        'alamat' => $sheetData[$i]['5'],
                        'gambar_profile' => 'default.png',
                        'users_id' => $user->id
                    ];
                    $profile = Profile::create($dataProfile);
                }
            }

            if ($user || $profile) {
                session()->flash('success', 'Berhasil ' . count($count) . ' import data menu');
            } else {
                session()->flash('error', 'Gagal import');
            }
            return redirect()->route('admin.user.index');
        }
    }
}
