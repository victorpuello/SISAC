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
          <h2 class="card-title">Crear Logro</h2>
        </header>
    <div class="card-body">
        <?php echo $__env->make('docente.logros.partials.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo Form::open(['route' => 'docente.logros.store', 'method' => 'post','class' => 'form-horizontal form-bordered', 'id' => 'form-create']); ?>

            <?php echo $__env->make('docente.logros.partials.fieldsCreate', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <footer class="card-footer">
            <div class="row">
                    <div class="col-lg-8">
                        <div class="form-group radio">
                            <label for="" class="checkbox-inline">
                                Deseas crear el Logro para los demás indicadores
                                <?php echo Form::radios('multiple', ['0' => 'Si', '1' => 'No']); ?>

                            </label>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <button type="submit" class="mb-1 mt-1 mr-1 btn btn-lg btn-primary editAsignatura">Guardar</button>
                    </div>
                    <div class="col-lg-2">
                        <a href="<?php echo e(route('docente.logros.index')); ?>" class="mb-1 mt-1 mr-1 btn btn-lg btn-default">Cancelar</a>
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