<?php $__env->startSection('titulo', "Docentes"); ?>
<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('vendor/bootstrap-fileupload/bootstrap-fileupload.min.css')); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('namePage', "Modulo: Docentes - Crear "); ?>
<?php $__env->startSection('content'); ?>
        <section class="card form-wizard" id="w1">
            <header class="card-header">
                <h2 class="card-title">Crear docente nuevo</h2>
            </header>
            <div class="card-body card-body-nopadding">
                <div class="wizard-tabs">
                    <ul class="nav wizard-steps">
                        <li class="nav-item active">
                            <a href="#w1-account" data-toggle="tab" class="nav-link text-center">
                                <span class="badge">1</span>
                                Usuario
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#w1-profile" data-toggle="tab" class="nav-link text-center">
                                <span class="badge">2</span>
                                Información de contacto
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#w1-confirm" data-toggle="tab" class="nav-link text-center">
                                <span class="badge">3</span>
                                Otros
                            </a>
                        </li>
                    </ul>
                </div>
                <?php echo $__env->make('admin.docentes.partials.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo Form::open(['route' => 'docentes.store', 'method' => 'post','files' => true,'class' => 'form-horizontal', 'novalidate' => "novalidate"]); ?>

                    <?php echo $__env->make('admin.docentes.partials.fields', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <div class="card-footer">
                <ul class="pager">
                    <li class="previous disabled">
                        <a><i class="fas fa-angle-left"></i> Anterior</a>
                    </li>
                    <li class="finish hidden float-right">
                        <button type="submit">Finalizar</button>
                    </li>
                    <?php echo Form::close(); ?>

                    <li class="next">
                        <a>Siguiente <i class="fas fa-angle-right"></i></a>
                    </li>
                </ul>
            </div>
            </div>
        </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('vendor/autosize/autosize.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/bootstrap-fileupload/bootstrap-fileupload.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/jquery-validation/jquery.validate.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/bootstrap-wizard/jquery.bootstrap.wizard.js')); ?>"></script>
    <script src="<?php echo e(asset('js/examples/examples.wizard.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>