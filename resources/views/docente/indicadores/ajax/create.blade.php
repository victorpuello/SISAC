<div id="modalHeaderColorPrimary" class="modal-block modal-block-lg modal-header-color modal-block-primary ">
    <section class="card">
        {!! Form::open(['route' => 'docente.indicadors.store', 'method' => 'POST','class' => 'form-horizontal form-bordered']) !!}
        <header class="card-header">
            <h2 class="card-title">Crear Indicador nuevo </h2>
        </header>
        <div class="card-body">
            @include('docente.indicadores.partials.fields')
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