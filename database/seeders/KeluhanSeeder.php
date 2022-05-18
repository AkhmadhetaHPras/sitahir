<?php

namespace Database\Seeders;

use App\Models\Keluhan;
use Illuminate\Database\Seeder;

class KeluhanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Keluhan::truncate();

        $datas = [
            [],
        ];

        Keluhan::insert($datas);
    }
}
