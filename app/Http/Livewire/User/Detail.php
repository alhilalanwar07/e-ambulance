<?php

namespace App\Http\Livewire\User;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Pesanan;

class Detail extends Component
{
    public $user;
    public Pesanan $pesanan;

    public $pelanggan_id;
    public $rumahsakit_id;
    public $supir_id;
    public $kategori_id;
    public $nama_pasien;
    public $alamat_jemput;
    public $longitude_jemput;
    public $latitude_jemput;
    public $no_telp;
    public $status;
    public $keterangan_pasien;

    public $nama_rumahsakit;
    public $nama_supir;
    public $nama_kategori;

    public $keterangan;

    public $user_id;
    public function mount(Pesanan $pesanan)
    {
        $this->pesanan = $pesanan;
        $this->nama_pasien = $pesanan->nama_pasien;
        $this->alamat_jemput = $pesanan->alamat_jemput;
        $this->longitude_jemput = $pesanan->longitude_jemput;
        $this->latitude_jemput = $pesanan->latitude_jemput;
        $this->no_telp = $pesanan->no_telp;
        $this->status = $pesanan->status;
        $this->nama_rumahsakit = $pesanan->rumahsakit->nama;
        $this->nama_supir = $pesanan->supir->nama;
        $this->nama_kategori = $pesanan->kategori->nama;
        $this->keterangan = $pesanan->kategori->keterangan;
        $this->keterangan_pasien = $pesanan->keterangan_pasien;
    }
    public function render()
    {
        return view('livewire.user.detail')->layout('layouts.user');
    }

    public function back(){
        return redirect()->route('user.riwayat');
    }
}
