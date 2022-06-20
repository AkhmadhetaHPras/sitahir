<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\FormInstalasiAlat;
use App\Models\Instalasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class TransaksiInstalasiController extends Controller
{
    public function index()
    {
        $baru = Instalasi::where('status', 'Dalam Proses')
            ->where('tarif_instalasi', null)
            ->get();

        $pending = Instalasi::where('status', 'Dalam Proses')
            ->where('tarif_instalasi', '!=', null)
            ->get();

        $lunas = Instalasi::where('status', 'Lunas')
            ->where('tgl_pemasangan', null)
            ->get();

        $pemasangan = Instalasi::where('status', 'Lunas')
            ->where('tgl_pemasangan', '!=', null)
            ->get();

        $selesai = Instalasi::where('status', 'Selesai')
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.transaksiinstalasi', compact('baru', 'pending', 'lunas', 'pemasangan', 'selesai'));
    }

    public function store(Request $request)
    {
        $anggota = Anggota::find($_POST['idanggota']);
        foreach ($_POST['nama_barang'] as $key => $value) {
            $detail = new FormInstalasiAlat();
            $detail->instalasi()->associate($anggota);
            $detail->nama_barang = $value;
            $detail->jumlah = $_POST['jumlah'][$key];
            $detail->harga_satuan = $_POST['harga_satuan'][$key];
            $detail->subtotal = $detail->jumlah * $detail->harga_satuan;
            $detail->save();
        }

        $instalasi = Instalasi::where('id_anggota', $anggota->id)->first();
        $instalasi->tarif_instalasi = FormInstalasiAlat::where('id_instalasi', $instalasi->id)->sum('subtotal');
        $instalasi->save();

        return response()->json([
            'data' => $instalasi->tarif_instalasi,
        ]);
    }

    public function redirect($response)
    {
        return redirect('/instalasianggota')
            ->with(array('pendingsuccess' => $response, 'error_code' => 10));
    }

    public function checkout($id)
    {
        $instalasi = Instalasi::where('id_anggota', $id)->first();
        // $instalasi->status = 'Lunas';
        // $instalasi->save();

        // return redirect('/instalasianggota')
        //     ->with(array('lunassuccess' => 'Pembayaran Instalasi diterima', 'error_code' => 11));
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
        // dd($params);

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return view('paymentinstalasi', ['snap_token' => $snapToken, 'instalasi' => $instalasi]);
    }

    public function bayar($id)
    {
        $instalasi = Instalasi::where('id_anggota', $id)->first();
        $instalasi->status = 'Lunas';
        $instalasi->save();

        return redirect('/instalasianggota')
            ->with(array('lunassuccess' => 'Pembayaran Instalasi diterima', 'error_code' => 11));
    }

    public function batalkan($id)
    {
        $instalasi = Instalasi::where('id_anggota', $id)->first();
        $instalasi->tarif_instalasi = null;
        $instalasi->save();

        foreach ($instalasi->form_instalasi_alat as $i) {
            $i->delete();
        }
        return redirect('/instalasianggota')
            ->with(array('barusuccess' => 'Pembatalan berhasil'));
    }

    public function jadwal(Request $request, $id)
    {
        $instalasi = Instalasi::where('id_anggota', $id)->first();
        $instalasi->tgl_pemasangan = $request->get('tgl_pemasangan');
        $instalasi->save();

        return redirect('/instalasianggota')
            ->with(array('jadwalsuccess' => 'Jadwal instalasi berhasil disimpan', 'error_code' => 12));
    }
}
