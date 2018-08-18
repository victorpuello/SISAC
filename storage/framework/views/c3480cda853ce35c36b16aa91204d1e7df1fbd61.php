<?php $__env->startSection('titulo', "Error 403"); ?>
<?php $__env->startSection('namePage', "Error 403 "); ?>
<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="body-error error-inside">
        <div class="center-error">

            <div class="row">
                <div class="col-lg-8">
                    <div class="main-error mb-3">
                        <h2 class="error-code text-dark text-center font-weight-semibold m-0">403 <i class="fas fa-file"></i></h2>
                        <p class="error-explanation text-center">Acceso no permitido</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <h4 class="text">Aquí hay algunos enlaces útiles</h4>
                    <ul class="nav nav-list flex-column primary">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('home')); ?>"><i class="fas fa-caret-right text-dark"></i> Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('docente.logros.index')); ?>"><i class="fas fa-caret-right text-dark"></i> Logros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(URL::previous()); ?>"><i class="fas fa-caret-right text-dark"></i> Regresar</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>