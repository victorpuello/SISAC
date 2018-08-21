<?php $__env->startSection('titulo', "Calificar"); ?>
<?php $__env->startSection('namePage', "Modulo: Académico"); ?>
<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('vendor/select2/css/select2.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/select2-bootstrap-theme/select2-bootstrap.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('css/jquery.dataTables.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('css/responsive.dataTables.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('css/buttons.dataTables.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('css/select.dataTables.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('css/editor.dataTables.min.css')); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="card card-info mb-4">
    <header class="card-header">
        <h2 class="card-title">Planilla - Grado <?php echo e($asignacion->salon->full_name); ?> </h2>
    </header>
    <div class="card-body">
        <table class="display nowrap" cellspacing="0" width="100%" id="notas">
            <thead>
                <tr>
                    <th></th>
                    <th ></th>
                    <th></th>
                    <th></th>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Id_Nota_Cog</th>
                    <th>Cognitivo 60%</th>
                    <th>Id_Nota_Proc</th>
                    <th>Procedimental 30%</th>
                    <th>Id_Nota_Act</th>
                    <th>Actitudinal 10%</th>
                    <th>Inasistencias ID</th>
                    <th>Inasistencias</th>
                    <th>Definitiva</th>
                    <th>Desempeño</th>
                </tr>
            </thead>
        </table>
        <div id="inf" data-token ="<?php echo e(csrf_token()); ?>" data-urlproces ="<?php echo e(route('notas.store')); ?>" data-urltabla ="<?php echo e(route('notas.dataplanilla',['planilla'=>$asignacion,'periodo'=>$periodo])); ?>"></div>
    </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('vendor/autosize/autosize.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/select2/js/select2.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/dataTables.responsive.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/dataTables.select.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/dataTables.editor.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/examples/examples.modals.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.numeric.js')); ?>"></script>
    <script src="<?php echo e(asset('js/examples/notas.js')); ?>"></script>
    <script>

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>