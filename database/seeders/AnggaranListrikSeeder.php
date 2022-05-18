<?php

namespace Database\Seeders;

use App\Models\AnggaranListrik;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AnggaranListrikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 'date' => Carbon::parse('2000-01-01')
        // 'onlymonth' => Carbon::parse('2000-01-01')->month
        // 'onlyyear' => Carbon::parse('2000-01-01')->year
        AnggaranListrik::truncate();

        $datas = [
            ['date' => Carbon::parse('2000-01-01')],
        ];

        AnggaranListrik::insert($datas);
    }
}
