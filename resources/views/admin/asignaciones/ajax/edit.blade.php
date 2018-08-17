<div id="custom-content" class="modal-block modal-block-primary modal-header-color">
    <section class="card">
        <header class="card-header">
            <h2 class="card-title">Editar Asignación</h2>
        </header>
        <div class="card-body">
            {!! Form::model($asignacion,['route'=>['asignaciones.update',$asignacion->id],'method' => 'PUT','class' => 'form-horizontal form-bordered', 'id'=>'form-edit']) !!}
            <div class="modal-wrapper">
                <div class="modal-text">
                    @include('admin.asignaturas.partials.messages')
                    @include('admin.asignaciones.partials.fields')
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
            {!! Form::close() !!}
        </div>
    </section>
</div>
