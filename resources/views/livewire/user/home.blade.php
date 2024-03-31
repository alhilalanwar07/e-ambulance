<div>
    {{-- title --}}
    @section('title', __('Beranda'))
    {{-- slider --}}
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://source.unsplash.com/600x200?pharmacy" class="d-block w-300 h-300 d-sm-none" alt="...">
            <img src="https://source.unsplash.com/1200x400?pharmacy" class="d-none d-sm-block w-100 h-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="https://source.unsplash.com/600x200?ambulance" class="d-block w-300 h-300 d-sm-none" alt="...">
            <img src="https://source.unsplash.com/1200x400?ambulance" class="d-none d-sm-block w-100 h-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="https://source.unsplash.com/600x200?medicine" class="d-block w-300 h-300 d-sm-none" alt="...">
            <img src="https://source.unsplash.com/1200x400?medicine" class="d-none d-sm-block w-100 h-100" alt="...">
        </div>
    </div>

    <div class="carousel-caption d-none d-md-block text-center align-middle d-flex justify-content-center flex-column">
        {{-- selamat datang di e-ambulance Pusat Layanan Ambulans Puskesmas Tanggetada --}}
        <h1 class="text-shadow-sm text-outline-dark gradient-text fw-bold">Selamat Datang di website e-ambulance <br> Pusat Layanan Ambulance <br> Puskesmas Tanggetada</h1>
        <br>

        <div class="d-grid gap-2 d-md-flex justify-content-md-center d-flex justify-content-center">
            <div class="col-md-6">
                <div class="card bg-danger text-white">
                    <div class="card-body">
                        <h5 class="card-title">PESAN AMBULANCE</h5>
                        <p class="card-text">Klik untuk memesan ambulance</p>
                        <a href="/pesan-ambulance" class="stretched-link"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- @media (max-width: 576px) { --}}
        <div class="carousel-caption d-block d-md-none text-center align-middle d-flex justify-content-center flex-column">
            <small class="text-shadow-sm text-outline-dark fs-8 mb-2">Selamat Datang di e-ambulance <br> Pusat Layanan Ambulance <br> Puskesmas Tanggetada</small>

            <div class="d-grid gap-2 d-md-flex justify-content-md-center d-flex justify-content-center">
                <div class="col-12">
                    <button type="button" class="btn btn-danger">PESAN AMBULANCE</button>
                </div>
            </div>
        </div>
    {{-- } --}}


    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

    {{-- 20px space --}}
    <br>
    <br>
    {{-- card statistik supir, pelanggan, rumahsakit and pesanan --}}
    <div class="row">
        {{-- title for "statistik" --}}
        <div class="col-md-12 text-center">
            <section class="jumbotron text-center bg-white shadow-sm rounded">
                <h1><span class="fa fa-home"></span> Statistik</h1>
                <p class="lead text-muted">Statistik data e-ambulance</p>
            </section>

            <div class="row bg-white shadow-sm rounded p-3">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="card bg-primary text-white mb-3">
                        <div class="card-header">Supir</div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $jumlahSupir ?? 0 }}</h5>
                            <p class="card-text">Total Supir</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="card bg-success text-white mb-3">
                        <div class="card-header">Pelanggan</div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $jumlahPelanggan ?? 0}}</h5>
                            <p class="card-text">Total Pelanggan</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="card bg-warning text-white mb-3">
                        <div class="card-header">Rumah Sakit</div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $jumlahRumahSakit ?? 0}}</h5>
                            <p class="card-text">Total Rumah Sakit</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="card bg-danger text-white mb-3">
                        <div class="card-header">Pesanan</div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $jumlahPesanan ?? 0 }}</h5>
                            <p class="card-text">Total Pesanan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
