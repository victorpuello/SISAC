<!doctype html>
<html class="fixed sidebar-left-collapsed">
    <head>

        <!-- Basic -->
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('titulo') - ATS</title>
        <meta name="keywords" content="Inelmu Institución Educativa Las Mujeres" />
        <meta name="description" content="Sitio Web Institución Educativa Las Mujeres">
        <meta name="author" content="Victor Puello">

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <!-- Web Fonts  -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

        <!-- Vendor CSS -->
        <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.css')}}"/>
        <link rel="stylesheet" href="{{asset('vendor/animate/animate.css')}}">

        <link rel="stylesheet" href="{{asset('vendor/font-awesome/css/fontawesome-all.min.css')}}"/>
        <link rel="stylesheet" href="{{asset('vendor/magnific-popup/magnific-popup.css')}}" />
        <link rel="stylesheet" href="{{asset('vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css')}}" />

        <!-- Specific Page Vendor CSS -->
        @yield('styles')
        <link rel="stylesheet" href="{{asset('vendor/pnotify/pnotify.custom.css')}}" />
        <!-- Theme CSS -->
        <link rel="stylesheet" href="{{asset('css/theme.css')}}" />

        <!-- Skin CSS -->
        <link rel="stylesheet" href="{{asset('css/skins/default.css')}}" />
        <!-- Theme Custom CSS -->
        <link rel="stylesheet" href="{{asset('css/custom.css')}}">

        <!-- Head Libs -->
        <script src="{{asset('vendor/modernizr/modernizr.js')}}"></script>

    </head>
    <body class="loading-overlay-showing "  data-loading-overlay>
    <div class="loading-overlay">
        <div class="bounce-loader">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
        <section class="body">

            <!-- start: header -->
            <header class="header">
                @include('partials.header')
                <!-- end: search & user box -->
            </header>
            <!-- end: header -->

            <div class="inner-wrapper">
                <!-- start: sidebar -->
                <aside id="sidebar-left" class="sidebar-left">

                    <div class="sidebar-header">
                        <div class="sidebar-title">
                           Navegación
                        </div>
                        <div class="sidebar-toggle d-none d-md-block" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
                            <i class="fas fa-bars" aria-label="Toggle sidebar"></i>
                        </div>
                    </div>

                    <div class="nano">
                        <div class="nano-content">
                            <nav id="menu" class="nav-main" role="navigation">
                                @admin
                                    @include('partials.menuLateral')
                                @endadmin
                                @docente
                                    @include('partials.menuLateralDocentes')
                                @enddocente
                                @secretaria
                                    @include('partials.menuLateralSecretaria')
                                @endsecretaria
                            </nav>
                        </div>
                        <script>
                            // Maintain Scroll Position
                            if (typeof localStorage !== 'undefined') {
                                if (localStorage.getItem('sidebar-left-position') !== null) {
                                    var initialPosition = localStorage.getItem('sidebar-left-position'),
                                        sidebarLeft = document.querySelector('#sidebar-left .nano-content');
                                    sidebarLeft.scrollTop = initialPosition;
                                }
                            }
                        </script>
                    </div>
                </aside>
                <!-- end: sidebar -->

                <section role="main" class="content-body">
                    <header class="page-header">
                        <h2>@yield('namePage')</h2>

                        <div class="right-wrapper text-right">
                            <ol class="breadcrumbs">
                                @include('partials.breadcrumbs')
                            </ol>
                            <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
                        </div>
                    </header>
                    <!-- start: page -->
                        @yield('content')

                    <!-- end: page -->
                </section>
            </div>
            <aside id="sidebar-right" class="sidebar-right">
                <div class="nano">
                    <div class="nano-content">
                        <a href="#" class="mobile-close d-md-none">
                            Collapse <i class="fas fa-chevron-right"></i>
                        </a>

                        <div class="sidebar-right-wrapper">

                            <div class="sidebar-widget widget-calendar">
                                <h6>Proximas Tareas</h6>
                                @include('partials.task')
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
        </section>
        <!-- Variables JS-->
        @include ('footer')
        <!-- End Variables JS -->
        <!-- Vendor -->
        <script src="{{asset('vendor/jquery/jquery.js')}}"></script>
        <script src="{{asset('vendor/jquery-browser-mobile/jquery.browser.mobile.js')}}"></script>
        <script src="{{asset('vendor/popper/umd/popper.min.js')}}"></script>
        <script src="{{asset('vendor/bootstrap/js/bootstrap.js')}}"></script>
        <script src="{{asset('vendor/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
        <script src="{{asset('vendor/common/common.js')}}"></script>
        <script src="{{asset('vendor/nanoscroller/nanoscroller.js')}}"></script>
        <script src="{{asset('vendor/magnific-popup/jquery.magnific-popup.js')}}"></script>
        <script src="{{asset('vendor/jquery-placeholder/jquery-placeholder.js')}}"></script>
        <script src="{{asset('vendor/pnotify/pnotify.custom.js')}}"></script>
        @yield('script')
        <!-- Theme Base, Components and Settings -->
        <script src="{{asset('js/theme.js')}}"></script>
        <!-- Theme Initialization Files -->
        <script src="{{asset('js/theme.init.js')}}"></script>
        <!-- Specific Page Vendor -->
        @yield('scriptfin')
        <script src="{{asset('js/examples/examples.modals.js')}}"></script>
    </body>
</html>
