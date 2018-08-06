<?php $__env->startSection('titulo', "Logros"); ?>
<?php $__env->startSection('namePage', "Modulo: Académico"); ?>
<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('vendor/select2/css/select2.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/select2-bootstrap-theme/select2-bootstrap.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/datatables/media/css/dataTables.bootstrap4.css')); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="card">
        <header class="card-header ">
          <h2 class="card-title">Editar Logro: <?php echo e(substr($logro->code,0,3)); ?></h2>
        </header>
    <div class="card-body">
        <?php echo $__env->make('admin.logros.partials.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo Form::model($logro,['route' => ['docente.logros.update', $logro->id ],'method' => 'PUT','class' => 'form-horizontal form-bordered', 'id'=>'form-edit']); ?>

        <?php echo $__env->make('docente.logros.partials.fieldsCreate', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <footer class="card-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                    <button type="submit" class="btn btn-primary editAsignatura">Guardar</button>
                    <a href="<?php echo e(route('logros.index')); ?>" class="btn btn-default">Cancelar</a>
                </div>
            </div>
        </footer>
        <?php echo Form::close(); ?>

    </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('vendor/autosize/autosize.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/select2/js/select2.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/datatables/media/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/datatables/media/js/dataTables.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/logros.js')); ?>"></script>
    <script src="<?php echo e(asset('js/examples/examples.modals.js')); ?>"></script>
    <script src="<?php echo e(asset('js/examples/examples.datatables.editable.js')); ?>"></script>

    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>