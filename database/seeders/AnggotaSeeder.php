<?php

namespace Database\Seeders;

use App\Models\Anggota;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AnggotaSeeder extends Seeder
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
                'id_users' => 7,
                'nama' => 'Anik Zulaika',
                'alamat' => 'Jl. Mawar RT 09/RW 02',
                'tgl_gabung' => Carbon::parse('2021-02-01'),
                'nowa' => '086754765876',
                'instalasi' => 1
            ],
            [
                'id' => 2,
                'id_users' => 8,
                'nama' => 'Surono Putro Siregar',
                'alamat' => 'Jl. Ngadiluwih RT 09/RW 01',
                'tgl_gabung' => Carbon::parse('2021-03-01'),
                'nowa' => '086754765876',
                'instalasi' => 2
            ],
            [
                'id' => 3,
                'id_users' => 9,
                'nama' => 'Denny Cak Hendri',
                'alamat' => 'Jl. Mawar RT 09/RW 02',
                'tgl_gabung' => Carbon::parse('2021-03-20'),
                'nowa' => '086754765876',
                'instalasi' => 3
            ],
            [
                'id' => 4,
                'id_users' => 10,
                'nama' => 'Sutina Rabyan Putri',
                'alamat' => 'Jl. Melati RT 01/RW 10',
                'tgl_gabung' => Carbon::parse('2021-03-05'),
                'nowa' => '086754765876',
                'instalasi' => 4
            ],
            [
                'id' => 5,
                'id_users' => 11,
                'nama' => 'Asliah',
                'alamat' => 'Jl. Sanggar RT 09/RW 02',
                'tgl_gabung' => Carbon::parse('2021-04-05'),
                'nowa' => '086754765876',
                'instalasi' => 5
            ],
            [
                'id' => 6,
                'id_users' => 12,
                'nama' => 'Clarisha Sandra',
                'alamat' => 'Jl. Gathot Subroto RT 02/RW 01',
                'tgl_gabung' => Carbon::parse('2022-01-01'),
                'nowa' => '086754765876',
                'instalasi' => 6
            ],
            [
                'id' => 7,
                'id_users' => 13,
                'nama' => 'Erlita Nur',
                'alamat' => 'Jl. Warujayeng RT 09/RW 02',
                'tgl_gabung' => Carbon::parse('2022-03-02'),
                'nowa' => '086754765876',
                'instalasi' => 7
            ],
            [
                'id' => 8,
                'id_users' => 14,
                'nama' => 'Arif Syaifulloh',
                'alamat' => 'Jl. Putungan RT 05/RW 06',
                'tgl_gabung' => Carbon::parse('2022-05-21'),
                'nowa' => '086754765876',
                'instalasi' => 8
            ],
            [
                'id' => 9,
                'id_users' => 15,
                'nama' => 'Mujianto',
                'alamat' => 'Jl. Setono RT 10/RW 02',
                'tgl_gabung' => Carbon::parse('2022-05-27'),
                'nowa' => '086754765876',
                'instalasi' => 9
            ]
        ];

        Anggota::insert($datas);
    }
}
