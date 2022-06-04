<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\BukuAir;
use App\Models\Instalasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

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

    public function uploadfoto(Request $request, $id)
    {
        $request->validate([
            'inputfotometeran' . $id => 'required|image'
        ]);

        $bukuair = BukuAir::with('anggota')->find($id);
        $anggota = Anggota::find($bukuair->id_anggota);

        if ($bukuair->foto &&  !(is_null($bukuair->foto)) && file_exists(storage_path('app/public/' . $bukuair->foto))) {
            Storage::delete('public/' . $bukuair->foto);
        }
        $extension = $request->file('inputfotometeran' . $id)->getClientOriginalExtension();
        $filenameSimpan = $bukuair->tahun . '_' . $bukuair->bulan . '_' . $anggota->nama . '_' . time() . '.' . $extension;
        $path = $request->file('inputfotometeran' . $id)->storeAs('public/img/bukuair', $filenameSimpan);
        $savepath = 'img/bukuair/' . $filenameSimpan;

        $bukuair->foto = $savepath;
        $bukuair->status = 'Uploaded';
        $bukuair->save();

        return Redirect::back()
            ->with('bukuairsuccess', 'Foto Meteran Air Berhasil Diupload');
    }
}
