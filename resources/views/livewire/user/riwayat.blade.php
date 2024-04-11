<div>
    @section('title', __('Riwayat'))
    <!-- Contact 1 - Bootstrap Brain Component -->
    <section class="bg-light py-3 py-md-5">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
                    <h2 class="mb-4 display-5 text-center">Riwayat</h2>
                    <p class="text-secondary mb-5 text-center">
                        Berikut riwayat pemesanan Anda pada e-ambulance - SIP Puskesmas Tanggetada.
                    </p>
                    <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle">
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row justify-content-lg-center">
                <div class="col-12 col-lg-12">
                    <div class="d-flex justify-content-end mb-3">
                        <a href="{{ route('user.pesan') }}" type="button" class="btn btn-danger">
                            <i class="fas fa-bell"></i> Pesan Ambulance
                        </a>
                    </div>
                    {{-- alert --}}
                    @if (session('message'))
                    <div class="bg-success border rounded shadow-sm overflow-hidden mb-2" wire:poll.5s>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                    @endif

                    @forelse($pesanans->sortByDesc('created_at') as $row)
                    <div class="bg-white border rounded shadow-sm overflow-hidden mb-2 mt-2">
                        <div class="px-3 py-3 pt-3 pb-0 d-flex justify-content-between">
                            <h6 class="card-subtitle mb-2 text-muted">
                                <span class="badge rounded-pill" style="background-color: {{ $row->kategori->warna }}" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $row->kategori->keterangan }}">{{ $row->kategori->nama }}</span>
                            </h6>
                            <h6 class="card-subtitle mb-2 text-muted">
                                <span class="badge rounded-pill bg-{{ match($row->status) {
                                    'selesai' => 'success',
                                    'menunggu' => 'warning',
                                    'dibatalkan' => 'danger',
                                    default => 'secondary'
                                } }} text-light">{{ $row->status }}</span>
                            </h6>
                            <h6 class="card-subtitle text-muted">
                                <span class="badge rounded-pill bg-dark text-light">{{ Carbon\Carbon::parse($row->created_at)->isoFormat('dddd, D MMMM Y') }}</span>
                            </h6>
                        </div>
                        <div class="px-3 py-3 pt-0 pb-0 ">

                            <div class="d-flex align-items-center gap-1">
                                <i class="fas fa-user-injured fa-xs me-1"></i>
                                <p class="card-text mb-0 text-truncate">{{ $row->nama_pasien }}</p>
                            </div>
                            <div class="d-flex align-items-center gap-1">
                                <i class="fas fa-map-marker-alt fa-xs me-1"></i>
                                <p class="card-text mb-0 text-truncate">
                                    {{ Str::limit($row->alamat_jemput, 50) }}
                                </p>
                                <p class="card-text mb-0 text-truncate gap-2">
                                    ke
                                </p>
                                <p class="card-text text-truncate">
                                    {{ Str::limit($row->rumahsakit->nama, 50) }}
                                </p>
                            </div>
                            {{-- button detail --}}
                        </div>
                        <div class="px-3 py-3 pt-0 d-flex justify-content-end">
                            <a class="" href="{{ route('user.detail', $row->id) }}">
                                Lihat detail ...
                            </a>
                        </div>
                    </div>

                    @empty
                    <div class="bg-white border rounded shadow-sm overflow-hidden alert alert-warning">
                        Belum ada riwayat pemesanan.
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
</div>
