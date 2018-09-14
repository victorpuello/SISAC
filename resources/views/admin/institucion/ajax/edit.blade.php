<div id="custom-content" class="modal-block modal-block-primary modal-header-color">
    <section class="card">
        {!! Form::model($institucion,['route' => ['institucion.update',$institucion], 'method' => 'PUT','files' => true,'class' => 'form-horizontal form-bordered']) !!}
        <header class="card-header">
            <h2 class="card-title">Actualizar institución </h2>
        </header>
        <div class="card-body">
            @include('admin.institucion.partials.messages')
            @include('admin.institucion.partials.fields')
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