<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Keluhan;

class TanggapiKeluhanController extends Controller
{
    public function index()
    {
        $keluhanmasuk = Keluhan::where('status', null)
            ->with('anggota')
            ->get();

        $keluhanproses = Keluhan::where('status', 'Dalam Proses')
            ->with('anggota')
            ->get();

        $keluhanselesai = Keluhan::where('status', 'Selesai')
            ->with('anggota')
            ->get();

        return view('admin.tanggapikeluhan', ['masuk' => $keluhanmasuk, 'proses' => $keluhanproses, 'selesai' => $keluhanselesai]);
    }
}
