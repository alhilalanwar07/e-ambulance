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
