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
            <?php echo $__env->make('docente.acudientes.partials.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo Form::open(['route' => 'docente.acudiente.store', 'method' => 'post','files' => true,'class' => 'form-horizontal form-bordered']); ?>

            <?php echo $__env->make('docente.acudientes.partials.fields', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
    <?php echo Html::script('js/municipios.js'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>