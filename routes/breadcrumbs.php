<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('admin.dashboard.index'));
});

// Home > Profile
Breadcrumbs::for('profile', function ($trail) {
    $trail->parent('home');
    $trail->push('Profile', route('admin.profile.index'));
});

// Home > kriteria
Breadcrumbs::for('kriteria', function ($trail) {
    $trail->parent('home');
    $trail->push('Kriteria', route('admin.kriteria.index'));
});
// Home > kriteria > create
Breadcrumbs::for('tambah_kriteria', function ($trail) {
    $trail->parent('kriteria');
    $trail->push('Tambah kriteria', route('admin.kriteria.create'));
});
// Home > kriteria > edit
Breadcrumbs::for('edit_kriteria', function ($trail, $kriteria) {
    $trail->parent('kriteria');
    $trail->push('Edit kriteria', route('admin.kriteria.edit', $kriteria->id));
});


// Home > subkriteria
Breadcrumbs::for('subkriteria', function ($trail) {
    $trail->parent('home');
    $trail->push('subkriteria', route('admin.subkriteria.index'));
});
// Home > subkriteria > create
Breadcrumbs::for('tambah_subkriteria', function ($trail) {
    $trail->parent('subkriteria');
    $trail->push('Tambah subkriteria', route('admin.subkriteria.create'));
});
// Home > subkriteria > edit
Breadcrumbs::for('edit_subkriteria', function ($trail, $subkriteria) {
    $trail->parent('subkriteria');
    $trail->push('Edit subkriteria', route('admin.subkriteria.edit', $subkriteria->id));
});

// Home > alternatif
Breadcrumbs::for('alternatif', function ($trail) {
    $verifikasi_id = request()->input('verifikasi_id');
    $trail->parent('verifikasi');
    $trail->push('alternatif', url('/admin/alternatif?verifikasi_id=' . $verifikasi_id));
});
// Home > alternatif > create
Breadcrumbs::for('tambah_alternatif', function ($trail) {
    $trail->parent('alternatif');
    $trail->push('Tambah alternatif', route('admin.alternatif.create'));
});
// Home > alternatif > edit
Breadcrumbs::for('edit_alternatif', function ($trail, $alternatif) {
    $verifikasi_id = request()->input('verifikasi_id');
    $trail->parent('alternatif');
    $trail->push('Edit alternatif', url('admin/alternatif/' . $alternatif->id . '/edit?verifikasi_id=' . $verifikasi_id));
});
// Home > alternatif > detail
Breadcrumbs::for('detail_alternatif', function ($trail, $alternatif) {
    $verifikasi_id = request()->input('verifikasi_id');

    $trail->parent('alternatif');
    $trail->push('Detail alternatif', url('admin/alternatif/show/' . $alternatif->id . '?verifikasi_id=' . $verifikasi_id));
});

// Home > verifikasi
Breadcrumbs::for('verifikasi', function ($trail) {
    $trail->parent('home');
    $trail->push('verifikasi', route('admin.verifikasi.index'));
});
// Home > verifikasi > create
Breadcrumbs::for('tambah_verifikasi', function ($trail) {
    $trail->parent('verifikasi');
    $trail->push('Tambah verifikasi', route('admin.verifikasi.create'));
});
// Home > verifikasi > edit
Breadcrumbs::for('edit_verifikasi', function ($trail, $verifikasi) {
    $trail->parent('verifikasi');
    $trail->push('Edit verifikasi', route('admin.verifikasi.edit', $verifikasi->id));
});
// Home > verifikasi > detail
Breadcrumbs::for('detail_verifikasi', function ($trail, $verifikasi) {
    $trail->parent('verifikasi');
    $trail->push('Detail verifikasi', route('admin.verifikasi.show', $verifikasi->id));
});



// Home > penyeleksian
Breadcrumbs::for('penyeleksian', function ($trail) {
    $trail->parent('home');
    $trail->push('penyeleksian', route('admin.penyeleksian.index'));
});

// Home > penyeleksian > create
Breadcrumbs::for('tambah_penyeleksian', function ($trail) {
    $trail->parent('penyeleksian');
    $trail->push('Tambah penyeleksian', route('admin.penyeleksian.create'));
});
// Home > penyeleksian > edit
Breadcrumbs::for('edit_penyeleksian', function ($trail, $penyeleksian) {
    $trail->parent('penyeleksian');
    $trail->push('Edit penyeleksian', route('admin.penyeleksian.edit', $penyeleksian->id));
});
// Home > penyeleksian > detail
Breadcrumbs::for('detail_penyeleksian', function ($trail, $penyeleksian) {
    $trail->parent('penyeleksian');
    $trail->push('Detail penyeleksian', route('admin.penyeleksian.show', $penyeleksian->id));
});
// Home > penyeleksian > hasil
Breadcrumbs::for('hasil_penyeleksian', function ($trail, $penyeleksian) {
    $trail->parent('penyeleksian');
    $trail->push('hasil penyeleksian', route('admin.penyeleksian.hasil', $penyeleksian->id));
});
// Home > penyeleksian > perhitungan
Breadcrumbs::for('perhitungan_penyeleksian', function ($trail, $penyeleksian) {
    $trail->parent('penyeleksian');
    $trail->push('perhitungan penyeleksian', route('admin.penyeleksian.perhitungan', $penyeleksian->id));
});



// Home > hasil
Breadcrumbs::for('hasil', function ($trail) {
    $trail->parent('home');
    $trail->push('hasil', route('admin.hasil.index'));
});





// Home > pengumuman
Breadcrumbs::for('pengumuman', function ($trail) {
    $trail->parent('home');
    $trail->push('pengumuman', route('admin.pengumuman.index'));
});
// Home > pengumuman > create
Breadcrumbs::for('tambah_pengumuman', function ($trail) {
    $trail->parent('pengumuman');
    $trail->push('Tambah pengumuman', route('admin.pengumuman.create'));
});
// Home > pengumuman > edit
Breadcrumbs::for('edit_pengumuman', function ($trail, $pengumuman) {
    $trail->parent('pengumuman');
    $trail->push('Edit pengumuman', route('admin.pengumuman.edit', $pengumuman->id));
});


// Home > user
Breadcrumbs::for('user', function ($trail) {
    $trail->parent('home');
    $trail->push('user', route('admin.user.index'));
});
// Home > user > create
Breadcrumbs::for('tambah_user', function ($trail) {
    $trail->parent('user');
    $trail->push('Tambah user', route('admin.user.create'));
});
// Home > user > edit
Breadcrumbs::for('edit_user', function ($trail, $user) {
    $trail->parent('user');
    $trail->push('Edit user', route('admin.user.edit', $user->id));
});
// Home > user > detail
Breadcrumbs::for('detail_user', function ($trail, $user) {
    $trail->parent('user');
    $trail->push('Detail user', route('admin.user.show', $user->id));
});

// Home > konfigurasi > edit
Breadcrumbs::for('edit_konfigurasi', function ($trail, $konfigurasi) {
    $trail->parent('home');
    $trail->push('Edit konfigurasi', route('admin.konfigurasi.index', $konfigurasi->id));
});

// home_user
Breadcrumbs::for('home_user', function ($trail) {
    $trail->push('Home', url('/'));
});

// user
Breadcrumbs::for('cari_data', function ($trail, $pengumuman) {
    $trail->parent('home_user');
    $trail->push('Cari data', route('user.lihat', $pengumuman->id));
});

// user
Breadcrumbs::for('hasil_data', function ($trail, $pengumuman) {
    $trail->parent('cari_data', $pengumuman);
    $trail->push('Hasil pencarian', route('user.search', $pengumuman->id));
});


// perhitungan metode
Breadcrumbs::for('hitung_ahp', function ($trail) {
    $trail->parent('home');
    $trail->push('perhitungan', route('admin.perhitungan.index'));
});

Breadcrumbs::for('hitungfuzzy_ahp', function ($trail) {
    $trail->parent('hitung_ahp');
    $trail->push('perhitungan fuzzy', route('admin.perhitungan.fuzzyAhp'));
});

Breadcrumbs::for('rekomendasi_ahp', function ($trail) {
    $trail->parent('hitungfuzzy_ahp');
    $trail->push('Rekomendasi Penerima', route('admin.perhitungan.rekomendasiWarga'));
});


Breadcrumbs::for('log', function ($trail) {
    $trail->parent('home');
    $trail->push('log', route('admin.log.index'));
});


// Home > aktual
Breadcrumbs::for('aktual', function ($trail) {
    $trail->parent('home');
    $penyeleksian_id = request()->input('penyeleksian_id');
    $trail->push('aktual', url('admin/aktual?penyeleksian_id=' . $penyeleksian_id));
});
// Home > aktual > create
Breadcrumbs::for('tambah_aktual', function ($trail) {
    $trail->parent('aktual');
    $penyeleksian_id = request()->input('penyeleksian_id');
    $trail->push('Tambah aktual', url('admin/aktual/create?penyeleksian_id=' . $penyeleksian_id));
});
// Home > aktual > edit
Breadcrumbs::for('edit_aktual', function ($trail, $aktual) {
    $trail->parent('aktual');
    $penyeleksian_id = request()->input('penyeleksian_id');
    $trail->push('Edit aktual', url('admin/aktual' . $aktual->id . '/edit?penyeleksian_id=' . $penyeleksian_id));
});
// Home > aktual > edit
Breadcrumbs::for('detail_aktual', function ($trail, $aktual) {
    $trail->parent('aktual');
    $penyeleksian_id = request()->input('penyeleksian_id');
    $trail->push('Detail aktual', url('admin/aktual/' . $aktual->id . '?penyeleksian_id=' . $penyeleksian_id));
});
