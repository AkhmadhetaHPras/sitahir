<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\Instalasi;
use App\Models\Keluhan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anggota = Anggota::all(); 
        $paginate = Anggota::orderBy('id', 'asc')->paginate(7);
        return view('admin.anggota', ['anggota' => $anggota,'paginate'=>$paginate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $anggota = Anggota::all(); // mendapatkan data dari tabel kelas
	    return view('admin.anggota',['id_users' => $anggota]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->file('foto')) {
            $image_name = $request->file('foto')->store('foto', 'public');
        }

            $request->validate([
                'id_users' => 'required',
                'nama' => 'required',
                'alamat' => 'required',
                'nowa' => 'required',
                'tgl_gabung' => 'required',
                'instalasi' => 'required',
               
            ]);
                       
            $anggota = new Anggota;
            $anggota->id_users = $request->get('nama');
            $anggota->nama = $request->get('nama');
            $anggota->alamat = $request->get('deskripsi');
            $anggota->nowa = $request->get('harga');
            $anggota->tgl_gabung = $request->get('stok');
            $anggota->foto = $image_name;
                
            $user = User::find($request->get('id_user'));
            //fungsi eloquent untuk menambah data dengan relasi belongsTo
    
            $anggota->user()->associate($user);
            $anggota->save();
        
                         // Mahasiswa::create($request->all());
        
            //jika data berhasil ditambahkan, akan kembali ke halaman utama
            return redirect()->route('admin.anggota')
                ->with('success', 'Anggota Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $anggota = Anggota::where('id', $id)->first();
        return view('admin.anggota', compact('Aggota'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $anggota = Anggota::find($id);

        return view('admin.anggota', ['Anggota' => $anggota]);
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
        $anggota = Anggota::find($id);

        $anggota->id_user = $request->id_penjual;
        $anggota->nama = $request->nama;
        $anggota->alamat = $request->deskripsi;
        $anggota->nowa = $request->harga;
        $anggota->tgl_gabung = $request->stok;

        if ($anggota->foto && file_exists(storage_path('app/public/' . $anggota->foto))) {
            Storage::delete('public/' . $anggota->foto);
        }
        $image_name = $request->file('foto')->store('foto', 'public');
        $anggota->foto = $image_name;

        $anggota->save();
        return redirect()->route('admin.anggota')
            ->with('success', 'Data Anggota Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Anggota::where('id', $id)->delete();
        return redirect()->route('admin.anggota')
        -> with('success', 'Data Anggota Berhasil Dihapus');
    }
}
