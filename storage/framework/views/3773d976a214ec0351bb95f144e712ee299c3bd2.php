<?php $__env->startSection('titulo', "Usuarios"); ?>
<?php $__env->startSection('namePage', "Modulo: Docentes"); ?>
<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('vendor/select2/css/select2.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/select2-bootstrap-theme/select2-bootstrap.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/pnotify/pnotify.custom.css')); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <?php $__currentLoopData = $docentes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $docente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3">
                <section class="card">

                    <header class="card-header <?php echo e($fondos[rand(0,3)]); ?>">
                        <div class="card-header-profile-picture">
                            <img src="<?php echo e(url('/imgUsers/')); ?>/<?php echo e($docente->path); ?>">
                        </div>
                    </header>
                    <div class="card-body">
                        <h4 class="font-weight-semibold mt-3"><?php echo e($docente->name); ?></h4>
                        <p><strong>Asignaturas: </strong>
                        <ul>
                            <?php $__currentLoopData = $docente->asignaturas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asignatura): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($asignatura->name); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        </p>
                        <hr class="solid short">
                        <div class="row">
                            <div class="col-lg-6">
                                <p class="mb-1"><a href="<?php echo e(route('docentes.edit',$docente->id)); ?>"><i class="fas fa-user-edit mr-1"></i>Editar</a></p>
                                <p class="mb-1"><a href="#modalEliminar" class="deleted modal-basic" data-nuser="<?php echo e($docente->name); ?>" data-url="<?php echo e(route('docentes.destroy', $docente->id )); ?>"><i class="fas fa-trash-alt mr-1"></i> Eliminar</a></p>
                                <p class="mb-1"><a href="#modalAddAsignaturas" data-url="<?php echo e(route('docentes.addAsignaturas',$docente->id)); ?>" class="modal-basic addAsignatura"><i class="fas fa-share-square mr-1"></i> Asignaturas</a></p>
                            </div>
                            <div class="col-lg-6">
                                <p class="mb-1"><a href="#"><i class="fas fa-chalkboard mr-1"></i>Salones</a></p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make('admin.docentes.partials.modals', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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