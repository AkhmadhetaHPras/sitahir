<?php

namespace Database\Seeders;

use App\Models\Pengumuman;
use Illuminate\Database\Seeder;

class PengumumanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pengumuman::truncate();

        $datas = [
            [],
        ];

        Pengumuman::insert($datas);
    }
}
