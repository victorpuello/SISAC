<?php $__env->startSection('titulo', "Calificar"); ?>
<?php $__env->startSection('namePage', "Modulo: Académico - Calificar"); ?>
<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('vendor/select2/css/select2.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/select2-bootstrap-theme/select2-bootstrap.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/datatables/media/css/dataTables.bootstrap4.css')); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="card">
        <header class="card-header bg-primary ">
            <h2 class="card-title text-color-light">Planillas disponibles para calificar</h2>
        </header>
            <div class="row">
            <?php $__currentLoopData = $asignaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asignacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3 mt-2 mb-2">
                <section class="card">
                    <header class="card-header bg-<?php echo e($fondos[rand(0,3)]); ?>">
                        <div class="card-header-profile-picture">
                            <img src="<?php echo e(url('/img')); ?>/<?php echo e($asignacion->salon->grade); ?>.jpg">
                        </div>
                    </header>
                    <div class="card-body">
                        <ul class="pl-3">
                            <li><span><strong>Asignatura: </strong><?php echo e($asignacion->asignatura->name); ?></span></li>
                            <li><span><strong>Grupo: </strong><?php echo e($asignacion->salon->full_name); ?></span></li>
                            <li><span><strong>Docente: </strong><?php echo e($asignacion->docente->name); ?></span></li>
                        </ul>

                        <hr class="solid short">
                        <div class="row">
                            <div class="col-lg-12">
                                <?php $__currentLoopData = $periodos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $periodo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <p class="mb-1"><a href="<?php echo e(route('notas.getplanilla',['planilla'=>$asignacion,'periodo'=>$periodo])); ?>" class="edit"><i class="fas fa-check mr-1"></i><?php echo e($periodo->name); ?></a></p>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div class="col-lg-12">
                                <p class="mb-1"><a href="#" class="modal-basic" ><i class="fas fa-download mr-1"></i>Bajar planilla</a></p>
                            </div>
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
    <script src="<?php echo e(asset('vendor/datatables/media/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/datatables/media/js/dataTables.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/examples/examples.modals.js')); ?>"></script>
    <script src="<?php echo e(asset('js/examples/examples.datatables.editable.js')); ?>"></script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>