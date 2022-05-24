<?php

use App\Http\Controllers\Anggota\AjukanKeluhanController;
use App\Http\Controllers\Anggota\BukuAirController;
use App\Http\Controllers\Anggota\InstalasiAnggotaController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// first route
Route::get('/', function () {
    return view('auth.login');
});

// for all roles
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/dashboard/myprofile', [DashboardController::class, 'myprofile'])->name('dashboard.myprofile');
});

// for anggota
Route::group(['middleware' => ['auth', 'role:anggota']], function () {
    Route::get('/bukuair', [BukuAirController::class, 'index'])->name('bukuair');
    Route::get('/ajukankeluhan', [AjukanKeluhanController::class, 'index'])->name('ajukankeluhan');
    Route::get('/instalasi', [InstalasiAnggotaController::class, 'index'])->name('instalasi');
});

// for ADMIN
Route::group(['middleware' => ['auth', 'role:admin|pengurus']], function () {
    Route::get('/anggota', function () {
        return view('dashboard');
    })->name('anggota');
    Route::get('/bukuairanggota', function () {
        return view('dashboard');
    })->name('bukuairanggota');
    Route::get('/anggaranlistrik', function () {
        return view('dashboard');
    })->name('anggaranlistrik');
    Route::get('/tanggapikeluhan', function () {
        return view('dashboard');
    })->name('tanggapikeluhan');
    Route::get('/pengumuman', function () {
        return view('dashboard');
    })->name('pengumuman');
    Route::get('/instalasianggota', function () {
        return view('dashboard');
    })->name('instalasianggota');
    Route::get('/tarif', function () {
        return view('dashboard');
    })->name('tarif');
});


Route::group(['middleware' => ['auth', 'role:pengurus']], function () {
    Route::get('/pengurus', function () {
        return view('dashboard');
    })->name('pengurus');
});

require __DIR__ . '/auth.php';
