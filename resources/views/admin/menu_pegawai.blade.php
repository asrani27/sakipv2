<ul class='nav nav-stacked'>
    <li class='{{ Request::is('home') ? 'active' : '' }}'>
        <a href='/home'>
            <i class='fa fa-tachometer'></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class='{{ Request::is('pegawai/tupoksi') ? 'active' : '' }}'>
        <a href='/pegawai/tupoksi'>
            <i class='fa fa-tasks'></i>
            <span>Tupoksi</span>
        </a>
    </li>
    <li class='{{ Request::is('pegawai/iku') ? 'active' : '' }}'>
        <a href='/pegawai/iku'>
            <i class='fa fa-tasks'></i>
            <span>IKU</span>
        </a>
    </li>
    <li class='{{ Request::is('pegawai/pk') ? 'active' : '' }}'>
        <a href='/pegawai/pk'>
            <i class='fa fa-file-text'></i>
            <span>Perjanjian Kinerja</span>
        </a>
    </li>
    
    <li class='{{ Request::is('pegawai/rencana-aksi') ? 'active' : '' }}'>
        <a href='/pegawai/rencana-aksi'>
            <i class='fa fa-file-text'></i>
            <span>Rencana Aksi</span>
        </a>
    </li>

    <li class='{{ Request::is('pegawai/kinerja-triwulan') ? 'active' : '' }}'>
        <a href='/pegawai/kinerja-triwulan'>
            <i class='fa fa-file-text'></i>
            <span>Kinerja Triwulan</span>
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
