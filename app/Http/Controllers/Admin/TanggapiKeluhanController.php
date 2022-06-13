<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Keluhan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TanggapiKeluhanController extends Controller
{
    public function index()
    {
        $keluhan = Keluhan::all();
        $keluhan = Keluhan::where('id', $keluhan->id)->first();
        if ($keluhan->status != 'Selesai') {
            return abort(403, 'Unauthorized action.');
        }

        $keluhan = Keluhan::all();
        $keluhanproses = Keluhan::where('id', $keluhan->id)
            ->where('status', null)
            ->orWhere('status', 'Dalam Proses')
            ->with('keluhan')
            ->get();

        $keluhanselesai = Keluhan::where('id', $keluhan->id)
            ->where('status', 'Selesai')
            ->with('keluhan')
            ->get();

        return view('admin.tanggapikeluhan', ['proses' => $keluhanproses, 'selesai' => $keluhanselesai]);
    }

    
}
