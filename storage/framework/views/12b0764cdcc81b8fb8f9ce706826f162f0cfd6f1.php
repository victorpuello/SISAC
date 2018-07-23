<!-- Start Modal Eliminar -->
<div id="modalEliminar" class="modal-block modal-block-warning mfp-hide">
    <section class="card">
        <header class="card-header">
            <h2 class="card-title">Alerta!!</h2>
        </header>
        <div class="card-body">
            <div class="modal-wrapper">
                <div class="modal-icon">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <div class="modal-text">
                    <p>Estas seguro que deseas eliminar la asignatura: <strong><span id="NombreAsg"></span></strong></p>
                </div>
            </div>
        </div>
        <footer class="card-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                    <button class="btn btn-danger modal-dismiss">Cancelar</button>
                    <?php echo Form::open(['method' => 'DELETE', 'id' => "form-delete" ,'style' => 'display: inline-block;']); ?>

                    <button type="submit" class="btn btn-warning">Confirmar</button>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </footer>
    </section>
</div>
<!-- End Modal Eliminar-->

<!-- Start Modal agregar -->
<div id="modalAdd" class="modal-block modal-block-warning mfp-hide">
    <section class="card">
        <header class="card-header">
            <h2 class="card-title">Agregar Asignatura</h2>
        </header>
        <div class="card-body">
            <?php echo Form::open(['route' => 'asignaturas.store', 'method' => 'post','class' => 'form-horizontal form-bordered', 'id' => 'form-create']); ?>

            <div class="modal-wrapper">
                <div class="modal-text">
                    <?php echo $__env->make('admin.asignaturas.partials.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <div class="form-group row">
                            <?php echo Form::label('name', 'Nombre de Asignatura',['class'=>'col-lg-4 control-label text-lg-right pt-2']); ?>

                            <div class="col-lg-8">
                                <?php echo Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Por favor introduzca el nombre de la asignatura', 'requiered']); ?>

                            </div>
                        </div>
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

<!-- Start Modal Editar -->
<div id="modalEditar" class="modal-block modal-block-warning mfp-hide">
    <?php echo $__env->make('admin.asignaturas.partials.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo Form::open(['method' => 'PUT','class' => 'form-horizontal form-bordered', 'id'=>'form-edit']); ?>

    <section class="card">
        <header class="card-header">
            <h2 class="card-title">Editar Asignatura</h2>
        </header>
        <div class="card-body">
            <div class="modal-wrapper">
                <div class="modal-text">
                    <div class="form-group row">
                        <?php echo $__env->make('admin.asignaturas.partials.fields', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                </div>
            </div>
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
</section>
<?php echo Form::close(); ?>

</div>
<!-- End Modal Editar-->
