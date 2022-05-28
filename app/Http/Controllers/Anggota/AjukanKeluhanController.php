<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\Keluhan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AjukanKeluhanController extends Controller
{
    public function index()
    {
        $anggota = Anggota::where('id_users', Auth::user()->id)->first();
        $keluhanproses = Keluhan::where('id_anggota', $anggota->id)
            ->where('status', null)
            ->orWhere('status', 'Dalam Proses')
            ->with('anggota')
            ->get();

        $keluhanselesai = Keluhan::where('id_anggota', $anggota->id)
            ->where('status', 'Selesai')
            ->with('anggota')
            ->get();

        return view('anggota.ajukankeluhan', ['proses' => $keluhanproses, 'selesai' => $keluhanselesai]);
    }
}
