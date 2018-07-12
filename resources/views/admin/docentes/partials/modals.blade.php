<!-- Start Modal -->
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
                    <p>Estas seguro que deseas eliminar el docente: <strong><span id="NombreDocente"></span></strong></p>
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
<!-- End Modal -->
<!-- Start Modal agregar -->
<div id="modalAddAsignaturas" class="modal-block modal-block-warning mfp-hide">
    <section class="card">
        <header class="card-header">
            <h2 class="card-title">Asociar Asignaturas</h2>
        </header>
        <div class="card-body">
            {!! Form::open(['method' => 'post','class' => 'form-horizontal form-bordered', 'id' => 'form-addAsignaturas']) !!}
            <div class="modal-wrapper">
                <div class="modal-text">
                    @include('admin.asignaturas.partials.messages')
                    <div class="form-group row">
                        {!! Form::label('name', 'Asignaturas',['class'=>'col-lg-4 control-label text-lg-right pt-2']) !!}
                        <div class="col-lg-8">
                            {!! Form::select('asignaturas_id[]',array_pluck($asignaturas,'name','id'), null, ['class' => 'populate form-control mb-3', 'id'=>'typeid','required','multiple data-plugin-selectTwo']) !!}
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
            {!! Form::close() !!}
        </div>
    </section>
</div>
<!-- End Modal Agregar-->
