<?php $__env->startSection('titulo', "Dirección de Grupo"); ?>
<?php $__env->startSection('namePage', "Modulo: Dirección "); ?>
<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('vendor/select2/css/select2.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/select2-bootstrap-theme/select2-bootstrap.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/pnotify/pnotify.custom.css')); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <?php $__currentLoopData = $estudiantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estudiante): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3">
                <section class="card">

                    <header class="card-header <?php echo e($fondos[rand(0,3)]); ?>">
                        <div class="card-header-profile-picture">
                            <img src="<?php echo e(url('/imgUsers/')); ?>/<?php echo e($estudiante->path); ?>">
                        </div>
                    </header>
                    <div class="card-body">
                        <h4 class="font-weight-semibold mt-3"><?php echo e($estudiante->apellido_name); ?></h4>
                        <hr class="solid short">
                        <div class="row">
                            <div class="col-lg-6">
                                <p class="mb-1"><a href="<?php echo e(route('docentes.edit',$estudiante->id)); ?>"><i class="fas fa-user-edit mr-1"></i>Editar</a></p>
                                <p class="mb-1"><a href="#modalEliminar" class="deleted modal-basic" data-nuser="<?php echo e($estudiante->name); ?>" data-url="<?php echo e(route('docentes.destroy', $estudiante->id )); ?>"><i class="fas fa-trash-alt mr-1"></i> Eliminar</a></p>
                                <p class="mb-1"><a href="#modalAddAsignaturas" data-url="<?php echo e(route('docentes.addAsignaturas',$estudiante->id)); ?>" class="modal-basic addAsignatura"><i class="fas fa-share-square mr-1"></i> Asignaturas</a></p>
                            </div>
                            <div class="col-lg-6">
                                <p class="mb-1"><a href="#"><i class="fas fa-chalkboard mr-1"></i>Salones</a></p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('vendor/select2/js/select2.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/pnotify/pnotify.custom.js')); ?>"></script>
    <script src="<?php echo e(asset('js/examples/examples.modals.js')); ?>"></script>
    <script type="text/javascript">
        $(".deleted").click(function (e) {
            $("#form-delete").attr('action', $(this).data('url') );
            $("#NombreDocente").text( $(this).data('nuser') );
        });

        $(".addAsignatura").click(function (e) {
            $("#form-addAsignaturas").attr('action', $(this).data('url'))
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>