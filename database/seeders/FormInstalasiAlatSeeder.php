<?php

namespace Database\Seeders;

use App\Models\FormInstalasiAlat;
use Illuminate\Database\Seeder;

class FormInstalasiAlatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FormInstalasiAlat::truncate();

        $datas = [
            [],
        ];

        FormInstalasiAlat::insert($datas);
    }
}
