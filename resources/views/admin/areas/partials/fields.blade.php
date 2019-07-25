<div class="form-group row">
    {!! Form::label('name', 'Nombre del área',['class'=>'col-lg-4 control-label text-lg-right pt-2']) !!}
    <div class="col-lg-8">
        {!! Form::text('name', null, ['class' => 'form-control','id'=>'name', 'placeholder' => 'Nombre del área','required']) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('porcentaje', 'Porcentaje: ',['class'=>'col-lg-4 control-label text-lg-right pt-2']) !!}
    <div class="col-lg-8">
        {!! Form::number('porcentaje',null,['class' => 'form-control','id'=>'porcentaje', 'placeholder' => 'Porcentaje','required']) !!}
    </div>
</div>