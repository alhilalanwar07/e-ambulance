<?php

namespace App\Http\Livewire;

use App\Models\Pesanan;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;

class Laporan extends Component
{
    public $tanggal_awal;
    public $tanggal_akhir;
    public function render()
    {
        return view('livewire.laporan')->extends('layouts.app')->section('content');
    }

    public function cetak()
    {
        // timezone
        date_default_timezone_set('Asia/Jakarta');

        
        $this->validate([
            'tanggal_awal' => 'required',
            'tanggal_akhir' => 'required',
        ], [
            'tanggal_awal.required' => 'Wajib diisi',
            'tanggal_akhir.required' => 'Wajib diisi',
        ]);

        $pesanans = Pesanan::whereBetween('created_at', [$this->tanggal_awal, $this->tanggal_akhir])->get();

        $startDate = $this->tanggal_awal;
        $endDate = $this->tanggal_akhir;
        // jika tidak ada data yang dicetak maka tampilkan pesan
        if ($pesanans->isEmpty()) {
            session()->flash('error', 'Tidak ada data ditemukan.');
            return redirect()->back();
        }

        // cetak
        $pdf = Pdf::loadView('livewire.pdf-laporan', compact('pesanans', 'startDate', 'endDate'))->setPaper('a4', 'potrait')->output();
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf;
        }, date('Y-m-d_H:i:s') . '_laporan_ambulance' . '.pdf');
    }
}
