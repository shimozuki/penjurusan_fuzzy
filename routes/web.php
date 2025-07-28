<?php

use App\Http\Controllers\Admin\AktualController;
use App\Http\Controllers\Admin\AlternatifController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HasilController;
use App\Http\Controllers\Admin\KonfigurasiController;
use App\Http\Controllers\Admin\KriteriaController;
use App\Http\Controllers\Admin\logController;
use App\Http\Controllers\Admin\PengumumanController;
use App\Http\Controllers\Admin\PenyeleksianController;
use App\Http\Controllers\Admin\PerhitunganController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SubkriteriaController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VerifikasiDataController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/lihat/{id}/pengumuman', [HomeController::class, 'lihat'])->name('user.lihat');
Route::get('/reloadCaptcha/{id}/reload-captcha', [HomeController::class, 'reloadCaptcha'])->name('user.reloadCaptcha');
Route::post('/cari/{id}/search', [HomeController::class, 'search'])->name('user.search');
Route::get('/hasil/{id}/info', [HomeController::class, 'hasil'])->name('user.hasil');
Route::get('/gagal/{id}/info', [HomeController::class, 'gagal'])->name('user.gagal');

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::group(['prefix' => 'admin/', 'as' => 'admin.', 'middleware' => 'checknotlogin'], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // profile
    Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('changeFoto', [ProfileController::class, 'changeFoto'])->name('profile.changeFoto');
    Route::post('changePassword', [ProfileController::class, 'changePassword'])->name('profile.changePassword');

    // kriteria
    Route::post('kriteria/import', [KriteriaController::class, 'import'])->name('kriteria.import');
    Route::resource('kriteria', KriteriaController::class);

    // sub kriteria
    Route::post('subkriteria/import', [SubkriteriaController::class, 'import'])->name('subkriteria.import');
    Route::resource('subkriteria', SubkriteriaController::class);

    // alternatif
    Route::post('alternatif/import', [AlternatifController::class, 'import'])->name('alternatif.import');
    Route::resource('alternatif', AlternatifController::class);

    // aktual
    Route::get('aktual/saveSession', [AktualController::class, 'saveSession'])->name('aktual.saveSession');
    Route::get('aktual/submit', [AktualController::class, 'submit'])->name('aktual.submit');
    Route::get('aktual/delete/{id}', [AktualController::class, 'delete'])->name('aktual.delete');
    Route::post('aktual/import', [AktualController::class, 'import'])->name('aktual.import');
    Route::resource('aktual', AktualController::class);

    // verifikasi
    Route::post('verifikasi/import', [VerifikasiDataController::class, 'import'])->name('verifikasi.import');
    Route::resource('verifikasi', VerifikasiDataController::class);

    // penyeleksian
    Route::get('penyeleksian/{penyeleksian}/perhitungan', [PenyeleksianController::class, 'perhitungan'])->name('penyeleksian.perhitungan');
    Route::get('penyeleksian/{penyeleksian}/hasil', [PenyeleksianController::class, 'hasil'])->name('penyeleksian.hasil');
    Route::get('penyeleksian/{penyeleksian}/cetakPdf', [PenyeleksianController::class, 'cetakPdf'])->name('penyeleksian.cetakPdf');
    Route::resource('penyeleksian', PenyeleksianController::class);
    Route::post('penyeleksian/submitHitung', [PenyeleksianController::class, 'submitHitung'])->name('penyeleksian.submitHitung');
    Route::post('penyeleksian/import', [PenyeleksianController::class, 'import'])->name('penyeleksian.import');
    Route::resource('penyeleksian', PenyeleksianController::class);

    // perhitungan
    Route::get('perhitungan', [PerhitunganController::class, 'index'])->name('perhitungan.index');
    Route::get('perhitungan/perhitunganFuzzy', [PerhitunganController::class, 'fuzzyAhp'])->name('perhitungan.fuzzyAhp');
    Route::get('perhitungan/saveSession', [PerhitunganController::class, 'saveSession'])->name('perhitungan.saveSession');
    Route::get('perhitungan/rekomendasiWarga', [PerhitunganController::class, 'rekomendasiWarga'])->name('perhitungan.rekomendasiWarga');
    Route::post('perhitungan/submitPerhitungan', [PerhitunganController::class, 'submitPerhitungan'])->name('perhitungan.submitPerhitungan');



    // pengumuman
    Route::resource('pengumuman', PengumumanController::class);

    // user
    Route::post('user/import', [UserController::class, 'import'])->name('user.import');
    Route::resource('user', UserController::class);

    // konfigurasi
    Route::get('konfigurasi', [KonfigurasiController::class, 'index'])->name('konfigurasi.index');
    Route::put('konfigurasi/{konfigurasi}/update', [KonfigurasiController::class, 'update'])->name('konfigurasi.update');

    // log
    Route::get('log', [logController::class, 'index'])->name('log.index');
    Route::delete('log/{log}/destroy', [logController::class, 'destroy'])->name('log.destroy');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
