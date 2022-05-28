<?php

namespace App\Http\Controllers;

use App\Models\AnggaranListrik;
use App\Models\Anggota;
use App\Models\BukuAir;
use App\Models\Instalasi;
use App\Models\Pengumuman;
use App\Models\Pengurus;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $month = Carbon::parse(now())->month;
        $year = Carbon::parse(now())->year;

        $kubikprev = BukuAir::select("bulan", "tahun", DB::raw("sum(kubik) as kubik"))
            ->groupBy(DB::raw("bulan"), DB::raw('tahun'))
            ->where('bulan', $month - 1)
            ->where('tahun', $year)
            ->get();

        $kubiknow = BukuAir::select("bulan", "tahun", DB::raw("sum(kubik) as kubik"))
            ->groupBy(DB::raw("bulan"), DB::raw('tahun'))
            ->where('bulan', $month)
            ->where('tahun', $year)
            ->get();


        $cartdump = BukuAir::select("bulan", "tahun", DB::raw("sum(kubik) as kubik"))
            ->orderBy('tahun', 'desc')
            ->orderBy('bulan', 'desc')
            ->groupBy(DB::raw("bulan"), DB::raw('tahun'))
            ->take(6)
            ->get();

        $cartmonth = array();
        foreach ($cartdump as $c) {
            array_push($cartmonth, substr(date('F', mktime(0, 0, 0, $c->bulan, 10)), 0, 3));
        }

        $cartkubik = array();
        foreach ($cartdump as $c) {
            array_push($cartkubik, $c->kubik);
        }

        $cartmonth = array_reverse($cartmonth);
        $cartkubik = array_reverse($cartkubik);

        $jumlah_anggota = Anggota::select(DB::raw("count(id) as jumlah"))->get();

        $anggaran_listrik = AnggaranListrik::all()->last();

        $pengumuman = Pengumuman::all();

        $data = [$kubiknow, $kubikprev, $cartmonth, $cartkubik, $jumlah_anggota, $anggaran_listrik, $pengumuman];

        if (Auth::user()->hasRole('pengurus')) {
            return view('dashboard', compact('data'));
        } elseif (Auth::user()->hasRole('admin')) {
            return view('dashboard', compact('data'));
        } elseif (Auth::user()->hasRole('anggota')) {
            $userprofile = Anggota::where('id_users', Auth::user()->id)->with('user')->first();
            $instalasi = Instalasi::where('id_anggota', $userprofile->id)->first();
            if ($instalasi->status != 'selesai') {
                return redirect('instalasi');
            }
            return view('dashboard', compact('data'));
        }
    }

    public function myprofile(Request $request, User $user)
    {

        if ($user->hasRole('pengurus')) {
            // validation
            $request->validate([
                'nama' => 'required',
                'alamat' => 'required',
                'nowa' => 'required',
                'foto' => 'required',
            ]);

            // get data pengurus
            $profile = Pengurus::where('id_users', $user->id)->first();

            // validation if user change credentials

            // update data
            $profile->nama = $request->get('nama');
            $profile->alamat = $request->get('alamat');
            $profile->nowa = $request->get('nowa');

            // save
            $profile->save();

            // feedback - sementara menggunakan ini, next menggunakan ajax
            return redirect()->route('dashboard')
                ->with('success', 'Profil Berhasil Diupdate');
        } elseif ($user->hasRole('admin')) {
            // validation
            // validation if user change credentials

            // update data

            // save
        } elseif ($user->hasRole('anggota')) {
            // validation
            // validation if user change credentials

            // update data

            // save
        } else {
            return dd('nol');
        }
    }
}
