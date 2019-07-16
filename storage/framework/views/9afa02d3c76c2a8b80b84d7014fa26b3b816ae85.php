<div id="modalHeaderColorPrimary" class="modal-block modal-block-lg modal-header-color modal-block-primary ">
    <section class="card">
        <?php echo Form::open(['route' => 'indicadors.store', 'method' => 'POST','class' => 'form-horizontal form-bordered']); ?>

        <header class="card-header">
            <h2 class="card-title">Crear Indicador nuevo </h2>
        </header>
        <div class="card-body">
            <?php echo $__env->make('admin.indicadores.partials.fields', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <footer class="card-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                    <button  class="btn btn-danger ml-3 modal-dismiss">Cancelar</button>
                    <button  type="submit" class="btn btn-primary ">Guardar</button>
                </div>
            </div>
        </footer>
        <?php echo Form::close(); ?>

    </section>
</div><?php /**PATH C:\xampp\htdocs\SISAC\resources\views/admin/indicadores/ajax/create.blade.php ENDPATH**/ ?>