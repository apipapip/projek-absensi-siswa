<ul class="menu">
    <li class="sidebar-title">Menu</li>

    <!-- <li class="nav-item">
        <a class="nav-link {{ $menu == 'dashboard' ? '' : 'collapsed' }}" href="{{ route('dashboard-siswa') }}">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
        </a>
    </li> -->
    <li class="nav-item">
        <a class="nav-link {{ $menu == 'dashboard' ? '' : 'collapsed' }}" href="{{ route('rekap.index') }}">
            <i class="bi bi-grid"></i>
            <span>Rekap</span>
        </a>
    </li>
</ul>