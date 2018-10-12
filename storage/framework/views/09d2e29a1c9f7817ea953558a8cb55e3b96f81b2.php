<?php $__env->startSection('titulo', "Periodos"); ?>
<?php $__env->startSection('namePage', "Modulo: Periodos"); ?>
<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('vendor/jquery-ui/jquery-ui.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/jquery-ui/jquery-ui.theme.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/select2/css/select2.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/select2-bootstrap-theme/select2-bootstrap.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/datatables/media/css/dataTables.bootstrap4.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/bootstrap-markdown/css/bootstrap-markdown.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('vendor/summernote/summernote-bs4.css')); ?>" />
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="mb-3">
                    <a href="<?php echo e(route('periodos.create')); ?>"  class="btn btn-primary on-default simple-ajax-modal ">Agregar <i class="fas fa-plus"></i></a>
                </div>
            </div>
        </div>
        <table class="table table-bordered table-striped mb-0" id="datatable-editable">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Fecha de inicio</th>
                    <th>Fecha de fin</th>
                    <th>Fecha de cierre</th>
                    <th>Estado</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $periodos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $periodo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr data-item-id="<?php echo e($periodo->id); ?>">
                    <td><?php echo e($periodo->name); ?></td>
                    <td><?php echo e($periodo->datestart); ?></td>
                    <td><?php echo e($periodo->dateend); ?></td>
                    <td><?php echo e($periodo->cierre); ?></td>
                    <td><?php echo e($periodo->estado); ?></td>
                    <td class="actions">
                        <a href="<?php echo e(route('periodos.edit',$periodo)); ?>" class="on-default edit simple-ajax-modal" > <i class="fas fa-pencil-alt"></i></a>
                        <a href="#modalEliminar" class="on-default deleted simple-ajax-modal"  ><i class="far fa-trash-alt"></i></a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    <div class="form-group row">
        <label class="col-lg-3 control-label text-lg-right pt-2">Date range</label>
        <div class="col-lg-6">
            <div class="input-daterange input-group" data-plugin-datepicker>
														<span class="input-group-prepend">
															<span class="input-group-text">
																<i class="fas fa-calendar-alt"></i>
															</span>
														</span>
                <input type="text" class="form-control" name="start">
                <span class="input-group-text border-left-0 border-right-0 rounded-0">
															to
														</span>
                <input type="text" class="form-control" name="end">
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('vendor/select2/js/select2.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/datatables/media/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/datatables/media/js/dataTables.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/examples/examples.datatables.editable.js')); ?>"></script>
    <script src="<?php echo e(asset('js/examples/examples.modals.js')); ?>"></script>
    <script src="<?php echo e(asset('js/custom.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>