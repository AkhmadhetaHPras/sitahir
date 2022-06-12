<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TarifAir;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $paginate = TarifAir::orderBy('id','asc')->paginate(7);
        return view('admin.kelolatarif',['tarif'=>$tarif,'paginate'=>$paginate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kelolatarif');
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
            'Kubik'=>'required',
            'Tarif'=>'required',
        ]);

        TarifAir::create($request->all());
        return redirect()->route('admin.kelolatarif')
          ->with('success','Tarif Berhasil Ditambahkan');
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
        $request->validate([
            'Kubik'=>'required',
            'Tarif'=>'required',
        ]);
        TarifAir::where('id', $id)
          ->update([
              'kubik'=>$request->kubik,
              'tarif'=>$request->tarif,
        ]);
        return redirect()->route('admin.kelolatarif')
          ->with('success','Tarif Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TarifAir::where('id', $id)->delete();
        return redirect()->route('admin.kelolatarif')
        -> with('success', 'Tarif Berhasil Dihapus');
    }
}
