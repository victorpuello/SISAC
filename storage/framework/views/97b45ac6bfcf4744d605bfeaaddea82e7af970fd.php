<?php $__env->startSection('titulo', "Aulas"); ?>
<?php $__env->startSection('namePage', "Modulo: Aulas"); ?>
<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('vendor/select2/css/select2.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/select2-bootstrap-theme/select2-bootstrap.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/datatables/media/css/dataTables.bootstrap4.css')); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-6">
            <div class="mb-3">
                <a href="#modalAdd"  class="btn btn-primary on-default modal-basic ">Agregar <i class="fas fa-plus"></i></a>
            </div>
        </div>
    </div>
    <div class="row">
        <?php $__currentLoopData = $aulas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aula): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-4">
                    <section class="card">
                        <header class="card-header bg-<?php echo e($fondos[rand(0,3)]); ?>">
                            <div class="card-header-profile-picture">
                                <img src="<?php echo e(url('/img')); ?>/<?php echo e($aula->name); ?>.jpg">
                            </div>
                        </header>
                        <div class="card-body">
                            <h4 class="font-weight-semibold mt-3"><?php echo e($aula->NameAula); ?></h4>
                            <p><strong>Número de estudiantes: </strong><?php echo e(count($aula->estudiantes)); ?></p>
                            <hr class="solid short">
                            <div class="row">
                                <div class="col-lg-6">
                                    <p class="mb-1"><a href="#modalEditar" data-urlupdate="<?php echo e(route('aulas.update', $aula->id )); ?>" data-urledit="<?php echo e(route('aulas.edit', $aula->id )); ?>" class="modal-basic edit"><i class="fas fa-edit mr-1"></i>Editar</a></p>
                                </div>
                                <div class="col-lg-6">
                                    <p class="mb-1"><a href="#modalEliminar" data-nsl ="<?php echo e($aula->NameAula); ?>" data-url="<?php echo e(route('aulas.destroy',$aula->id)); ?>" class="deleted modal-basic" ><i class="fas fa-trash-alt mr-1"></i> Eliminar</a></p>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php echo $__env->make('admin.aulas.partials.modals', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('vendor/select2/js/select2.js')); ?>"></script>
    <script src="<?php echo e(asset('js/examples/examples.modals.js')); ?>"></script>
    <script src="<?php echo e(asset('js/custom.js')); ?>"></script>
    <script type="text/javascript">
        $(".deleted").click(function (e) {
            $("#form-delete").attr('action', $(this).data('url') );
            $("#NombreSalon").text( $(this).data('nsl') );
        });

        $(".edit").click(function (e) {
            $("#form-edit").attr('action', $(this).data('urlupdate') );
            var ruta = $(this).data('urledit');
            $.get(ruta , function (data) {
                $("#id").val(data.id);
                $("#name").val(data.name);
                $("#grade").val(data.grade);
            });
        });
    </script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>