<ul class='nav nav-stacked'>
    <li class='{{ Request::is('home') ? 'active' : '' }}'>
        <a href='/home'>
            <i class='fa fa-tachometer'></i>
            <span>Dashboard</span>
        </a>
    </li>
    
    <li class='{{ Request::is('iku_walikota') ? 'active' : '' }}'>
        <a href='/iku_walikota'>
            <i class='fa fa-file'></i>
            <span>IKU</span>
        </a>
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