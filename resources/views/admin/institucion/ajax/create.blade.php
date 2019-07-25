<div id="custom-content" class="modal-block modal-block-full ">
    <section class="card">
        {!! Form::open(['route' => 'institucions.store', 'method' => 'POST','files' => true,'class' => 'form-horizontal form-bordered']) !!}
        <header class="card-header">
            <h2 class="card-title">Crear institución </h2>
        </header>
        <div class="card-body">
            @include('admin.institucion.partials.messages')
            @include('admin.institucion.partials.fields')
        </div>
        <footer class="card-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                    <button  class="btn btn-danger ml-3 modal-dismiss">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </footer>
        {!! Form::close() !!}
    </section>
</div>