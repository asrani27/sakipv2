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
        <a href="/admin_skpd/jabatan" class="nav-link {{ Request::is('admin_skpd/jabatan') ? 'active' : '' }}">
            <i class="nav-icon fas fa-map"></i>
            <p>Peta Jabatan
            </p>
        </a>
        </li>
        </li>
        <li class="nav-item">
        <a href="/admin_skpd/tupoksi" class="nav-link {{ Request::is('admin_skpd/tupoksi') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tasks"></i>
            <p>Tupoksi
            </p>
        </a>
        </li>
        <li class="nav-item">
        <a href="/admin_skpd/pegawai" class="nav-link {{ Request::is('pegawai') ? 'active' : '' }}">
            <i class="nav-icon fas fa-users"></i>
            <p>Pegawai
            </p>
        </a>
        </li>
        <li class="nav-item">
        <a href="/admin_skpd/mutasi" class="nav-link {{ Request::is('admin_skpd/mutasi') ? 'active' : '' }}">
            <i class="nav-icon fas fa-exchange-alt"></i>
            <p>Mutasi
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