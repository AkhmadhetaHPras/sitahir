<?php

namespace Database\Seeders;

use App\Models\TarifAir;
use Illuminate\Database\Seeder;

class TarifAirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TarifAir::truncate();

        $datas = [
            [],
        ];

        TarifAir::insert($datas);
    }
}
