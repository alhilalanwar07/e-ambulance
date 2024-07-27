        {{-- @section('layouts.app') --}}
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
                            <a href="#" class="btn btn-danger btn-block text-dark" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" style="hover: none; cursor: default;" onmouseover="this.classList.add('text-dark')" onmouseout="this.classList.remove('text-white')">
                                <i class="feather-log-out"></i> <span>Keluar</span>
                            </a>
                        </li>

                    </ul>
                    @endauth()
                </div>
            </div>
        </div>
        {{-- @endsection --}}
