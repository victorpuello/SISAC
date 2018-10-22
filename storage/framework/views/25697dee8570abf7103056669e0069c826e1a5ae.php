<!doctype html>
<html class="fixed">
<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <meta name="keywords" content="Inelmu Institución Educativa Las Mujeres" />
    <meta name="description" content="Sitio Web Institución Educativa Las Mujeres">
    <meta name="author" content="Victor Puello">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('vendor/bootstrap/css/bootstrap.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/animate/animate.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('vendor/font-awesome/css/fontawesome-all.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/magnific-popup/magnific-popup.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css')); ?>" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('css/theme.css')); ?>" />

    <!-- Skin CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('css/skins/default.css')); ?>" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('css/custom.css')); ?>">

    <!-- Head Libs -->
    <script src="<?php echo e(asset('vendor/modernizr/modernizr.js')); ?>"></script>

</head>
<body>
<!-- start: page -->
<section class="body-error error-outside">
    <div class="center-error">

        <div class="row">
            <div class="col-md-8">
                <div class="main-error mb-3">
                    <h2 class="error-code text-dark text-center font-weight-semibold m-0">500 <i class="fas fa-file"></i></h2>
                    <p class="error-explanation text-center">Lo sentimos. Algo salió mal.</p>
                </div>
            </div>
            <div class="col-md-4">
                <h4 class="text">Aquí hay algunos enlaces útiles</h4>
                <ul class="nav nav-list flex-column primary">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('home')); ?>"><i class="fas fa-caret-right text-dark"></i> Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('indicadors.index')); ?>"><i class="fas fa-caret-right text-dark"></i> Logros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(URL::previous()); ?>"><i class="fas fa-caret-right text-dark"></i> Regresar</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- end: page -->

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

<!-- Theme Base, Components and Settings -->
<script src="<?php echo e(asset('js/theme.js')); ?>"></script>

<!-- Theme Custom -->
<script src="<?php echo e(asset('js/custom.js')); ?>"></script>

<!-- Theme Initialization Files -->
<script src="<?php echo e(asset('js/theme.init.js')); ?>"></script>

</body>
</html>
