<div>
    @section('title', __('Detail Pesanan'))
    <section class="bg-light py-3 py-md-5">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
                    <h2 class="mb-4 display-5 text-center">
                        Detail Pesanan
                    </h2>
                    <p class="text-secondary mb-5 text-center">
                        Berikut detail pesanan Anda pada e-ambulance - SIP Puskesmas Tanggetada.
                    </p>

                    <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle">
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row justify-content-lg-center">
                <div class="col-12 col-lg-12">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="row">
                                    <div class="row" wire:ignore.self>
                                        <div class="col-6 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <div class="form-group mb-2">
                                                <label for="nama_pasien">Nama Pasien</label>
                                                <input wire:model="nama_pasien" type="text" class="form-control" id="nama_pasien" placeholder="Masukkan Nama Pasien" disabled>
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="keterangan_pasien">Deskripsi Pasien</label>
                                                <textarea wire:model="keterangan_pasien" class="form-control" id="keterangan_pasien" rows="3" placeholder="Masukkan Deskripsi Pasien" disabled></textarea>
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="kategori_id">Kategori</label>
                                                <input wire:model="nama_kategori" type="text" class="form-control"  disabled data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $keterangan }}">
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="rumahsakit_id">Rumah Sakit</label>
                                                <input wire:model="nama_rumahsakit" type="text" class="form-control"  disabled>

                                            </div>
                                        </div>
                                        <div class="col-6 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <div class="form-group mb-2">
                                                <label for="alamat_jemput">Alamat Lengkap</label>
                                                <textarea wire:model="alamat_jemput" class="form-control" id="alamat_jemput" rows="3" disabled></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label>Latitude<span class="form-label">*</span></label>
                                                <input wire:model="latitude_jemput" id="latitude" class="form-control " type="text" name="latitude" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label>Longitude<span class="form-label">*</span></label>
                                                <input wire:model="longitude_jemput" id="longitude" class="form-control " type="text" name="longitude" disabled>
                                            </div>

                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-2">
                                            <div class="d-flex justify-content-end">
                                                <button class="btn btn-sm btn-danger" wire:click.prevent="back()" type="button">
                                                    <i class="fas fa-arrow-left"></i>
                                                    Kembali</button>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
