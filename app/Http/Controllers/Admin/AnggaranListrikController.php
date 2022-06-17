<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\AnggaranListrik;
use App\Models\Instalasi;
use App\Models\Keluhan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnggaranListrikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = AnggaranListrik::orderBy('tahun', 'desc')
            ->orderBy('bulan', 'desc')
            ->paginate(12);

        $bulan = Carbon::now()->month;
        $tahun = Carbon::now()->year;

        $datatambah = AnggaranListrik::orderBy('tahun', 'desc')
            ->orderBy('bulan', 'desc')
            ->first();
        if ($datatambah->bulan == $bulan and $datatambah->tahun == $tahun) {
            $tambah = 'false';
        } else {
            $tambah = 'true';
        }

        return view('admin.anggaranlistrik', compact('data', 'tambah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = AnggaranListrik::all(); // mendapatkan data dari tabel kelas
        return view('admin.anggaranlistrik', ['anggaranlistrik' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'bulan'=>'required',
            'tahun'=>'required',
            'anggaran'=>'required',
            'tgl_bayar'=>'required',
        ]);

        $data = new AnggaranListrik;
        $data->bulan = $request->get('bulan');
        $data->tahun = $request->get('tahun');
        $data->anggaran = $request->get('anggaran');
        $data->tgl_bayar = $request->get('tgl_bayar');

        $data->save();

        return redirect()->route('anggaranlistrik')
          ->with('success','Anggaran Listrik Berhasil Ditambahkan'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
