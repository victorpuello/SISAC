<?php $__env->startSection('titulo', "Docentes"); ?>
<?php $__env->startSection('namePage', "Modulo: Docentes"); ?>
<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('vendor/select2/css/select2.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/select2-bootstrap-theme/select2-bootstrap.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/pnotify/pnotify.custom.css')); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <?php $__currentLoopData = $docentes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $docente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-2">
                <section class="card">
                    <header class="card-header bg-<?php echo e(Config::get('institucion.fondos.0')); ?>">
                        <div class="card-header-profile-picture">
                            <img src="<?php echo e(asset("storage/usersdata/img/users/".$docente->user->path)); ?>">
                        </div>
                    </header>
                    <div class="card-body">
                        <h4 class="font-weight-semibold mt-3"><?php echo e(substr($docente->name,0,20)); ?>...</h4>
                        <div class="accordion accordion-tertiary" id="accordion<?php echo e($docente->id); ?>Primary">
                            <div class="card card-default">
                                <div class="card-header">
                                    <h4 class="card-title m-0">
                                        <a class="accordion-toggle text-center" data-toggle="collapse" data-parent="#accordion<?php echo e($docente->id); ?>Primary" href="#collapse<?php echo e($docente->id); ?>PrimaryOne">
                                            Asignaturas
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse<?php echo e($docente->id); ?>PrimaryOne" class="collapse">
                                    <div class="card-body p-1">
                                        <ul class="pl-0 mb-0">
                                            <?php $__currentLoopData = $docente->asignaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asignacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="badge badge-primary ml-1 p-1"><?php echo e($asignacion->asignatura->name); ?></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <p class="mb-1"><a href="<?php echo e(route('docentes.edit',$docente->id)); ?>"><i class="fas fa-user-edit mr-1"></i>Editar</a></p>
                            </div>
                            <div class="col-lg-6">
                                <p class="mb-1"><a href="#modalEliminar" class="deleted modal-basic" data-nuser="<?php echo e($docente->name); ?>" data-url="<?php echo e(route('docentes.destroy', $docente->id )); ?>"><i class="fas fa-trash-alt mr-1"></i> Eliminar</a></p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make('admin.docentes.partials.modals', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>