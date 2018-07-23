<!-- Start Modal agregar -->
<div id="modalAdd" class="modal-block modal-block-warning mfp-hide">
    <section class="card">
        <header class="card-header">
            <h2 class="card-title">Agregar Logro</h2>
        </header>
        <div class="card-body">
            <?php echo Form::open(['route' => 'logros.store', 'method' => 'post','class' => 'form-horizontal form-bordered', 'id' => 'form-create']); ?>

            <div class="modal-wrapper">
                <div class="modal-text">
                    <?php echo $__env->make('admin.logros.partials.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('admin.logros.partials.fieldsCreate', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            </div>
            <footer class="card-footer">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <button type="submit" class="btn btn-primary addAsignatura">Guardar</button>
                        <button class="btn btn-default modal-dismiss">Cancelar</button>
                    </div>
                </div>
            </footer>
            <?php echo Form::close(); ?>

        </div>
    </section>
</div>
<!-- End Modal Agregar-->
