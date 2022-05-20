<?php

namespace Database\Seeders;

use App\Models\Anggota;
use App\Models\BukuAir;
use App\Models\FormInstalasiAlat;
use App\Models\Keluhan;
use App\Models\Pengurus;
use Illuminate\Database\Seeder;

use function PHPSTORM_META\map;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            LaratrustSeeder::class,
            AnggaranListrikSeeder::class,
            PengumumanSeeder::class,
            TarifAirSeeder::class,
            UserSeeder::class,
            UserRoleSeeder::class,
            PengurusSeeder::class,
            AdminSeeder::class,
            AnggotaSeeder::class,
            InstalasiSeeder::class,
            FormInstalasiAlatSeeder::class,
            KeluhanSeeder::class,
            BukuAirSeeder::class,
        ]);
    }
}
