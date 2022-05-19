<?php

namespace Database\Seeders;

use App\Models\Instalasi;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class InstalasiSeeder extends Seeder
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
                'tgl_buat' => Carbon::parse('2021-02-01'),
                'tgl_survey' => Carbon::parse('2021-02-02'),
                'tarif_instalasi' => 490000,
                'tgl_pemasangan' => Carbon::parse('2021-02-04'),
                'tgl_selesai' => Carbon::parse('2021-02-04'),
                'status' => 'selesai'
            ],
            [
                'id' => 2,
                'id_anggota' => 2,
                'tgl_buat' => Carbon::parse('2021-03-01'),
                'tgl_survey' => Carbon::parse('2021-03-02'),
                'tarif_instalasi' => 535000,
                'tgl_pemasangan' => Carbon::parse('2021-03-05'),
                'tgl_selesai' => Carbon::parse('2021-03-05'),
                'status' => 'selesai'
            ],
            [
                'id' => 3,
                'id_anggota' => 3,
                'tgl_buat' => Carbon::parse('2021-03-20'),
                'tgl_survey' => Carbon::parse('2021-03-21'),
                'tarif_instalasi' => 770000,
                'tgl_pemasangan' => Carbon::parse('2021-03-22'),
                'tgl_selesai' => Carbon::parse('2021-03-22'),
                'status' => 'selesai'
            ],
            [
                'id' => 4,
                'id_anggota' => 4,
                'tgl_buat' => Carbon::parse('2021-03-22'),
                'tgl_survey' => Carbon::parse('2021-03-22'),
                'tarif_instalasi' => 490000,
                'tgl_pemasangan' => Carbon::parse('2021-03-07'),
                'tgl_selesai' => Carbon::parse('2021-03-07'),
                'status' => 'selesai'
            ],
            [
                'id' => 5,
                'id_anggota' => 5,
                'tgl_buat' => Carbon::parse('2021-04-05'),
                'tgl_survey' => Carbon::parse('2021-04-06'),
                'tarif_instalasi' => 385000,
                'tgl_pemasangan' => Carbon::parse('2021-04-09'),
                'tgl_selesai' => Carbon::parse('2021-04-09'),
                'status' => 'selesai'
            ],
            [
                'id' => 6,
                'id_anggota' => 6,
                'tgl_buat' => Carbon::parse('2022-01-01'),
                'tgl_survey' => Carbon::parse('2022-01-02'),
                'tarif_instalasi' => 480000,
                'tgl_pemasangan' => Carbon::parse('2022-01-03'),
                'tgl_selesai' => Carbon::parse('2022-01-03'),
                'status' => 'selesai'
            ],
            [
                'id' => 7,
                'id_anggota' => 7,
                'tgl_buat' => Carbon::parse('2022-03-02'),
                'tgl_survey' => Carbon::parse('2022-03-03'),
                'tarif_instalasi' => 490000,
                'tgl_pemasangan' => Carbon::parse('2022-03-04'),
                'tgl_selesai' => Carbon::parse('2022-03-04'),
                'status' => 'selesai'
            ],
            [
                'id' => 8,
                'id_anggota' => 8,
                'tgl_buat' => Carbon::parse('2022-05-2'),
                'tgl_survey' => Carbon::parse('2022-05-22'),
                'tarif_instalasi' => 490000,
                'tgl_pemasangan' => Carbon::parse('2022-05-25'),
                'tgl_selesai' => Carbon::parse('2022-05-25'),
                'status' => 'selesai'
            ],
            [
                'id' => 9,
                'id_anggota' => 9,
                'tgl_buat' => Carbon::parse('2022-05-27'),
                'tgl_survey' => Carbon::parse('2022-05-28'),
                'tarif_instalasi' => 410000,
                'tgl_pemasangan' => Carbon::parse('2022-05-30'),
                'tgl_selesai' => Carbon::parse('2022-05-30'),
                'status' => 'selesai'
            ]
        ];

        Instalasi::insert($datas);
    }
}
