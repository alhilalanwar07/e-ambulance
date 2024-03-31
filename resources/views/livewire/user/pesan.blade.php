<div>
    @section('title', __('Pesan Ambulance'))
    <section class="bg-light py-3 py-md-5">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
                    <h2 class="mb-4 display-5 text-center">
                        Pesan Ambulance
                    </h2>
                    <p class="text-secondary mb-5 text-center">
                        Halaman untuk memesan e-ambulance - SIP Puskesmas Tanggetada.
                    </p>

                    <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle">
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row justify-content-lg-center">
                <div class="col-12 col-lg-12">
                    @if($belumLogin == false)
                    <div class="bg-white border rounded shadow-sm overflow-hidden mb-2">
                        @guest
                        <div class="text-center p-5 m-2 d-flex justify-content-center ">
                            <div class="card m-2 bg-warning" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">Sudah Memiliki Akun?</h5> <br>
                                    <a href="/login" class="btn btn-primary">Login</a>
                                </div>
                            </div>

                            <div class="card m-2 bg-danger" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">Belum Memiliki Akun?</h5> <br>
                                    <a href="#" wire:click.prevent="register" class="btn btn-success">Register</a>
                                </div>
                            </div>
                        </div>
                        @endguest
                    </div>
                    @else
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="row">
                                <form wire:submit.prevent="submit">
                                    @csrf
                                    @guest
                                    <div class="row">
                                        <div class="col-6 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <div class="form-group mb-2">
                                                <label for="nama">Nama</label>
                                                <input wire:model="name" type="text" class="form-control" id="nama" placeholder="Masukkan Nama Anda">
                                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="no_telp">No Telp</label>
                                                <input wire:model="no_telp" type="text" class="form-control" id="no_telp" placeholder="Masukkan nomor telepon">
                                                @error('no_telp') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <div class="form-group mb-2">
                                                <label for="email">Email</label>
                                                <input wire:model="email" type="email" class="form-control" id="email" placeholder="Masukkan Email">
                                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input wire:model="password" type="password" class="form-control" id="password" placeholder="Masukkan Password">
                                                @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    @endguest
                                    <div class="row" wire:ignore.self>
                                        <div class="col-6 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <div class="form-group mb-2">
                                                <label for="nama_pasien">Nama Pasien</label>
                                                <input wire:model="nama_pasien" type="text" class="form-control" id="nama_pasien" placeholder="Masukkan Nama Pasien">
                                                @error('nama_pasien') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="keterangan_pasien">Deskripsi Pasien</label>
                                                <textarea wire:model="keterangan_pasien" class="form-control" id="keterangan_pasien" rows="3" placeholder="Masukkan Deskripsi Pasien"></textarea>
                                                @error('keterangan_pasien') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="kategori_id">Kategori</label>
                                                <select wire:model="kategori_id" class="form-control" id="kategori_id">
                                                    <option value="">Pilih Kategori</option>
                                                    @foreach($kategoris as $k)
                                                    <option value="{{ $k->id }}">{{ $k->nama }} ({{ $k->keterangan }})</option>
                                                    @endforeach
                                                </select>
                                                @error('kategori_id') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="rumahsakit_id">Rumah Sakit</label>
                                                <select wire:model="rumahsakit_id" class="form-control" id="rumahsakit_id">
                                                    <option value="">Pilih Rumah Sakit</option>
                                                    @foreach($rumahsakits as $rs)
                                                    <option value="{{ $rs->id }}">{{ $rs->nama }}</option>
                                                    @endforeach
                                                </select>
                                                @error('rumahsakit_id') <span class="text-danger">{{ $message }}</span> @enderror

                                            </div>
                                        </div>
                                        <div class="col-6 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <div class="form-group mb-2">
                                                <label for="alamat_jemput">Alamat Lengkap</label>
                                                <textarea wire:model="alamat_jemput" class="form-control" id="alamat_jemput" rows="3" placeholder="Masukkan Alamat Lengkap Pengantaran"></textarea>
                                                @error('alamat_jemput') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>

                                            <div class="form-group">
                                                <label>Latitude<span class="form-label">*</span></label>
                                                <input wire:model="latitude" id="latitude" class="form-control @error('latitude') is-invalid @enderror" type="text" name="latitude">
                                                <small class="text-muted">*Tambahkan angka 0 di akhir </small>
                                                @error('latitude') <small class="text-danger">{{ $message }}</small>@enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Longitude<span class="form-label">*</span></label>
                                                <input wire:model="longitude" id="longitude" class="form-control @error('longitude') is-invalid @enderror" type="text" name="longitude">
                                                <small class="text-muted">*Tambahkan angka 0 di akhir </small>
                                                @error('longitude') <small class="text-danger">{{ $message }}</small>@enderror
                                            </div>
                                            <div class="form-group mb-2">
                                                <button type="button" class="btn btn-sm btn-block btn-primary" onclick="getLocation()">
                                                    <i class="fas fa-map-marker-alt"></i>
                                                    Get Long Lat</button>
                                            </div>

                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="d-flex justify-content-end">
                                                <button class="btn btn-sm btn-primary" type="submit">
                                                    <i class="fas fa-check"></i>
                                                    Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
    </section>
    <script>
        function getLocation() {
            var latitudeInput = document.getElementById("latitude");
            var longitudeInput = document.getElementById("longitude");

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    latitudeInput.value = position.coords.latitude;
                    longitudeInput.value = position.coords.longitude;
                    Livewire.emit('get-location', position.coords.latitude, position.coords.longitude);
                });
            } else {
                alert('Geolocation is not supported by this browser.');
            }
        }

    </script>
</div>
