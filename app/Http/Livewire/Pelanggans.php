<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Pesanan;
use Livewire\Component;
use App\Models\Pelanggan;
use Livewire\WithPagination;

class Pelanggans extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nama, $email, $no_telp, $user_id, $password;

    public $paginate = 10;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.pelanggans.view', [
            'pelanggans' => Pelanggan::latest()
						->orWhere('nama', 'LIKE', $keyWord)
						->orWhere('email', 'LIKE', $keyWord)
						->orWhere('no_telp', 'LIKE', $keyWord)
						->orWhere('user_id', 'LIKE', $keyWord)
						->paginate($this->paginate)
        ]);
    }

    public function cancel()
    {
        $this->resetInput();
    }

    private function resetInput()
    {
		$this->nama = null;
		$this->email = null;
		$this->no_telp = null;
		$this->password = null;
    }

    public function store()
    {
        $this->validate([
            'nama' => 'required',
            'email' => 'required',
            'no_telp' => 'required',
            'password' => 'required',
        ]);

        // create user
        $user = User::create([
            'name' => $this->nama,
            'email' => $this->email,
            'password' => Bcrypt($this->password),
        ]);

        Pelanggan::create([
			'nama' => $this-> nama,
			'email' => $this-> email,
			'no_telp' => $this-> no_telp,
			'user_id' => $user->id
        ]);

        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Pelanggan Successfully created.');
    }

    public function edit($id)
    {
        $record = Pelanggan::findOrFail($id);
        $this->selected_id = $id;
		$this->nama = $record-> nama;
		$this->email = $record-> email;
		$this->no_telp = $record-> no_telp;
    }

    public function update()
    {
        $this->validate([
            'nama' => 'required',
            'email' => 'required',
            'no_telp' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Pelanggan::find($this->selected_id);
            $record->update([
                'nama' => $this-> nama,
                'email' => $this-> email,
                'no_telp' => $this-> no_telp,
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Pelanggan Successfully updated.');
        }
    }

    public function destroy($id)
    {
        // cek rumahsakit id di tabel pesanan
        $pesanan = Pesanan::where('pelanggan_id', $id)->first();
        if ($pesanan) {
            session()->flash('message', 'Pelanggan yang pernah dipesan tidak bisa di hapus, silahkan hapus pesanan.');
            return;
        } else {
            Pelanggan::where('id', $id)->delete();
        }
    }
}
