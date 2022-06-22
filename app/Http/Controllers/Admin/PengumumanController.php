<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
        $paginate = Pengumuman::orderBy('id', 'asc')->paginate(7);
        return view('admin.pengumuman', ['pengumuman' => $pengumuman, 'paginate' => $paginate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pengumuman = Pengumuman::all(); // mendapatkan data dari tabel kelas
        return view('admin.pengumuman', ['pengumuman' => $pengumuman]);
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
            'judul' => 'required',
            'isi' => 'required',
        ]);

        $pengumuman = new Pengumuman;
        $pengumuman->judul = $request->get('judul');
        $pengumuman->isi = $request->get('isi');
        $pengumuman->file = $request->get('file');

        $pengumuman->save();

        return redirect()->route('pengumuman.index')
            ->with('success', 'Pengumuman Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengumuman = Pengumuman::where('id', $id)->first();
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
        $pengumuman = DB::table('pengumuman')->where('id', $id)->first();
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


        $validator1 = Validator::make($request->all(), [
            'judul' => 'required',
            'isi' => 'required',
        ]);
        $pengumuman = Pengumuman::find($id);
        $pengumuman->judul = $request->get('judul');
        $pengumuman->isi = $request->get('isi');
        $pengumuman->file = $request->get('file');
        $pengumuman->save();
        return redirect()->route('pengumuman.index')
            ->with('success', 'Pengumuman Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengumuman = Pengumuman::find($id);
        $pengumuman->delete();
        return redirect()->route('pengumuman.index')
            ->with('success', 'Pengumuman Berhasil Dihapus');
    }
}
