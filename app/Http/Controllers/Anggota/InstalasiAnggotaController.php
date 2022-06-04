<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\Instalasi;
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
        return view('anggota.instalasi');
    }
}
