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
                        <li class=" @if (request()->is('pesanans')) active @endif">
                            <a href="{{ url('/pesanans') }}"> <i class="fas fa-receipt"> </i> <span>Pesanan</span></a>
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
