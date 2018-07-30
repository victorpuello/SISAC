<!-- Start Modal agregar -->
<div id="modalAdd" class="modal-block modal-block-warning mfp-hide">
    <section class="card">
        <header class="card-header">
            <h2 class="card-title">Agregar Asignación</h2>
        </header>
        <div class="card-body">
            {!! Form::open(['route' => 'asignaciones.store', 'method' => 'post','class' => 'form-horizontal form-bordered', 'id' => 'form-create']) !!}
            <div class="modal-wrapper">
                <div class="modal-text">
                    @include('admin.asignaturas.partials.messages')
                    @include('admin.asignaciones.partials.fields')
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
            {!! Form::close() !!}
        </div>
    </section>
</div>
<!-- End Modal Agregar-->

<!-- Start Modal Editar -->
<div id="modalEditar" class="modal-block modal-block-warning mfp-hide">
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
                    <p>Estas seguro que deseas eliminar esta asignación</p>
                </div>
            </div>
        </div>
        <footer class="card-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                    <button class="btn btn-danger modal-dismiss">Cancelar</button>
                    {!! Form::open(['method' => 'DELETE', 'id' => "form-delete" ,'style' => 'display: inline-block;']) !!}
                    <button type="submit" class="btn btn-warning">Confirmar</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </footer>
    </section>
</div>
<!-- End Modal Eliminar-->
