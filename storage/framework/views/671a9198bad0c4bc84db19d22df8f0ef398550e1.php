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
        <div class="col-lg-10">
            <div class="card">
                <div class="card-body">
                    <?php if (\Illuminate\Support\Facades\Blade::check('institucion', $institucion)): ?>
                        <a class="mb-1 mt-1 mr-1 btn btn-primary btn-lg btn-block simple-ajax-modal" href="<?php echo e(route('institucions.create')); ?>">Agregar institución</a>
                        <?php else: ?>
                            <?php echo Form::model($institucion,['route' => ['institucions.update',$institucion], 'method' => 'PUT','files' => true,'class' => 'form-horizontal form-bordered']); ?>

                                <?php echo $__env->make('admin.institucion.partials.fieldshow', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="offset-10 col-md-2 text-right">
                                            <a href="<?php echo e(route('institucions.edit',$institucion)); ?>" class="btn btn-primary  btn-block">Editar</a>
                                            
                                        </div>
                                    </div>
                                </div>
                            <?php echo Form::close(); ?>

                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-lg-2">
            <section class="card card-info mb-4">
                <header class="card-header">
                    <h2 class="card-title">Configuraciones</h2>
                </header>
                <div class="card-body">
                    <a href="<?php echo e(route('areas.index')); ?>" class="mb-1 mt-1 mr-1 btn btn-primary btn-block"><span>Áreas</span></a>
                    <a href="<?php echo e(route('grados.index')); ?>" class="mb-1 mt-1 mr-1 btn btn-primary btn-block"><span>Grados</span></a>
                    <a href="<?php echo e(route('jornadas.index')); ?>" class="mb-1 mt-1 mr-1 btn btn-primary btn-block"><span>Jornadas</span></a>
                </div>
            </section>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('vendor/autosize/autosize.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/bootstrap-fileupload/bootstrap-fileupload.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/examples/examples.modals.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/pnotify/pnotify.custom.js"')); ?>"></script>
    <script src="<?php echo e(asset('vendor/jquery-placeholder/jquery-placeholder.js')); ?>"></script>
    <script src="<?php echo e(asset('js/examples/examples.notifications.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>