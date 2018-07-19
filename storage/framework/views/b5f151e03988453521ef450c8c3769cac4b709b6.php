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
          <h2 class="card-title">Buscar Logros</h2>
        </header>
    <div class="card-body">
        <?php echo $__env->make('admin.logros.partials.fields', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <hr>
        <?php if(count($logros) > 0): ?>
            <?php echo $__env->make('admin.logros.partials.resultados', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php else: ?>
            <div class=".col-md-6 .offset-md-3">
                <h4 class="text-center">No hay resultados para la busqueda ...</h4>
            </div>
        <?php endif; ?>
    </div>
        <?php echo $__env->make('admin.logros.partials.modals', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('vendor/autosize/autosize.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/select2/js/select2.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/datatables/media/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/datatables/media/js/dataTables.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/examples/examples.modals.js')); ?>"></script>
    <script src="<?php echo e(asset('js/examples/examples.datatables.editable.js')); ?>"></script>
    <script>
        $(".deleted").click(function (e) {
           /* $("#form-delete").attr('action', $(this).data('url') );
            $("#NombreUser").text( $(this).data('nuser') );*/
        });
    </script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>