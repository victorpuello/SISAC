<div id="custom-content" class="modal-block modal-block-primary modal-header-color">
    <section class="card">
        <header class="card-header">
            <h2 class="card-title"><?php echo e($periodo->name); ?></h2>
        </header>
        <div class="card-body">
            <?php echo $__env->make('admin.periodos.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo Form::model($periodo,['route' => ['periodos.update',$periodo->id], 'method' => 'PUT','class' => 'form-horizontal form-bordered']); ?>

            <?php echo $__env->make('admin.periodos.partials.fields', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="card-footer text-right">
                <button class="btn btn-default btn-danger modal-dismiss">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </div>
            <?php echo Form::close(); ?>

        </div>
    </section>
</div>



<?php /**PATH /var/www/SISAC/resources/views/admin/periodos/ajax/edit.blade.php ENDPATH**/ ?>