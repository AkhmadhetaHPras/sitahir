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
        

        $datas = [
            [
                'id' => 1,
                'id_instalasi' => 1,
                'nama_barang' => 'Pipa Air',
                'jumlah' => 3,
                'harga_satuan' => 80000,
                'subtotal' => 240000
            ],
            [
                'id' => 2,
                'id_instalasi' => 1,
                'nama_barang' => 'Sambungan Pipa',
                'jumlah' => 5,
                'harga_satuan' => 25000,
                'subtotal' => 125000
            ],
            [
                'id' => 3,
                'id_instalasi' => 1,
                'nama_barang' => 'Kran',
                'jumlah' => 1,
                'harga_satuan' => 55000,
                'subtotal' => 55000
            ],
            [
                'id' => 4,
                'id_instalasi' => 1,
                'nama_barang' => 'Lem Pipa',
                'jumlah' => 2,
                'harga_satuan' => 35000,
                'subtotal' => 70000
            ],
            [
                'id' => 5,
                'id_instalasi' => 2,
                'nama_barang' => 'Pipa Air',
                'jumlah' => 4,
                'harga_satuan' => 80000,
                'subtotal' => 320000
            ],
            [
                'id' => 6,
                'id_instalasi' => 2,
                'nama_barang' => 'Sambungan Pipa',
                'jumlah' => 5,
                'harga_satuan' => 25000,
                'subtotal' => 125000
            ],
            [
                'id' => 7,
                'id_instalasi' => 2,
                'nama_barang' => 'Kran',
                'jumlah' => 1,
                'harga_satuan' => 55000,
                'subtotal' => 55000
            ],
            [
                'id' => 8,
                'id_instalasi' => 2,
                'nama_barang' => 'Lem Pipa',
                'jumlah' => 1,
                'harga_satuan' => 35000,
                'subtotal' => 35000
            ],
            [
                'id' => 9,
                'id_instalasi' => 3,
                'nama_barang' => 'Pipa Air',
                'jumlah' => 6,
                'harga_satuan' => 80000,
                'subtotal' => 480000
            ],
            [
                'id' => 10,
                'id_instalasi' => 3,
                'nama_barang' => 'Sambungan Pipa',
                'jumlah' => 8,
                'harga_satuan' => 25000,
                'subtotal' => 200000
            ],
            [
                'id' => 11,
                'id_instalasi' => 3,
                'nama_barang' => 'Kran',
                'jumlah' => 1,
                'harga_satuan' => 55000,
                'subtotal' => 55000
            ],
            [
                'id' => 12,
                'id_instalasi' => 3,
                'nama_barang' => 'Lem Pipa',
                'jumlah' => 1,
                'harga_satuan' => 35000,
                'subtotal' => 35000
            ],
            [
                'id' => 13,
                'id_instalasi' => 4,
                'nama_barang' => 'Pipa Air',
                'jumlah' => 3,
                'harga_satuan' => 80000,
                'subtotal' => 240000
            ],
            [
                'id' => 14,
                'id_instalasi' => 4,
                'nama_barang' => 'Sambungan Pipa',
                'jumlah' => 5,
                'harga_satuan' => 25000,
                'subtotal' => 125000
            ],
            [
                'id' => 15,
                'id_instalasi' => 4,
                'nama_barang' => 'Kran',
                'jumlah' => 1,
                'harga_satuan' => 55000,
                'subtotal' => 55000
            ],
            [
                'id' => 16,
                'id_instalasi' => 4,
                'nama_barang' => 'Lem Pipa',
                'jumlah' => 2,
                'harga_satuan' => 35000,
                'subtotal' => 70000
            ],
            [
                'id' => 17,
                'id_instalasi' => 5,
                'nama_barang' => 'Pipa Air',
                'jumlah' => 2,
                'harga_satuan' => 80000,
                'subtotal' => 160000
            ],
            [
                'id' => 18,
                'id_instalasi' => 5,
                'nama_barang' => 'Sambungan Pipa',
                'jumlah' => 4,
                'harga_satuan' => 25000,
                'subtotal' => 100000
            ],
            [
                'id' => 19,
                'id_instalasi' => 5,
                'nama_barang' => 'Kran',
                'jumlah' => 1,
                'harga_satuan' => 55000,
                'subtotal' => 55000
            ],
            [
                'id' => 20,
                'id_instalasi' => 5,
                'nama_barang' => 'Lem Pipa',
                'jumlah' => 2,
                'harga_satuan' => 35000,
                'subtotal' => 70000
            ],
            [
                'id' => 21,
                'id_instalasi' => 6,
                'nama_barang' => 'Pipa Air',
                'jumlah' => 3,
                'harga_satuan' => 80000,
                'subtotal' => 240000
            ],
            [
                'id' => 22,
                'id_instalasi' => 6,
                'nama_barang' => 'Sambungan Pipa',
                'jumlah' => 6,
                'harga_satuan' => 25000,
                'subtotal' => 150000
            ],
            [
                'id' => 23,
                'id_instalasi' => 6,
                'nama_barang' => 'Kran',
                'jumlah' => 1,
                'harga_satuan' => 55000,
                'subtotal' => 55000
            ],
            [
                'id' => 24,
                'id_instalasi' => 6,
                'nama_barang' => 'Lem Pipa',
                'jumlah' => 1,
                'harga_satuan' => 35000,
                'subtotal' => 35000
            ],
            [
                'id' => 25,
                'id_instalasi' => 7,
                'nama_barang' => 'Pipa Air',
                'jumlah' => 3,
                'harga_satuan' => 80000,
                'subtotal' => 240000
            ],
            [
                'id' => 26,
                'id_instalasi' => 7,
                'nama_barang' => 'Sambungan Pipa',
                'jumlah' => 5,
                'harga_satuan' => 25000,
                'subtotal' => 125000
            ],
            [
                'id' => 27,
                'id_instalasi' => 7,
                'nama_barang' => 'Kran',
                'jumlah' => 1,
                'harga_satuan' => 55000,
                'subtotal' => 55000
            ],
            [
                'id' => 28,
                'id_instalasi' => 7,
                'nama_barang' => 'Lem Pipa',
                'jumlah' => 2,
                'harga_satuan' => 35000,
                'subtotal' => 70000
            ],
            [
                'id' => 29,
                'id_instalasi' => 8,
                'nama_barang' => 'Pipa Air',
                'jumlah' => 3,
                'harga_satuan' => 80000,
                'subtotal' => 240000
            ],
            [
                'id' => 30,
                'id_instalasi' => 8,
                'nama_barang' => 'Sambungan Pipa',
                'jumlah' => 5,
                'harga_satuan' => 25000,
                'subtotal' => 125000
            ],
            [
                'id' => 31,
                'id_instalasi' => 8,
                'nama_barang' => 'Kran',
                'jumlah' => 1,
                'harga_satuan' => 55000,
                'subtotal' => 55000
            ],
            [
                'id' => 32,
                'id_instalasi' => 8,
                'nama_barang' => 'Lem Pipa',
                'jumlah' => 2,
                'harga_satuan' => 35000,
                'subtotal' => 70000
            ],
            [
                'id' => 33,
                'id_instalasi' => 9,
                'nama_barang' => 'Pipa Air',
                'jumlah' => 2,
                'harga_satuan' => 80000,
                'subtotal' => 160000
            ],
            [
                'id' => 34,
                'id_instalasi' => 9,
                'nama_barang' => 'Sambungan Pipa',
                'jumlah' => 5,
                'harga_satuan' => 25000,
                'subtotal' => 125000
            ],
            [
                'id' => 35,
                'id_instalasi' => 9,
                'nama_barang' => 'Kran',
                'jumlah' => 1,
                'harga_satuan' => 55000,
                'subtotal' => 55000
            ],
            [
                'id' => 36,
                'id_instalasi' => 9,
                'nama_barang' => 'Lem Pipa',
                'jumlah' => 2,
                'harga_satuan' => 35000,
                'subtotal' => 70000
            ],
            
        ];

        FormInstalasiAlat::insert($datas);
    }
}
