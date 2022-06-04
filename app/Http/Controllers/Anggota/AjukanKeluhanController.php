<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\Instalasi;
use App\Models\Keluhan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AjukanKeluhanController extends Controller
{
    public function index()
    {
        $anggota = Anggota::where('id_users', Auth::user()->id)->with('user')->first();
        $instalasi = Instalasi::where('id_anggota', $anggota->id)->first();
        if ($instalasi->status != 'Selesai') {
            return abort(403, 'Unauthorized action.');
        }

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

    public function store(Request $request)
    {
        $request->validate([
            'jeniskeluhan' => 'required',
            'deskripsikeluhan' => 'required',
        ]);

        $keluhan = new Keluhan;
        $keluhan->jenis_keluhan = $request->get('jeniskeluhan');
        $keluhan->deskripsi = $request->get('deskripsikeluhan');
        $keluhan->tgl_pengajuan = Carbon::parse(now());

        $anggota = Anggota::where('id_users', Auth::user()->id)
            ->first();

        $keluhan->anggota()->associate($anggota);
        $keluhan->save();

        return redirect('/ajukankeluhan')
            ->with(array('keluhansuccess' => "Keluhan telah diajukan", 'error_code' => 6));
    }

    public function update(Request $request, $id)
    {
        $keluhan = Keluhan::with('anggota')->find($id);
        $keluhan->status = 'Selesai';
        $keluhan->tgl_selesai = Carbon::parse(now());
        $keluhan->save();

        return redirect('/ajukankeluhan')
            ->with(array('keluhansuccess' => "Terima kasih, Keluhan telah diselesaikan", 'error_code' => 7));
    }
}
