<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\BukuAir;
use App\Models\Instalasi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class InstalasiAnggotaController extends Controller
{
    public function index()
    {
        $anggota = Anggota::where('id_users', Auth::user()->id)->with('user')->first();
        $instalasi = Instalasi::where('id_anggota', $anggota->id)->first();
        if ($instalasi->status == 'Selesai') {
            return abort(403, 'Unauthorized action.');
        }

        if ($instalasi->tarif_instalasi != null) {
            // Set your Merchant Server Key
            \Midtrans\Config::$serverKey = 'SB-Mid-server-6kQ9oVZV3nWHEEiOL1bz0Sxs';
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction = false;
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = true;
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = true;

            foreach ($instalasi->form_instalasi_alat as $t) {
                $id = $t->id;
                $price = $t->harga_satuan;
                $nama = $t->nama_barang;
                $quantity = $t->jumlah;
                $data[] =  [
                    'id' => $id,
                    'price' => $price,
                    'name' => $nama,
                    'quantity' => $quantity
                ];
            }
            $total = $instalasi->tarif_instalasi;
            $params = array(
                'transaction_details' => array(
                    'order_id' => rand(),
                    'gross_amount' => $total,
                ),
                'item_details' => $data,
                'customer_details' => array(
                    'first_name' => $instalasi->anggota->nama,
                    'last_name' => '',
                    'email' => $instalasi->anggota->user->email,
                    'phone' => $instalasi->anggota->nowa,
                ),
            );

            $snapToken = \Midtrans\Snap::getSnapToken($params);
            return view('anggota.instalasi', ['snap_token' => $snapToken, 'instalasi' => $instalasi]);
        }
        return view('anggota.instalasi', compact('instalasi'));
    }

    public function update(Instalasi $instalasi)
    {
        $instalasi->status = 'Selesai';
        $instalasi->save();

        $buku = new BukuAir();
        $buku->anggota()->associate($instalasi->anggota);
        $buku->tahun = Carbon::parse(now())->year;
        $buku->bulan = Carbon::parse(now())->month;
        $buku->save();

        return redirect('dashboard');
    }

    public function bayar($id)
    {
        $instalasi = Instalasi::where('id_anggota', $id)->first();
        $instalasi->status = 'Lunas';
        $instalasi->save();

        return redirect('/instalasi')
            ->with(array('success' => 'Pembayaran Instalasi diterima'));
    }
}
