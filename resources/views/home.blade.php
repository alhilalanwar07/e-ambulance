@extends('layouts.app')
@section('title', __('Dashboard'))
@section('content')
<div class="page-header">
    <div class="row">
        <div class="col-sm-12">
            <div class="page-sub-header">
                <h3 class="page-title">Welcome {{ Auth::user()->name }}!</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Admin</li>
                </ul>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-12">
        <div class="card bg-comman vh-80">
            <div class="card-body">
                {{-- logo dan text --}}
                <div class="d-flex align-items-center justify-content-left">
                    <div style="margin-right: 1rem;">
                        <img src="{{ url('/') }}/assets/img/puskesmas_small.png" alt="Puskesmas Tanggetada" style="width: 150px;">
                    </div>
                    <div>
                        <h6 class="text-left">Selamat Datang di e-ambulance</h6>
                        <h3 class="text-left">Pusat Layanan Ambulance Puskesmas Tanggetada</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-3 col-sm-6 col-12 d-flex">
        <div class="card bg-comman w-100">
            <div class="card-body">
                <div class="db-widgets d-flex justify-content-between align-items-center">
                    <div class="db-info">
                        <h6>Supir</h6>
                        <h3>{{ $jumlahSupir }}</h3>
                    </div>
                    <div class="db-icon">
                        <img src="assets/img/icons/dash-icon-01.svg" alt="Dashboard Icon">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-sm-6 col-12 d-flex">
        <div class="card bg-comman w-100">
            <div class="card-body">
                <div class="db-widgets d-flex justify-content-between align-items-center">
                    <div class="db-info">
                        <h6>Pelanggan</h6>
                        <h3>{{ $jumlahPelanggan }}</h3>
                    </div>
                    <div class="db-icon">
                        <img src="assets/img/icons/dash-icon-02.svg" alt="Dashboard Icon">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-12 d-flex">
        <div class="card bg-comman w-100">
            <div class="card-body">
                <div class="db-widgets d-flex justify-content-between align-items-center">
                    <div class="db-info">
                        <h6>Rumah Sakit</h6>
                        <h3>{{ $jumlahRumahSakit }}</h3>
                    </div>
                    <div class="db-icon">
                        <img src="assets/img/icons/dash-icon-03.svg" alt="Dashboard Icon">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-12 d-flex">
        <div class="card bg-comman w-100">
            <div class="card-body">
                <div class="db-widgets d-flex justify-content-between align-items-center">
                    <div class="db-info">
                        <h6>Pesanan</h6>
                        <h3>{{ $jumlahPesanan }}</h3>
                    </div>
                    <div class="db-icon">
                        <img src="assets/img/icons/dash-icon-04.svg" alt="Dashboard Icon">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
