<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Pesanan;
use Illuminate\Support\Facades\Auth;
use App\Models\Pelanggan;

class Riwayat extends Component
{
    public $pesanans;

    public function render()
    {
        $pelanggan = Pelanggan::where('user_id', Auth::user()->id)->first();
        $this->pesanans = Pesanan::where('pelanggan_id', $pelanggan->id)->get();
        return view('livewire.user.riwayat', [
            'pesanans' => $this->pesanans,
        ])->layout('layouts.user');
    }
}
