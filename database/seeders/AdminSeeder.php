<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
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
                'id_users' => 1,
                'nama' => 'Ardha Nur Azizah',
                'alamat' => 'Jl. Melati RT 04/RW 02',
                'nowa' => '085748682562',
                'foto' => 'img/profile/default.png',
            ],
            [
                'id' => 2,
                'id_users' => 3,
                'nama' => 'Ahmad Rafif Alaudin',
                'alamat' => 'Jl. Anggraini RT 08/RW 02',
                'nowa' => '087654367976',
                'foto' => 'img/profile/default.png',
            ],
            [
                'id' => 3,
                'id_users' => 5,
                'nama' => 'Irfan Ali',
                'alamat' => 'Jl. Melati RT 08/RW 02',
                'nowa' => '085234765897',
                'foto' => 'img/profile/default.png',
            ]
        ];

        Admin::insert($datas);
    }
}
