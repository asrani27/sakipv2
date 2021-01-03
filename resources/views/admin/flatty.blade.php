<!DOCTYPE html>
<html lang='en'>
<head>
    <title>SAKIP Kota Banjarmasin</title>
    <meta content='admin template, administration template, bootstrap icons, bootstrap template, dashboard, flat design, flat template, bootstrap flat' name='keywords'>
    <meta content='Flat administration template for Twitter Bootstrap. Twitter Bootstrap 3 template with Ruby on Rails support.' name='description'>
    <meta content='BublinaStudio.com' name='author'>
    <meta content='all' name='robots'>
    <meta content='text/html; charset=utf-8' http-equiv='Content-Type'>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    
    <link href='/admin/assets/images/meta_icons/favicon.ico' rel='shortcut icon' type='image/x-icon'>
    <link href='/admin/assets/images/meta_icons/apple-touch-icon-precomposed.png' rel='apple-touch-icon-precomposed'>

    <link href="/admin/assets/stylesheets/plugins/fancytree/ui.fancytree.css" rel="stylesheet" type="text/css" />
    
    <link href="/admin/assets/stylesheets/bootstrap/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/admin/assets/stylesheets/light-theme.css" rel="stylesheet" type="text/css" media="all" id="color-settings-body-color" />
    <link href="/admin/assets/stylesheets/theme-colors.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/admin/assets/stylesheets/demo.css" rel="stylesheet" type="text/css" media="all" />
    @stack('css')
    @toastr_css
</head>
<body class='contrast-red '>
<header>
    <nav class='navbar navbar-default'>
        <a class='navbar-brand' href='#'>E-SAKIP
            {{-- <img width="81" height="21" class="logo" alt="Flatty" src="/admin/assets/images/logo.svg" />
            <img width="21" height="21" class="logo-xs" alt="Flatty" src="/admin/assets/images/logo_xs.svg" /> --}}
        </a>
        <a class='toggle-nav btn pull-left' href='#'>
            <i class='fa fa-bars'></i>
        </a>
        <ul class='nav'>
            <li class='dropdown light'>
                <a class='' href='#'>
                    <span class='user-name'>Periode :  
                        @if (periodeAktif() == null)
                        Aktifkan Periode
                        @else
                            {{periodeAktif()->mulai}} - {{periodeAktif()->sampai}} 
                        @endif
                    </span>
                </a>
            </li>
            <li class='dropdown light only-icon'>
                <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
                    <i class='fa fa-cog'></i>
                </a>
                <ul class='dropdown-menu color-settings'>
                    
                    <li class='color-settings-contrast-color'>
                        <div class='color-title'>Change contrast color</div>
                        <a data-change-to="contrast-red" href="#"><i class='fa fa-cog text-red'></i>
                            Red
                            <small>(default)</small>
                        </a>
                        <a data-change-to="contrast-blue" href="#"><i class='fa fa-cog text-blue'></i>
                            Blue
                        </a>
                        <a data-change-to="contrast-orange" href="#"><i class='fa fa-cog text-orange'></i>
                            Orange
                        </a>
                        <a data-change-to="contrast-purple" href="#"><i class='fa fa-cog text-purple'></i>
                            Purple
                        </a>
                        <a data-change-to="contrast-green" href="#"><i class='fa fa-cog text-green'></i>
                            Green
                        </a>
                        <a data-change-to="contrast-muted" href="#"><i class='fa fa-cog text-muted'></i>
                            Muted
                        </a>
                        <a data-change-to="contrast-fb" href="#"><i class='fa fa-cog text-fb'></i>
                            Facebook
                        </a>
                        <a data-change-to="contrast-dark" href="#"><i class='fa fa-cog text-dark'></i>
                            Dark
                        </a>
                        <a data-change-to="contrast-pink" href="#"><i class='fa fa-cog text-pink'></i>
                            Pink
                        </a>
                        <a data-change-to="contrast-grass-green" href="#"><i class='fa fa-cog text-grass-green'></i>
                            Grass green
                        </a>
                        <a data-change-to="contrast-sea-blue" href="#"><i class='fa fa-cog text-sea-blue'></i>
                            Sea blue
                        </a>
                        <a data-change-to="contrast-banana" href="#"><i class='fa fa-cog text-banana'></i>
                            Banana
                        </a>
                        <a data-change-to="contrast-dark-orange" href="#"><i class='fa fa-cog text-dark-orange'></i>
                            Dark orange
                        </a>
                        <a data-change-to="contrast-brown" href="#"><i class='fa fa-cog text-brown'></i>
                            Brown
                        </a>
                    </li>
                </ul>
            </li>
            {{-- <li class='dropdown medium only-icon widget'>
                <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
                    <i class='fa fa-rss'></i>
                    <div class='label'>5</div>
                </a>
                <ul class='dropdown-menu'>
                    <li>
                        <a href='#'>
                            <div class='widget-body'>
                                <div class='pull-left icon'>
                                    <i class='fa fa-user text-success'></i>
                                </div>
                                <div class='pull-left text'>
                                    John Doe signed up
                                    <small class='text-muted'>just now</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class='divider'></li>
                    <li>
                        <a href='#'>
                            <div class='widget-body'>
                                <div class='pull-left icon'>
                                    <i class='fa fa-inbox text-error'></i>
                                </div>
                                <div class='pull-left text'>
                                    New Order #002
                                    <small class='text-muted'>3 minutes ago</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class='divider'></li>
                    <li>
                        <a href='#'>
                            <div class='widget-body'>
                                <div class='pull-left icon'>
                                    <i class='fa fa-comment text-warning'></i>
                                </div>
                                <div class='pull-left text'>
                                    America Leannon commented Flatty with veeery long text.
                                    <small class='text-muted'>1 hour ago</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class='divider'></li>
                    <li>
                        <a href='#'>
                            <div class='widget-body'>
                                <div class='pull-left icon'>
                                    <i class='fa fa-user text-success'></i>
                                </div>
                                <div class='pull-left text'>
                                    Jane Doe signed up
                                    <small class='text-muted'>last week</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class='divider'></li>
                    <li>
                        <a href='#'>
                            <div class='widget-body'>
                                <div class='pull-left icon'>
                                    <i class='fa fa-inbox text-error'></i>
                                </div>
                                <div class='pull-left text'>
                                    New Order #001
                                    <small class='text-muted'>1 year ago</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class='widget-footer'>
                        <a href='#'>All notifications</a>
                    </li>
                </ul>
            </li> --}}
            <li class='dropdown dark user-menu'>
                <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
                    <img width="23" height="23" alt="{{Auth::user()->name}}" src="/admin/assets/images/avatar.jpg" />
                    <span class='user-name'>{{Auth::user()->name}}</span>
                    <b class='caret'></b>
                </a>
                <ul class='dropdown-menu'>
                    <li>
                        <a href='/logout'>
                            <i class='fa fa-sign-out'></i>
                            Sign out
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</header>
<div id='wrapper'>
    <div id='main-nav-bg'></div>
    <nav id='main-nav'>
        <div class='navigation'>
            <div class='search'>
                <form action='search_results.html' method='get'>
                    <div class='search-wrapper'>
                        <input type="text" name="q" value="" class="search-query form-control" placeholder="Search..." autocomplete="off" />
                        <button class='btn btn-link fa fa-search' name='button' type='submit'></button>
                    </div>
                </form>
            </div>

            
        <!-- Sidebar Menu -->
        @if (Auth::user()->hasRole('superadmin'))
        @include('admin.menu')  
        @elseif(Auth::user()->hasRole('admin'))
        @include('admin.menu_skpd')
        @elseif(Auth::user()->hasRole('pegawai'))
        @include('admin.menu_pegawai')
        @endif
        <!-- /.sidebar-menu -->

        </div>
    </nav>
    <section id='content'>
        <div class='container'>
            <div class='row' id='content-wrapper'>
                
                @yield('content')

            </div>
            <footer id='footer'>
                <div class='footer-wrapper'>
                    <div class='row'>
                        <div class='col-sm-6 text'>
                            SAKIP Kota Banjarmasin
                        </div>
                        
                    </div>
                </div>
            </footer>
        </div>
    </section>
</div>
<!-- / jquery [required] -->
<script src="/admin/assets/javascripts/jquery/jquery.min.js" type="text/javascript"></script>
<script src="/admin/assets/javascripts/jquery/jquery.mobile.custom.min.js" type="text/javascript"></script>
<script src="/admin/assets/javascripts/jquery/jquery-ui.min.js" type="text/javascript"></script>
<script src="/admin/assets/javascripts/jquery/jquery.ui.touch-punch.min.js" type="text/javascript"></script>
<script src="/admin/assets/javascripts/bootstrap/bootstrap.js" type="text/javascript"></script>
<script src="/admin/assets/javascripts/plugins/modernizr/modernizr.min.js" type="text/javascript"></script>
<script src="/admin/assets/javascripts/plugins/retina/retina.js" type="text/javascript"></script>
<script src="/admin/assets/javascripts/theme.js" type="text/javascript"></script>
<script src="/admin/assets/javascripts/demo.js" type="text/javascript"></script>
@stack('js')
@toastr_js
@toastr_render
</body>
</html>
