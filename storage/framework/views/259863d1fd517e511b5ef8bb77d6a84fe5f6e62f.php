<div id="custom-content" class="modal-block modal-block-full ">
    <section class="card">
        <?php echo Form::open(['route' => 'institucions.store', 'method' => 'POST','files' => true,'class' => 'form-horizontal form-bordered']); ?>

        <header class="card-header">
            <h2 class="card-title">Crear institución </h2>
        </header>
        <div class="card-body">
            <?php echo $__env->make('admin.institucion.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('admin.institucion.partials.fields', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <footer class="card-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                    <button  class="btn btn-danger ml-3 modal-dismiss">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </footer>
        <?php echo Form::close(); ?>

    </section>
</div><?php /**PATH C:\xampp\htdocs\SISAC\resources\views/admin/institucion/ajax/create.blade.php ENDPATH**/ ?>