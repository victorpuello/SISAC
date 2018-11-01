<?php $__env->startSection('titulo', "Acudiente"); ?>
<?php $__env->startSection('namePage', "Modulo: Estudiante - Acudiente "); ?>
<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('vendor/bootstrap-fileupload/bootstrap-fileupload.min.css')); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="card card-featured card-featured-primary mb-4">
        <header class="card-header">
            <h2 class="card-title">Crear acudiente nuevo para: <span class="text-color-secondary"><?php echo e($estudiante->full_name); ?> </span>   </h2>
        </header>
        <div class="card-body">
            <?php echo $__env->make('secretaria.acudientes.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo Form::open(['route' => 'secretaria.acudiente.store', 'method' => 'post','files' => true,'class' => 'form-horizontal form-bordered']); ?>

            <?php echo $__env->make('secretaria.acudientes.partials.fields', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="card-footer">
                <a href="<?php echo e(URL::previous()); ?>" class="btn btn-danger">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </div>
            <?php echo Form::close(); ?>

        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('vendor/autosize/autosize.js')); ?>"></script>
    <script src="<?php echo e(asset('js/examples/examples.notifications.js')); ?>"></script>
    <?php echo Html::script('js/municipios.js'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>