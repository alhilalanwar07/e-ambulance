<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jumlahSupir = \App\Models\Supir::count();
        $jumlahPelanggan = \App\Models\Pelanggan::count();
        $jumlahRumahSakit = \App\Models\Rumahsakit::count();
        $jumlahPesanan = \App\Models\Pesanan::count();
        return view('home', compact('jumlahSupir', 'jumlahPelanggan', 'jumlahRumahSakit', 'jumlahPesanan'));
    }
}
