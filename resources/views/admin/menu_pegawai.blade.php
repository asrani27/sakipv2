<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
        <a href="/home" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
            <i class="nav-icon fas fa-home"></i>
            <p>
            Dashboard
            </p>
        </a>
        </li>
        <li class="nav-item">
        <a href="/pegawai/tupoksi" class="nav-link {{ Request::is('pegawai/tupoksi') ? 'active' : '' }}">
            <i class="nav-icon fas fa-map"></i>
            <p>Tupoksi
            </p>
        </a>
        </li>
        </li>
        <li class="nav-item">
        <a href="/pegawai/iku" class="nav-link {{ Request::is('pegawai/iku') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tasks"></i>
            <p>IKU
            </p>
        </a>
        </li>
        <li class="nav-item">
        <a href="/pegawai/pk" class="nav-link {{ Request::is('pegawai/pk') ? 'active' : '' }}">
            <i class="nav-icon fas fa-handshake"></i>
            <p>Perjanjian Kinerja
            </p>
        </a>
        </li>
        <li class="nav-item">
        <a href="/pegawai/kinerja-triwulan" class="nav-link {{ Request::is('pegawai/kinerja-triwulan') ? 'active' : '' }}">
            <i class="nav-icon fas fa-exchange-alt"></i>
            <p>Kinerja Triwulan
            </p>
        </a>
        </li>
        <li class="nav-item">
        <a href="/pegawai/kinerja-tahunan" class="nav-link {{ Request::is('pegawai/kinerja-tahunan') ? 'active' : '' }}">
            <i class="nav-icon fas fa-exchange-alt"></i>
            <p>Kinerja Tahunan
            </p>
        </a>
        </li>
        
        <li class="nav-item">
        <a href="/logout" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>
            Logout
            </p>
        </a>
        </li>
    </ul>
    </nav>