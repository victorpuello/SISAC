<div class="form-group row">
    <label class="col-sm-4 control-label text-sm-right pt-1" for="name">Nombre periodo: </label>
    <div class="col-sm-8">
        {!! Form::text('name', null, ['class' => 'form-control','id'=>'name', 'placeholder' => 'Por favor introduzca nombre de periodo']) !!}
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-4 control-label text-sm-right pt-1" for="datestart">Fecha de inicio: </label>
    <div class="col-sm-8">
        {!! Form::date('datestart',null,['class' => 'form-control','id'=>'datestart','require']) !!}
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-4 control-label text-sm-right pt-1" for="dateend">Fecha de fin: </label>
    <div class="col-sm-8">
        {!! Form::date('dateend',null,['class' => 'form-control','id'=>'dateend','require']) !!}
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-4 control-label text-sm-right pt-1" for="cierre">Fecha de cierre (Docentes): </label>
    <div class="col-sm-8">
        {!! Form::datetime('cierre',null,['class' => 'form-control','id'=>'cierre','require']) !!}
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-4 control-label text-sm-right pt-1" for="estado">Estado: </label>
    <div class="col-sm-8">
        {!! Form::select('estado',['activo'=>'Activo','inactivo'=>'Inactivo','finalizado'=>'Finalizado',], null, ['class' => 'form-control mb-3', 'id'=>'estado','required', 'placeholder'=>'Seleccione un estado']) !!}
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-4 control-label text-sm-right pr-0 pt-1">Año: </label>
    <div class="col-sm-8">
        <div class="radio-custom radio-primary">
            {!! Form::radios('isFinal', ['0' => 'No', '1' => 'Si'],null,['class' => 'pl-0 form-control mb-3','id'=>'isFinal']) !!}
        </div>
    </div>
</div>
<script>
    $('#cierre').datetimepicker({
        format: 'Y-m-d H:i:s'
    });
</script>
