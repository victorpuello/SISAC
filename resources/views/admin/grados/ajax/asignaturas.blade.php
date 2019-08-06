<div id="modalHeaderColorPrimary" class="modal-block modal-header-color modal-block-primary modal-block-sm">
    <section class="card">
        {!! Form::open(['route' => 'vincular.grados.asignaturas', 'method' => 'POST','class' => 'form-horizontal form-bordered']) !!}
        <header class="card-header">
            <h2 class="card-title">Vincular Asignatura </h2>
        </header>
        <div class="card-body">

            @include('admin.grados.partials.messages')
            <div class="form-group row ml-4 mr-4 pb-0 mb-0">
                {!! Form::label('asignatura_id', 'Asignatura',['class'=>'control-label']) !!}
                {!! Form::select('asignatura_id',$asignaturas, null, ['autofocus', 'class' => 'form-control mb-3', 'id'=>'w1-username','required', 'placeholder'=>'Seleccione una asignatura']) !!}
            </div>
                {!! Form::hidden('grado_id',$grado->id) !!}
            <div class="form-group row ml-4 mr-4">
                {!! Form::label('porcentaje', 'Porcentaje',['class'=>'control-label']) !!}
                {!! Form::number('porcentaje', null, ['class' => 'form-control', 'required', 'min'=> 1, 'max'=>100]) !!}
            </div>
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
