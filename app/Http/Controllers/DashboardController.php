<?php

namespace App\Http\Controllers;

use App\Models\AnggaranListrik;
use App\Models\Anggota;
use App\Models\BukuAir;
use App\Models\Instalasi;
use App\Models\Pengumuman;
use App\Models\Pengurus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;

class DashboardController extends Controller
{
    public function index()
    {
        $maxyear = BukuAir::select(DB::raw('max(tahun) as tahun'))->first();
        $maxmonth = BukuAir::select('tahun', DB::raw('max(bulan) as bulan'))
            ->groupBy('tahun')
            ->where('tahun', $maxyear->tahun)
            ->get();

        $bulan = $maxmonth->get(0)->bulan;
        $tahun = $maxmonth->get(0)->tahun;

        $kubikprev = BukuAir::select("bulan", "tahun", DB::raw("sum(kubik) as kubik"))
            ->groupBy(DB::raw("bulan"), DB::raw('tahun'))
            ->where('bulan', $bulan - 1)
            ->where('tahun', $tahun)
            ->get();

        $kubiknow = BukuAir::select("bulan", "tahun", DB::raw("sum(kubik) as kubik"))
            ->groupBy(DB::raw("bulan"), DB::raw('tahun'))
            ->where('bulan', $bulan)
            ->where('tahun', $tahun)
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
            if ($instalasi->status != 'Selesai') {
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
                'foto' => 'image|nullable',
            ]);

            // get data pengurus
            $profile = Pengurus::where('id_users', $user->id)->first();

            // validation if user change credentials
            if (isset($request->checkChangeCredentials)) {
                $request->validate([
                    'username' => ['required', 'string', 'max:255', 'unique:users'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    'current_password' => ['required', 'confirmed', Rules\Password::defaults()],
                    'newpassword' => ['required', 'confirmed', Rules\Password::defaults()],
                ]);
            }

            // update data
            $profile->nama = $request->get('nama');
            $profile->alamat = $request->get('alamat');
            $profile->nowa = $request->get('nowa');

            if ($request->hasFile('foto')) {
                // ada file yang diupload
                if ($profile->foto && $profile->foto != 'img/profile/default.png' && file_exists(storage_path('app/public/' . $profile->foto))) {
                    Storage::delete('public/' . $profile->foto);
                }
                $filenameWithExt = $request->file('foto')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('foto')->getClientOriginalExtension();
                $filenameSimpan = $filename . '_' . time() . '.' . $extension;
                $path = $request->file('foto')->storeAs('public/img/profile/pengurus', $filenameSimpan);
                $savepath = 'img/profile/pengurus/' . $filenameSimpan;
            } else {
                // tidak ada file yang diupload
                $savepath = $profile->foto;
            }
            $profile->foto = $savepath;

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
