<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BukuAir;
use App\Models\Anggota;
use App\Models\TarifAir;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku = Anggota::with('buku_air')->get();

        $bulanbukulast = BukuAir::orderBy('id', 'desc')->first();
        $bulannow = Carbon::now()->month;

        if ($bulanbukulast->bulan == $bulannow) {
            $baru = 'false';
        } else {
            $baru = 'true';
        }

        // return dd($buku->get(4)->buku_air->last()->meteran_air);
        return view('admin.bukuairanggota', ['bukuairanggota' => $buku, 'baru' => $baru]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $anggota = Anggota::all();
        $bulannow = Carbon::now()->month;
        $tahunnow = Carbon::now()->year;
        foreach ($anggota as $a) {
            $bukuair = new BukuAir();
            $bukuair->tahun = $tahunnow;
            $bukuair->bulan = $bulannow;
            $bukuair->anggota()->associate($a);
            $bukuair->save();
        }

        return Redirect::back()
            ->with(array('success' => "Data buku air baru berhasil dibuat."));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bukuair = BukuAir::where('id_anggota', $id)
            ->orderBy('id', 'desc')
            ->paginate(12);
        $anggota = Anggota::find($id);

        return view('admin.bukuairanggotadetail', compact('bukuair', 'anggota'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function updatemeteranair(Request $request, $id)
    {
        $bukuair = BukuAir::find($id);
        $kubikprev = BukuAir::where('id_anggota', $bukuair->id_anggota)
            ->where('id', '<', $bukuair->id)
            ->orderBy('id', 'desc')
            ->first();
        if ($kubikprev === null) {
            $meteran_airprev = 0;
        } else {
            $meteran_airprev = (int)$kubikprev->meteran_air;
        }

        $bukuair->meteran_air = $request->get('angkameteran');
        $bukuair->kubik = (int)$request->get('angkameteran') - $meteran_airprev;

        $tarif = TarifAir::where('kubik', $bukuair->kubik)->first();

        $bukuair->tarif = $tarif->tarif;
        $bukuair->status = 'Tagihan';
        $bukuair->save();

        return Redirect::back()
            ->with(array('bukuairsuccess' => "Data meteran air berhasil disimpan."));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
