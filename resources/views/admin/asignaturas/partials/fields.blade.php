<div class="form-group row">
    {!! Form::label('name', 'Nombre del asignatura',['class'=>'col-lg-4 control-label text-lg-right pt-2']) !!}
    <div class="col-lg-8">
        {!! Form::text('name', null, ['class' => 'form-control','id'=>'name', 'placeholder' => 'Nombre de asignatura','required']) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('short_name', 'Abreviatura',['class'=>'col-lg-4 control-label text-lg-right pt-2']) !!}
    <div class="col-lg-8">
        {!! Form::text('short_name', null, ['class' => 'form-control','id'=>'short_name', 'placeholder' => 'Abreviatura','required']) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('porcentaje', 'Porcentaje: ',['class'=>'col-lg-4 control-label text-lg-right pt-2']) !!}
    <div class="col-lg-8">
        {!! Form::number('porcentaje',null,['class' => 'form-control','id'=>'porcentaje', 'placeholder' => 'Porcentaje','required']) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('nivel', 'Nivel',['class'=>'col-lg-4 control-label text-lg-right pt-2']) !!}
    <div class="col-lg-8">
        {!! Form::select('nivel',['preescolar'=>'Pre - Escolar','basica' => 'Basica','media'=>'Media','institucional'=>'Institucional'], null, ['class' => 'form-control mb-3','placeholder'=>'Seleccione el nivel', 'id'=>'nivel','required']) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('area_id', 'Área',['class'=>'col-lg-4 control-label text-lg-right pt-2']) !!}
    <div class="col-lg-8">
        {!! Form::select('area_id',$areas, null, ['class' => 'form-control mb-3','placeholder'=>'Seleccione el área', 'id'=>'area_id','required']) !!}
    </div>
</div>