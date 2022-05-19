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


        $datas = [
            [
                'id' => 1,
                'kubik' => 0,
                'tarif' => 5000
            ],
            [
                'id' => 2,
                'kubik' => 1,
                'tarif' => 6000
            ],
            [
                'id' => 3,
                'kubik' => 2,
                'tarif' => 7000
            ],
            [
                'id' => 4,
                'kubik' => 3,
                'tarif' => 8000
            ],
            [
                'id' => 5,
                'kubik' => 4,
                'tarif' => 9000
            ],
            [
                'id' => 6,
                'kubik' => 5,
                'tarif' => 10000
            ],
            [
                'id' => 7,
                'kubik' => 6,
                'tarif' => 11000
            ],
            [
                'id' => 8,
                'kubik' => 7,
                'tarif' => 12000
            ],
            [
                'id' => 9,
                'kubik' => 8,
                'tarif' => 13000
            ],
            [
                'id' => 10,
                'kubik' => 9,
                'tarif' => 14000
            ],
            [
                'id' => 11, 
                'kubik' => 10,
                'tarif' => 15000
            ],
            [
                'id' => 12,
                'kubik' => 11,
                'tarif' => 16500
            ],
            [
                'id' => 13,
                'kubik' => 12,
                'tarif' => 18000
            ],
            [
                'id' => 14,
                'kubik' => 13,
                'tarif' => 19500
            ],
            [
                'id' => 15,
                'kubik' => 14,
                'tarif' => 21000
            ],
            [
                'id' => 16,
                'kubik' => 15,
                'tarif' => 22500
            ],
            [
                'id' => 17, 
                'kubik' => 16,
                'tarif' => 24000
            ],
            [
                'id' => 18, 
                'kubik' => 17,
                'tarif' => 25500
            ],
            [
                'id' => 19,
                'kubik' => 18,
                'tarif' => 27000
            ],
            [
                'id' => 20,
                'kubik' => 19,
                'tarif' => 28500
            ],
            [
                'id' => 21,
                'kubik' => 20,
                'tarif' => 30000
            ],
            [
                'id' => 22,
                'kubik' => 21,
                'tarif' => 32000
            ],
            [
                'id' => 23,
                'kubik' => 22,
                'tarif' => 34000
            ],
            [
                'id' => 24,
                'kubik' => 23,
                'tarif' => 36000
            ],
            [
                'id' => 25, 
                'kubik' => 24,
                'tarif' => 38000
            ],
            [
                'id' => 26,
                'kubik' => 25,
                'tarif' => 40000
            ],
            [
                'id' => 27,
                'kubik' => 26,
                'tarif' => 42000
            ],
            [
                'id' => 28,
                'kubik' => 27,
                'tarif' => 44000
            ],
            [
                'id' => 29,
                'kubik' => 28,
                'tarif' => 46000
            ],
            [
                'id' => 30,
                'kubik' => 29,
                'tarif' => 48000
            ],
            [
                'id' => 31,
                'kubik' => 30,
                'tarif' => 50000
            ],
        ];

        TarifAir::insert($datas);
    }
}
