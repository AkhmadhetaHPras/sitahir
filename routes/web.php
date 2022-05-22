<?php

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
    Route::get('/dashboard/myprofile', [DashboardController::class, 'myprofile'])->name('dashboard.myprofile');
});

// for anggota
Route::group(['middleware' => ['auth', 'role:anggota']], function () {
    Route::get('/bukuair',)->name('bukuair');
    Route::get('/ajukankeluhan',)->name('ajukankeluhan');
    Route::get('/instalasi',)->name('instalasi');
});
require __DIR__ . '/auth.php';
