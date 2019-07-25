<div id="modalHeaderColorPrimary" class="modal-block modal-header-color modal-block-primary ">
    <section class="card">
        {!! Form::model($grado,['route' => ['grados.update',$grado], 'method' => 'PUT','class' => 'form-horizontal form-bordered']) !!}
        <header class="card-header">
            <h2 class="card-title">Crear grado nuevo </h2>
        </header>
        <div class="card-body">
            @include('admin.grados.partials.messages')
            @include('admin.grados.partials.fields')
        </div>
        <footer class="card-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                    <button  class="btn btn-danger ml-3 modal-dismiss">Cancelar</button>
                    <button  type="submit" class="btn btn-primary ">Guardar</button>
                </div>
            </div>
        </footer>
        {!! Form::close() !!}
    </section>
</div>