<div>
    @section('title', __('Laporan'))
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <h4><i class="fas fa-printer"></i>
                                Laporan </h4>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            @if (session()->has('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert" wire:poll.3000ms>
                                <strong>Gagal!</strong> {{ session('error') }}
                            </div>
                            @endif
                        </div>
                        <div class="col-lg-6 col-md-6">
                            {{-- date --}}
                            <div class="form-group mb-3">
                                <label for="basicInput">Tanggal Awal</label>
                                <input type="date" class="form-control" wire:model="tanggal_awal">
                                @error('tanggal_awal') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            {{-- date --}}
                            <div class="form-group mb-3">
                                <label for="basicInput">Tanggal Akhir</label>
                                <input type="date" class="form-control" wire:model="tanggal_akhir">
                                @error('tanggal_akhir') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                {{-- btn cetak --}}
                                <button class="btn btn-primary btn-block" wire:click="cetak">Cetak</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
