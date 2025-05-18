<ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item {{ $menu == 'dashboard' ? 'active' : '' }}">
                            <a href="{{ route('dashboard-guru') }}" class='sidebar-link'>
                                <i class="bi bi-grid"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                       <li class="sidebar-item {{ $menu == 'absen' ? 'active' : '' }}">
                            <a href="{{ route('absen.index') }}" class='sidebar-link'>
                                <i class="bi bi-calendar-check"></i>
                                <span>Absensi</span>
                            </a>
                        </li>
                       

                    </ul>