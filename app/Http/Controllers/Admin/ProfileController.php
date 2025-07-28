<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile.index');
    }
    public function update(Request $request)
    {
        $validated = $request->validate([
            'nama_profile' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
        ]);

        $users_id = $request->users_id;
        $update = Profile::where('users_id', $users_id)
            ->update($validated);

        if ($update) {
            $request->session()->flash('success', 'Berhasil mengupdate data profile');
        } else {
            $request->session()->flash('error', 'Gagal mengupdate data profile');
        }
        return redirect()->route('admin.profile.index');
    }

    public function changeFoto(Request $request)
    {

        $validated = $request->validate([
            'gambar_profile' => 'required|file|max:1024|mimes:jpeg,jpg,png,gif'
        ]);

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('gambar_profile');
        $users_id = $request->input('users_id');
        $name = $this->uploadFile($file, $users_id);


        $update = Profile::where('users_id', $users_id)
            ->update(['gambar_profile' => $name]);

        if ($update) {
            $request->session()->flash('success', 'Berhasil mengubah gambar profile');
        } else {
            $request->session()->flash('error', 'Gagal mengubah gambar profile');
        }
        return redirect()->route('admin.profile.index');
    }

    public function changePassword(Request $request)
    {
        $validated = $request->validate([
            'password_old' => [
                'required', function ($attribute, $value, $fail) {
                    $password = Auth::user()->password;

                    if (!(Hash::check($value, $password))) {
                        $fail('Password does not match with password old');
                    }
                },
            ],
            'password' => ['required', 'confirmed'],
            'password_confirmation' => ['required']
        ]);

        $users_id = Auth::user()->id;
        $user = User::where('id', '=', $users_id)
            ->update([
                'password' => Hash::make($request->get('password'))
            ]);


        if ($user) {
            $request->session()->flash('success', 'Berhasil mengubah password profile');
        } else {
            $request->session()->flash('error', 'Gagal mengubah password profile');
        }
        return redirect()->route('admin.profile.index');
    }

    private function uploadFile($file, $users_id)
    {
        // delete file
        $this->deleteFile($users_id);

        // nama file
        $fileExp =  explode('.', $file->getClientOriginalName());
        $name = $fileExp[0];
        $ext = $fileExp[1];
        $name = time() . '-' . str_replace(' ', '-', $name) . '.' . $ext;

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'img/users/';

        // upload file
        $file->move($tujuan_upload, $name);
        return $name;
    }
    private function deleteFile($users_id)
    {
        $profile = Profile::where('users_id', '=', $users_id)->first();
        $gambar = public_path() . '/img/users/' . $profile->gambar_profile;
        if (file_exists($gambar)) {
            if ($profile->gambar_profile != 'default.png') {
                File::delete($gambar);
            }
        }
    }
}
