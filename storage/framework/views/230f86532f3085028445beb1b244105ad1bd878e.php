<?php $__env->startSection('titulo', "Asignación"); ?>
<?php $__env->startSection('namePage', "Modulo: Docentes -  Asignación "); ?>
<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('vendor/select2/css/select2.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/select2-bootstrap-theme/select2-bootstrap.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/datatables/media/css/dataTables.bootstrap4.css')); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="card-body">
        <?php if(currentPerfil() <> 'docente'): ?>
        <div class="row">
            <div class="col-sm-6">
                <div class="mb-3">
                    <a href="#modalAdd"  class="btn btn-primary on-default modal-basic ">Agregar <i class="fas fa-plus"></i></a>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <table class="table table-bordered table-striped mb-0" id="datatable-editable">
            <thead>
            <tr>
                <th>Asignatura</th>
                <th>Docente</th>
                <th>Grupo</th>
                <th>Director</th>
                <?php if(currentPerfil() <> 'docente'): ?>
                <th>Acciones</th>
                <?php endif; ?>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $asignaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asignacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr data-item-id="<?php echo e($asignacion->id); ?>">
                    <td><?php echo e($asignacion->asignatura->name); ?></td>
                    <td><?php echo e($asignacion->docente->name); ?></td>
                    <td><?php echo e($asignacion->salon->full_name); ?></td>
                    <td><?php echo e($asignacion->direccion); ?></td>
                    <?php if(currentPerfil() <> 'docente'): ?>
                    <td class="actions">
                        <a href="#modalEditar" class="on-default edit modal-basic" > <i class="fas fa-pencil-alt"></i></a>
                        <a href="#modalEliminar" class="on-default deleted modal-basic" data-url = "<?php echo e(route('asignaciones.destroy', $asignacion->id )); ?>" ><i class="far fa-trash-alt"></i></a>
                    </td>
                        <?php endif; ?>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <?php echo $__env->make('admin.asignaciones.partials.modals', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('vendor/select2/js/select2.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/datatables/media/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/datatables/media/js/dataTables.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/examples/examples.datatables.editable.js')); ?>"></script>
    <script src="<?php echo e(asset('js/examples/examples.modals.js')); ?>"></script>
    <script src="<?php echo e(asset('js/custom.js')); ?>"></script>
    <script src="<?php echo e(asset('js/ModalsAsignaturas.js')); ?>"></script>
    <script type="text/javascript">
        $(".deleted").click(function (e) {
            $("#form-delete").attr('action', $(this).data('url') );
        });
    </script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>