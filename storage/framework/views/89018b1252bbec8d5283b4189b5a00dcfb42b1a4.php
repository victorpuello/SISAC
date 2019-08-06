<?php $__env->startSection('titulo', "Asignaturas"); ?>
<?php $__env->startSection('namePage', "Modulo: Asignaturas"); ?>
<?php $__env->startSection('styles'); ?>
    <?php echo $__env->make('partials.stilosdt', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="card-body">
        <div class="row" id="ControlPanel">
            <div class="col-sm-6">
                <div class="mb-3">
                    <a href="<?php echo e(route('asignaturas.create')); ?>"  class="btn btn-primary on-default ajax-estudiantes ">Agregar <i class="fas fa-plus"></i></a>
                </div>
            </div>
        </div>
        <table class="table table-bordered table-striped mb-0" id="asignaturas">
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                    <th>Nombre</th>
                    <th>Abreviatura</th>
                    <th>Porcentaje</th>
                    <th>Nivel</th>
                    <th>Área</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
        <?php echo Form::open(['method' => 'DELETE', 'id' => "delete-form" ,'style' => 'display: none;']); ?><?php echo Form::close(); ?>

    </div>
    <div id="inf" data-urltabla ="<?php echo e(route('asignaturas.index')); ?>"  data-url ="<?php echo e(Config::get('app.url')); ?>"></div>
    <?php echo $__env->make('admin.asignaturas.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.asignaturas.partials.modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <?php echo $__env->make('partials.scriptdt', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scriptfin'); ?>
    <script src="<?php echo e(asset('js/examples/examples.modals.js')); ?>"></script>
    <script src="<?php echo e(asset('js/examples/examples.notifications.js')); ?>"></script>
    <script src="<?php echo e(asset('js/tablas/asignaturas.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/SISAC/resources/views/admin/asignaturas/index.blade.php ENDPATH**/ ?>