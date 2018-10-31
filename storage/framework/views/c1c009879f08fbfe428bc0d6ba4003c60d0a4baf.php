<?php $__env->startSection('titulo'); ?>
    Bienvenido <?php echo e(Auth::user()->name); ?>

    <?php $__env->stopSection(); ?>
<?php $__env->startSection('namePage'); ?>
    Bienvenido
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('vendor/morris/morris.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/chartist/chartist.min.css')); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-lg-3">
            <section class="card card-featured-left card-featured-primary mb-4">
                <div class="card-body">
                    <div class="widget-summary">
                        <div class="widget-summary-col widget-summary-col-icon">
                            <div class="summary-icon bg-primary">
                                <i class="fas fa-user-graduate"  data-appear-animation="bounceIn" data-appear-animation-delay="0" data-appear-animation-duration="1s"></i>
                            </div>
                        </div>
                        <div class="widget-summary-col mt-3">
                            <div class="summary" style="min-height: 48px;">
                                <h4 class="title">Estudiantes</h4>
                                <div class="info">
                                    <strong class="timer amount count-title count-number" data-to="<?php echo e($Nestudiantes); ?>" data-speed="3500"></strong>
                                </div>
                            </div>
                            <div class="summary-footer">
                                <a href="<?php echo e(route('estudiantes.index')); ?>" class="text-muted text-uppercase">(Ver Todos)</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-lg-3">
            <section class=" card card-featured-left card-featured-secondary mb-4">
                <div class="card-body">
                    <div class="widget-summary">
                        <div class="widget-summary-col widget-summary-col-icon">
                            <div class="summary-icon bg-secondary">
                                <i class="fas fa-chalkboard-teacher" data-appear-animation="bounceIn" data-appear-animation-delay="0" data-appear-animation-duration="1s"></i>
                            </div>
                        </div>
                        <div class="widget-summary-col  mt-3">
                            <div class="summary" style="min-height: 48px;">
                                <h4 class="title">Docentes</h4>
                                <div class="info">
                                    <strong class="timer amount count-title count-number" data-to="<?php echo e($Ndocentes); ?>" data-speed="3500"></strong>
                                </div>
                            </div>
                            <div class="summary-footer">
                                <a href="<?php echo e(route('docentes.index')); ?>" class="text-muted text-uppercase">(Ver Todos)</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-lg-3">
            <section class=" card card-featured-left card-featured-tertiary mb-4">
                <div class="card-body">
                    <div class="widget-summary">
                        <div class="widget-summary-col widget-summary-col-icon">
                            <div class="summary-icon bg-tertiary">
                                <i class="fas fa-book-open" data-appear-animation="bounceIn" data-appear-animation-delay="0" data-appear-animation-duration="1s"></i>
                            </div>
                        </div>
                        <div class="widget-summary-col mt-3">
                            <div class="summary" style="min-height: 48px;">
                                <h4 class="title">Indicadores</h4>
                                <div class="info">
                                    <strong class="timer amount count-title count-number" data-to="<?php echo e($Nlogros); ?>" data-speed="3500"></strong>
                                </div>
                            </div>
                            <div class="summary-footer">
                                <a class="text-muted text-uppercase" href="<?php echo e(route('indicadors.index')); ?>">(Ver Todos)</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-lg-3">
            <section class=" card card-featured-left card-featured-quaternary mb-4">
                <div class="card-body">
                    <div class="widget-summary">
                        <div class="widget-summary-col widget-summary-col-icon">
                            <div class="summary-icon bg-quaternary">
                                <i class="fas fa-user" data-appear-animation="bounceIn" data-appear-animation-delay="0" data-appear-animation-duration="1s"></i>
                            </div>
                        </div>
                        <div class="widget-summary-col mt-3">
                            <div class="summary" style="min-height: 48px;">
                                <h4 class="title">Usuarios</h4>
                                <div class="info">
                                    <strong class="timer amount count-title count-number" data-to="<?php echo e($Nusers); ?>" data-speed="3500"></strong>
                                </div>
                            </div>
                            <div class="summary-footer">
                                <a href="<?php echo e(route('users.index')); ?>" class="text-muted text-uppercase">(Ver Todos)</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('vendor/jquery-appear/jquery-appear.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/flot/jquery.flot.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/flot.tooltip/flot.tooltip.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/flot/jquery.flot.pie.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/flot/jquery.flot.categories.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/flot/jquery.flot.resize.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/jquery-sparkline/jquery-sparkline.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/raphael/raphael.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/morris/morris.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/gauge/gauge.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/snap.svg/snap.svg.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/liquid-meter/liquid.meter.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/chartist/chartist.js')); ?>"></script>
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('scriptfin'); ?>
    <script src="<?php echo e(asset('js/count.js')); ?>"></script>
    <script src="<?php echo e(asset('js/examples/examples.charts.js')); ?>"></script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>