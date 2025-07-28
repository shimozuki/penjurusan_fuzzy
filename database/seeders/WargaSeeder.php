<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Warga;

class WargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $warga = Warga::create([
            'nama_warga' => 'Polan 1',
            'alamat_warga' => 'Alamat warga 1',
            'no_hp_warga' => '08238928432'
        ]);
        $sub_kriteria_id = [1, 5, 9, 13, 17];
        $sub_kriteria_warga = Warga::find($warga->id);
        $sub_kriteria_warga->subKriteria()->attach($sub_kriteria_id);

        $warga = Warga::create([
            'nama_warga' => 'Polan 2',
            'alamat_warga' => 'Alamat warga 2',
            'no_hp_warga' => '08238928432'
        ]);
        $sub_kriteria_id = [1, 5, 9, 13, 17];
        $sub_kriteria_warga = Warga::find($warga->id);
        $sub_kriteria_warga->subKriteria()->attach($sub_kriteria_id);

        $warga = Warga::create([
            'nama_warga' => 'Polan 3',
            'alamat_warga' => 'Alamat warga 3',
            'no_hp_warga' => '08238928432'
        ]);
        $sub_kriteria_id = [1, 5, 9, 13, 17];
        $sub_kriteria_warga = Warga::find($warga->id);
        $sub_kriteria_warga->subKriteria()->attach($sub_kriteria_id);

        $warga = Warga::create([
            'nama_warga' => 'Polan 4',
            'alamat_warga' => 'Alamat warga 4',
            'no_hp_warga' => '08238928432'
        ]);
        $sub_kriteria_id = [1, 5, 9, 13, 17];
        $sub_kriteria_warga = Warga::find($warga->id);
        $sub_kriteria_warga->subKriteria()->attach($sub_kriteria_id);

        $warga = Warga::create([
            'nama_warga' => 'Polan 5',
            'alamat_warga' => 'Alamat warga 5',
            'no_hp_warga' => '08238928432'
        ]);
        $sub_kriteria_id = [1, 5, 9, 13, 17];
        $sub_kriteria_warga = Warga::find($warga->id);
        $sub_kriteria_warga->subKriteria()->attach($sub_kriteria_id);

        $warga = Warga::create([
            'nama_warga' => 'Polan 6',
            'alamat_warga' => 'Alamat warga 6',
            'no_hp_warga' => '08238928432'
        ]);
        $sub_kriteria_id = [1, 5, 9, 13, 17];
        $sub_kriteria_warga = Warga::find($warga->id);
        $sub_kriteria_warga->subKriteria()->attach($sub_kriteria_id);

        $warga = Warga::create([
            'nama_warga' => 'Polan 7',
            'alamat_warga' => 'Alamat warga 7',
            'no_hp_warga' => '08238928432'
        ]);
        $sub_kriteria_id = [1, 5, 9, 13, 17];
        $sub_kriteria_warga = Warga::find($warga->id);
        $sub_kriteria_warga->subKriteria()->attach($sub_kriteria_id);

        $warga = Warga::create([
            'nama_warga' => 'Polan 8',
            'alamat_warga' => 'Alamat warga 8',
            'no_hp_warga' => '08238928432'
        ]);
        $sub_kriteria_id = [1, 5, 9, 13, 17];
        $sub_kriteria_warga = Warga::find($warga->id);
        $sub_kriteria_warga->subKriteria()->attach($sub_kriteria_id);

        $warga = Warga::create([
            'nama_warga' => 'Polan 9',
            'alamat_warga' => 'Alamat warga 9',
            'no_hp_warga' => '08238928432'
        ]);
        $sub_kriteria_id = [1, 5, 9, 13, 17];
        $sub_kriteria_warga = Warga::find($warga->id);
        $sub_kriteria_warga->subKriteria()->attach($sub_kriteria_id);

        $warga = Warga::create([
            'nama_warga' => 'Polan 10',
            'alamat_warga' => 'Alamat warga 10',
            'no_hp_warga' => '08238928432'
        ]);
        $sub_kriteria_id = [1, 5, 9, 13, 17];
        $sub_kriteria_warga = Warga::find($warga->id);
        $sub_kriteria_warga->subKriteria()->attach($sub_kriteria_id);
    }
}
