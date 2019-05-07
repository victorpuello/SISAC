<!doctype html>
<html class="fixed sidebar-left-collapsed">
    <head>

        <!-- Basic -->
        <meta charset="UTF-8">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <title><?php echo $__env->yieldContent('titulo'); ?> - ATS</title>
        <meta name="keywords" content="Inelmu Institución Educativa Las Mujeres" />
        <meta name="description" content="Sitio Web Institución Educativa Las Mujeres">
        <meta name="author" content="Victor Puello">

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <!-- Web Fonts  -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

        <!-- Vendor CSS -->
        <link rel="stylesheet" href="<?php echo e(asset('vendor/bootstrap/css/bootstrap.css')); ?>"/>
        <link rel="stylesheet" href="<?php echo e(asset('vendor/animate/animate.css')); ?>">

        <link rel="stylesheet" href="<?php echo e(asset('vendor/font-awesome/css/fontawesome-all.min.css')); ?>"/>
        <link rel="stylesheet" href="<?php echo e(asset('vendor/magnific-popup/magnific-popup.css')); ?>" />
        <link rel="stylesheet" href="<?php echo e(asset('vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css')); ?>" />

        <!-- Specific Page Vendor CSS -->
        <?php echo $__env->yieldContent('styles'); ?>
        <link rel="stylesheet" href="<?php echo e(asset('vendor/pnotify/pnotify.custom.css')); ?>" />
        <!-- Theme CSS -->
        <link rel="stylesheet" href="<?php echo e(asset('css/theme.css')); ?>" />

        <!-- Skin CSS -->
        <link rel="stylesheet" href="<?php echo e(asset('css/skins/default.css')); ?>" />
        <!-- Theme Custom CSS -->
        <link rel="stylesheet" href="<?php echo e(asset('css/custom.css')); ?>">

        <!-- Head Libs -->
        <script src="<?php echo e(asset('vendor/modernizr/modernizr.js')); ?>"></script>

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
                <?php echo $__env->make('partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
                                <?php if (\Illuminate\Support\Facades\Blade::check('admin')): ?>
                                    <?php echo $__env->make('partials.menuLateral', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                <?php endif; ?>
                                <?php if (\Illuminate\Support\Facades\Blade::check('docente')): ?>
                                    <?php echo $__env->make('partials.menuLateralDocentes', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                <?php endif; ?>
                                <?php if (\Illuminate\Support\Facades\Blade::check('secretaria')): ?>
                                    <?php echo $__env->make('partials.menuLateralSecretaria', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                <?php endif; ?>
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
                        <h2><?php echo $__env->yieldContent('namePage'); ?></h2>

                        <div class="right-wrapper text-right">
                            <ol class="breadcrumbs">
                                <?php echo $__env->make('partials.breadcrumbs', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            </ol>
                            <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
                        </div>
                    </header>
                    <!-- start: page -->
                        <?php echo $__env->yieldContent('content'); ?>

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
                                <?php echo $__env->make('partials.task', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
        </section>
        <!-- Variables JS-->
        <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!-- End Variables JS -->
        <!-- Vendor -->
        <script src="<?php echo e(asset('vendor/jquery/jquery.js')); ?>"></script>
        <script src="<?php echo e(asset('vendor/jquery-browser-mobile/jquery.browser.mobile.js')); ?>"></script>
        <script src="<?php echo e(asset('vendor/popper/umd/popper.min.js')); ?>"></script>
        <script src="<?php echo e(asset('vendor/bootstrap/js/bootstrap.js')); ?>"></script>
        <script src="<?php echo e(asset('vendor/bootstrap-datepicker/js/bootstrap-datepicker.js')); ?>"></script>
        <script src="<?php echo e(asset('vendor/common/common.js')); ?>"></script>
        <script src="<?php echo e(asset('vendor/nanoscroller/nanoscroller.js')); ?>"></script>
        <script src="<?php echo e(asset('vendor/magnific-popup/jquery.magnific-popup.js')); ?>"></script>
        <script src="<?php echo e(asset('vendor/jquery-placeholder/jquery-placeholder.js')); ?>"></script>
        <script src="<?php echo e(asset('vendor/pnotify/pnotify.custom.js')); ?>"></script>
        <?php echo $__env->yieldContent('script'); ?>
        <!-- Theme Base, Components and Settings -->
        <script src="<?php echo e(asset('js/theme.js')); ?>"></script>
        <!-- Theme Initialization Files -->
        <script src="<?php echo e(asset('js/theme.init.js')); ?>"></script>
        <!-- Specific Page Vendor -->
        <?php echo $__env->yieldContent('scriptfin'); ?>
        <script src="<?php echo e(asset('js/examples/examples.modals.js')); ?>"></script>
    </body>
</html>
