<?php

namespace App\View\Components;

use App\Models\Admin;
use App\Models\Anggota;
use App\Models\Instalasi;
use App\Models\Pengurus;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $instalasi = '';
        if (Auth::user()->hasRole('pengurus')) {
            $userprofile = Pengurus::where('id_users', Auth::user()->id)->first();
        } elseif (Auth::user()->hasRole('admin')) {
            $userprofile = Admin::where('id_users', Auth::user()->id)->first();
        } elseif (Auth::user()->hasRole('anggota')) {
            $userprofile = Anggota::where('id_users', Auth::user()->id)->first();
            $instalasi = Instalasi::where('id_anggota', $userprofile->id)->first();
        }
        return view('layouts.app', ['profile' => $userprofile, 'instalasi' => $instalasi]);
    }
}
