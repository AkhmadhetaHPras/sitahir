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
