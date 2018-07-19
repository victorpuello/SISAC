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
                    <p>Estas seguro que deseas eliminar este Logro: <strong><span id="NombreAsg"></span></strong></p>
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
            <h2 class="card-title">Agregar Logro</h2>
        </header>
        <div class="card-body">
            {!! Form::open(['route' => 'logros.store', 'method' => 'post','class' => 'form-horizontal form-bordered', 'id' => 'form-create']) !!}
            <div class="modal-wrapper">
                <div class="modal-text">
                    @include('admin.logros.partials.messages')
                    @if(\Illuminate\Support\Facades\Auth::user()->type === 'docente')
                        {!! Form::hidden('docente_id', \Illuminate\Support\Facades\Auth::user()->docente->id) !!}
                    @else
                        {!! Form::select('docente_id',array_pluck($logros,'name','docente_id'), null, ['placeholder'=>'Docente','class' => 'form-control mb-3', 'id'=>'periodo_id','required']) !!}
                    @endif
                    <div class="form-group row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                {!! Form::select('periodo_id',$periodos, null, ['placeholder'=>'Periodo','class' => 'form-control mb-3', 'id'=>'periodo_id','required']) !!}
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                {!! Form::select('asignatura_id',$asignaturas, null, ['placeholder'=>'Asignatura','class' => 'form-control mb-3', 'id'=>'asignatura_id','required']) !!}
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                {!! Form::select('grade',$grados, null, ['placeholder'=>'Grado','class' => 'form-control mb-3', 'id'=>'grade','required']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6">
                            {!! Form::text('code', null, ['class' => 'form-control','id'=>'inputDefault', 'placeholder' => 'Codigo identificador de logro']) !!}
                        </div>
                        <div class="col-lg-6">
                            {!! Form::select('category',['cognitivo'=>'Cognitivo','procedimental'=>'Procedimental','actitudinal'=>'Actitudinal'], null, ['placeholder'=>'Tipo de logro','class' => 'form-control mb-3', 'id'=>'category','required']) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-12">
                            {!! Form::textarea('description',null, array('class'=>'form-control','rows' => 3, 'cols' => 50,'placeholder'=>'Descripción del Logro')) !!}
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
    {!! Form::open(['method' => 'PUT','class' => 'form-horizontal form-bordered', 'id'=>'form-edit']) !!}
    <section class="card">
        <header class="card-header">
            <h2 class="card-title">Editar Asignatura</h2>
        </header>
        <div class="card-body">
            <div class="modal-wrapper">
                <div class="modal-text">
                    <div class="form-group row">

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
