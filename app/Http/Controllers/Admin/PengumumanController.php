<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengumuman = Pengumuman::all();
        $paginate = Pengumuman::orderBy('id','asc')->paginate(7);
        return view('admin.pengumuman',['pengumuman'=>$pengumuman,'paginate'=>$paginate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pengumuman');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->file('file')) {
            $file = $request->file('file')->store('file', 'public');
        }
        $request->validate([
            'Judul'=>'required',
            'Isi'=>'required',
        ]);

        Pengumuman::create($request->all());
        return redirect()->route('admin.pengumuman')
          ->with('success','Pengumuman Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengumuman = engumuman::where('id', $id)->first();
        return view('admin.pengumuman', compact('Pengumuman'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengumuman = DB::table('engumuman')->where('id', $id)->first();
        return view('admin.pengumuman', compact('pengumuman'));
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
        $request->validate([
            'Judul'=>'required',
            'Isi'=>'required',
        ]);
        Pengumuan::where('id', $id)
          ->update([
              'judul'=>$request->judul,
              'isi'=>$request->isi,

        ]);
        return redirect()->route('admin.pengumuman')
          ->with('success','Pengumuman Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pengumuman::where('id', $id)->delete();
        return redirect()->route('admin.pengumuman')
        -> with('success', 'Pengumuman Berhasil Dihapus');
    }
}
