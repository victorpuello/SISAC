<div class="form-group row">
    <label class="col-sm-2 control-label text-sm-left pr-1 pt-1" for="w1-username">Asignatura: </label>
    <div class="col-sm-10">
        {!! Form::select('asignatura_id',$asignaturas, null, ['autofocus', 'class' => 'form-control mb-3', 'id'=>'w1-username','required', 'placeholder'=>'Seleccione una asignatura']) !!}
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 control-label text-sm-left " for="w1-username">Docente: </label>
    <div class="col-sm-4 pl-1 pr-1">
        {!! Form::select('docente_id',$docentes, null, ['class' => 'form-control mb-3 pl-1', 'id'=>'w1-username','required', 'placeholder'=>'Seleccione un docente']) !!}
    </div>
    <label class="col-sm-2 control-label text-sm-right" for="w1-username">Grupo: </label>
    <div class="col-sm-4 pl-1">
        {!! Form::select('grupo_id',$grupos, null, ['class' => 'form-control mb-3 pl-1', 'id'=>'w1-username','required', 'placeholder'=>'Seleccione un grupo']) !!}
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-3 control-label text-sm-left pt-1" for="w1-username">Número de horas : </label>
    <div class="col-sm-3">
        {!! Form::number('horas', null, ['class' => 'form-control', 'required', 'min'=> 1, 'max'=>6]) !!}
    </div>
    <label class="col-sm-1 control-label text-sm-right pl-1 pt-1" for="w1-username">Año: </label>
    <div class="col-sm-5">
        {!! Form::select('anio_id',$anios, null, [ 'class' => 'form-control mb-3', 'id'=>'anio','required', 'placeholder'=>'Seleccione una año']) !!}
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-4 control-label text-sm-left pr-0 pt-1">Dirección de Grupo: </label>
    <div class="col-sm-8">
        <div class="radio-custom radio-primary">
            {!! Form::radios('director', ['0' => 'No', '1' => 'Si'],null,['class' => 'pl-0 form-control mb-3','id'=>'director']) !!}
        </div>
    </div>
</div>
{!! Form::hidden('active',true) !!}