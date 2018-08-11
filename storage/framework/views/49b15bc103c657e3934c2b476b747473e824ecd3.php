<?php $__env->startSection('titulo', "Alummnos - Editar acudiente"); ?>
<?php $__env->startSection('namePage', "Modulo: Alummnos - Editar Acudiente "); ?>
<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('vendor/bootstrap-fileupload/bootstrap-fileupload.min.css')); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="card card-featured card-featured-primary mb-4">
        <header class="card-header">
            <h2 class="card-title">Editar acudiente: <?php echo e($acudiente->name); ?> </h2>
        </header>
        <div class="card-body">
            <?php echo $__env->make('admin.users.partials.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo Form::model($acudiente,['route' => ['acudiente.update',$acudiente->id], 'method' => 'PUT','class' => 'form-horizontal form-bordered']); ?>

            <?php echo $__env->make('admin.acudientes.partials.fields', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
    <script src="<?php echo e(asset('vendor/bootstrap-fileupload/bootstrap-fileupload.min.js')); ?>"></script>
    <?php echo Html::script('js/municipios.js'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>