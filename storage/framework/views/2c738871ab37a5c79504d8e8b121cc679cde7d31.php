<?php $__env->startSection('titulo', "Asignaturas"); ?>
<?php $__env->startSection('namePage', "Modulo: Asignaturas"); ?>
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
                    <a href="#modalAdd"  class="btn btn-primary on-default modal-basic ">Agregar <i class="fas fa-plus"></i></a>
                </div>
            </div>
        </div>
        <table class="table table-bordered table-striped mb-0" id="datatable-editable">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Asignatura</th>
                    <th>Docentes</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $asignaturas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asignatura): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr data-item-id="<?php echo e($asignatura->id); ?>">
                    <td><?php echo e($asignatura->id); ?></td>
                    <td><?php echo e($asignatura->name); ?></td>
                    <td><?php echo e($asignatura->docentes->count()); ?></td>
                    <td class="actions">
                        <a href="#modalEditar" class="on-default edit modal-basic" data-urlupdate="<?php echo e(route('asignaturas.update', $asignatura->id )); ?>" data-urledit="<?php echo e(route('asignaturas.edit', $asignatura->id )); ?>"> <i class="fas fa-pencil-alt"></i></a>
                        <a href="#modalEliminar" class="on-default deleted modal-basic" data-nasg="<?php echo e($asignatura->name); ?>" data-url="<?php echo e(route('asignaturas.destroy', $asignatura->id )); ?>"><i class="far fa-trash-alt"></i></a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <?php echo $__env->make('admin.asignaturas.partials.modals', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
            $("#NombreAsg").text( $(this).data('nasg') );
        });

        $(".edit").click(function (e) {
            $("#form-edit").attr('action', $(this).data('urlupdate') );
            var ruta = $(this).data('urledit');
            $.get(ruta , function (data) {
                $("#idEditAsg").val(data.id);
                $("#nameEditAsg").val(data.name);
            });
        });
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>