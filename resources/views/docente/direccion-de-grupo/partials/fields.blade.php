<div class="form-group row">
    <label class="col-sm-4 control-label text-sm-right pt-1" for="w1-username">Asignatura: </label>
    <div class="col-sm-8">
        {!! Form::select('asignatura_id',$asignaturas, null, ['autofocus', 'class' => 'form-control mb-3', 'id'=>'w1-username','required', 'placeholder'=>'Seleccione una asignatura']) !!}
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-4 control-label text-sm-right pt-1" for="w1-username">Docente: </label>
    <div class="col-sm-8">
        {!! Form::select('docente_id',$docentes, null, ['class' => 'form-control mb-3', 'id'=>'w1-username','required', 'placeholder'=>'Seleccione un docente']) !!}
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-4 control-label text-sm-right pt-1" for="w1-username">Grupo: </label>
    <div class="col-sm-8">
        {!! Form::select('salon_id',$salones, null, ['class' => 'form-control mb-3', 'id'=>'w1-username','required', 'placeholder'=>'Seleccione un grupo']) !!}
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-4 control-label text-sm-right pt-1" for="w1-username">Número de horas : </label>
    <div class="col-sm-8">
        {!! Form::number('horas', null, ['class' => 'form-control', 'required', 'min'=> 1, 'max'=>6]) !!}
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-4 control-label text-sm-right pt-1">Dirección de Grupo: </label>
    <div class="col-sm-8">
        <div class="radio-custom radio-primary">
            {!! Form::radios('director', ['0' => 'No', '1' => 'Si']) !!}
        </div>
    </div>
</div>
