<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Keluhan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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
            ->orderBy('tgl_selesai', 'desc')
            ->get();

        return view('admin.tanggapikeluhan', ['masuk' => $keluhanmasuk, 'proses' => $keluhanproses, 'selesai' => $keluhanselesai]);
    }

    public function jadwalkan(Request $request, $id)
    {
        $keluhan = Keluhan::find($id);
        $keluhan->tgl_survey = $request->get('tgl_survey');
        $keluhan->status = 'Dalam Proses';
        $keluhan->save();

        return Redirect::back()
            ->with(array('keluhansuccess' => "Penjadwalan perbaikan berhasil disimpan", 'error_code' => 13));
    }
}
