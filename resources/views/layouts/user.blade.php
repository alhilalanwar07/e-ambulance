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
    {{-- <link rel="stylesheet" href="{{ url('/') }}/assets/css/style.css"> --}}

    <style>
        .gradient-text {
            /* Menerapkan efek gradien ke teks */
            background: -webkit-linear-gradient(90deg, #00C9FF, #92FE9D);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;

            /* Opsi tambahan untuk mendukung browser lain */
            background: linear-gradient(90deg, #00C9FF, #92FE9D);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;

            /* buat text mengampung bayangan */
            -webkit-text-stroke: 0.5px rgba(255, 255, 255, 255);
            /* stroke keluar text */
            text-stroke: 0.5px rgba(255, 255, 255, 255);

            /* Menambahkan bayangan di belakang teks */
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }

    </style>
</head>

<body>
    <div class="main">

        {{-- <div class="container"> --}}

        <nav class="navbar navbar-expand-lg navbar-light text-white fw-bold sticky-top" style="background-image: linear-gradient(90deg, #00C9FF 0%, #92FE9D 100%);">

            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="{{ url('/') }}/assets/img/puskesmas_tanggetada.png" alt="Logo" width="150" class="d-inline-block align-text-top">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="/">Beranda</a>
                        </li>
                        @if (Auth::check())
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('riwayat') ? 'active' : '' }}" href="/riwayat">Riwayat</a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('kontak') ? 'active' : '' }}" href="/kontak">Kontak</a>
                        </li>
                        {{-- logout --}}
                        @if (Auth::check())
                        <li class="nav-item">
                            <a href="#" class="nav-link text-danger" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                        @endif

                    </ul>
                    <form class="d-flex">
                        @if (Auth::check())
                        <div class="dropdown">
                            <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" alt="" width="32" height="32" class="rounded-circle me-2">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end text-small shadow" aria-labelledby="dropdownUser1">
                                <li>
                                    <button class="dropdown-item nav-link text-danger" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </button>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                        @else
                        <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">Login</a>
                        {{-- <a href="{{ route('register') }}" class="btn btn-outline-success">Register</a> --}}
                        @endif
                    </form>
                </div>
            </div>
        </nav>

        {{-- <div class="container "> --}}
        {{ $slot }}
        {{-- </div> --}}
        <footer class="footer sticky-bottom shadow-md p-2 fw-bold" style="background-image: linear-gradient(90deg, #00C9FF 0%, #92FE9D 100%);">
            <p class="text-center my-2">Copyright © {{ date('Y') }}
                Puskesmas Tanggetada. All rights reserved.</p>
        </footer>
        {{-- </div> --}}
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
    {{-- <script src="{{ url('/') }}/assets/js/script.js"></script> --}}
    @stack('scripts')
</body>

</html>
