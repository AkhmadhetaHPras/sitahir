<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
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
                'username' => 'ardhanurazizah',
                'password' => Hash::make('123456ardha'),
                'email' => 'naardha0@gmail.com'
            ],
            [
                'id' => 2,
                'username' => 'hafid_pras',
                'password' => Hash::make('fidpras123'),
                'email' => 'hafidpras@gmail.com'
            ],
            [
                'id' => 3,
                'username' => 'rafifalaudin_',
                'password' => Hash::make('fif098765'),
                'email' => 'rafif@gmail.com'
            ],
            [
                'id' => 4,
                'username' => 'rosisHP',
                'password' => Hash::make('sateayam13'),
                'email' => 'rosis@gmail.com'
            ],
            [
                'id' => 5,
                'username' => 'irfanAli',
                'password' => Hash::make('fanir2022'),
                'email' => 'irfan@gmail.com'
            ],
            [
                'id' => 6,
                'username' => 'putraput',
                'password' => Hash::make('09876put'),
                'email' => 'putra19@gmail.com'
            ],
            [
                'id' => 7,
                'username' => 'anikzulaika',
                'password' => Hash::make('13092876'),
                'email' => 'anikzul@gmail.com'
            ],
            [
                'id' => 8,
                'username' => 'suronoputraa',
                'password' => Hash::make('suronoputro'),
                'email' => 'surono24@gmail.com'
            ],
            [
                'id' => 9,
                'username' => 'dennyck',
                'password' => Hash::make('dennycak123'),
                'email' => 'dennycak@gmail.com'
            ],
            [
                'id' => 10,
                'username' => 'sutiraayu',
                'password' => Hash::make('sutiraayudewi12'),
                'email' => 'sutinarab@gmail.com'
            ],
            [
                'id' => 11,
                'username' => 'asliah12',
                'password' => Hash::make('123456789'),
                'email' => 'asliah@gmail.com'
            ],
            [
                'id' => 12,
                'username' => 'clarisha_sandra',
                'password' => Hash::make('bonekastitch'),
                'email' => 'clarisha@gmail.com'
            ],
            [
                'id' => 13,
                'username' => 'erlitaaa',
                'password' => Hash::make('sotoayam123'),
                'email' => 'erlita123@gmail.com'
            ],
            [
                'id' => 14,
                'username' => 'arifsyaiful',
                'password' => Hash::make('arif1020'),
                'email' => 'arif@gmail.com'
            ],
            [
                'id' => 15,
                'username' => 'mujianto',
                'password' => Hash::make('mujiganteng'),
                'email' => 'mujianto@gmail.com'
            ],
        ];

        User::insert($datas);
    }
}
