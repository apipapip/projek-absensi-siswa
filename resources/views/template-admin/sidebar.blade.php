<ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item {{ $menu == 'dashboard-admin' ? 'active' : '' }}">
                            <a href="{{ route('home') }}" class='sidebar-link'>
                                <i class="bi bi-grid"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ $menu == 'siswa' ? 'active' : '' }}">
                            <a href="{{ route('siswa.index') }}" class='sidebar-link'>
                                <i class="bi bi-person"></i>
                                <span>Siswa</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ $menu == 'guru' ? 'active' : '' }}">
                            <a href="{{ route('guru.index') }}" class='sidebar-link'>
                                <i class="bi bi-person-badge"></i>
                                <span>Guru</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ $menu == 'jurusan' ? 'active' : '' }}">
                            <a href="{{ route('jurusan.index') }}" class='sidebar-link'>
                                <i class="bi bi-book"></i>
                                <span>Jurusan</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ $menu == 'lokal' ? 'active' : '' }}">
                            <a href="{{ route('lokal.index') }}" class='sidebar-link'>
                                <i class="bi bi-building"></i>
                                <span>Kelas</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ $menu == 'user' ? 'active' : '' }}">
                            <a href="{{ route('user.index') }}" class='sidebar-link'>
                                <i class="bi bi-people"></i>
                                <span>User</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ $menu == 'mapel' ? 'active' : '' }}">
                            <a href="{{ route('mapel.index') }}" class='sidebar-link'>
                                <i class="bi bi-journal-bookmark"></i>
                                <span>Mapel</span>
                            </a>
                        </li>
                       

                    </ul>