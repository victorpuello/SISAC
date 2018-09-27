<div id="custom-content" class="modal-block modal-block-primary modal-header-color">
    <section class="card">
        <header class="card-header">
            <h2 class="card-title">Editar Asignación</h2>
        </header>
        <div class="card-body">
            <?php echo Form::model($asignacion,['route'=>['asignacions.update',$asignacion],'method' => 'PUT','class' => 'form-horizontal form-bordered', 'id'=>'form-edit']); ?>

            <div class="modal-wrapper">
                <div class="modal-text">
                    <?php echo $__env->make('admin.asignaciones.partials.fields', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            </div>
            <footer class="card-footer">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <button type="submit" class="btn btn-primary editAsignatura">Guardar</button>
                        <button class="btn btn-default modal-dismiss">Cancelar</button>
                    </div>
                </div>
            </footer>
            <?php echo Form::close(); ?>

        </div>
    </section>
</div>
