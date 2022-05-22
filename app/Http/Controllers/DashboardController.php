<?php

namespace App\Http\Controllers;

use App\Models\Pengurus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\ValidationException;

class DashboardController extends Controller
{
    public function index()
    {
        // get data for dashboard

        // which dashboard user will redirect
        if (Auth::user()->hasRole('pengurus')) {
            return view('dashboard');
        } elseif (Auth::user()->hasRole('admin')) {
            return view('dashboard');
        } elseif (Auth::user() - hasRole('anggota')) {
            return view('dashboard');
        }
    }
}
