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
                        ->join('pelanggans', 'pelanggans.id', '=', 'pesanans.pelanggan_id')
                        ->join('rumahsakits', 'rumahsakits.id', '=', 'pesanans.rumahsakit_id')
                        ->join('supirs', 'supirs.id', '=', 'pesanans.supir_id')
                        ->join('kategoris', 'kategoris.id', '=', 'pesanans.kategori_id')
                        ->where(function ($query) use ($keyWord) {
                            $query->where('pelanggans.nama', 'like', $keyWord)
                                ->orWhere('rumahsakits.nama', 'like', $keyWord)
                                ->orWhere('supirs.nama', 'like', $keyWord)
                                ->orWhere('kategoris.nama', 'like', $keyWord);
                        })
                        ->select('pesanans.*', 'pelanggans.nama as pelanggans', 'rumahsakits.nama as rumahsakits', 'supirs.nama as supirs', 'kategoris.nama as kategoris', 'kategoris.warna as warna')
                        ->orderBy('pesanans.id', 'desc')
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

    // konfirmasi
    public function konfirmasi($id)
    {
        // update status
        Pesanan::where('id', $id)->update([
            'status' => 'dikonfirmasi'
        ]);

        session()->flash('message', 'Pesanan Successfully updated.');
    }

    // batalkan
    public function batalkan($id)
    {
        // udoate status
        Pesanan::where('id', $id)->update([
            'status' => 'dibatalkan'
        ]);

        session()->flash('message', 'Pesanan Successfully updated.');

    }

    // diproses
    public function proses($id)
    {

        // selesai
        // update status
        Pesanan::where('id', $id)->update([
            'status' => 'diproses'
        ]);

        session()->flash('message', 'Pesanan Successfully updated.');
    }

    // selesai
    public function selesai($id)
    {

        // update status
        Pesanan::where('id', $id)->update([
            'status' => 'selesai'
        ]);

        session()->flash('message', 'Pesanan Successfully updated.');
    }
}
