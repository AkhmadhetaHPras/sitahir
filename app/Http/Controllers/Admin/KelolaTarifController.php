<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TarifAir;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;

class KelolaTarifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tarif = TarifAir::all();
        $paginate = TarifAir::orderBy('id', 'asc')->paginate(10);
        return view('admin.kelolatarif', ['tarif' => $tarif, 'paginate' => $paginate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('admin.kelolatarif');

        $tarif = TarifAir::all(); // mendapatkan data dari tabel kelas
        return view('admin.kelolatarif', ['tarif' => $tarif]);
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
            'kubik' => 'required',
            'tarif' => 'required',
        ]);

        $tarifair = new TarifAir;
        $tarifair->kubik = $request->get('kubik');
        $tarifair->tarif = $request->get('tarif');

        $tarifair->save();



        return redirect()->route('tarif.index')
            ->with('success', 'Tarif Berhasil Ditambahkan');
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
        $tarifair = DB::table('tarifair')->where('id', $id)->first();
        return view('admin.kelolatarif', compact('kelolatarif'));
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
        // $request->validate([
        //     'Kubik' => 'required',
        //     'Tarif' => 'required',
        // ]);
        // TarifAir::where('id', $id)
        //     ->update([
        //         'kubik' => $request->kubik,
        //         'tarif' => $request->tarif,
        //     ]);
        // return redirect()->route('admin.kelolatarif')
        //     ->with('success', 'Tarif Berhasil Diupdate');

        $validator1 = Validator::make($request->all(), [
            'kubik' => 'required',
            'tarif' => 'required',
        ]);
        $tarif = TarifAir::find($id);
        $tarif->kubik = $request->get('kubik');
        $tarif->tarif = $request->get('tarif');
        $tarif->save();

        return Redirect::back()
            ->with(array('success' => "Tarif berhasil diupdate"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // TarifAir::where('id', $id)->delete();
        // return redirect()->route('admin.kelolatarif')
        //     ->with('success', 'Tarif Berhasil Dihapus');

        $tarif = TarifAir::find($id);

        $tarif->delete();
        return Redirect::back()
            ->with(array('success' => "Data anggota berhasil dihapus"));
    }
}
