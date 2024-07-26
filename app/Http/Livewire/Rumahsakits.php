<?php

namespace App\Http\Livewire;

use App\Models\Pesanan;
use App\Models\Regency;
use Livewire\Component;
use App\Models\Province;
use App\Models\Rumahsakit;
use Livewire\WithPagination;

class Rumahsakits extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $selected_id;
    public $keyWord;
    public $nama;
    public $alamat;
    public $no_telp;
    public $longitude;
    public $latitude;
    public $province_id;
    public $regency_id;

    public $provinces;
    public $regencies = [];
    public $selectedProvince;

    public $paginate = 10;

    public function mount()
    {
        $this->provinces = Province::all();
    }

    public function updatedSelectedProvince($id)
    {
        // Ambil kota berdasarkan provinsi yang dipilih
        $this->regencies = Regency::where('province_id', $id)->get()->toArray();
    }
    public function render()
    {
        $keyWord = '%'.$this->keyWord .'%';
        return view('livewire.rumahsakits.view', [
            'rumahsakits' => Rumahsakit::latest()
                        ->orWhere('nama', 'LIKE', $keyWord)
                        ->orWhere('alamat', 'LIKE', $keyWord)
                        ->orWhere('no_telp', 'LIKE', $keyWord)
                        ->paginate($this->paginate),
        ]);
    }

    public function cancel()
    {
        $this->resetInput();
    }

    private function resetInput()
    {
        $this->nama = null;
        $this->alamat = null;
        $this->no_telp = null;
        $this->longitude = null;
        $this->latitude = null;
        $this->selectedProvince = null;
        $this->regency_id = null;
    }

    public function store()
    {
        $this->validate([
        'nama' => 'required',
        'selectedProvince' => 'required',
        'regency_id' => 'required',
        ]);

        Rumahsakit::create([
            'nama' => $this-> nama,
            'alamat' => $this-> alamat,
            'no_telp' => $this-> no_telp,
            'longitude' => $this-> longitude,
            'latitude' => $this-> latitude,
            'province_id' => $this-> selectedProvince,
            'regency_id' => $this-> regency_id
        ]);

        $this->resetInput();
        $this->dispatchBrowserEvent('closeModal');
        session()->flash('message', 'Rumahsakit Successfully created.');
    }

    public function edit($id)
    {
        $record = Rumahsakit::findOrFail($id);
        $this->selected_id = $id;
        $this->nama = $record-> nama;
        $this->alamat = $record-> alamat;
        $this->no_telp = $record-> no_telp;
        $this->longitude = $record-> longitude;
        $this->latitude = $record-> latitude;
        $this->province_id = $record-> province_id;
        $this->regency_id = $record-> regency_id;
    }

    public function update()
    {
        $this->validate([
        'nama' => 'required',
        'province_id' => 'required',
        'regency_id' => 'required',
        ]);

        if ($this->selected_id) {
            $record = Rumahsakit::find($this->selected_id);
            $record->update([
                'nama' => $this-> nama,
                'alamat' => $this-> alamat,
                'no_telp' => $this-> no_telp,
                'longitude' => $this-> longitude,
                'latitude' => $this-> latitude,
                'province_id' => $this-> province_id,
                'regency_id' => $this-> regency_id
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
            session()->flash('message', 'Rumahsakit Successfully updated.');
        }
    }

    public function destroy($id)
    {
        // cek rumahsakit id di tabel pesanan
        $pesanan = Pesanan::where('rumahsakit_id', $id)->first();
        if ($pesanan) {
            session()->flash('message', 'Rumah sakit yang pernah dipesan tidak bisa di hapus, silahkan hapus pesanan.');
            return;
        } else {
            Rumahsakit::where('id', $id)->delete();
        }
    }
}
