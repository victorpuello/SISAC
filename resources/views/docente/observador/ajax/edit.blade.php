<div id="custom-content" class="modal-block modal-block-primary modal-header-color">
    <section class="card">
        {!! Form::model($anotacion,['route' => ['docente.anotaciones.update',$anotacion], 'method' => 'PUT','files' => true,'class' => 'form-horizontal form-bordered']) !!}
        <header class="card-header">
            <h2 class="card-title">Editar anotación </h2>
        </header>
        <div class="card-body">
                @include('admin.estudiantes.partials.messages')
                @include('docente.observador.partials.fields')
        </div>
        <footer class="card-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                    <a  class="btn btn-primary ml-3 modal-dismiss"> Cancelar</a>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </footer>
        {!! Form::close() !!}
    </section>
</div>
