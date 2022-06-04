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
    Route::put('/dashboard/myprofile/{user:username}', [DashboardController::class, 'myprofile'])->name('dashboard.myprofile');
});

// for anggota
Route::group(['middleware' => ['auth', 'role:anggota']], function () {
    Route::get('/bukuair', [BukuAirController::class, 'index'])->name('bukuair');
    Route::get('/ajukankeluhan', [AjukanKeluhanController::class, 'index'])->name('ajukankeluhan');
    Route::get('/instalasi', [InstalasiAnggotaController::class, 'index'])->name('instalasi');
});

// for ADMIN and Pengurus
Route::group(['middleware' => ['auth', 'role:admin|pengurus']], function () {
    Route::get('/anggota', function () {
        return view('admin.anggota');
    })->name('anggota');
    Route::get('/bukuairanggota', function () {
        return view('admin.bukuairanggota');
    })->name('bukuairanggota');
    Route::get('/anggaranlistrik', function () {
        return view('dashboard');
    })->name('anggaranlistrik');
    Route::get('/tanggapikeluhan', function () {
        return view('admin.tanggapikeluhan');
    })->name('tanggapikeluhan');
    Route::get('/pengumuman', function () {
        return view('admin.pengumuman');
    })->name('pengumuman');
    Route::get('/instalasianggota', function () {
        return view('admin.transaksiinstalasi');
    })->name('instalasianggota');
    Route::get('/tarif', function () {
        return view('admin.kelolatarif');
    })->name('tarif');

    // buku air anggota detail belum fix, cuma routenya aja
    Route::get('/bukuairanggota/detail', function () {
        return view('admin.bukuairanggotadetail');
    })->name('bukuairanggotadetail');
});

// for PENGURUS
Route::group(['middleware' => ['auth', 'role:pengurus']], function () {
    Route::get('/pengurus', function () {
        return view('dashboard');
    })->name('pengurus');
});

require __DIR__ . '/auth.php';
