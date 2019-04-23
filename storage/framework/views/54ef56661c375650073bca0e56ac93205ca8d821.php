<?php $__env->startSection('titulo', "Banco de Indicadores"); ?>
<?php $__env->startSection('namePage', "Modulo: Academico -  Banco de Indicadores"); ?>
<?php $__env->startSection('styles'); ?>
    <?php echo $__env->make('partials.stilosdt', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-1 pr-0">
                <div class="mb-3">
                    <a href="<?php echo e(route('suggestions.create')); ?>"  class="btn btn-primary on-default simple-ajax-modal ">Agregar <i class="fas fa-plus"></i></a>
                </div>
            </div>
            <div class="col-sm-1 pl-0">
                <div class="mb-3">
                    <a href="<?php echo e(route('suggestions.import')); ?>"  class="btn btn-primary on-default simple-ajax-modal ">Importar Indicadores <i class="fas fa-upload"> </i></a>
                </div>
            </div>
        </div>
        <table class="table table-bordered table-striped mb-0" id="suggestions">
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                    <th>Asignatura</th>
                    <th>Grado</th>
                    <th>Categoria</th>
                    <th>Indicador</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
        <?php echo Form::open(['method' => 'DELETE', 'id' => "delete-form" ,'style' => 'display: none;']); ?><?php echo Form::close(); ?>

    </div>
    <div id="inf" data-urltabla ="<?php echo e(route('suggestions.index')); ?>"  data-url ="<?php echo e(Config::get('app.url')); ?>"></div>
    <?php echo $__env->make('admin.suggestions.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.suggestions.partials.modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <?php echo $__env->make('partials.datatablescript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scriptfin'); ?>
    <script src="<?php echo e(asset('js/examples/examples.modals.js')); ?>"></script>
    <script src="<?php echo e(asset('js/examples/examples.notifications.js')); ?>"></script>
    <script src="<?php echo e(asset('js/tablas/suggestions.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SISAC\resources\views/admin/suggestions/index.blade.php ENDPATH**/ ?>