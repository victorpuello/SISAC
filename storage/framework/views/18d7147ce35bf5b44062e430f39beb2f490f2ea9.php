<div id="custom-content" class="modal-block modal-block-primary modal-header-color">
    <section class="card">
        <?php echo Form::model($anotacion,['route' => ['docente.anotaciones.update',$anotacion], 'method' => 'PUT','files' => true,'class' => 'form-horizontal form-bordered']); ?>

        <header class="card-header">
            <h2 class="card-title">Editar anotación </h2>
        </header>
        <div class="card-body">
                <?php echo $__env->make('admin.estudiantes.partials.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('docente.observador.partials.fields', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <footer class="card-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                    <a  class="btn btn-primary ml-3 modal-dismiss"> Cancelar</a>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </footer>
        <?php echo Form::close(); ?>

    </section>
</div>
