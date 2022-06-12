<?php

use App\Http\Controllers\Anggota\AjukanKeluhanController;
use App\Http\Controllers\Anggota\BukuAirController;
use App\Http\Controllers\Admin\BukuController;
use App\Http\Controllers\Admin\PengumumanController;
use App\Http\Controllers\Admin\KelolaTarifController;
use App\Http\Controllers\Admin\TanggapiKeluhanController;
use App\Http\Controllers\Admin\AnggotaController;
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
    // buku air
    Route::get('/bukuair', [BukuAirController::class, 'index'])->name('bukuair');
    Route::put('/bukuair/{bukuair}', [BukuAirController::class, 'uploadfoto'])->name('bukuair.uploadfoto');

    // keluhan
    Route::get('/ajukankeluhan', [AjukanKeluhanController::class, 'index'])->name('ajukankeluhan');
    Route::post('/ajukankeluhan', [AjukanKeluhanController::class, 'store'])->name('ajukankeluhan.store');
    Route::put('/ajukankeluhan/{keluhan}', [AjukanKeluhanController::class, 'update'])->name('ajukankeluhan.update');

    // instalasi
    Route::get('/instalasi', [InstalasiAnggotaController::class, 'index'])->name('instalasi');
});

// for ADMIN and Pengurus
Route::group(['middleware' => ['auth', 'role:admin|pengurus']], function () {
    Route::get('/anggota', [AnggotaController::class, 'index'])->name('anggota.index');
    Route::get('/bukuairanggota', [BukuController::class, 'index'])->name('bukuairanggota.index');
    Route::get('/anggaranlistrik', function () {
        return view('dashboard');
    })->name('anggaranlistrik');
    Route::get('/tanggapikeluhan',[TanggapiKeluhanController::class, 'index'])->name('tanggapikeluhan');
    Route::get('/pengumuman', [PengumumanController::class, 'index'])->name('pengumuman.index');
    Route::get('/instalasianggota', function () {
        return view('admin.transaksiinstalasi');
    })->name('instalasianggota');
    Route::get('/tarif', [KelolaTarifController::class, 'index'])->name('tarif.index');

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
