<?php $__env->startSection('titulo', "Estudiantes"); ?>
<?php $__env->startSection('namePage', "Modulo: Estudiantes"); ?>
<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('vendor/select2/css/select2.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/select2-bootstrap-theme/select2-bootstrap.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/datatables/media/css/dataTables.bootstrap4.css')); ?>" />
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="mb-3">
                    <a href="<?php echo e(route('estudiantes.create')); ?>"  class="btn btn-primary">Agregar <i class="fas fa-plus"></i></a>
                </div>
            </div>
        </div>
        <table class="table table-bordered table-striped mb-0" id="datatable-editable">
            <thead>
            <tr>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Telefono</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $estudiantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estudiante): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr data-item-id="<?php echo e($estudiante->id); ?>">
                <td><?php echo e($estudiante->name); ?></td>
                <td><?php echo e($estudiante->lastname); ?></td>
                <td><?php echo e($estudiante->phone); ?></td>
                <td class="actions">
                    <a href="#" class="hidden on-editing save-row"><i class="fas fa-save"></i></a>
                    <a href="<?php echo e(route('estudiantes.show', $estudiante->id)); ?>" class=" on-default"><i class="fas fa-eye"></i></a>
                    <a href="<?php echo e(route('estudiantes.edit', $estudiante->id)); ?>" class="on-default " > <i class="fas fa-pencil-alt"></i></a>
                    <a href="#modalEliminar" class="on-default deleted modal-basic" data-nuser="<?php echo e($estudiante->FullName); ?>" data-url="<?php echo e(route('estudiantes.destroy', $estudiante->id )); ?>"><i class="far fa-trash-alt"></i></a>
                </td>
            </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <?php echo $__env->make('admin.users.partials.modals', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('vendor/select2/js/select2.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/datatables/media/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/datatables/media/js/dataTables.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/examples/examples.datatables.editable.js')); ?>"></script>
    <script src="<?php echo e(asset('js/examples/examples.modals.js')); ?>"></script>
    <script src="<?php echo e(asset('js/custom.js')); ?>"></script>
    <script type="text/javascript">
        $(".deleted").click(function (e) {
            $("#form-delete").attr('action', $(this).data('url') );
            $("#NombreUser").text( $(this).data('nuser') );
        });
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>