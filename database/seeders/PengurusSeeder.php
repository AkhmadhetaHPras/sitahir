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
        Pengurus::truncate();

        $datas = [
            [],
        ];

        Pengurus::insert($datas);
    }
}
