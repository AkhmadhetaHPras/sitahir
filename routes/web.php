<?php

use App\Http\Controllers\Admin\AnggaranListrikController;
use App\Http\Controllers\Anggota\AjukanKeluhanController;
use App\Http\Controllers\Anggota\BukuAirController;
use App\Http\Controllers\Admin\BukuController;
use App\Http\Controllers\Admin\PengumumanController;
use App\Http\Controllers\Admin\KelolaTarifController;
use App\Http\Controllers\Admin\TanggapiKeluhanController;
use App\Http\Controllers\Admin\AnggotaController;
use App\Http\Controllers\Admin\TransaksiInstalasiController;
use App\Http\Controllers\Anggota\InstalasiAnggotaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Pengurus\PengurusController;
use Illuminate\Support\Facades\Route;

// first route
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/informasiumum', function () {
    return view('informasiumum', ['title' => 'informasiumum']);
});
Route::get('/panduan', function () {
    return view('panduan', ['title' => 'panduan']);
});
Route::get('/kepengurusan', function () {
    return view('kepengurusan', ['title' => 'kepengurusan']);
});

// ajax
Route::post('/instalasianggota', [TransaksiInstalasiController::class, 'store'])->name('instalasianggota.store');
Route::get('/instalasianggota/{response}', [TransaksiInstalasiController::class, 'redirect']);
Route::put('/bukuair/bayar', [BukuController::class, 'bayar'])->name('bukuair.bayar');
Route::get('/bukuair/bayar/{response}', [BukuController::class, 'redirect']);

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
    Route::put('/instalasi/{instalasi}', [InstalasiAnggotaController::class, 'update'])->name('instalasi.update');
    // BAYAR INSTALASI DARI ANGGOTA
    Route::put('/instalasi/bayar/{id}', [InstalasiAnggotaController::class, 'bayar'])->name('instalasi.bayar');
});

// for ADMIN
Route::group(['middleware' => ['auth', 'role:admin']], function () {
    // kelola anggota
    Route::get('/anggota', [AnggotaController::class, 'index'])->name('anggota.index');
    Route::post('/anggota', [AnggotaController::class, 'store'])->name('anggota.store');
    Route::put('/anggota/{user:id}', [AnggotaController::class, 'update'])->name('anggota.update');
    Route::delete('/anggota/{user:id}', [AnggotaController::class, 'destroy'])->name('anggota.destroy');

    // bukuair
    Route::get('/bukuairanggota', [BukuController::class, 'index'])->name('bukuairanggota.index');
    Route::get('/bukuairanggota/{id}', [BukuController::class, 'show'])->name('bukuairanggota.show');
    Route::post('/bukuairanggota', [BukuController::class, 'store'])->name('bukuairanggota.store');
    Route::put('/bukuairanggota/{bukuair}', [BukuAirController::class, 'uploadfoto'])->name('bukuairanggota.uploadfoto');
    Route::put('/bukuairanggota/anggota/{id}', [BukuController::class, 'updatemeteranair'])->name('bukuairanggota.updatemeteranair');


    // anggaran listrik
    Route::get('/anggaranlistrik', [AnggaranListrikController::class, 'index'])->name('anggaranlistrik');
    Route::post('/anggaranlistrik', [AnggaranListrikController::class, 'store'])->name('anggaranlistrik.store');

    //kelolatarif
    Route::get('/tarif', [KelolaTarifController::class, 'index'])->name('tarif.index');
    Route::post('/tarif', [KelolaTarifController::class, 'store'])->name('tarif.store');
    Route::put('/tarif/{id}', [KelolaTarifController::class, 'update'])->name('tarif.update');
    Route::delete('/tarif/{id}', [KelolaTarifController::class, 'destroy'])->name('tarif.destroy');

    //tanggapikeluhan
    Route::get('/tanggapikeluhan', [TanggapiKeluhanController::class, 'index'])->name('tanggapikeluhan');
    Route::put('/tanggapikeluhan/{id}', [TanggapiKeluhanController::class, 'jadwalkan'])->name('tanggapikeluhan.jadwalkan');

    //pengumuman
    Route::get('/pengumuman', [PengumumanController::class, 'index'])->name('pengumuman.index');
    Route::post('/pengumuman', [PengumumanController::class, 'store'])->name('pengumuman.store');
    Route::put('/pengumuman/{id}', [PengumumanController::class, 'update'])->name('pengumuman.update');
    Route::delete('/pengumuman/{id}', [PengumumanController::class, 'destroy'])->name('pengumuman.destroy');

    // transaksi instalasi
    Route::get('/instalasianggota', [TransaksiInstalasiController::class, 'index'])->name('instalasianggota');
    Route::delete('/instalasianggota/{id}', [TransaksiInstalasiController::class, 'batalkan'])->name('instalasianggota.batalkan');
    Route::put('/instalasianggota/jadwal/{id}', [TransaksiInstalasiController::class, 'jadwal'])->name('instalasianggota.jadwal');
    // BAYAR INSTALASI DARI ADMIN
    Route::put('/instalasianggota/{id}', [TransaksiInstalasiController::class, 'bayar'])->name('instalasianggota.bayar');
});

// for PENGURUS
Route::group(['middleware' => ['auth', 'role:pengurus|admin']], function () {
    Route::get('/anggota', [AnggotaController::class, 'index'])->name('anggota.index');
    Route::get('/bukuairanggota', [BukuController::class, 'index'])->name('bukuairanggota.index');
    Route::get('/bukuairanggota/{id}', [BukuController::class, 'show'])->name('bukuairanggota.show');
    Route::get('/anggaranlistrik', [AnggaranListrikController::class, 'index'])->name('anggaranlistrik');
    Route::get('/tarif', [KelolaTarifController::class, 'index'])->name('tarif.index');
    Route::get('/tanggapikeluhan', [TanggapiKeluhanController::class, 'index'])->name('tanggapikeluhan');
    Route::get('/pengumuman', [PengumumanController::class, 'index'])->name('pengumuman.index');
    Route::get('/instalasianggota', [TransaksiInstalasiController::class, 'index'])->name('instalasianggota');
    Route::resource('/pengurus', PengurusController::class);
});

require __DIR__ . '/auth.php';
