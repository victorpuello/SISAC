<div class="form-group row">
    <div class="col-sm-6">
        {!! Form::select('asignatura_id',$asignaturas, null, ['autofocus', 'class' => 'form-control mb-3', 'id'=>'w1-username','required', 'placeholder'=>'Seleccione una asignatura']) !!}
    </div>
    <div class="col-sm-6">
        {!! Form::select('grado_id',$grados, null, ['class' => 'form-control mb-3','placeholder'=>'Seleccione un Grado', 'id'=>'grado_id','required']) !!}
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-6 ">
        {!! Form::select('category',['cognitivo' => 'Cognitivo','procedimental' => 'Procedimental','actitudinal' => 'Actitudinal'], null, ['class' => 'form-control mb-3','placeholder'=>'Seleccione una Categoria', 'id'=>'category_id','required']) !!}
    </div>
    <div class="col-sm-6">
        {!! Form::select('indicator',['bajo' => 'Bajo','basico' => 'Basico','alto' => 'Alto','superior' => 'Superior'], null, ['class' => 'form-control mb-3','placeholder'=>'Seleccione un Desempeño', 'id'=>'indicador','required']) !!}
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-12">
        {!! Form::textarea('description',null, array('class'=>'form-control','id' => 'description','rows' => 3, 'cols' => 50,'placeholder'=>'Descripción del indicador')) !!}
    </div>
    <div class="col-sm-6 mt-3">
        {!! Form::text('pack', null, ['class' => 'form-control','id'=>'pack', 'placeholder' => 'Ingresa el nombre del paquete','required']) !!}
    </div>
</div>
