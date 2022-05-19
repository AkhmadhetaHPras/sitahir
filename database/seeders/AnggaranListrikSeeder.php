<?php

namespace Database\Seeders;

use App\Models\AnggaranListrik;
use Carbon\Carbon;
use Illuminate\Database\Seeder;


class AnggaranListrikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 'date' => Carbon::parse('2000-01-01')
        // 'onlymonth' => Carbon::parse('2000-01-01')->month
        // 'onlyyear' => Carbon::parse('2000-01-01')->year
        

        $datas = [
            [
                'id' => 1,
                'tahun' => 2021,
                'bulan' => 3,
                'anggaran' => 1200000,
                'tgl_bayar' => Carbon::parse('2021-03-01')
            ],
            [
                'id' => 2,
                'tahun' => 2021,
                'bulan' => 4,
                'anggaran' => 1264700,
                'tgl_bayar' => Carbon::parse('2021-04-05')
            ],
            [
                'id' => 3,
                'tahun' => 2021,
                'bulan' => 5,
                'anggaran' => 1254000,
                'tgl_bayar' => Carbon::parse('2021-05-05')
            ],
            [
                'id' => 4,
                'tahun' => 2021,
                'bulan' => 6,
                'anggaran' => 1300000,
                'tgl_bayar' => Carbon::parse('2021-06-10')
            ],
            [
                'id' => 5,
                'tahun' => 2021,
                'bulan' => 7,
                'anggaran' => 1356000,
                'tgl_bayar' => Carbon::parse('2021-07-01')
            ],
            [
                'id' => 6,
                'tahun' => 2021,
                'bulan' => 8,
                'anggaran' => 1385100,
                'tgl_bayar' => Carbon::parse('2021-08-03')
            ],
            [
                'id' => 7,
                'tahun' => 2021,
                'bulan' => 9,
                'anggaran' => 1300000,
                'tgl_bayar' => Carbon::parse('2021-09-10')
            ],
            [
                'id' => 8,
                'tahun' => 2021,
                'bulan' => 10,
                'anggaran' => 1323000,
                'tgl_bayar' => Carbon::parse('2021-10-01')
            ],
            [
                'id' => 9,
                'tahun' => 2021,
                'bulan' => 11,
                'anggaran' => 1303000,
                'tgl_bayar' => Carbon::parse('2021-1-01')
            ],
            [
                'id' => 10,
                'tahun' => 2021,
                'bulan' => 12,
                'anggaran' => 1390000,
                'tgl_bayar' => Carbon::parse('2021-12-09')
            ],
            [
                'id' => 11,
                'tahun' => 2022,
                'bulan' => 1,
                'anggaran' => 1400000,
                'tgl_bayar' => Carbon::parse('2022-01-13')
            ],
            [
                'id' => 12,
                'tahun' => 2022,
                'bulan' => 2,
                'anggaran' => 1400500,
                'tgl_bayar' => Carbon::parse('2022-02-04')
            ],
            [
                'id' => 13,
                'tahun' => 2022,
                'bulan' => 3,
                'anggaran' => 1420000,
                'tgl_bayar' => Carbon::parse('2022-03-11')
            ],
            [
                'id' => 14,
                'tahun' => 2022,
                'bulan' => 4,
                'anggaran' => 1500000,
                'tgl_bayar' => Carbon::parse('2022-04-01')
            ],
            [
                'id' => 15,
                'tahun' => 2022,
                'bulan' => 5,
                'anggaran' => 1500000,
                'tgl_bayar' => Carbon::parse('2022-05-03')
            ],

        ];

        AnggaranListrik::insert($datas);
    }
}
