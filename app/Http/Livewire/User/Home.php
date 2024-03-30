<?php

namespace App\Http\Livewire\User;

use App\Models\Supir;
use Livewire\Component;

class Home extends Component
{
    public $jumlahSupir, $jumlahPelanggan,$jumlahRumahSakit,$jumlahPesanan;

    public function render()
    {
        $this->jumlahSupir = Supir::count();
        $this->jumlahPelanggan = \App\Models\Pelanggan::count();
        $this->jumlahRumahSakit = \App\Models\Rumahsakit::count();
        $this->jumlahPesanan = \App\Models\Pesanan::count();

        return view('livewire.user.home',[
            'jumlahSupir' => $this->jumlahSupir,
            'jumlahPelanggan' => $this->jumlahPelanggan,
            'jumlahRumahSakit' => $this->jumlahRumahSakit,
            'jumlahPesanan' => $this->jumlahPesanan
        ])->layout('layouts.user');
    }
}
