<?php

namespace Database\Seeders;

use App\Models\Keluhan;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class KeluhanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $datas = [
            [
                'id' => 1,
                'id_anggota' => 1,
                'tgl_pengajuan' => Carbon::parse('2021-04-01'),
                'jenis_keluhan' => 'Kerusakan Pipa',
                'deskripsi' => 'Pipa Pecah Sepanjang 5 cm',
                'tgl_survey' => Carbon::parse('2021-04-03'),
                'tgl_selesai' => Carbon::parse('2021-04-05'),
                'status' => 'Selesai',
            ],
            [
                'id' => 2,
                'id_anggota' => 1,
                'tgl_pengajuan' => Carbon::parse('2021-04-01'),
                'jenis_keluhan' => 'Kerusakan Keran',
                'deskripsi' => 'Kran tidak bisa di tutup',
                'tgl_survey' => Carbon::parse('2021-08-22'),
                'tgl_selesai' => Carbon::parse('2021-08-22'),
                'status' => 'Selesai',
            ],
            [
                'id' => 3,
                'id_anggota' => 5,
                'tgl_pengajuan' => Carbon::parse('2021-09-03'),
                'jenis_keluhan' => 'Kerusakan Meteran Air',
                'deskripsi' => 'Meteran air tidak berfungsi',
                'tgl_survey' => Carbon::parse('2021-09-05'),
                'tgl_selesai' => Carbon::parse('2021-09-10'),
                'status' => 'Selesai',
            ],
            [
                'id' => 4,
                'id_anggota' => 2,
                'tgl_pengajuan' => Carbon::parse('2021-11-12'),
                'jenis_keluhan' => 'Air Tidak Mengalir',
                'deskripsi' => 'air tidak mengalir dengan lancar',
                'tgl_survey' => Carbon::parse('2021-11-14'),
                'tgl_selesai' => Carbon::parse('2021-11-16'),
                'status' => 'Selesai',
            ],
            [
                'id' => 5,
                'id_anggota' => 6,
                'tgl_pengajuan' => Carbon::parse('2022-03-01'),
                'jenis_keluhan' => 'Aliran Air Kecil',
                'deskripsi' => 'sudah 2 hari aliran air yang keluar sangat kecil',
                'tgl_survey' => null,
                'tgl_selesai' => null,
                'status' => null,
            ]
        ];

        Keluhan::insert($datas);
    }
}
