<ul class='nav nav-stacked'>
    <li class='{{ Request::is('home') ? 'active' : '' }}'>
        <a href='/home'>
            <i class='fa fa-tachometer'></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class='{{ Request::is('info') ? 'active' : '' }}'>
        <a href='/info'>
            <i class='fa fa-bullhorn'></i>
            <span>Pengumuman</span>
        </a>
    </li>
    <li class='{{ Request::is('data*') ? 'active' : '' }}'>
        <a class="dropdown-collapse {{ Request::is('data*') ? 'in' : '' }}" href="#"><i class='fa fa-pencil-square-o'></i>
            <span>Data Utama</span>
            <i class='fa fa-angle-down angle-down'></i>
        </a>
        <ul class='nav nav-stacked {{ Request::is('data*') ? 'in' : '' }}'>
            <li class='{{ Request::is('data/periode') ? 'active' : '' }}'>
                <a href='/data/periode'>
                    <div class='icon'>
                        <i class='fa fa-caret-right'></i>
                    </div>
                    <span>Periode</span>
                </a>
            </li>
            <li class=' {{ Request::is('data/skpd') ? 'active' : '' }}'>
                <a href='/data/skpd'>
                    <div class='icon'>
                        <i class='fa fa-caret-right'></i>
                    </div>
                    <span>SKPD</span>
                </a>
            </li>
            <li class=' {{ Request::is('data/eselon') ? 'active' : '' }}'>
                <a href='/data/eselon'>
                    <div class='icon'>
                        <i class='fa fa-caret-right'></i>
                    </div>
                    <span>Eselon</span>
                </a>
            </li>
            <li class='{{ Request::is('data/pangkat') ? 'active' : '' }}'>
                <a href='/data/pangkat'>
                    <div class='icon'>
                        <i class='fa fa-caret-right'></i>
                    </div>
                    <span>Pangkat & Golongan</span>
                </a>
            </li>
            <li class=' {{ Request::is('data/jabatan') ? 'active' : '' }}'>
                <a href='/data/jabatan'>
                    <div class='icon'>
                        <i class='fa fa-caret-right'></i>
                    </div>
                    <span>Jabatan</span>
                </a>
            </li>
            <li class=' {{ Request::is('data/pegawai') ? 'active' : '' }}'>
                <a href='/data/pegawai'>
                    <div class='icon'>
                        <i class='fa fa-caret-right'></i>
                    </div>
                    <span>Pegawai</span>
                </a>
            </li>
            {{-- <li class='{{ Request::is('data/mutasi') ? 'active' : '' }}'>
                <a href='/data/mutasi'>
                    <div class='icon'>
                        <i class='fa fa-caret-right'></i>
                    </div>
                    <span>Mutasi</span>
                </a>
            </li> --}}
        </ul>
    </li>
    <li class='{{ Request::is('setting*') ? 'active' : '' }}'>
        <a class="dropdown-collapse {{ Request::is('setting*') ? 'in' : '' }}" href="#"><i class='fa fa-pencil-square-o'></i>
            <span>Setting</span>
            <i class='fa fa-angle-down angle-down'></i>
        </a>
        <ul class='nav nav-stacked  {{ Request::is('setting*') ? 'in' : '' }}'>
            <li class='{{ Request::is('setting/role') ? 'active' : '' }}'>
                <a href='/setting/role'>
                    <div class='icon'>
                        <i class='fa fa-caret-right'></i>
                    </div>
                    <span>Role</span>
                </a>
            </li>
            <li class=' {{ Request::is('setting/user') ? 'active' : '' }}'>
                <a href='/setting/user'>
                    <div class='icon'>
                        <i class='fa fa-caret-right'></i>
                    </div>
                    <span>User</span>
                </a>
            </li>
            <li class=' {{ Request::is('setting/tanggalinput') ? 'active' : '' }}'>
                <a href='/setting/tanggalinput'>
                    <div class='icon'>
                        <i class='fa fa-caret-right'></i>
                    </div>
                    <span>Tanggal Input</span>
                </a>
            </li>
        </ul>
    </li>
    
    <li class='{{ Request::is('sipd*') ? 'active' : '' }}'>
        <a class="dropdown-collapse {{ Request::is('sipd*') ? 'in' : '' }}" href="#"><i class='fa fa-pencil-square-o'></i>
            <span>SIPD API</span>
            <i class='fa fa-angle-down angle-down'></i>
        </a>
        <ul class='nav nav-stacked {{ Request::is('sipd*') ? 'in' : '' }}'>
            <li class='{{ Request::is('sipd/rpjmd') ? 'active' : '' }}'>
                <a href='/sipd/rpjmd'>
                    <div class='icon'>
                        <i class='fa fa-caret-right'></i>
                    </div>
                    <span>RPJMD</span>
                </a>
            </li>
            <li class=' {{ Request::is('sipd/rkpd') ? 'active' : '' }}'>
                <a href='/sipd/rkpd'>
                    <div class='icon'>
                        <i class='fa fa-caret-right'></i>
                    </div>
                    <span>RKPD</span>
                </a>
            </li>
        </ul>
    </li>
    
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