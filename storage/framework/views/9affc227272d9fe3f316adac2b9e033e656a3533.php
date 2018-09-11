<?php $__env->startSection('titulo', "Usuarios"); ?>
<?php $__env->startSection('namePage', "Modulo: Usuarios - Crear "); ?>
<?php $__env->startSection('content'); ?>
    <section class="card card-featured card-featured-primary mb-4">
        <header class="card-header">
            <h2 class="card-title">Crear usuario nuevo </h2>
        </header>
        <div class="card-body">
            <?php echo $__env->make('admin.users.partials.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo Form::open(['route' => 'users.store', 'method' => 'post','class' => 'form-horizontal form-bordered']); ?>

            <?php echo $__env->make('admin.users.partials.fields', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="card-footer">
                <a href="<?php echo e(route('users.index')); ?>" class="btn btn-danger">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </div>
            <?php echo Form::close(); ?>

        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('vendor/autosize/autosize.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/bootstrap-fileupload/bootstrap-fileupload.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>