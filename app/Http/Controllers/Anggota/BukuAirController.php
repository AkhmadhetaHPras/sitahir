<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\BukuAir;
use App\Models\Instalasi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class BukuAirController extends Controller
{
    public function index()
    {
        $anggota = Anggota::where('id_users', Auth::user()->id)->with('user')->first();
        $instalasi = Instalasi::where('id_anggota', $anggota->id)->first();
        if ($instalasi->status != 'Selesai') {
            return abort(403, 'Unauthorized action.');
        }


        $anggota = Anggota::where('id_users', Auth::user()->id)->first();

        $bukuairs = BukuAir::where('id_anggota', $anggota->id)
            ->orderBy('id', 'desc')
            ->paginate(12);

        return view('anggota.bukuair', compact('bukuairs'));
    }
}
