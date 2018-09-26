<?php $__env->startSection('titulo', "Grupos"); ?>
<?php $__env->startSection('namePage', "Modulo: Grados - Grupos"); ?>
<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('vendor/select2/css/select2.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/select2-bootstrap-theme/select2-bootstrap.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/pnotify/pnotify.custom.css')); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="card card-transparent">
        <div class="row">
            <?php $__currentLoopData = $grado->grupos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grupo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4">
                    <section class="card">
                        <header class="card-header bg-<?php echo e(Config::get('institucion.fondos.1')); ?>">
                            <div class="card-header-profile-picture">
                                <img src="<?php echo e(url('/img')); ?>/<?php echo e($grupo->name); ?>.jpg">
                            </div>
                        </header>
                        <div class="card-body">
                            <h4 class="font-weight-semibold mt-3"><?php echo e($grupo->name_aula); ?></h4>
                            <p><strong>Número de estudiantes: </strong><?php echo e(count($grupo->estudiantes)); ?></p>
                            <hr class="solid short">
                            <div class="row">
                                <div class="col-lg-6">
                                    <p class="mb-1"><a href="#modalEditar" data-urlupdate="<?php echo e(route('grupos.update', $grupo->id )); ?>" data-urledit="<?php echo e(route('grupos.edit', $grupo->id )); ?>" class="modal-basic edit"><i class="fas fa-edit mr-1"></i>Editar</a></p>
                                </div>
                                <div class="col-lg-6">
                                    <p class="mb-1"><a href="#modalEliminar" data-nsl ="<?php echo e($grupo->name_aula); ?>" data-url="<?php echo e(route('grupos.destroy',$grupo->id)); ?>" class="deleted modal-basic" ><i class="fas fa-trash-alt mr-1"></i> Eliminar</a></p>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <?php echo $__env->make('admin.grados.partials.modals', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>