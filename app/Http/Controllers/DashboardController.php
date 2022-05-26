<?php

namespace App\Http\Controllers;

use App\Models\Pengurus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\ValidationException;

class DashboardController extends Controller
{
    public function index()
    {
        // what data
        if (Auth::user()->hasRole('pengurus')) {
            return view('dashboard');
        } elseif (Auth::user()->hasRole('admin')) {
            return view('dashboard');
        } elseif (Auth::user()->hasRole('anggota')) {
            return view('dashboard');
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
