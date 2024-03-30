<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@hasSection('title') @yield('title') | @endif
        {{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @livewireStyles
    <link rel="shortcut icon" href="{{ url('/') }}/assets/img/puskesmas_small.png">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/feather/feather.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/icons/flags/flags.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/style.css">
</head>

<body>
    <div class="main-wrapper">

        <div class="header">

            <div class="header-left">
                <a href="#" class="logo">
                    <img src="{{ url('/') }}/assets/img/puskesmas_tanggetada.png" alt="Logo">
                </a>
                <a href="#" class="logo logo-small">
                    <img src="{{ url('/') }}/assets/img/puskesmas_small.png" alt="Logo" width="30" height="30">
                </a>
            </div>
            <div class="menu-toggle">
                <a href="javascript:void(0);" id="toggle_btn">
                    <i class="fas fa-bars"></i>
                </a>
            </div>
            <a class="mobile_btn" id="mobile_btn">
                <i class="fas fa-bars"></i>
            </a>

            <ul class="nav user-menu">

                <li class="nav-item dropdown has-arrow new-user-menus">
                    <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                        <span class="user-img">
                            <img class="rounded-circle" src="{{ url('/') }}/assets/img/profiles/avatar-01.jpg" width="31" alt="Soeng Souy">
                            <div class="user-text">
                                <h6>
                                    @if(Auth::check())
                                    {{ Auth::user()->name }}
                                    @endif
                                </h6>
                                <p class="text-muted mb-0">
                                    @if(Auth::check())
                                    {{ Auth::user()->role }}
                                    @endif
                                </p>
                            </div>
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="user-header">
                            <div class="avatar avatar-sm">
                                <img src="{{ url('/') }}/assets/img/profiles/avatar-01.jpg" alt="User Image" class="avatar-img rounded-circle">
                            </div>
                            <div class="user-text">
                                <h6>
                                    @if(Auth::check())
                                    {{ Auth::user()->name }}
                                    @endif
                                </h6>
                                <p class="text-muted mb-0">
                                    @if(Auth::check())
                                    {{ Auth::user()->role }}
                                    @endif
                                </p>
                            </div>
                        </div>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>

            </ul>

        </div>


        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    @auth()
                    <ul class="navbar-nav mr-auto">
                        <li class="menu-title">
                            <span>Main Menu</span>
                        </li>
                        <!--Nav Bar Hooks - Do not delete!!-->
                        <li class=" @if (request()->is('home')) active @endif">
                            <a href="{{ url('/home') }}"> <i class="feather-home"> </i> <span>Dashboard</span></a>
                        </li>
                        <li class="submenu @if (request()->is('laporan')) active @endif">
                        </li>
                        <li class="submenu @if (request()->is('users') || request()->is('supirs') || request()->is('pelanggans') || request()->is('kategoris') || request()->is('rumahsakits')) active @endif">
                            <a href="#" class="@if (request()->is('users') || request()->is('supirs') || request()->is('pelanggans') || request()->is('kategoris') || request()->is('rumahsakits'))  active subdrop @endif"><i class="feather-grid"></i> <span> Input Data</span> <span class="menu-arrow"></span></a>
                            <ul style="display: @if (request()->is('users') || request()->is('supirs') || request()->is('pelanggans') || request()->is('kategoris') || request()->is('rumahsakits')) block @else none @endif;">
                                <li>
                                    <a href="{{ url('/users') }}" class="@if (request()->is('users')) active @endif"> <i class="fas fa-users"></i> <span>Users</span></a>
                                </li>
                                <li>
                                    <a href="{{ url('/supirs') }}" class="@if (request()->is('supirs')) active @endif"><i class="fas fa-user-tie"></i> <span>Supir</span></a>
                                </li>
                                <li>
                                    <a href="{{ url('/pelanggans') }}" class="@if (request()->is('pelanggans')) active @endif"><i class="fas fa-user-tie"></i> <span>Pelanggan</span></a>
                                </li>
                                <li>
                                    <a href="{{ url('/kategoris') }}" class="@if (request()->is('kategoris')) active @endif"><i class="fas fa-tag"></i> <span>Kategori</span></a>
                                </li>
                                <li>
                                    <a href="{{ url('/rumahsakits') }}" class="@if (request()->is('rumahsakits')) active @endif"><i class="fas fa-hospital"></i> <span>Rumah Sakit</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="submenu @if (request()->is('pesanans')) active @endif">
                            <a href="#" class="@if (request()->is('pesanans')) subdrop active @endif"><i class="feather-grid"></i> <span> Pengolahan Data</span> <span class="menu-arrow"></span></a>
                            <ul style="display: @if (request()->is('pesanans')) block @else none @endif;">
                                <li>
                                    <a href="{{ url('/pesanans') }}" class="@if (request()->is('pesanans')) active @endif"><i class="fas fa-receipt"></i> <span>Pesanan</span></a>
                                </li>
                            </ul>
                        </li>
                        {{-- proses output --}}
                        <li class="submenu @if (request()->is('laporan')) active @endif">
                            <a href="#" class="@if (request()->is('laporan')) subdrop active @endif"><i class="feather-grid"></i> <span> Output</span> <span class="menu-arrow"></span></a>
                            <ul style="display: @if (request()->is('laporan')) block @else none @endif;">
                                <li>
                                    <a href="{{ url('/laporan') }}" class="@if (request()->is('laporan')) active @endif"><i class="fas fa-file-alt"></i> <span>Laporan</span></a>
                                </li>
                            </ul>
                        </li>
                        {{-- logout --}}
                        <br>
                        <li class="submenu">
                            <button class="btn btn-danger btn-block" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="feather-log-out"></i> <span>Keluar</span>
                            </button>
                        </li>

                    </ul>
                    @endauth()
                </div>
            </div>
        </div>


        <div class="page-wrapper">
            <div class="content container-fluid">
                @yield('content')

                <footer>
                    <p>Copyright © {{ date('Y') }}
                        <a href="#">Puskesmas Tanggetada</a>. All rights reserved.</p>
                </footer>
            </div>
        </div>
    </div>
    @livewireScripts
    <script type="module">
        const addModal = new bootstrap.Modal('#createDataModal');
        const editModal = new bootstrap.Modal('#updateDataModal');
        window.addEventListener('closeModal', () => {
            addModal.hide();
            editModal.hide();
        })
    </script>
    <script src="{{ url('/') }}/assets/js/jquery-3.6.0.min.js"></script>
    <script src="{{ url('/') }}/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('/') }}/assets/js/feather.min.js"></script>
    <script src="{{ url('/') }}/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="{{ url('/') }}/assets/plugins/apexchart/apexcharts.min.js"></script>
    <script src="{{ url('/') }}/assets/plugins/apexchart/chart-data.js"></script>
    <script src="{{ url('/') }}/assets/js/script.js"></script>
</body>

</html>
