<?php $__env->startSection('titulo', "Dirección de Grupo"); ?>
<?php $__env->startSection('namePage', "Modulo: Dirección "); ?>
<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('vendor/select2/css/select2.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/select2-bootstrap-theme/select2-bootstrap.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/datatables/media/css/dataTables.bootstrap4.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/pnotify/pnotify.custom.css')); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <?php $__currentLoopData = $estudiantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estudiante): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-4">
                <section class="card">
                    <header class="card-header <?php echo e($fondos[rand(0,3)]); ?>">
                        <div class="card-header-profile-picture">
                            <img src="<?php echo e(url('/imgUsers/')); ?>/<?php echo e($estudiante->path); ?>">
                        </div>
                    </header>
                    <div class="card-body">
                        <h4 class="font-weight-semibold mt-3"><?php echo e($estudiante->apellido_name); ?></h4>
                        <hr class="solid short">
                        <div class="row">
                            <div class="col-lg-6">
                                <p class="mb-1">
                                    <a class=" simple-ajax-modal" href="<?php echo e(route('docente.direccion.getacudiente',$estudiante)); ?>">
                                        <i class="fas fa-user-tie mr-1"></i>Acudiente
                                    </a>
                                </p>
                                <p class="mb-1">
                                    <a class=" simple-ajax-modal" href="<?php echo e(route('docente.direccion.getmatricula',$estudiante)); ?>">
                                        <i class="fas fa-clipboard-check mr-1"></i>Matricula
                                    </a>
                                </p>
                            </div>
                            <div class="col-lg-6">
                                <p class="mb-1"><a href="#"><i class="fas fa-list-alt mr-1"></i>Notas</a></p>
                                <p class="mb-1"><a href="#"><i class="fas fa-eye mr-1"></i>Observador</a></p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php echo $__env->make('docente.direccion-de-grupo.partials.modals', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('vendor/select2/js/select2.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/datatables/media/js/dataTables.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/examples/examples.modals.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/pnotify/pnotify.custom.js"')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>