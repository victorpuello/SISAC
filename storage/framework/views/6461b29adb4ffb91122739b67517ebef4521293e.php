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
        <div class="col-lg-4 col-xl-3 mb-4 mb-xl-0">
            <section class="card">
                <div class="card-body">
                    <div class="thumb-info mb-3">
                        <img src="<?php echo e(url('/imgUsers/estudiantes/')); ?>/<?php echo e($estudiante->path); ?>" class="rounded img-fluid" alt="<?php echo e($estudiante->name); ?>">
                        <div class="thumb-info-title">
                            <span class="thumb-info-inner"><?php echo e($estudiante->name); ?></span>
                            <span class="thumb-info-type">Alumno</span>
                        </div>
                    </div>
                    <hr class="dotted short">
                    <div class="widget-toggle-expand mb-3">
                        <div class="widget-content-expanded">
                            <ul class="simple-todo-list mt-3">
                                <li class="completed"><a href="#">Formato compromiso academico</a></li>
                                <li class="completed"><a href="#">Formato compromiso convivencia</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-lg-8 col-xl-9">

            <div class="tabs">
                <ul class="nav nav-tabs tabs-primary">
                    <li class="nav-item active">
                        <a class="nav-link" href="#overview" data-toggle="tab">Observaciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#edit" data-toggle="tab">Nueva</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="overview" class="tab-pane active">
                        <div class="p-3">
                            <h4 class="mb-3">Historico</h4>
                            <div class="timeline timeline-simple mt-3 mb-3">
                                <div class="tm-body">
                                    <?php $__currentLoopData = $periodos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $periodo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($estudiante->getAnotacionPeriodo($periodo)->count() > 0 ): ?>
                                            <div class="tm-title">
                                                <h5 class="m-0 pt-2 pb-2 text-uppercase"><?php echo e($periodo->name); ?></h5>
                                            </div>
                                            <ol class="tm-items">
                                                <?php $__currentLoopData = $estudiante->getAnotacionPeriodo($periodo); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $anotacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li>
                                                        <div class="tm-box">
                                                            <p class="text-muted mb-0 fecha" data-fecha="<?php echo e($anotacion->created_at); ?>"></p>
                                                            <p class="mb-1">
                                                                <?php echo e($anotacion->annotation); ?>

                                                            </p>
                                                            <div class="float-md-right">
                                                                <a class=" btn btn-xs btn-warning" href="<?php echo e(url('/imgUsers/documentos/')); ?>/<?php echo e($anotacion->path); ?> " data-plugin-lightbox data-plugin-options='{ "type":"image" }' title="Acta de compromiso.">
                                                                    Ver Acta
                                                                </a>
                                                                <a class="btn btn-xs btn-primary simple-ajax-modal" href="<?php echo e(route('docente.anotaciones.edit',$anotacion)); ?>">Editar</a>
                                                                <?php echo Form::open(['method' => 'DELETE','class'=>'text-lg-right','route' => ['docente.anotaciones.destroy',$anotacion],'style' => 'display: inline-block;']); ?>

                                                                    <button class="btn btn-xs btn-danger" type="submit">Eliminar</button>
                                                                <?php echo Form::close(); ?>

                                                            </div>
                                                        </div>
                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ol>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div id="edit" class="tab-pane">
                        <?php echo $__env->make('admin.estudiantes.partials.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php echo Form::open(['route' => 'docente.anotaciones.store', 'method' => 'post','files' => true,'class' => 'form-horizontal form-bordered']); ?>

                            <?php echo $__env->make('docente.observador.partials.fields', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        <?php echo Form::close(); ?>

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

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>