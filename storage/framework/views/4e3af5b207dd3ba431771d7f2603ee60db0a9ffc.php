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
            <h2 class="card-title text-color-light">Grupos disponibles para calificar</h2>
        </header>
            <div class="row">
            <?php $__currentLoopData = $salones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $salon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3 mt-2 mb-2">
                <section class="card">
                    <header class="card-header bg-<?php echo e($fondos[rand(0,3)]); ?>">
                        <div class="card-header-profile-picture">
                            <img src="<?php echo e(url('/img')); ?>/<?php echo e($salon->grade); ?>.jpg">
                        </div>
                    </header>
                    <div class="card-body">
                        <h4 class="font-weight-semibold mt-3"><?php echo e($salon->NameAula); ?></h4>
                        <hr class="solid short">
                        <div class="row">
                            <div class="col-lg-6">
                                <p class="mb-1"><a href="<?php echo e(route('notas.show',$salon->id)); ?>" class="edit"><i class="fas fa-check mr-1"></i>Calificar</a></p>
                            </div>
                            <div class="col-lg-6">
                                <p class="mb-1"><a href="#" class="deleted modal-basic" ><i class="fas fa-download mr-1"></i>Bajar planilla</a></p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php echo $__env->make('admin.notas.partials.modals', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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