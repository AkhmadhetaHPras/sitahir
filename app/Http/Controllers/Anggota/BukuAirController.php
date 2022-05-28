<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\BukuAir;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class BukuAirController extends Controller
{
    public function index()
    {
        $anggota = Anggota::where('id_users', Auth::user()->id)->first();
        // $bukuairfisrt = BukuAir::where('id_anggota', $anggota->id)
        //     ->where('tahun', Carbon::parse(now())->year)
        //     ->where('bulan', '<=', 6)
        //     ->with('anggota')
        //     ->get();

        // $bukuairsecond = BukuAir::where('id_anggota', $anggota->id)
        //     ->where('tahun', Carbon::parse(now())->year)
        //     ->where('bulan', '>', 6)
        //     ->with('anggota')
        //     ->get();

        $bukuairs = BukuAir::where('id_anggota', $anggota->id)
            ->orderBy('id', 'desc')
            ->paginate(12);

        // $bukuair = [$bukuairfisrt, $bukuairsecond];
        return view('anggota.bukuair', compact('bukuairs'));
    }
}
