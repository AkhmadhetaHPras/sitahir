<?php

namespace Database\Seeders;

use App\Models\BukuAir;
use Illuminate\Database\Seeder;

class BukuAirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BukuAir::truncate();

        $datas = [
            [],
        ];

        BukuAir::insert($datas);
    }
}
