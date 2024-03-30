<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Pesanan;

class Pesanans extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $pelanggan_id, $rumahsakit_id, $supir_id, $kategori_id, $nama_pasien, $alamat_jemput, $longitude_jemput, $latitude_jemput, $no_telp;

    public $paginate = 10;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.pesanans.view', [
            'pesanans' => Pesanan::latest()
						->orWhere('pelanggan_id', 'LIKE', $keyWord)
						->orWhere('rumahsakit_id', 'LIKE', $keyWord)
						->orWhere('supir_id', 'LIKE', $keyWord)
						->orWhere('kategori_id', 'LIKE', $keyWord)
						->orWhere('nama_pasien', 'LIKE', $keyWord)
						->orWhere('alamat_jemput', 'LIKE', $keyWord)
						->orWhere('longitude_jemput', 'LIKE', $keyWord)
						->orWhere('latitude_jemput', 'LIKE', $keyWord)
						->orWhere('no_telp', 'LIKE', $keyWord)
						->paginate($this->paginate)
        ]);
    }

    public function cancel()
    {
        $this->resetInput();
    }

    private function resetInput()
    {
		$this->pelanggan_id = null;
		$this->rumahsakit_id = null;
		$this->supir_id = null;
		$this->kategori_id = null;
		$this->nama_pasien = null;
		$this->alamat_jemput = null;
		$this->longitude_jemput = null;
		$this->latitude_jemput = null;
		$this->no_telp = null;
    }

    public function store()
    {
        $this->validate([
		'pelanggan_id' => 'required',
		'rumahsakit_id' => 'required',
		'supir_id' => 'required',
		'kategori_id' => 'required',
		'nama_pasien' => 'required',
        ]);

        Pesanan::create([
			'pelanggan_id' => $this-> pelanggan_id,
			'rumahsakit_id' => $this-> rumahsakit_id,
			'supir_id' => $this-> supir_id,
			'kategori_id' => $this-> kategori_id,
			'nama_pasien' => $this-> nama_pasien,
			'alamat_jemput' => $this-> alamat_jemput,
			'longitude_jemput' => $this-> longitude_jemput,
			'latitude_jemput' => $this-> latitude_jemput,
			'no_telp' => $this-> no_telp
        ]);

        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Pesanan Successfully created.');
    }

    public function edit($id)
    {
        $record = Pesanan::findOrFail($id);
        $this->selected_id = $id;
		$this->pelanggan_id = $record-> pelanggan_id;
		$this->rumahsakit_id = $record-> rumahsakit_id;
		$this->supir_id = $record-> supir_id;
		$this->kategori_id = $record-> kategori_id;
		$this->nama_pasien = $record-> nama_pasien;
		$this->alamat_jemput = $record-> alamat_jemput;
		$this->longitude_jemput = $record-> longitude_jemput;
		$this->latitude_jemput = $record-> latitude_jemput;
		$this->no_telp = $record-> no_telp;
    }

    public function update()
    {
        $this->validate([
		'pelanggan_id' => 'required',
		'rumahsakit_id' => 'required',
		'supir_id' => 'required',
		'kategori_id' => 'required',
		'nama_pasien' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Pesanan::find($this->selected_id);
            $record->update([
			'pelanggan_id' => $this-> pelanggan_id,
			'rumahsakit_id' => $this-> rumahsakit_id,
			'supir_id' => $this-> supir_id,
			'kategori_id' => $this-> kategori_id,
			'nama_pasien' => $this-> nama_pasien,
			'alamat_jemput' => $this-> alamat_jemput,
			'longitude_jemput' => $this-> longitude_jemput,
			'latitude_jemput' => $this-> latitude_jemput,
			'no_telp' => $this-> no_telp
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Pesanan Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Pesanan::where('id', $id)->delete();
        }
    }
}
