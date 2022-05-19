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
            ],
            [
                'id' => 2,
                'judul' => "Surat Undangan Rapat 10 Juli",
                'isi' => "Surat undangan rapat dapat di unduh pada file",
            ],
            [
                'id' => 3,
                'judul' => "Kenaikan Harga Per 1 Agustus",
                'isi' => "Pemberitahuan ditujukan oleh setiap anggota, dikarenakan terdapat perbaikan. Maka pembayaran air dinaikkan per tanggal 1 Agustus 2021",
            ],
            [
                'id' => 4,
                'judul' => "Surat Pemberitahuan Anggota 1 September 2021",
                'isi' => "Pemberitahuan untuk anggota, bahwa kemungkin arus air pada tanggal 3 Sepetember 2021 nanti akan sedikit terhambat. Karena dalam masa perbaikan",
            ],
            [
                'id' => 5,
                'judul' => "Pemberitahuan Mengenai Pembayaran Air Terbaru",
                'isi' => "Pembayaran air terbaru 2022 akan terdapat perbedaan sebelumnya. Untuk mempermudah alur pembayaran air. Lihat file untuk melihat perubahan",
            ],
        ];

        Pengumuman::insert($datas);
    }
}
