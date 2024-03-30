<?php

namespace App\Http\Livewire\User;

use App\Models\Kategori;
use App\Models\Pelanggan;
use App\Models\Pesanan;
use App\Models\Rumahsakit;
use App\Models\Supir;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Pesan extends Component
{
    use RegistersUsers;

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $name;
    public $email;
    public $password;
    public $role;
    public $pelanggan_id;
    public $rumahsakit_id;
    public $supir_id;
    public $kategori_id;
    public $nama_pasien;
    public $alamat_jemput;
    public $longitude;
    public $latitude;
    public $no_telp;
    public $keterangan_pasien;
    public $status;
    public $currentStep = 1;

    // TAMBAH
    public $belumLogin = false;
    public $longLat = false;


    public function render()
    {
        $totalSteps = 2;
        $stepLabels = [
            '1' => 'Informasi Akun',
            '2' => 'Informasi Pasien',
        ];

        $currentStep = $this->currentStep;

        return view('livewire.user.pesan', [
            'totalSteps' => $totalSteps,
            'stepLabels' => $stepLabels,
            'currentStep' => $currentStep,
            'rumahsakits' => Rumahsakit::all(),
            'supirs' => Supir::all(),
            'kategoris' => Kategori::all(),
        ])->layout('layouts.user');
    }

    public function validateStep()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'no_telp' => 'required',
            'rumahsakit_id' => 'required',
            'kategori_id' => 'required',
            'nama_pasien' => 'required',
            'alamat_jemput' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
            'keterangan_pasien' => 'required',
        ], [
            'name.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email tidak valid',
            'password.required' => 'Password harus diisi',
            'no_telp.required' => 'No. Telp harus diisi',
            'rumahsakit_id.required' => 'Rumah sakit harus diisi',
            'kategori_id.required' => 'Kategori harus diisi',
            'nama_pasien.required' => 'Nama Pasien harus diisi',
            'alamat_jemput.required' => 'Alamat Jemput harus diisi',
            'longitude.required' => 'Longitude Jemput harus diisi',
            'latitude.required' => 'Latitude Jemput harus diisi',
            'keterangan_pasien.required' => 'Keterangan harus diisi',

        ]);
    }

    public function nextStep()
    {
        $this->validateStep();

        $this->currentStep++;
    }

    public function previousStep()
    {
        $this->currentStep--;
    }

    public function submit()
    {
        // validate step 2
        $this->validateStep();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Bcrypt($this->password),
            'role' => 'user',
        ]);

        $pelanggan = Pelanggan::create([
            'user_id' => $user->id,
            'nama' => $this->name,
            'email' => $this->email,
            'no_telp' => $this->no_telp,
        ]);

        // cek supir_id yang paling sedikit di tabel pesanan
        $supirId = Pesanan::select('supir_id')
                ->groupBy('supir_id')
                ->orderByRaw('COUNT(*)')
                ->value('supir_id');

        $pesanan = Pesanan::create([
            'pelanggan_id' => $pelanggan->id,
            'rumahsakit_id' => $this->rumahsakit_id,
            'supir_id' => $supirId,
            'kategori_id' => $this->kategori_id,
            'nama_pasien' => $this->nama_pasien,
            'alamat_jemput' => $this->alamat_jemput,
            'longitude_jemput' => $this->longitude,
            'latitude_jemput' => $this->latitude,
            'no_telp' => $this->no_telp,
            'keterangan_pasien' => $this->keterangan_pasien,
            'status' => 'menunggu',
        ]);

        // Lakukan autentikasi pengguna setelah berhasil register
        Auth::login($user);

        // Redirect ke halaman setelah login
        return redirect()->to('/riwayat')->with('message', 'Pesanan ambulan anda sedang diproses.');

    }

    public function register()
    {
        $this->belumLogin = true;
    }

    public function getlokasi($latitude, $longitude)
    {

        $this->emit('get-location', $latitude, $longitude);

        $this->longitude = $longitude;
        $this->latitude = $latitude;

        $this->submit();
    }
}
