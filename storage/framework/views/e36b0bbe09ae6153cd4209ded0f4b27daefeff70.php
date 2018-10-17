<?php $__env->startSection('titulo', "Calificar"); ?>
<?php $__env->startSection('namePage', "Modulo: Académico"); ?>
<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('vendor/select2/css/select2.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/select2-bootstrap-theme/select2-bootstrap.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('css/jquery.dataTables.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('css/responsive.dataTables.min.css')); ?>" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.17/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.bootstrap4.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.6/css/select.bootstrap4.min.css" />
    <link rel="stylesheet" href="<?php echo e(asset('css/editor.bootstrap4.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/datatables/media/css/dataTables.bootstrap4.css')); ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css" />
    <style>
        .dataTables_wrapper .dataTables_paginate .paginate_button{
            padding: 0em !important;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="card card-info mb-4">
    <header class="card-header">
        <h2 class="card-title">Planilla <?php echo e($planilla->asignacion->asignatura->name); ?> - Grado - <?php echo e($planilla->asignacion->grupo->grado->name); ?> - <?php echo e($planilla->periodo->name); ?></h2>
    </header>
    <div class="card-body">
        <table class="display nowrap" cellspacing="0" width="100%" id="notas">
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                    <th>Id</th>
                    <th>Planilla</th>
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
                    <th>Indicador</th>
                </tr>
            </thead>
        </table>
        <div id="inf" data-token ="<?php echo e(csrf_token()); ?>" data-urlproces ="<?php echo e(route('notas.store')); ?>" data-urltabla ="<?php echo e(route('planillas.show',$planilla)); ?>"></div>
    </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('vendor/autosize/autosize.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/select2/js/select2.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/datatables/media/js/dataTables.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/dataTables.responsive.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/buttons.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/dataTables.select.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/dataTables.editor.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/editor.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(asset('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js')); ?>"></script>
    <script src="<?php echo e(asset('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js')); ?>"></script>
    <script src="<?php echo e(asset('https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(asset('https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/examples/examples.modals.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.numeric.js')); ?>"></script>
    <script src="<?php echo e(asset('js/tablas/notas.js')); ?>"></script>
    <script>

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>