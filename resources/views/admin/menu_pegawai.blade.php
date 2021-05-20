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
    @if (Auth::user()->pegawai->jabatan->tingkat == 2)
        
    <li class='{{ Request::is('pegawai/program') ? 'active' : '' }}'>
        <a href='/pegawai/program'>
            <i class='fa fa-file-text'></i>
            <span>Program</span>
        </a>
    </li>
    @endif

    @if (Auth::user()->pegawai->jabatan->tingkat == 1)
    <li class='{{ Request::is('pegawai/rencana-aksi') ? 'active' : '' }}'>
        <a href='/pegawai/rencana-aksi'>
            <i class='fa fa-file-text'></i>
            <span>Rencana Aksi</span>
        </a>
    </li>
    @endif
    @if (Auth::user()->pegawai->jabatan != null)
        @if (Auth::user()->pegawai->jabatan->tingkat == 4 AND Auth::user()->pegawai->jabatan->skpd_id = 21)
            <li class='{{ Request::is('#') ? 'active' : '' }}'>
                <a href='/pegawai/kegiatan'>
                    <i class='fa fa-file-text'></i>
                    <span>Kegiatan</span>
                </a>
            </li>
        @elseif(Auth::user()->pegawai->jabatan->tingkat == 3)
            <li class='{{ Request::is('#') ? 'active' : '' }}'>
                <a href='/pegawai/kegiatan'>
                    <i class='fa fa-file-text'></i>
                    <span>Kegiatan</span>
                </a>
            </li>
            <li class='{{ Request::is('#') ? 'active' : '' }}'>
                <a href='/pegawai/aktivitas'>
                    <i class='fa fa-file-text'></i>
                    <span>Aktivitas</span>
                </a>
            </li>
        @endif
    @endif

    {{-- @if (Auth::user()->pegawai->jabatan != null)
        @if (Auth::user()->pegawai->jabatan->tingkat == 1)
        <li class='{{ Request::is('#') ? 'active' : '' }}'>
            <a href='/pegawai/realisasi'>
                <i class='fa fa-file-text'></i>
                <span>Realisasi</span>
            </a>
        </li>
        @endif
    @endif --}}
{{-- 
    <li class='{{ Request::is('pegawai/kinerja-triwulan') ? 'active' : '' }}'>
        <a href='/pegawai/kinerja-triwulan'>
            <i class='fa fa-file-text'></i>
            <span>Kinerja Triwulan</span>
        </a>
    </li> --}}

    <li class='{{ Request::is('ganti-password') ? 'active' : '' }}'>
        <a href='/ganti-password'>
            <i class='fa fa-key'></i>
            <span>Ganti Password</span>
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
