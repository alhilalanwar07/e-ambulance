<?php

use App\Http\Controllers\HomeController;
use App\Http\Livewire\Laporan;
use App\Http\Livewire\User\Detail;
use App\Http\Livewire\User\Home;
use App\Http\Livewire\User\Kontak;
use App\Http\Livewire\User\Pesan;
use App\Http\Livewire\User\Riwayat;
use Illuminate\Support\Facades\Route;


//Route Hooks - Do not delete//
Auth::routes();
// middleware admin
Route::middleware('admin')->group(function () {
    Route::view('rumahsakits', 'livewire.rumahsakits.index')->middleware('auth');
    Route::view('kategoris', 'livewire.kategoris.index')->middleware('auth');
    Route::view('supirs', 'livewire.supirs.index')->middleware('auth');
    Route::view('pelanggans', 'livewire.pelanggans.index')->middleware('auth');
    Route::view('users', 'livewire.users.index')->middleware('auth');
});

Route::middleware('supir')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::view('pesanans', 'livewire.pesanans.index');
    Route::get('/laporan', Laporan::class)->name('laporan');
});



// middleware pelanggan
Route::middleware('pelanggan')->group(function () {
    Route::get('/riwayat', Riwayat::class)->name('user.riwayat');
    Route::get('/detail-pesan', Detail::class)->name('user.detail');
});

Route::get('/', Home::class)->name('user.home');
Route::get('/kontak', Kontak::class)->name('user.kontak');
Route::get('/pesan-ambulance', Pesan::class)->name('user.pesan');
Route::get('/pesan-ambulance/{pesanan}', Detail::class)->name('user.detail');
