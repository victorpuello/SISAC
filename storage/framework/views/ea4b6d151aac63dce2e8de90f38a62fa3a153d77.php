<?php $__env->startSection('titulo', "Grados"); ?>
<?php $__env->startSection('namePage', "Modulo: Grados"); ?>
<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('vendor/select2/css/select2.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/select2-bootstrap-theme/select2-bootstrap.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/pnotify/pnotify.custom.css')); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="card card-transparent">
        <div class="col-sm-6">
            <div class="mb-3">
                <a href="<?php echo e(route('grados.create')); ?>"  class="btn btn-primary on-default simple-ajax-modal">Agregar grado <i class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="row">
        <?php $__currentLoopData = $grados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-4 col-xl-4">
                <section class="card card-featured-left card-featured-primary mb-4">
                    <div class="card-body">
                        <div class="widget-summary">
                    <div class="widget-summary-col widget-summary-col-icon">
                        <div class="summary-icon bg-<?php echo e(Config::get('institucion.fondos.0')); ?>">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-square-o fa-stack-2x"></i>
                                <strong class="fa-stack-1x" style="font-size:80%; margin: -17%;"><?php echo e($grado->numero); ?></strong>
                            </span>
                        </div>
                    </div>
                    <div class="widget-summary-col">
                        <div class="summary">
                            <h4 class="title">Grupos Grado <?php echo e($grado->numero); ?></h4>
                            <div class="info">
                                <strong >Ingresa para ver los grupos de grado <?php echo e($grado->name); ?></strong>
                            </div>
                        </div>
                        <div class="summary-footer">
                            <a href="<?php echo e(route('grados.edit',$grado)); ?>" class="btn btn-xs btn-primary simple-ajax-modal"><i class="fas fa-pencil-alt"></i> Editar</a>
                            <a href="#modalEliminar" class="btn btn-xs btn-primary deleted modal-basic" data-nasg="<?php echo e($grado->name); ?>" data-url="<?php echo e(route('grados.destroy', $grado->id )); ?>"><i class="far fa-trash-alt"></i> Eliminar</a>
                            <a href="<?php echo e(route('grados.show',$grado)); ?>" class="btn btn-xs btn-primary "><i class="far fa-eye"></i> Grupos</a>
                            <a href="<?php echo e(route('grados.asignaturas',$grado)); ?>" class="btn btn-xs btn-primary "><i class="fas fa-cog"></i> Configuración</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    </div>
    <?php echo $__env->make('admin.grados.partials.modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.grados.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('vendor/select2/js/select2.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/pnotify/pnotify.custom.js')); ?>"></script>
    <script src="<?php echo e(asset('js/examples/examples.modals.js')); ?>"></script>
    <script>
        $(".deleted").click(function (e) {
            $("#form-delete").attr('action', $(this).data('url') );
            $("#NombreGrado").text( $(this).data('nasg') );
        });
    </script>
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('scriptfin'); ?>
    <script src="<?php echo e(asset('js/examples/examples.notifications.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/SISAC/resources/views/admin/grados/index.blade.php ENDPATH**/ ?>