<?php $__env->startSection('titulo', "Calificar"); ?>
<?php $__env->startSection('namePage', "Modulo: Académico"); ?>
<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('vendor/select2/css/select2.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/select2-bootstrap-theme/select2-bootstrap.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/datatables/media/css/dataTables.bootstrap4.css')); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">

            </div>
        </div>
        <table class="table table-bordered table-striped mb-0" id="datatable-editable">
            <thead>
            <tr>
                <th>N°</th>
                <th>Nombre</th>
                <th>Cognitivo</th>
                <th>Procedimental</th>
                <th>Actitudinal</th>
                <th>Inasistencias</th>

            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $estudiantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $estudiante): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr data-item-id="<?php echo e($estudiante->id); ?>">
                    <td class="id"><?php echo e($key+1); ?></td>
                    <td class="name">
                            <?php echo e($estudiante->lastname); ?> <?php echo e($estudiante->name); ?>

                    </td>
                    <td><a  class="modal-basic addNote"
                            data-img="<?php echo e(url('/imgUsers/estudiantes/')); ?>/<?php echo e($estudiante->path); ?>"
                            data-user = <?php echo e($estudiante->id); ?>

                            href="#modalAdd">
                            <ul>
                                <?php $__currentLoopData = $estudiante->logros->where('category','=','cognitivo'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $logro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>$logro->id</li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>

                        </a>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>

                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    <?php echo $__env->make('admin.notas.partials.modals', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('vendor/autosize/autosize.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/select2/js/select2.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/datatables/media/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/datatables/media/js/dataTables.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/examples/examples.modals.js')); ?>"></script>
    <script src="<?php echo e(asset('js/examples/notas.js')); ?>"></script>
    <script>
        $(".addNote").click(function (e) {
            $("#imgEstudiante").attr('src', $(this).data('img') );
            $("#nameEstudiante").text( $(this).text() );
            $("#estudiante_id").val( $(this).data('user') );
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>