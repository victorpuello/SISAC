<?php $__env->startSection('titulo', "Planillas"); ?>
<?php $__env->startSection('namePage', "Modulo: Académico - Planillas"); ?>
<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('vendor/select2/css/select2.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/select2-bootstrap-theme/select2-bootstrap.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/datatables/media/css/dataTables.bootstrap4.css')); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="card">
        <header class="card-header bg-primary ">
            <h2 class="card-title text-color-light"><strong><?php echo e(count($asignaciones)); ?></strong> - Planillas disponibles para calificar - <strong>Lic. <?php echo e($asignaciones->first()->docente->name); ?></strong></h2>
        </header>
        <div class="row">
            <?php $__currentLoopData = $asignaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asignacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-2 mt-2 mb-2">
                    <section class="card">
                        <header class="card-header bg-<?php echo e(Config::get('institucion.fondos.2')); ?>">
                            <div class="card-header-profile-picture">
                                <img src="<?php echo e(url('/img')); ?>/<?php echo e($asignacion->grupo->grado->numero); ?>.jpg">
                            </div>
                        </header>
                        <div class="card-body p-2">
                            <ul class="pl-3">
                                <li><span><strong>Asignatura: </strong><?php echo e($asignacion->asignatura->name); ?></span></li>
                                <li><span><strong>Grupo: </strong><?php echo e($asignacion->grupo->name); ?></span></li>
                            </ul>
                            <hr class="solid short">
                            <div class="row">
                                <div class="col-lg-3 offset-3 d-block">
                                    <a href="#" class="btn btn-sm btn-info center" ><i class="fas fa-pencil-alt mr-1"></i>Calificar</a>
                                </div>
                            </div>
                            <div class="row mt-1">
                                    <?php echo Form::open(); ?>

                                        <div class="col-sm-7 col-lg-6 col-xl-6  switch switch-sm switch-primary">
                                            <?php echo Form::checkbox('modificada',null,false,['class'=>'form-comtrol','data-plugin-ios-switch']); ?>

                                        </div>
                                    <?php echo Form::close(); ?>

                            </div>
                        </div>
                    </section>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('vendor/autosize/autosize.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/select2/js/select2.js')); ?>"></script>
    <script src="<?php echo e(asset('js/examples/examples.modals.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/ios7-switch/ios7-switch.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>