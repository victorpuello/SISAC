<div class="row m-1">
    <div class="table-responsive">
        <table class="table table-bordered table-striped mb-0 dataTable no-footer" id="datatable-editable">
            <thead>
            <tr>
                <th>Codigo</th>
                <th>Logro</th>
                <th>Categoria</th>
                <th>Indicador</th>
                <th>Grado</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $logros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $logro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr data-item-id="<?php echo e($logro->id); ?>">
                    <td><?php echo e(substr($logro->code,0,3)); ?></td>
                    <td><?php echo e(substr($logro->description,0,40).' ...'); ?></td>
                    <td><?php echo e($logro->category); ?></td>
                    <td><?php echo e($logro->indicador); ?></td>
                    <td><?php echo e($logro->grade); ?></td>
                    <td class="actions">
                        <a href="#" class="hidden on-editing save-row"><i class="fas fa-save"></i></a>
                        <a href="#" class="hidden on-editing cancel-row"><i class="fas fa-times"></i></a>
                        <a href="<?php echo e(route('docente.logros.edit', $logro->id )); ?>" class="on-default edit " > <i class="fas fa-pencil-alt"></i></a>
                        <a href="#modalEliminar" data-url="<?php echo e(route('docente.logros.destroy',$logro->id)); ?>" data-nlogro="<?php echo e($logro->category); ?>" class="on-default deleted modal-basic" data-nuser="#" data-url="#"><i class="far fa-trash-alt"></i></a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
