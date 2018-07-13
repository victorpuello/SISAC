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
                    <p>Estas seguro que deseas eliminar el salón: <strong><span id="NombreSalon"></span></strong></p>
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

<!-- Start Modal agregar -->
<div id="modalAdd" class="modal-block modal-block-warning mfp-hide">
    <section class="card">
        <header class="card-header">
            <h2 class="card-title">Agregar Asignatura</h2>
        </header>
        <div class="card-body">
            {!! Form::open(['route' => 'aulas.store', 'method' => 'post','class' => 'form-horizontal form-bordered', 'id' => 'form-create']) !!}
            <div class="modal-wrapper">
                <div class="modal-text">
                    @include('admin.aulas.partials.messages')
                    <div class="form-group row">
                        {!! Form::label('name', 'Nombre del salón',['class'=>'col-lg-4 control-label text-lg-right pt-2']) !!}
                        <div class="col-lg-8">
                            {!! Form::select('name',['1' => '1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6'], null, ['class' => 'form-control mb-3','placeholder'=>'Seleccione el Número de Salón', 'id'=>'typeid','required']) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('grade', 'Grado: ',['class'=>'col-lg-4 control-label text-lg-right pt-2']) !!}
                        <div class="col-lg-8">
                            {!! Form::select('grade',['0'=>'Pre-Escolar','1' => 'Primero','2'=>'Segundo','3'=>'Tercero','4'=>'Cuarto','5'=>'Quinto','6'=>'Sexto','7'=>'Septimo','8'=>'Octavo','9'=>'Noveno','10'=>'Decimo','11'=>'Once'], null, ['class' => 'form-control mb-3','placeholder'=>'Seleccione un Grado', 'id'=>'typeid','required']) !!}
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

<!-- Start Modal Editar -->
<div id="modalEditar" class="modal-block modal-block-warning mfp-hide">
    @include('admin.aulas.partials.messages')
    {!! Form::open(['method' => 'PUT','class' => 'form-horizontal form-bordered', 'id'=>'form-edit']) !!}
    <section class="card">
        <header class="card-header">
            <h2 class="card-title">Editar Asignatura</h2>
        </header>
        <div class="card-body">
            <div class="modal-wrapper">
                <div class="modal-text">
                    @include('admin.aulas.partials.messages')
                    <div class="form-group row">
                        {!! Form::label('name', 'Nombre del salón',['class'=>'col-lg-4 control-label text-lg-right pt-2']) !!}
                        <div class="col-lg-8">
                            {!! Form::select('name',['1' => '1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6'], null, ['class' => 'form-control mb-3','placeholder'=>'Seleccione el Número de Salón', 'id'=>'name','required']) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('grade', 'Grado: ',['class'=>'col-lg-4 control-label text-lg-right pt-2']) !!}
                        <div class="col-lg-8">
                            {!! Form::select('grade',['0'=>'Pre-Escolar','1' => 'Primero','2'=>'Segundo','3'=>'Tercero','4'=>'Cuarto','5'=>'Quinto','6'=>'Sexto','7'=>'Septimo','8'=>'Octavo','9'=>'Noveno','10'=>'Decimo','11'=>'Once'], null, ['class' => 'form-control mb-3','placeholder'=>'Seleccione un Grado', 'id'=>'grade','required']) !!}
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
{!! Form::close() !!}
</div>
<!-- End Modal Editar-->
