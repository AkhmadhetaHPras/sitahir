<?php

namespace Database\Seeders;

use App\Models\Instalasi;
use Illuminate\Database\Seeder;

class InstalasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Instalasi::truncate();

        $datas = [
            [],
        ];

        Instalasi::insert($datas);
    }
}
