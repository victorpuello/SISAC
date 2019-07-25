<div id="custom-content" class="modal-block modal-block-xs modal-block-primary modal-header-color">
    <section class="card">
        {!! Form::model($observacion,['route' => ['docente.observacions.update',$observacion], 'method' => 'PUT','class' => 'form-horizontal form-bordered']) !!}
        <header class="card-header">
            <div class="card-actions">
                <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
            </div>
            <h2 class="card-title">Valorar </h2>
        </header>
        <div class="card-body">
            @include('docente.observaciones.partials.fields')
        </div>
        <footer class="card-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                    {{--<a  class="btn btn-danger btn-xs text-white  ml-3 modal-dismiss"> Cancelar</a>--}}
                    <button type="submit" class="btn  btn-sm btn-primary">Guardar</button>
                </div>
            </div>
        </footer>
        {!! Form::close() !!}
    </section>
</div>