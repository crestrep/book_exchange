<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if IE 9]>         <html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">

    <title>Book Exchange</title>

    <meta name="description" content="Plataforma para el intercambio de libros">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{ asset('img/favicon.png')  }}">
    <link rel="apple-touch-icon" href="img/icon57.png" sizes="57x57">
    <link rel="apple-touch-icon" href="img/icon72.png" sizes="72x72">
    <link rel="apple-touch-icon" href="img/icon76.png" sizes="76x76">
    <link rel="apple-touch-icon" href="img/icon114.png" sizes="114x114">
    <link rel="apple-touch-icon" href="img/icon120.png" sizes="120x120">
    <link rel="apple-touch-icon" href="img/icon144.png" sizes="144x144">
    <link rel="apple-touch-icon" href="img/icon152.png" sizes="152x152">
    <link rel="apple-touch-icon" href="img/icon180.png" sizes="180x180">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Bootstrap is included in its original form, unaltered -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')  }}">

    <!-- Related styles of various icon packs and plugins -->
    <link rel="stylesheet" href="{{ asset('css/plugins.css')  }}">

    <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
    <link rel="stylesheet" href="{{ asset('css/main.css')  }}">

    <!-- Include a specific file here from css/themes/ folder to alter the default theme of the template -->

    <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
    <link rel="stylesheet" href="{{ asset('css/themes.css')  }}">
    <!-- END Stylesheets -->

    <!-- Modernizr (browser feature detection library) & Respond.js (enables responsive CSS code on browsers that don't support it, eg IE8) -->
    <script src="{{ asset('js/vendor/modernizr-respond.min.js')  }}"></script>
</head>
<body>
<!-- Page Wrapper -->
<!-- In the PHP version you can set the following options from inc/config file -->
<!--
    Available classes:

    'page-loading'      enables page preloader
-->
<div id="page-wrapper">
    <!-- Preloader -->
    <!-- Preloader functionality (initialized in js/app.js) - pageLoading() -->
    <!-- Used only if page preloader is enabled from inc/config (PHP version) or the class 'page-loading' is added in #page-wrapper element (HTML version) -->
    <div class="preloader themed-background">
        <h1 class="push-top-bottom text-light text-center"><strong>Pro</strong>UI</h1>
        <div class="inner">
            <h3 class="text-light visible-lt-ie9 visible-lt-ie10"><strong>Loading..</strong></h3>
            <div class="preloader-spinner hidden-lt-ie9 hidden-lt-ie10"></div>
        </div>
    </div>
    <!-- END Preloader -->

    <!-- Page Container -->
    <!-- In the PHP version you can set the following options from inc/config file -->
    <!--
        Available #page-container classes:

        '' (None)                                       for a full main and alternative sidebar hidden by default (> 991px)

        'sidebar-visible-lg'                            for a full main sidebar visible by default (> 991px)
        'sidebar-partial'                               for a partial main sidebar which opens on mouse hover, hidden by default (> 991px)
        'sidebar-partial sidebar-visible-lg'            for a partial main sidebar which opens on mouse hover, visible by default (> 991px)
        'sidebar-mini sidebar-visible-lg-mini'          for a mini main sidebar with a flyout menu, enabled by default (> 991px + Best with static layout)
        'sidebar-mini sidebar-visible-lg'               for a mini main sidebar with a flyout menu, disabled by default (> 991px + Best with static layout)

        'sidebar-alt-visible-lg'                        for a full alternative sidebar visible by default (> 991px)
        'sidebar-alt-partial'                           for a partial alternative sidebar which opens on mouse hover, hidden by default (> 991px)
        'sidebar-alt-partial sidebar-alt-visible-lg'    for a partial alternative sidebar which opens on mouse hover, visible by default (> 991px)

        'sidebar-partial sidebar-alt-partial'           for both sidebars partial which open on mouse hover, hidden by default (> 991px)

        'sidebar-no-animations'                         add this as extra for disabling sidebar animations on large screens (> 991px) - Better performance with heavy pages!

        'style-alt'                                     for an alternative main style (without it: the default style)
        'footer-fixed'                                  for a fixed footer (without it: a static footer)

        'disable-menu-autoscroll'                       add this to disable the main menu auto scrolling when opening a submenu

        'header-fixed-top'                              has to be added only if the class 'navbar-fixed-top' was added on header.navbar
        'header-fixed-bottom'                           has to be added only if the class 'navbar-fixed-bottom' was added on header.navbar

        'enable-cookies'                                enables cookies for remembering active color theme when changed from the sidebar links
    -->
    <div id="page-container" class="sidebar-partial sidebar-visible-lg sidebar-no-animations">

        <!-- Main Sidebar -->
        <div id="sidebar">
            <!-- Wrapper for scrolling functionality -->
            <div id="sidebar-scroll">
                <!-- Sidebar Content -->
                <div class="sidebar-content">
                    <!-- Brand -->
                    <a href="{{ route('app.index')  }}" class="sidebar-brand">
                        <i class="gi gi-book"></i><span class="sidebar-nav-mini-hide"><strong>Book</strong>Exchange</span>
                    </a>
                    <!-- END Brand -->

                    <!-- User Info -->
                    <div class="sidebar-section sidebar-user clearfix sidebar-nav-mini-hide">
                        <div class="sidebar-user-avatar">
                            <a href="javascript:void(0)">
                                <img src="{{ asset('img/placeholders/avatars/avatar2.jpg')  }}" alt="avatar">
                            </a>
                        </div>
                        <div class="sidebar-user-name">{{ Auth::user()->name  }}</div>
                        <div class="sidebar-user-links">
                            <a href="javascript:void(0)" data-toggle="tooltip" data-placement="bottom" title="Profile"><i class="gi gi-user"></i></a>
                            <a href="javascript:void(0)" data-toggle="tooltip" data-placement="bottom" title="Messages"><i class="gi gi-envelope"></i></a>
                            <!-- Opens the user settings modal that can be found at the bottom of each page (page_footer.html in PHP version) -->
                            <a href="javascript:void(0)" class="enable-tooltip" data-placement="bottom" title="Settings" onclick="$('#modal-user-settings').modal('show');"><i class="gi gi-cogwheel"></i></a>
                            <a href="{{ url('/logout') }}" data-toggle="tooltip" data-placement="bottom" title="Logout"><i class="gi gi-exit"></i></a>
                        </div>
                    </div>
                    <!-- END User Info -->

                    <!-- Sidebar Navigation -->
                    <ul class="sidebar-nav">
                        <?php
                        $active = '';
                        $menus = [
                                '',
                                'app.index',
                                'app.books.index',
                                'app.books.create',
                                'app.books.edit',
                        ];
                        if(in_array(Request::route()->getName(), $menus))
                            $active = 'active';
                        ?>
                        <li>
                            <a href="{{ route('app.index')  }}" {{ $active  }}><i class="gi gi-stopwatch sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Inicio</span></a>
                        </li>
                        <li>
                            <a href="{{ route('app.books.index')  }}" {{ $active  }}><i class="gi gi-charts sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Mis Libros</span></a>
                        </li>
                        <li>
                            <a href="{{ route('app.exchange.listado')  }}"><i class="gi gi-share_alt sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Seguimiento</span></a>
                        </li>
                        <li>
                            <a href="{{ route('app.exchange.index')  }}"><i class="hi hi-transfer sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Pedir Libros</span></a>
                        </li>
                    </ul>
                    <!-- END Sidebar Navigation -->
                </div>
                <!-- END Sidebar Content -->
            </div>
            <!-- END Wrapper for scrolling functionality -->
        </div>
        <!-- END Main Sidebar -->

        <!-- Main Container -->
        <div id="main-container">

            <!-- Page content -->
            <div id="page-content">

                @yield('contenido')

            </div>
            <!-- END Page Content -->

            <!-- Footer -->
            <footer class="clearfix">
                <div class="pull-right">
                    Diseñado por <i class="fa fa-heart text-danger"></i> por <a href="#">Matias Valdes</a>
                </div>
                <div class="pull-left">
                    <span id="year-copy"></span> &copy; <a href="http://goo.gl/TDOSuC" target="_blank">ProUI 3.5</a>
                </div>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- END Main Container -->
    </div>
    <!-- END Page Container -->
</div>
<!-- END Page Wrapper -->

<!-- Scroll to top link, initialized in js/app.js - scrollToTop() -->
<a href="#" id="to-top"><i class="fa fa-angle-double-up"></i></a>

<!-- User Settings, modal which opens from Settings link (found in top right user menu) and the Cog link (found in sidebar user info) -->
<div id="modal-user-settings" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-center">
                <h2 class="modal-title"><i class="fa fa-pencil"></i> Configuracion</h2>
            </div>
            <!-- END Modal Header -->

            <!-- Modal Body -->
            <div class="modal-body">
                <form action="index.html" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" onsubmit="return false;">
                    <fieldset>
                        <legend>Informacion personal</legend>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Nombre</label>
                            <div class="col-md-8">
                                <p class="form-control-static">{{ Auth::user()->name  }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="user-settings-email">Email</label>
                            <div class="col-md-8">
                                <input type="email" id="user-settings-email" name="user-settings-email" class="form-control" value="{{ Auth::user()->email  }}">
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Cambiar Contraseña</legend>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="user-settings-password">Nueva Contraseña</label>
                            <div class="col-md-8">
                                <input type="password" id="user-settings-password" name="user-settings-password" class="form-control" placeholder="Please choose a complex one..">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="user-settings-repassword">Confirmar Nueva Contraseña</label>
                            <div class="col-md-8">
                                <input type="password" id="user-settings-repassword" name="user-settings-repassword" class="form-control" placeholder="..and confirm it!">
                            </div>
                        </div>
                    </fieldset>
                    <div class="form-group form-actions">
                        <div class="col-xs-12 text-right">
                            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-sm btn-primary">Guardar Cambios</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- END Modal Body -->
        </div>
    </div>
</div>
<!-- END User Settings -->

<!-- Remember to include excanvas for IE8 chart support -->
<!--[if IE 8]><script src="{{ asset('js/helpers/excanvas.min.js') }}"></script><![endif]-->

<!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
<script src="{{ asset('js/vendor/jquery-1.12.0.min.js')  }}"></script>
<script src="{{ asset('js/vendor/bootstrap.min.js')  }}"></script>
<script src="{{ asset('js/plugins.js') }}"></script>
<script src="{{ asset('js/app.js')  }}"></script>

@if (Session::has('flash_notification.message'))
    <script>
        $.bootstrapGrowl('{{ Session::get('flash_notification.message') }}', {
            type: '{{ Session::get('flash_notification.level') }}',
            delay: 5000,
            allow_dismiss: true
        });
    </script>
@endif
@yield('loadjs')
</body>
</html>
