<!DOCTYPE html>
<!--
  Name: Flatty - Flat Administration Template
  Website: https://wrapbootstrap.com/theme/flatty-flat-administration-template-WB0P6NR1N?ref=metheus
  Version: 2.4.1
-->
<html lang='en'>
<head>
    <title>Dashboard | Flatty - Flat Administration Template</title>
    <meta content='admin template, administration template, bootstrap icons, bootstrap template, dashboard, flat design, flat template, bootstrap flat' name='keywords'>
    <meta content='Flat administration template for Twitter Bootstrap. Twitter Bootstrap 3 template with Ruby on Rails support.' name='description'>
    <meta content='BublinaStudio.com' name='author'>
    <meta content='all' name='robots'>
    <meta content='text/html; charset=utf-8' http-equiv='Content-Type'>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!--[if IE]> <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'> <![endif]-->
    <link href='/admin/assets/images/meta_icons/favicon.ico' rel='shortcut icon' type='image/x-icon'>
    <link href='/admin/assets/images/meta_icons/apple-touch-icon-precomposed.png' rel='apple-touch-icon-precomposed'>
    <!-- / START - page related stylesheets [optional] -->
    <link href="/admin/assets/stylesheets/plugins/bootstrap_daterangepicker/bootstrap-daterangepicker.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/admin/assets/stylesheets/plugins/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/admin/assets/stylesheets/plugins/wysihtml/wysihtml.css" rel="stylesheet" type="text/css" media="all" />
    <!-- / END - page related stylesheets [optional] -->
    <!-- / bootstrap [required] -->
    <link href="/admin/assets/stylesheets/bootstrap/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/admin/assets/stylesheets/light-theme.css" rel="stylesheet" type="text/css" media="all" id="color-settings-body-color" />\
    <link href="/admin/assets/stylesheets/theme-colors.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/admin/assets/stylesheets/demo.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body class='contrast-red '>
<header>
    <nav class='navbar navbar-default'>
        <a class='navbar-brand' href='index.html'>
            <img width="81" height="21" class="logo" alt="Flatty" src="assets/images/logo.svg" />
            <img width="21" height="21" class="logo-xs" alt="Flatty" src="assets/images/logo_xs.svg" />
        </a>
        <a class='toggle-nav btn pull-left' href='#'>
            <i class='fa fa-bars'></i>
        </a>
        <ul class='nav'>
            <li class='dropdown light only-icon'>
                <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
                    <i class='fa fa-cog'></i>
                </a>
                <ul class='dropdown-menu color-settings'>
                    <li class='color-settings-body-color'>
                        <div class='color-title'>Change body color</div>
                        <a data-change-to='assets/stylesheets/light-theme.css' href='#'>
                            Light
                            <small>(default)</small>
                        </a>
                        <a data-change-to='assets/stylesheets/dark-theme.css' href='#'>
                            Dark
                        </a>
                        <a data-change-to='assets/stylesheets/dark-blue-theme.css' href='#'>
                            Dark blue
                        </a>
                    </li>
                    <li class='divider'></li>
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
            <li class='dropdown medium only-icon widget'>
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
            </li>
            <li class='dropdown dark user-menu'>
                <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
                    <img width="23" height="23" alt="Mila Kunis" src="assets/images/avatar.jpg" />
                    <span class='user-name'>Mila Kunis</span>
                    <b class='caret'></b>
                </a>
                <ul class='dropdown-menu'>
                    <li>
                        <a href='user_profile.html'>
                            <i class='fa fa-user'></i>
                            Profile
                        </a>
                    </li>
                    <li>
                        <a href='user_profile.html'>
                            <i class='fa fa-cog'></i>
                            Settings
                        </a>
                    </li>
                    <li class='divider'></li>
                    <li>
                        <a href='sign_in.html'>
                            <i class='fa fa-sign-out'></i>
                            Sign out
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <form action='search_results.html' class='navbar-form navbar-right hidden-xs' method='get'>
            <button class='btn btn-link fa fa-search' name='button' type='submit'></button>
            <div class='form-group'>
                <input type="text" name="q" value="" class="form-control" placeholder="Search..." autocomplete="off" id="q_header" />
            </div>
        </form>
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
            <ul class='nav nav-stacked'>
                <li class='active'>
                    <a href='index.html'>
                        <i class='fa fa-tachometer'></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class=''>
                    <a class="dropdown-collapse" href="#"><i class='fa fa-pencil-square-o'></i>
                        <span>Forms</span>
                        <i class='fa fa-angle-down angle-down'></i>
                    </a>
                    <ul class='nav nav-stacked'>
                        <li class=''>
                            <a href='form_styles.html'>
                                <div class='icon'>
                                    <i class='fa fa-caret-right'></i>
                                </div>
                                <span>Form styles and features</span>
                            </a>
                        </li>
                        <li class=''>
                            <a href='form_components.html'>
                                <div class='icon'>
                                    <i class='fa fa-caret-right'></i>
                                </div>
                                <span>Form components</span>
                            </a>
                        </li>
                        <li class=''>
                            <a href='validations.html'>
                                <div class='icon'>
                                    <i class='fa fa-caret-right'></i>
                                </div>
                                <span>Validations</span>
                            </a>
                        </li>
                        <li class=''>
                            <a href='wizard.html'>
                                <div class='icon'>
                                    <i class='fa fa-caret-right'></i>
                                </div>
                                <span>Wizard</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class='dropdown-collapse ' href='#'>
                        <i class='fa fa-tint'></i>
                        <span>UI Elements & Widgets</span>
                        <i class='fa fa-angle-down angle-down'></i>
                    </a>
                    <ul class='nav nav-stacked'>
                        <li class=''>
                            <a href='ui_elements.html'>
                                <div class='icon'>
                                    <i class='fa fa-caret-right'></i>
                                </div>
                                <span>UI Elements</span>
                            </a>
                        </li>
                        <li class=''>
                            <a href='widgets.html'>
                                <div class='icon'>
                                    <i class='fa fa-caret-right'></i>
                                </div>
                                <span>Widgets</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class=''>
                    <a href='buttons_and_icons.html'>
                        <i class='fa fa-star'></i>
                        <span>Buttons & Icons</span>
                    </a>
                </li>
                <li>
                    <a class='dropdown-collapse ' href='#'>
                        <i class='fa fa-cogs'></i>
                        <span>Components</span>
                        <i class='fa fa-angle-down angle-down'></i>
                    </a>
                    <ul class='nav nav-stacked'>
                        <li class=''>
                            <a href='charts.html'>
                                <div class='icon'>
                                    <i class='fa fa-bar-chart-o'></i>
                                </div>
                                <span>Charts</span>
                            </a>
                        </li>
                        <li class=''>
                            <a href='address_book.html'>
                                <div class='icon'>
                                    <i class='fa fa-envelope'></i>
                                </div>
                                <span>Address book</span>
                            </a>
                        </li>
                        <li class=''>
                            <a href='chats.html'>
                                <div class='icon'>
                                    <i class='fa fa-comments'></i>
                                </div>
                                <span>Chats</span>
                            </a>
                        </li>
                        <li class=''>
                            <a href='filetrees.html'>
                                <div class='icon'>
                                    <i class='fa fa-list-ul'></i>
                                </div>
                                <span>File trees</span>
                            </a>
                        </li>
                        <li class=''>
                            <a href='fileupload.html'>
                                <div class='icon'>
                                    <i class='fa fa-file'></i>
                                </div>
                                <span>Fileupload</span>
                            </a>
                        </li>
                        <li class=''>
                            <a href='todo.html'>
                                <div class='icon'>
                                    <i class='fa fa-list-alt'></i>
                                </div>
                                <span>Todo list</span>
                            </a>
                        </li>
                        <li class=''>
                            <a href='wysiwyg.html'>
                                <div class='icon'>
                                    <i class='fa fa-clipboard'></i>
                                </div>
                                <span>WYSIWYG</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class=''>
                    <a href='tables.html'>
                        <i class='fa fa-table'></i>
                        <span>Tables</span>
                    </a>
                </li>
                <li class=''>
                    <a href='grid.html'>
                        <i class='fa fa-th'></i>
                        <span>Grid</span>
                    </a>
                </li>
                <li class=''>
                    <a href='type.html'>
                        <i class='fa fa-font'></i>
                        <span>Typography</span>
                    </a>
                </li>
                <li class=''>
                    <a href='calendar.html'>
                        <i class='fa fa-calendar'></i>
                        <span>Calendar</span>
                    </a>
                </li>
                <li>
                    <a class='dropdown-collapse ' href='#'>
                        <i class='fa fa-book'></i>
                        <span>Example pages</span>
                        <i class='fa fa-angle-down angle-down'></i>
                    </a>
                    <ul class='nav nav-stacked'>
                        <li class=''>
                            <a href='invoice.html'>
                                <div class='icon'>
                                    <i class='fa fa-money'></i>
                                </div>
                                <span>Invoice</span>
                            </a>
                        </li>
                        <li class=''>
                            <a href='gallery.html'>
                                <div class='icon'>
                                    <i class='fa fa-picture-o'></i>
                                </div>
                                <span>Gallery</span>
                            </a>
                        </li>
                        <li class=''>
                            <a href='timeline.html'>
                                <div class='icon'>
                                    <i class='fa fa-clock-o'></i>
                                </div>
                                <span>Timeline</span>
                            </a>
                        </li>
                        <li class=''>
                            <a href='pricing_tables.html'>
                                <div class='icon'>
                                    <i class='fa fa-table'></i>
                                </div>
                                <span>Pricing tables</span>
                            </a>
                        </li>
                        <li class=''>
                            <a href='user_profile.html'>
                                <div class='icon'>
                                    <i class='fa fa-user'></i>
                                </div>
                                <span>User profile</span>
                            </a>
                        </li>
                        <li class=''>
                            <a href='err404.html' target='_blank'>
                                <div class='icon'>
                                    <i class='fa fa-question-circle'></i>
                                </div>
                                <span>404 Error</span>
                            </a>
                        </li>
                        <li class=''>
                            <a href='err500.html' target='_blank'>
                                <div class='icon'>
                                    <i class='fa fa-cogs'></i>
                                </div>
                                <span>500 Error</span>
                            </a>
                        </li>
                        <li class=''>
                            <a href='sign_in.html' target='_blank'>
                                <div class='icon'>
                                    <i class='fa fa-sign-in'></i>
                                </div>
                                <span>Sign in</span>
                            </a>
                        </li>
                        <li class=''>
                            <a href='faq.html'>
                                <div class='icon'>
                                    <i class='fa fa-bullhorn'></i>
                                </div>
                                <span>FAQ</span>
                            </a>
                        </li>
                        <li class=''>
                            <a href='orders.html'>
                                <div class='icon'>
                                    <i class='fa fa-inbox'></i>
                                </div>
                                <span>Orders</span>
                            </a>
                        </li>
                        <li class=''>
                            <a href='search_results.html'>
                                <div class='icon'>
                                    <i class='fa fa-search'></i>
                                </div>
                                <span>Search results</span>
                            </a>
                        </li>
                        <li class=''>
                            <a href='blank.html'>
                                <div class='icon'>
                                    <i class='fa fa-circle-o'></i>
                                </div>
                                <span>Blank page</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class='dropdown-collapse ' href='#'>
                        <i class='fa fa-cog'></i>
                        <span>Layouts</span>
                        <i class='fa fa-angle-down angle-down'></i>
                    </a>
                    <ul class='nav nav-stacked'>
                        <li class=''>
                            <a href='closed_navigation.html'>
                                <div class='icon'>
                                    <i class='fa fa-caret-right'></i>
                                </div>
                                <span>Closed navigation</span>
                            </a>
                        </li>
                        <li class=''>
                            <a href='fixed_header.html'>
                                <div class='icon'>
                                    <i class='fa fa-caret-right'></i>
                                </div>
                                <span>Fixed header</span>
                            </a>
                        </li>
                        <li class=''>
                            <a href='fixed_navigation.html'>
                                <div class='icon'>
                                    <i class='fa fa-caret-right'></i>
                                </div>
                                <span>Fixed navigation</span>
                            </a>
                        </li>
                        <li class=''>
                            <a href='fixed_navigation_and_header.html'>
                                <div class='icon'>
                                    <i class='fa fa-caret-right'></i>
                                </div>
                                <span>Fixed navigation & header</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class='dropdown-collapse' href='#'>
                        <i class='fa fa-folder-open-o'></i>
                        <span>Four level dropdown</span>
                        <i class='fa fa-angle-down angle-down'></i>
                    </a>
                    <ul class='nav nav-stacked'>
                        <li>
                            <a class='dropdown-collapse' href='#'>
                                <div class='icon'>
                                    <i class='fa fa-caret-right'></i>
                                </div>
                                <span>Second level</span>
                                <i class='fa fa-angle-down angle-down'></i>
                            </a>
                            <ul class='nav nav-stacked'>
                                <li>
                                    <a class='dropdown-collapse' href='#'>
                                        <div class='icon'>
                                            <i class='fa fa-caret-right'></i>
                                        </div>
                                        <span>Third level</span>
                                        <i class='fa fa-angle-down angle-down'></i>
                                    </a>
                                    <ul class='nav nav-stacked'>
                                        <li>
                                            <a href='#'>
                                                <div class='icon'>
                                                    <i class='fa fa-caret-right'></i>
                                                </div>
                                                <span>Fourth level</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href='#'>
                                                <div class='icon'>
                                                    <i class='fa fa-caret-right'></i>
                                                </div>
                                                <span>Another fourth level</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class=''>
                    <a href='email_templates.html'>
                        <i class='fa fa-mail-reply'></i>
                        <span>Email templates</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <section id='content'>
        <div class='container'>
            <div class='row' id='content-wrapper'>
                <div class='col-xs-12'>

                    <div class='page-header page-header-with-buttons'>
                        <h1 class='pull-left'>
                            <i class='fa fa-tachometer'></i>
                            <span>Dashboard</span>
                        </h1>
                        <div class='pull-right'>
                            <div class='btn-group'>
                                <a class="btn btn-white hidden-xs" href="#">Last month</a>
                                <a class="btn btn-white" href="#">Last week</a>
                                <a class="btn btn-white " href="#">Today</a>
                                <a class="btn btn-white" id="daterange" href="#"><i class='fa fa-calendar'></i>
                                    <span>Custom</span>
                                    <b class='caret'></b>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class='alert alert-info alert-dismissable'>
                        <a class='close' data-dismiss='alert' href='#'>&times;</a>
                        Welcome to
                        <strong>Flatty (v2.4.1)</strong>
                        - I hope you'll like it. Don't forget - you can change theme color in top right corner
                        <i class='fa fa-cog'></i>
                        if you want.
                    </div>
                    <div class='row box box-transparent'>
                        <div class='col-xs-4 col-sm-2'>
                            <div class='box-quick-link blue-background'>
                                <a href='#'>
                                    <div class='header'>
                                        <div class='fa fa-comments'></div>
                                    </div>
                                    <div class='content'>Comments</div>
                                </a>
                            </div>
                        </div>
                        <div class='col-xs-4 col-sm-2'>
                            <div class='box-quick-link green-background'>
                                <a href='#'>
                                    <div class='header'>
                                        <div class='fa fa-star'></div>
                                    </div>
                                    <div class='content'>Veeeery long title of this quick link</div>
                                </a>
                            </div>
                        </div>
                        <div class='col-xs-4 col-sm-2'>
                            <div class='box-quick-link orange-background'>
                                <a href='#'>
                                    <div class='header'>
                                        <div class='fa fa-magic'></div>
                                    </div>
                                    <div class='content'>Magic</div>
                                </a>
                            </div>
                        </div>
                        <div class='col-xs-4 col-sm-2'>
                            <div class='box-quick-link purple-background'>
                                <a href='#'>
                                    <div class='header'>
                                        <div class='fa fa-eye'></div>
                                    </div>
                                    <div class='content'>Show</div>
                                </a>
                            </div>
                        </div>
                        <div class='col-xs-4 col-sm-2'>
                            <div class='box-quick-link red-background'>
                                <a href='orders.html'>
                                    <div class='header'>
                                        <div class='fa fa-inbox'></div>
                                    </div>
                                    <div class='content'>Orders</div>
                                </a>
                            </div>
                        </div>
                        <div class='col-xs-4 col-sm-2'>
                            <div class='box-quick-link muted-background'>
                                <a href='#'>
                                    <div class='header'>
                                        <div class='fa fa-refresh'></div>
                                    </div>
                                    <div class='content'>Spinning</div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-sm-6 box'>
                            <div class='box-header'>
                                <div class='title'>
                                    <i class='fa fa-inbox'></i>
                                    Orders
                                </div>
                                <div class='actions'>
                                    <a class="btn box-remove btn-xs btn-link" href="#"><i class='fa fa-times'></i>
                                    </a>
                                    <a class="btn box-collapse btn-xs btn-link" href="#"><i></i>
                                    </a>
                                </div>
                            </div>
                            <div class='box-content'>
                                <div id='stats-chart1' style='height: 200px;'></div>
                            </div>
                        </div>
                        <div class='col-sm-6 box'>
                            <div class='box-header'>
                                <div class='title'>
                                    <i class='fa fa-users'></i>
                                    Users
                                </div>
                                <div class='actions'>
                                    <a class="btn box-remove btn-xs btn-link" href="#"><i class='fa fa-times'></i>
                                    </a>
                                    <a class="btn box-collapse btn-xs btn-link" href="#"><i></i>
                                    </a>
                                </div>
                            </div>
                            <div class='box-content'>
                                <div id='stats-chart2' style='height: 200px;'></div>
                            </div>
                        </div>
                    </div>
                    <hr class='hr-drouble'>
                    <div class='row'>
                        <div class='col-sm-12 col-md-6'>
                            <div class='box'>
                                <div class='box-header'>
                                    <div class='title'>
                                        <div class='fa fa-inbox'></div>
                                        Orders
                                    </div>
                                    <div class='actions'>
                                        <a class="btn box-remove btn-xs btn-link" href="#"><i class='fa fa-times'></i>
                                        </a>
                                        <a class="btn box-collapse btn-xs btn-link" href="#"><i></i>
                                        </a>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-sm-6'>
                                        <div class='box-content box-statistic'>
                                            <h3 class='title text-error'>191</h3>
                                            <small>New</small>
                                            <div class='text-error fa fa-inbox align-right'></div>
                                        </div>
                                        <div class='box-content box-statistic'>
                                            <h3 class='title text-warning'>311</h3>
                                            <small>In process</small>
                                            <div class='text-warning fa fa-check-square-o align-right'></div>
                                        </div>
                                        <div class='box-content box-statistic'>
                                            <h3 class='title text-info'>3</h3>
                                            <small>Pending</small>
                                            <div class='text-info fa fa-clock-o align-right'></div>
                                        </div>
                                    </div>
                                    <div class='col-sm-6'>
                                        <div class='box-content box-statistic'>
                                            <h3 class='title text-primary'>3</h3>
                                            <small>Shipped</small>
                                            <div class='text-primary fa fa-truck align-right'></div>
                                        </div>
                                        <div class='box-content box-statistic'>
                                            <h3 class='title text-success'>981</h3>
                                            <small>Completed</small>
                                            <div class='text-success fa fa-flag align-right'></div>
                                        </div>
                                        <div class='box-content box-statistic'>
                                            <h3 class='title text-muted'>0</h3>
                                            <small>Canceled</small>
                                            <div class='text-muted fa fa-times align-right'></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='col-sm-6 col-md-3'>
                            <div class='box'>
                                <div class='box-header'>
                                    <div class='title'>
                                        <i class='fa fa-users'></i>
                                        Visitors
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-sm-12'>
                                        <div class='box-content box-statistic'>
                                            <h3 class='title text-error'>9100</h3>
                                            <small>Unique</small>
                                            <div class='text-error fa fa-user align-right'></div>
                                        </div>
                                        <div class='box-content box-statistic'>
                                            <h3 class='title text-warning'>41 000</h3>
                                            <small>Pageviews</small>
                                            <div class='text-warning fa fa-book align-right'></div>
                                        </div>
                                        <div class='box-content box-statistic'>
                                            <h3 class='title text-primary'>12:21</h3>
                                            <small>Average time</small>
                                            <div class='text-primary fa fa-clock-o align-right'></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='col-sm-6 col-md-3'>
                            <div class='box'>
                                <div class='box-header'>
                                    <div class='title'>
                                        <i class='fa fa-comments'></i>
                                        Comments
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-sm-12'>
                                        <div class='box-content box-statistic'>
                                            <h3 class='title text-error'>91</h3>
                                            <small>New</small>
                                            <div class='text-error fa fa-plus align-right'></div>
                                        </div>
                                        <div class='box-content box-statistic'>
                                            <h3 class='title text-success'>1</h3>
                                            <small>Approved</small>
                                            <div class='text-success fa fa-check align-right'></div>
                                        </div>
                                        <div class='box-content box-statistic'>
                                            <h3 class='title text-info'>123</h3>
                                            <small>Pending</small>
                                            <div class='text-info fa fa-clock-o align-right'></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='group-header'>
                        <div class='row'>
                            <div class='col-sm-6 col-sm-offset-3'>
                                <div class='text-center'>
                                    <h2>Todo & Recent activity</h2>
                                    <small class='text-muted'>Items in todo list can be reordered by drag & drop, you can mark them as important, complete, or you can delete them!</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-sm-12 col-md-6'>
                            <div class='row todo-list'>
                                <div class='col-sm-12'>
                                    <div class='box'>
                                        <div class='box-header'>
                                            <div class='title'>
                                                <i class='fa fa-list-alt'></i>
                                                Todo lists
                                            </div>
                                            <div class='actions'>
                                                <a class="btn box-remove btn-xs btn-link" href="#"><i class='fa fa-times'></i>
                                                </a>
                                                <a class="btn box-collapse btn-xs btn-link" href="#"><i></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class='box-content box-no-padding'>
                                            <div class='sortable-container'>
                                                <form action="#" accept-charset="UTF-8" class="new-todo" method="post"><input class='form-control' id='todo_name' name='todo[name]' placeholder='Type your new todo here...' type='text'>
                                                    <button class='btn btn-success' type='submit'>
                                                        <i class='fa fa-plus'></i>
                                                    </button>
                                                </form>
                                                <div class='date text-contrast'>Today</div>
                                                <ul class='list-unstyled sortable' data-sortable-axis='y' data-sortable-connect='.sortable'>
                                                    <li class='important item'>
                                                        <label class='check pull-left todo'>
                                                            <input type='checkbox'>
                                                            <span>Necessitatibus est maiores</span>
                                                        </label>
                                                        <div class='actions pull-right'>
                                                            <a class='btn btn-link edit has-tooltip' data-placement='top' href='#' title='Edit todo'>
                                                                <i class='fa fa-pencil'></i>
                                                            </a>
                                                            <a class='btn btn-link remove has-tooltip' data-placement='top' href='#' title='Remove todo'>
                                                                <i class='fa fa-times'></i>
                                                            </a>
                                                            <a class='btn btn-link important has-tooltip' data-placement='top' href='#' title='Mark as important'>
                                                                <i class='fa fa-bookmark-o'></i>
                                                            </a>
                                                        </div>
                                                    </li>
                                                    <li class='item'>
                                                        <label class='check pull-left todo'>
                                                            <input type='checkbox'>
                                                            <span>Maiores molestias pariatur</span>
                                                        </label>
                                                        <div class='actions pull-right'>
                                                            <a class='btn btn-link edit has-tooltip' data-placement='top' href='#' title='Edit todo'>
                                                                <i class='fa fa-pencil'></i>
                                                            </a>
                                                            <a class='btn btn-link remove has-tooltip' data-placement='top' href='#' title='Remove todo'>
                                                                <i class='fa fa-times'></i>
                                                            </a>
                                                            <a class='btn btn-link important has-tooltip' data-placement='top' href='#' title='Mark as important'>
                                                                <i class='fa fa-bookmark-o'></i>
                                                            </a>
                                                        </div>
                                                    </li>
                                                    <li class='done item'>
                                                        <label class='check pull-left todo'>
                                                            <input checked='checked' type='checkbox'>
                                                            <span>Placeat voluptas rerum</span>
                                                        </label>
                                                        <div class='actions pull-right'>
                                                            <a class='btn btn-link edit has-tooltip' data-placement='top' href='#' title='Edit todo'>
                                                                <i class='fa fa-pencil'></i>
                                                            </a>
                                                            <a class='btn btn-link remove has-tooltip' data-placement='top' href='#' title='Remove todo'>
                                                                <i class='fa fa-times'></i>
                                                            </a>
                                                            <a class='btn btn-link important has-tooltip' data-placement='top' href='#' title='Mark as important'>
                                                                <i class='fa fa-bookmark-o'></i>
                                                            </a>
                                                        </div>
                                                    </li>
                                                    <li class='item'>
                                                        <label class='check pull-left todo'>
                                                            <input type='checkbox'>
                                                            <i class='fa fa-envelope-o'></i>
                                                            <span>Rerum quaerat ut officia</span>
                                                        </label>
                                                        <div class='actions pull-right'>
                                                            <a class='btn btn-link edit has-tooltip' data-placement='top' href='#' title='Edit todo'>
                                                                <i class='fa fa-pencil'></i>
                                                            </a>
                                                            <a class='btn btn-link remove has-tooltip' data-placement='top' href='#' title='Remove todo'>
                                                                <i class='fa fa-times'></i>
                                                            </a>
                                                            <a class='btn btn-link important has-tooltip' data-placement='top' href='#' title='Mark as important'>
                                                                <i class='fa fa-bookmark-o'></i>
                                                            </a>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <div class='date text-contrast'>Due Wed, Sep 19, 2013</div>
                                                <ul class='list-unstyled sortable' data-sortable-axis='y' data-sortable-connect='.sortable'>
                                                    <li class='item'>
                                                        <label class='check pull-left todo'>
                                                            <input type='checkbox'>
                                                            <span>Molestias sequi adipisci veritatis eum</span>
                                                        </label>
                                                        <div class='actions pull-right'>
                                                            <a class='btn btn-link edit has-tooltip' data-placement='top' href='#' title='Edit todo'>
                                                                <i class='fa fa-pencil'></i>
                                                            </a>
                                                            <a class='btn btn-link remove has-tooltip' data-placement='top' href='#' title='Remove todo'>
                                                                <i class='fa fa-times'></i>
                                                            </a>
                                                            <a class='btn btn-link important has-tooltip' data-placement='top' href='#' title='Mark as important'>
                                                                <i class='fa fa-bookmark-o'></i>
                                                            </a>
                                                        </div>
                                                    </li>
                                                    <li class='important item'>
                                                        <label class='check pull-left todo'>
                                                            <input type='checkbox'>
                                                            <span>Adipisci non dolor suscipit fugit</span>
                                                        </label>
                                                        <div class='actions pull-right'>
                                                            <a class='btn btn-link edit has-tooltip' data-placement='top' href='#' title='Edit todo'>
                                                                <i class='fa fa-pencil'></i>
                                                            </a>
                                                            <a class='btn btn-link remove has-tooltip' data-placement='top' href='#' title='Remove todo'>
                                                                <i class='fa fa-times'></i>
                                                            </a>
                                                            <a class='btn btn-link important has-tooltip' data-placement='top' href='#' title='Mark as important'>
                                                                <i class='fa fa-bookmark-o'></i>
                                                            </a>
                                                        </div>
                                                    </li>
                                                    <li class='item'>
                                                        <label class='check pull-left todo'>
                                                            <input type='checkbox'>
                                                            <span>Totam a facilis rerum dolor</span>
                                                        </label>
                                                        <div class='actions pull-right'>
                                                            <a class='btn btn-link edit has-tooltip' data-placement='top' href='#' title='Edit todo'>
                                                                <i class='fa fa-pencil'></i>
                                                            </a>
                                                            <a class='btn btn-link remove has-tooltip' data-placement='top' href='#' title='Remove todo'>
                                                                <i class='fa fa-times'></i>
                                                            </a>
                                                            <a class='btn btn-link important has-tooltip' data-placement='top' href='#' title='Mark as important'>
                                                                <i class='fa fa-bookmark-o'></i>
                                                            </a>
                                                        </div>
                                                    </li>
                                                    <li class='item'>
                                                        <label class='check pull-left todo'>
                                                            <input type='checkbox'>
                                                            <span>Sit dolore totam nam minima</span>
                                                        </label>
                                                        <div class='actions pull-right'>
                                                            <a class='btn btn-link edit has-tooltip' data-placement='top' href='#' title='Edit todo'>
                                                                <i class='fa fa-pencil'></i>
                                                            </a>
                                                            <a class='btn btn-link remove has-tooltip' data-placement='top' href='#' title='Remove todo'>
                                                                <i class='fa fa-times'></i>
                                                            </a>
                                                            <a class='btn btn-link important has-tooltip' data-placement='top' href='#' title='Mark as important'>
                                                                <i class='fa fa-bookmark-o'></i>
                                                            </a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='col-sm-12 col-md-6'>
                            <div class='row recent-activity'>
                                <div class='col-sm-12'>
                                    <div class='box'>
                                        <div class='box-header'>
                                            <div class='title'>
                                                <i class='fa fa-refresh'></i>
                                                Recent activity
                                            </div>
                                            <div class='actions'>
                                                <a class="btn box-remove btn-xs btn-link" href="#"><i class='fa fa-times'></i>
                                                </a>
                                                <a class="btn box-collapse btn-xs btn-link" href="#"><i></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class='box-content box-no-padding'>
                                            <ul class='nav nav-tabs nav-tabs-simple'>
                                                <li class='active'>
                                                    <a data-toggle="tab" class="green-border" href="#users"><i class='fa fa-user text-green'></i>
                                                        Users
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-toggle="tab" class="purple-border" href="#comments"><i class='fa fa-comments text-purple'></i>
                                                        Comments
                                                    </a>
                                                </li>
                                                <li class='dropdown'>
                                                    <a data-toggle="dropdown" class="dropdown-toggle orange-border" href="#">Dropdown
                                                        <i class='fa fa-caret-down text-contrast'></i>
                                                    </a>
                                                    <ul class='dropdown-menu'>
                                                        <li><a href="#">Hi there!</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                            <div class='tab-content'>
                                                <div class='tab-pane fade in active' id='users'>
                                                    <ul class='list-unstyled users list-hover list-striped'>
                                                        <li>
                                                            <div class='avatar pull-left'>
                                                                <img alt='Avatar' height='23' src='assets/images/avatar.jpg' width='23'>
                                                            </div>
                                                            <div class='action pull-left'>
                                                                <a class="text-contrast" href="#">Eoin</a>
                                                                signed up
                                                            </div>
                                                            <small class='date pull-right text-muted'>
                                                                <span class='timeago fade has-tooltip' data-placement='top' title='2016-10-20 22:37:50 +0200'>October 20, 2016 - 22:37</span>
                                                                <i class='fa fa-clock-o'></i>
                                                            </small>
                                                        </li>
                                                        <li>
                                                            <div class='avatar pull-left'>
                                                                <img alt='Avatar' height='23' src='assets/images/avatar.jpg' width='23'>
                                                            </div>
                                                            <div class='action pull-left'>
                                                                <a class="text-contrast" href="#">Ciara</a>
                                                                signed up
                                                            </div>
                                                            <small class='date pull-right text-muted'>
                                                                <span class='timeago fade has-tooltip' data-placement='top' title='2016-10-20 22:38:50 +0200'>October 20, 2016 - 22:38</span>
                                                                <i class='fa fa-clock-o'></i>
                                                            </small>
                                                        </li>
                                                        <li>
                                                            <div class='avatar pull-left'>
                                                                <div class='fa fa-user'></div>
                                                            </div>
                                                            <div class='action pull-left'>
                                                                <a class="text-contrast" href="#">Hamish</a>
                                                                signed in
                                                            </div>
                                                            <small class='date pull-right text-muted'>
                                                                <span class='timeago fade has-tooltip' data-placement='top' title='2016-10-20 22:39:50 +0200'>October 20, 2016 - 22:39</span>
                                                                <i class='fa fa-clock-o'></i>
                                                            </small>
                                                        </li>
                                                        <li>
                                                            <div class='avatar pull-left'>
                                                                <div class='fa fa-user'></div>
                                                            </div>
                                                            <div class='action pull-left'>
                                                                <a class="text-contrast" href="#">Arturo</a>
                                                                signed in
                                                            </div>
                                                            <small class='date pull-right text-muted'>
                                                                <span class='timeago fade has-tooltip' data-placement='top' title='2016-10-20 22:40:50 +0200'>October 20, 2016 - 22:40</span>
                                                                <i class='fa fa-clock-o'></i>
                                                            </small>
                                                        </li>
                                                        <li>
                                                            <div class='avatar pull-left'>
                                                                <div class='fa fa-user'></div>
                                                            </div>
                                                            <div class='action pull-left'>
                                                                <a class="text-contrast" href="#">Leslie</a>
                                                                uploaded photo
                                                            </div>
                                                            <small class='date pull-right text-muted'>
                                                                <span class='timeago fade has-tooltip' data-placement='top' title='2016-10-20 22:41:50 +0200'>October 20, 2016 - 22:41</span>
                                                                <i class='fa fa-clock-o'></i>
                                                            </small>
                                                        </li>
                                                        <li>
                                                            <div class='avatar pull-left'>
                                                                <div class='fa fa-user'></div>
                                                            </div>
                                                            <div class='action pull-left'>
                                                                <a class="text-contrast" href="#">Sienna</a>
                                                                signed in
                                                            </div>
                                                            <small class='date pull-right text-muted'>
                                                                <span class='timeago fade has-tooltip' data-placement='top' title='2016-10-20 22:42:50 +0200'>October 20, 2016 - 22:42</span>
                                                                <i class='fa fa-clock-o'></i>
                                                            </small>
                                                        </li>
                                                        <li>
                                                            <div class='avatar pull-left'>
                                                                <img alt='Avatar' height='23' src='assets/images/avatar.jpg' width='23'>
                                                            </div>
                                                            <div class='action pull-left'>
                                                                <a class="text-contrast" href="#">Tammie</a>
                                                                signed in
                                                            </div>
                                                            <small class='date pull-right text-muted'>
                                                                <span class='timeago fade has-tooltip' data-placement='top' title='2016-10-20 22:43:50 +0200'>October 20, 2016 - 22:43</span>
                                                                <i class='fa fa-clock-o'></i>
                                                            </small>
                                                        </li>
                                                        <li>
                                                            <div class='avatar pull-left'>
                                                                <img alt='Avatar' height='23' src='assets/images/avatar.jpg' width='23'>
                                                            </div>
                                                            <div class='action pull-left'>
                                                                <a class="text-contrast" href="#">inley</a>
                                                                commented
                                                            </div>
                                                            <small class='date pull-right text-muted'>
                                                                <span class='timeago fade has-tooltip' data-placement='top' title='2016-10-20 22:44:50 +0200'>October 20, 2016 - 22:44</span>
                                                                <i class='fa fa-clock-o'></i>
                                                            </small>
                                                        </li>
                                                        <li>
                                                            <div class='avatar pull-left'>
                                                                <img alt='Avatar' height='23' src='assets/images/avatar.jpg' width='23'>
                                                            </div>
                                                            <div class='action pull-left'>
                                                                <a class="text-contrast" href="#">Tonia</a>
                                                                signed in
                                                            </div>
                                                            <small class='date pull-right text-muted'>
                                                                <span class='timeago fade has-tooltip' data-placement='top' title='2016-10-20 22:45:50 +0200'>October 20, 2016 - 22:45</span>
                                                                <i class='fa fa-clock-o'></i>
                                                            </small>
                                                        </li>
                                                    </ul>
                                                    <div class='load-more'>
                                                        <a id="users-more-activity" class="btn btn-block" data-loading-text="&lt;i class='fa fa-spinner fa-spin'&gt;&lt;/i&gt; Loading more..." href="#"><i class='fa fa-arrow-circle-down'></i>
                                                            Load more
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class='tab-pane fade' id='comments'>
                                                    <ul class='list-unstyled comments list-hover list-striped'>
                                                        <li>
                                                            <div class='avatar pull-left'>
                                                                <div class='fa fa-user'></div>
                                                            </div>
                                                            <div class='body'>
                                                                <div class='name'><a class="text-contrast" href="#">Orlaith</a></div>
                                                                <div class='actions'>
                                                                    <a class="btn btn-link ok has-tooltip" title="Approve" href="#"><i class='fa fa-thumbs-up'></i>
                                                                    </a>
                                                                    <a class="btn btn-link remove has-tooltip" title="Remove" href="#"><i class='fa fa-thumbs-down'></i>
                                                                    </a>
                                                                </div>
                                                                <div class='text'>Omnis ex molestiae et ipsum necessitatibus perspiciatis velit laudantium enim. Error cum voluptatem aut molestiae possimus aut aut quos quod quibusdam velit</div>
                                                            </div>
                                                            <div class='text-right'>
                                                                <small class='date text-muted'>
                                                                    <span class='timeago fade has-tooltip' data-placement='top' title='2016-10-20 23:36:50 +0200'>October 20, 2016 - 23:36</span>
                                                                    <i class='fa fa-clock-o'></i>
                                                                </small>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class='avatar pull-left'>
                                                                <div class='fa fa-user'></div>
                                                            </div>
                                                            <div class='body'>
                                                                <div class='name'><a class="text-contrast" href="#">Alonzo</a></div>
                                                                <div class='actions'>
                                                                    <a class="btn btn-link ok has-tooltip" title="Approve" href="#"><i class='fa fa-thumbs-up'></i>
                                                                    </a>
                                                                    <a class="btn btn-link remove has-tooltip" title="Remove" href="#"><i class='fa fa-thumbs-down'></i>
                                                                    </a>
                                                                </div>
                                                                <div class='text'>Magnam est velit autem et illum non. Sunt ea ipsum praesentium</div>
                                                            </div>
                                                            <div class='text-right'>
                                                                <small class='date text-muted'>
                                                                    <span class='timeago fade has-tooltip' data-placement='top' title='2016-10-21 00:36:50 +0200'>October 21, 2016 - 00:36</span>
                                                                    <i class='fa fa-clock-o'></i>
                                                                </small>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class='avatar pull-left'>
                                                                <div class='fa fa-user'></div>
                                                            </div>
                                                            <div class='body'>
                                                                <div class='name'><a class="text-contrast" href="#">Marybeth</a></div>
                                                                <div class='actions'>
                                                                    <a class="btn btn-link ok has-tooltip" title="Approve" href="#"><i class='fa fa-thumbs-up'></i>
                                                                    </a>
                                                                    <a class="btn btn-link remove has-tooltip" title="Remove" href="#"><i class='fa fa-thumbs-down'></i>
                                                                    </a>
                                                                </div>
                                                                <div class='text'>Et minus ut ut quo. Quae fuga incidunt voluptatem quia et accusantium dolores consectetur cum perspiciatis</div>
                                                            </div>
                                                            <div class='text-right'>
                                                                <small class='date text-muted'>
                                                                    <span class='timeago fade has-tooltip' data-placement='top' title='2016-10-21 01:36:50 +0200'>October 21, 2016 - 01:36</span>
                                                                    <i class='fa fa-clock-o'></i>
                                                                </small>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class='avatar pull-left'>
                                                                <div class='fa fa-user'></div>
                                                            </div>
                                                            <div class='body'>
                                                                <div class='name'><a class="text-contrast" href="#">Jordyn</a></div>
                                                                <div class='actions'>
                                                                    <a class="btn btn-link ok has-tooltip" title="Approve" href="#"><i class='fa fa-thumbs-up'></i>
                                                                    </a>
                                                                    <a class="btn btn-link remove has-tooltip" title="Remove" href="#"><i class='fa fa-thumbs-down'></i>
                                                                    </a>
                                                                </div>
                                                                <div class='text'>Saepe libero aut sapiente animi consequatur ea non maxime dignissimos omnis in voluptatem. Et nemo maiores mollitia impedit delectus reiciendis sed illo cumque</div>
                                                            </div>
                                                            <div class='text-right'>
                                                                <small class='date text-muted'>
                                                                    <span class='timeago fade has-tooltip' data-placement='top' title='2016-10-21 02:36:50 +0200'>October 21, 2016 - 02:36</span>
                                                                    <i class='fa fa-clock-o'></i>
                                                                </small>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class='avatar pull-left'>
                                                                <div class='fa fa-user'></div>
                                                            </div>
                                                            <div class='body'>
                                                                <div class='name'><a class="text-contrast" href="#">Cindy</a></div>
                                                                <div class='actions'>
                                                                    <a class="btn btn-link ok has-tooltip" title="Approve" href="#"><i class='fa fa-thumbs-up'></i>
                                                                    </a>
                                                                    <a class="btn btn-link remove has-tooltip" title="Remove" href="#"><i class='fa fa-thumbs-down'></i>
                                                                    </a>
                                                                </div>
                                                                <div class='text'>Quis veritatis corrupti laudantium aut dolorem deserunt voluptas maiores. Cum ut omnis dolor quis voluptatem quibusdam nihil accusamus sint et</div>
                                                            </div>
                                                            <div class='text-right'>
                                                                <small class='date text-muted'>
                                                                    <span class='timeago fade has-tooltip' data-placement='top' title='2016-10-21 03:36:50 +0200'>October 21, 2016 - 03:36</span>
                                                                    <i class='fa fa-clock-o'></i>
                                                                </small>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class='avatar pull-left'>
                                                                <div class='fa fa-user'></div>
                                                            </div>
                                                            <div class='body'>
                                                                <div class='name'><a class="text-contrast" href="#">Kerry</a></div>
                                                                <div class='actions'>
                                                                    <a class="btn btn-link ok has-tooltip" title="Approve" href="#"><i class='fa fa-thumbs-up'></i>
                                                                    </a>
                                                                    <a class="btn btn-link remove has-tooltip" title="Remove" href="#"><i class='fa fa-thumbs-down'></i>
                                                                    </a>
                                                                </div>
                                                                <div class='text'>Velit minima amet tempore necessitatibus aut delectus est ut. Quo odio sint in</div>
                                                            </div>
                                                            <div class='text-right'>
                                                                <small class='date text-muted'>
                                                                    <span class='timeago fade has-tooltip' data-placement='top' title='2016-10-21 04:36:50 +0200'>October 21, 2016 - 04:36</span>
                                                                    <i class='fa fa-clock-o'></i>
                                                                </small>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <div class='load-more'>
                                                        <a id="comments-more-activity" class="btn btn-block" data-loading-text="&lt;i class='fa fa-spinner fa-spin'&gt;&lt;/i&gt; Loading more..." href="#"><i class='fa fa-arrow-circle-down'></i>
                                                            Load more
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='group-header'>
                        <div class='row'>
                            <div class='col-sm-6 col-sm-offset-3'>
                                <div class='text-center'>
                                    <h2>Chat & Quick e-mail</h2>
                                    <small class='text-muted'>You can send some message in chat below!</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-sm-6'>
                            <div class='row'>
                                <div class='chat'>
                                    <div class='col-sm-12'>
                                        <div class='box'>
                                            <div class='box-header orange-background'>
                                                <div class='title'>
                                                    <i class='fa fa-comments-o'></i>
                                                    Chat
                                                </div>
                                                <div class='actions'>
                                                    <a class="btn box-remove btn-xs btn-link" href="#"><i class='fa fa-times'></i>
                                                    </a>
                                                    <a class="btn box-collapse btn-xs btn-link" href="#"><i></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class='box-content box-no-padding'>
                                                <div class='scrollable' data-scrollable-height='300' data-scrollable-start='bottom'>
                                                    <ul class='list-unstyled list-hover list-striped'>
                                                        <li class='message'>
                                                            <div class='avatar'>
                                                                <img alt='Avatar' height='23' src='assets/images/avatar.jpg' width='23'>
                                                            </div>
                                                            <div class='name-and-time'>
                                                                <div class='name pull-left'>
                                                                    <small>
                                                                        <a class="text-contrast" href="#">Staci</a>
                                                                    </small>
                                                                </div>
                                                                <div class='time pull-right'>
                                                                    <small class='date pull-right text-muted'>
                                                                        <span class='timeago fade has-tooltip' data-placement='top' title='2016-10-20 22:45:50 +0200'>October 20, 2016 - 22:45</span>
                                                                        <i class='fa fa-clock-o'></i>
                                                                    </small>
                                                                </div>
                                                            </div>
                                                            <div class='body'>
                                                                Tempore debitis rerum voluptatum repellat esse et est saepe sunt
                                                            </div>
                                                        </li>
                                                        <li class='message'>
                                                            <div class='avatar'>
                                                                <img alt='Avatar' height='23' src='assets/images/avatar.jpg' width='23'>
                                                            </div>
                                                            <div class='name-and-time'>
                                                                <div class='name pull-left'>
                                                                    <small>
                                                                        <a class="text-contrast" href="#">Staci</a>
                                                                    </small>
                                                                </div>
                                                                <div class='time pull-right'>
                                                                    <small class='date pull-right text-muted'>
                                                                        <span class='timeago fade has-tooltip' data-placement='top' title='2016-10-20 22:44:50 +0200'>October 20, 2016 - 22:44</span>
                                                                        <i class='fa fa-clock-o'></i>
                                                                    </small>
                                                                </div>
                                                            </div>
                                                            <div class='body'>
                                                                Doloremque ducimus mollitia et adipisci
                                                            </div>
                                                        </li>
                                                        <li class='message'>
                                                            <div class='avatar'>
                                                                <img alt='Avatar' height='23' src='assets/images/avatar.jpg' width='23'>
                                                            </div>
                                                            <div class='name-and-time'>
                                                                <div class='name pull-left'>
                                                                    <small>
                                                                        <a class="text-contrast" href="#">Staci</a>
                                                                    </small>
                                                                </div>
                                                                <div class='time pull-right'>
                                                                    <small class='date pull-right text-muted'>
                                                                        <span class='timeago fade has-tooltip' data-placement='top' title='2016-10-20 22:43:50 +0200'>October 20, 2016 - 22:43</span>
                                                                        <i class='fa fa-clock-o'></i>
                                                                    </small>
                                                                </div>
                                                            </div>
                                                            <div class='body'>
                                                                Error velit excepturi in ut et quo eos molestiae voluptatem architecto sequi
                                                            </div>
                                                        </li>
                                                        <li class='message'>
                                                            <div class='avatar'>
                                                                <img alt='Avatar' height='23' src='assets/images/avatar.jpg' width='23'>
                                                            </div>
                                                            <div class='name-and-time'>
                                                                <div class='name pull-left'>
                                                                    <small>
                                                                        <a class="text-contrast" href="#">Staci</a>
                                                                    </small>
                                                                </div>
                                                                <div class='time pull-right'>
                                                                    <small class='date pull-right text-muted'>
                                                                        <span class='timeago fade has-tooltip' data-placement='top' title='2016-10-20 22:42:50 +0200'>October 20, 2016 - 22:42</span>
                                                                        <i class='fa fa-clock-o'></i>
                                                                    </small>
                                                                </div>
                                                            </div>
                                                            <div class='body'>
                                                                Deleniti alias suscipit dolor hic non voluptas veniam laudantium est reiciendis hic inventore omnis omnis
                                                            </div>
                                                        </li>
                                                        <li class='message'>
                                                            <div class='avatar'>
                                                                <img alt='Avatar' height='23' src='assets/images/avatar.jpg' width='23'>
                                                            </div>
                                                            <div class='name-and-time'>
                                                                <div class='name pull-left'>
                                                                    <small>
                                                                        <a class="text-contrast" href="#">Staci</a>
                                                                    </small>
                                                                </div>
                                                                <div class='time pull-right'>
                                                                    <small class='date pull-right text-muted'>
                                                                        <span class='timeago fade has-tooltip' data-placement='top' title='2016-10-20 22:41:50 +0200'>October 20, 2016 - 22:41</span>
                                                                        <i class='fa fa-clock-o'></i>
                                                                    </small>
                                                                </div>
                                                            </div>
                                                            <div class='body'>
                                                                Eum consectetur earum voluptatem aliquid id
                                                            </div>
                                                        </li>
                                                        <li class='message'>
                                                            <div class='avatar'>
                                                                <img alt='Avatar' height='23' src='assets/images/avatar.jpg' width='23'>
                                                            </div>
                                                            <div class='name-and-time'>
                                                                <div class='name pull-left'>
                                                                    <small>
                                                                        <a class="text-contrast" href="#">Niall</a>
                                                                    </small>
                                                                </div>
                                                                <div class='time pull-right'>
                                                                    <small class='date pull-right text-muted'>
                                                                        <span class='timeago fade has-tooltip' data-placement='top' title='2016-10-20 22:40:50 +0200'>October 20, 2016 - 22:40</span>
                                                                        <i class='fa fa-clock-o'></i>
                                                                    </small>
                                                                </div>
                                                            </div>
                                                            <div class='body'>
                                                                Et asperiores voluptate velit et deserunt maxime repellendus nihil dolorem repudiandae itaque at
                                                            </div>
                                                        </li>
                                                        <li class='message'>
                                                            <div class='avatar'>
                                                                <img alt='Avatar' height='23' src='assets/images/avatar.jpg' width='23'>
                                                            </div>
                                                            <div class='name-and-time'>
                                                                <div class='name pull-left'>
                                                                    <small>
                                                                        <a class="text-contrast" href="#">Staci</a>
                                                                    </small>
                                                                </div>
                                                                <div class='time pull-right'>
                                                                    <small class='date pull-right text-muted'>
                                                                        <span class='timeago fade has-tooltip' data-placement='top' title='2016-10-20 22:39:50 +0200'>October 20, 2016 - 22:39</span>
                                                                        <i class='fa fa-clock-o'></i>
                                                                    </small>
                                                                </div>
                                                            </div>
                                                            <div class='body'>
                                                                Ut non occaecati voluptatum debitis cumque hic facere sapiente architecto cum vitae molestiae alias
                                                            </div>
                                                        </li>
                                                        <li class='message'>
                                                            <div class='avatar'>
                                                                <img alt='Avatar' height='23' src='assets/images/avatar.jpg' width='23'>
                                                            </div>
                                                            <div class='name-and-time'>
                                                                <div class='name pull-left'>
                                                                    <small>
                                                                        <a class="text-contrast" href="#">Staci</a>
                                                                    </small>
                                                                </div>
                                                                <div class='time pull-right'>
                                                                    <small class='date pull-right text-muted'>
                                                                        <span class='timeago fade has-tooltip' data-placement='top' title='2016-10-20 22:38:50 +0200'>October 20, 2016 - 22:38</span>
                                                                        <i class='fa fa-clock-o'></i>
                                                                    </small>
                                                                </div>
                                                            </div>
                                                            <div class='body'>
                                                                Ut et quaerat quia quia ipsum reiciendis
                                                            </div>
                                                        </li>
                                                        <li class='message'>
                                                            <div class='avatar'>
                                                                <img alt='Avatar' height='23' src='assets/images/avatar.jpg' width='23'>
                                                            </div>
                                                            <div class='name-and-time'>
                                                                <div class='name pull-left'>
                                                                    <small>
                                                                        <a class="text-contrast" href="#">Staci</a>
                                                                    </small>
                                                                </div>
                                                                <div class='time pull-right'>
                                                                    <small class='date pull-right text-muted'>
                                                                        <span class='timeago fade has-tooltip' data-placement='top' title='2016-10-20 22:37:50 +0200'>October 20, 2016 - 22:37</span>
                                                                        <i class='fa fa-clock-o'></i>
                                                                    </small>
                                                                </div>
                                                            </div>
                                                            <div class='body'>
                                                                Et assumenda minus laudantium qui
                                                            </div>
                                                        </li>
                                                        <li class='message'>
                                                            <div class='avatar'>
                                                                <img alt='Avatar' height='23' src='assets/images/avatar.jpg' width='23'>
                                                            </div>
                                                            <div class='name-and-time'>
                                                                <div class='name pull-left'>
                                                                    <small>
                                                                        <a class="text-contrast" href="#">Niall</a>
                                                                    </small>
                                                                </div>
                                                                <div class='time pull-right'>
                                                                    <small class='date pull-right text-muted'>
                                                                        <span class='timeago fade has-tooltip' data-placement='top' title='2016-10-20 22:36:50 +0200'>October 20, 2016 - 22:36</span>
                                                                        <i class='fa fa-clock-o'></i>
                                                                    </small>
                                                                </div>
                                                            </div>
                                                            <div class='body'>
                                                                Sunt vel id molestias hic iusto optio
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <form action="#" accept-charset="UTF-8" class="new-message" method="post"><input autocomplete='off' class='form-control' id='message_body' name='message[body]' placeholder='Type your message here...' type='text'>
                                                    <button class='btn btn-success' type='submit'>
                                                        <i class='fa fa-plus'></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='col-sm-6'>
                            <div class='row'>
                                <div class='col-sm-12'>
                                    <div class='box'>
                                        <div class='box-header blue-background'>
                                            <div class='title'>
                                                <div class='fa fa-envelope-o'></div>
                                                Quick e-mail
                                            </div>
                                            <div class='actions'>
                                                <a class="btn box-remove btn-xs btn-link" href="#"><i class='fa fa-times'></i>
                                                </a>
                                                <a class="btn box-collapse btn-xs btn-link" href="#"><i></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class='box-content'>
                                            <div class='form-group'>
                                                <input type="text" name="email" value="" placeholder="E-mail" class="form-control" />
                                            </div>
                                            <div class='form-group'>
                                                <div id='wysiwyg2-toolbar' style='display: none;'>
                                                    <div class='row form-group'>
                                                        <div class='col-sm-12'>
                                                            <div class='btn-group'>
                                                                <a class='btn' data-wysihtml-command='bold'>
                                                                    <i class='fa fa-bold'></i>
                                                                </a>
                                                                <a class='btn' data-wysihtml-command='italic'>
                                                                    <i class='fa fa-italic'></i>
                                                                </a>
                                                            </div>
                                                            <div class='btn-group'>
                                                                <a class='btn' data-wysihtml-command-value='red' data-wysihtml-command='foreColor'>
                                                                    <i class='fa fa-square' style='color: red;'></i>
                                                                </a>
                                                                <a class='btn' data-wysihtml-command-value='green' data-wysihtml-command='foreColor'>
                                                                    <i class='fa fa-square' style='color: green;'></i>
                                                                </a>
                                                                <a class='btn' data-wysihtml-command-value='blue' data-wysihtml-command='foreColor'>
                                                                    <i class='fa fa-square' style='color: blue;'></i>
                                                                </a>
                                                            </div>
                                                            <span style='position:relative;'>
                                    <a class='btn' data-wysihtml-command='createLink'>
                                      <i class='fa fa-link'></i>
                                      Link
                                    </a>
                                    <div data-wysihtml-dialog='createLink' style='display: none; position: absolute; left: 0px; top: 30px; width: 300px;'>
                                      <div class='box'>
                                        <div class='box-content'>
                                          <div class='input-group'>
                                            <input class='form-control' data-wysihtml-dialog-field='href' value='http://'>
                                            <div class='input-group-btn'>
                                              <a class='btn btn-success' data-wysihtml-dialog-action='save'>OK</a>
                                              <a class='btn btn-link' data-wysihtml-dialog-action='cancel'>Cancel</a>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <textarea class='form-control' id='wysiwyg2' rows='10'><h1>Hello from Flatty!</h1>
                            This fully
                            <strong>customisable</strong>
                            editor is simply
                            <i>awesome!</i></textarea>
                                            </div>
                                            <div class='text-right'>
                                                <a class="btn btn-primary" href="#">Send</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='group-header'>
                        <div class='row'>
                            <div class='col-sm-6 col-sm-offset-3'>
                                <div class='text-center'>
                                    <h2>Calendar & Tasks</h2>
                                    <small class='text-muted'>Events in calendar can be dragged from day to another day, or you can extend event on more days!</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-sm-6'>
                            <div class='row'>
                                <div class='col-sm-12'>
                                    <div class='box box-bordered purple-border'>
                                        <div class='box-header purple-background'>
                                            <div class='title'>
                                                <i class='fa fa-calendar'></i>
                                                Calendar
                                            </div>
                                        </div>
                                        <div class='box-content'>
                                            <div class='full-calendar-demo'></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='col-sm-6'>
                            <div class='row'>
                                <div class='col-sm-12'>
                                    <div class='box'>
                                        <div class='box-header green-background'>
                                            <div class='title'>
                                                <div class='fa fa-tasks'></div>
                                                Tasks
                                            </div>
                                            <div class='actions'>
                                                <a class="btn box-remove btn-xs btn-link" href="#"><i class='fa fa-times'></i>
                                                </a>
                                                <a class="btn box-collapse btn-xs btn-link" href="#"><i></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class='box-content'>
                                            <ul class='list-unstyled tasks'>
                                                <li>
                                                    <div class='task'>
                                <span class='pull-left'>
                                  <a href='#'>Cras sed tellus velit</a>
                                </span>
                                                        <small class='pull-right'>40%</small>
                                                    </div>
                                                    <div class='progress progress-small'>
                                                        <div class='progress-bar' style='width: 40%'></div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class='task'>
                                <span class='pull-left'>
                                  <a href='#'>Quis posuere tortor - maecenas in risus</a>
                                </span>
                                                        <small class='pull-right'>80%</small>
                                                    </div>
                                                    <div class='progress progress-small'>
                                                        <div class='progress-bar progress-bar-danger' style='width: 80%'></div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class='task'>
                                <span class='pull-left'>
                                  <a href='#'>Donec sodales justo in lacus sagittis</a>
                                </span>
                                                        <small class='pull-right'>58%</small>
                                                    </div>
                                                    <div class='progress progress-small'>
                                                        <div class='progress-bar-success progress-bar' style='width: 68%'></div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class='task'>
                                <span class='pull-left'>
                                  <a href='#'>Etiam condimentum sem nec</a>
                                </span>
                                                        <small class='pull-right'>100%</small>
                                                    </div>
                                                    <div class='progress progress-small'>
                                                        <div class='progress-bar progress-bar-warning' style='width: 100%'></div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class='task'>
                                <span class='pull-left'>
                                  <a href='#'>Etiam condimentum sem nec</a>
                                </span>
                                                        <small class='pull-right'>24%</small>
                                                    </div>
                                                    <div class='progress progress-small'>
                                                        <div class='progress-bar progress-bar-info' style='width: 24%'></div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class='task'>
                                <span class='pull-left'>
                                  <a href='#'>Id mi placerat</a>
                                </span>
                                                        <small class='pull-right'>10%</small>
                                                    </div>
                                                    <div class='progress progress-small'>
                                                        <div class='progress-bar progress-bar-success' style='width: 10%'></div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer id='footer'>
                <div class='footer-wrapper'>
                    <div class='row'>
                        <div class='col-sm-6 text'>
                            Copyright © 2016 Your Project Name
                        </div>
                        <div class='col-sm-6 buttons'>
                            <a class="btn btn-link" href="http://flatty-v2-4-1.bublinastudio.com/">Preview</a>
                            <a class="btn btn-link" href="https://wrapbootstrap.com/theme/flatty-flat-administration-template-WB0P6NR1N?ref=metheus">Purchase</a>
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

</body>
</html>
