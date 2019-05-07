<?php $__env->startSection('titulo', "Dirección de Grupo"); ?>
<?php $__env->startSection('namePage', "Observador "); ?>
<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('vendor/select2/css/select2.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/pnotify/pnotify.custom.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/animate/animate.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/bootstrap-fileupload/bootstrap-fileupload.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/magnific-popup/magnific-popup.css')); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-3 col-xl-2 mb-3 col-sm-12 ">
            <section class="card">
                <div class="card-body">
                    <div class="thumb-info mb-3">
                        <img src="<?php echo e(asset("storage/usersdata/img/estudiantes/".$estudiante->path)); ?>" class="rounded img-fluid" alt="<?php echo e($estudiante->name); ?>">
                        <div class="thumb-info-title">
                            <span class="thumb-info-inner"><?php echo e(substr($estudiante->name,0,15).'...'); ?></span>
                            <span class="thumb-info-type">Alumno</span>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-lg-9 col-xl-10">

            <div class="tabs">
                <ul class="nav nav-tabs tabs-primary">
                    <li class="nav-item active">
                        <a class="nav-link" href="#resumen" data-toggle="tab">Resumen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#observaciones" data-toggle="tab">Observaciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#edit" data-toggle="tab">Nueva</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="resumen" class="tab-pane active">
                        <?php echo $__env->make('docente.observador.partials.acordeon.resumen', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                    <div id="observaciones" class="tab-pane">
                        <?php echo $__env->make('docente.observador.partials.acordeon.observaciones', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                    <div id="edit" class="tab-pane">
                        <?php echo $__env->make('docente.observador.partials.acordeon.editObservador', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                </div>
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
    <script src="<?php echo e(asset('js/moment.js')); ?>"></script>
    <script src="<?php echo e(asset('js/moment-timezone-with-data.js')); ?>"></script>
    <script src="<?php echo e(asset('js/examples/examples.lightbox.js')); ?>"></script>
    <script>
        moment.locale('es');
        $( document ).ready(function() {
            var fecha = $(".fecha").data('fecha');
            var texto = moment(fecha).fromNow();
            $(".fecha").text(texto);
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>