<?php

namespace Database\Seeders;

use App\Models\Pengurus;
use Illuminate\Database\Seeder;

class PengurusSeeder extends Seeder
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
                'id_users' => 2,
                'nama' => 'Akhmadheta Hafid Prasetyawan',
                'alamat' => 'Jl. Mawar RT 09/RW 02',
                'jabatan' => 'Ketua',
                'nowa' => '081276867546',
                'foto' => 'img/profile/default.png',
            ],
            [
                'id' => 2,
                'id_users' => 4,
                'nama' => 'Rosis Hudaya Putra',
                'alamat' => 'Jl. Tanggunan RT 02/RW 01',
                'jabatan' => 'Sekretaris',
                'nowa' => '082567348675',
                'foto' => 'img/profile/default.png',
            ],
            [
                'id' => 3,
                'id_users' => 6,
                'nama' => 'Putra Ali',
                'alamat' => 'Jl. Sanggar RT 01/RW 01',
                'jabatan' => 'Bendahara',
                'nowa' => '085378663787',
                'foto' => 'img/profile/default.png',
            ],
        ];

        Pengurus::insert($datas);
    }
}
