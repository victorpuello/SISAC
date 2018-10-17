<?php $__env->startSection('titulo'); ?>
    Institución
<?php $__env->stopSection(); ?>
<?php $__env->startSection('namePage'); ?>
    <?php if (\Illuminate\Support\Facades\Blade::check('institucion', $institucion)): ?>
    Institución
    <?php else: ?>
        <?php echo e($institucion->name); ?>

        <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('vendor/select2/css/select2.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/pnotify/pnotify.custom.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/animate/animate.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/font-awesome/css/fontawesome-all.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/magnific-popup/magnific-popup.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/bootstrap-fileupload/bootstrap-fileupload.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/magnific-popup/magnific-popup.css')); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
            <div class="card col-12 col-lg-12 col-sm-12 col-md-12">
                <div class="card-body">
                    <?php echo Form::model($institucion,['route' => ['institucions.update',$institucion], 'method' => 'PUT','files' => true,'class' => 'form-horizontal form-bordered']); ?>

                            <header class="card-header">
                                <h2 class="card-title">Actualizar datos de la institución </h2>
                            </header>
                            <div class="card-body">
                                <?php echo $__env->make('admin.institucion.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                <?php echo $__env->make('admin.institucion.partials.fields', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            </div>
                            <footer class="card-footer">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <a  href="<?php echo e(route('institucions.index')); ?>" class="btn btn-danger ml-3"> Cancelar</a>
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                                </div>
                            </footer>
                    <?php echo Form::close(); ?>

                </div>
            </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('vendor/autosize/autosize.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/bootstrap-fileupload/bootstrap-fileupload.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/examples/examples.modals.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/pnotify/pnotify.custom.js"')); ?>"></script>
    <script src="<?php echo e(asset('vendor/jquery-placeholder/jquery-placeholder.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>