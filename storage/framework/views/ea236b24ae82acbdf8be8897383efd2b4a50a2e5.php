<?php $__env->startSection('titulo', "Grupos"); ?>
<?php $__env->startSection('namePage', "Modulo: Grados - Asignaturas"); ?>
<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('vendor/select2/css/select2.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/select2-bootstrap-theme/select2-bootstrap.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/pnotify/pnotify.custom.css')); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="card card-transparent">
        <div class="row" id="ControlPanel">
            <div class="col-sm-1 ml-0">
                <div class="mb-3">
                    <a href="<?php echo e(route('grados.index')); ?>"  class="btn btn-warning on-default "><i class="fas fa-backward"></i> Regresar</a>
                </div>
            </div>
            <div class="col-sm-1 pl-0">
                <div class="mb-3">
                    <a href="<?php echo e(route('vincular.gradosasignaturas',$grado)); ?>"  class="btn btn-primary on-default simple-ajax-modal"><i class="fas fa-plus"></i> Agregar</a>

                </div>
            </div>
        </div>
        <div class="row">
            <?php $__currentLoopData = $grado->asignaturas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asignatura): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-3 col-xl-3">
                    <section class="card card-horizontal mb-4">
                        <header class="card-header bg-primary">
                            <div class="card-header-icon">
                                <i class="fas fa-music"></i>
                            </div>
                        </header>
                        <div class="card-body p-4">
                            <h3 class="font-weight-semibold mt-3">Simple Block Title</h3>
                            <p>Nullam quiris risus eget urna mollis ornare vel eu leo. Soccis natoque penatibus et magnis dis parturient montes.</p>
                        </div>
                    </section>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/SISAC/resources/views/admin/grados/asignaturas.blade.php ENDPATH**/ ?>