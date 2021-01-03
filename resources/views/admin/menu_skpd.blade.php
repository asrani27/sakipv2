<ul class='nav nav-stacked'>
    <li class='{{ Request::is('home') ? 'active' : '' }}'>
        <a href='/home'>
            <i class='fa fa-tachometer'></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class='{{ Request::is('/admin_skpd/unit-kerja') ? 'active' : '' }}'>
        <a href='/admin_skpd/unit-kerja'>
            <i class='fa fa-map'></i>
            <span>Peta Jabatan</span>
        </a>
    </li>
    <li class='{{ Request::is('admin_skpd/tupoksi') ? 'active' : '' }}'>
        <a href='/admin_skpd/tupoksi'>
            <i class='fa fa-tasks'></i>
            <span>Tupoksi</span>
        </a>
    </li>
    <li class='{{ Request::is('admin_skpd/pegawai') ? 'active' : '' }}'>
        <a href='/admin_skpd/pegawai'>
            <i class='fa fa-users'></i>
            <span>Pegawai</span>
        </a>
    </li>
    <li class='{{ Request::is('admin_skpd/mutasi') ? 'active' : '' }}'>
        <a href='/admin_skpd/mutasi'>
            <i class='fa fa-exchange'></i>
            <span>Mutasi</span>
        </a>
    </li>
    
    <li class='{{ Request::is('logout') ? 'active' : '' }}'>
        <a href='/logout'>
            <i class='fa fa-sign-out'></i>
            <span>Logout</span>
        </a>
    </li>
    

</ul>
</nav>

{{-- 
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
    </nav> --}}