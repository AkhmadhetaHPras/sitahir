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


        $datas = [
            [
                'id' => 1,
                'judul' => "Batas Pembayaran Tanggal 10-24",
                'isi' => "Batas pembayaran dilakukan sebelum 10-24 per bulan. Jika terdapat keterlambatan maka akan mendapatkan denda yang telah ditentukan",
                'file' => null,
            ],
            [
                'id' => 2,
                'judul' => "Surat Undangan Rapat 10 Juli",
                'isi' => "Surat undangan rapat",
                'file' => 'https://drive.google.com/file/d/1uvcgNXotmDx7CdRH0enxNMHkJN8UUAeu/view?usp=sharing',
            ],
            [
                'id' => 3,
                'judul' => "Kenaikan Harga Per 1 Agustus",
                'isi' => "Pemberitahuan ditujukan oleh setiap anggota, dikarenakan terdapat perbaikan. Maka pembayaran air dinaikkan per tanggal 1 Agustus 2021",
                'file' => null,
            ],
            [
                'id' => 4,
                'judul' => "Pemberitahuan Kendala Saluran Air",
                'isi' => "Pemberitahuan untuk anggota, bahwa kemungkinan arus air pada tanggal 3 Sepetember 2021 nanti akan sedikit terhambat. Karena dalam masa perbaikan",
                'file' => null,
            ],
        ];

        Pengumuman::insert($datas);
    }
}
