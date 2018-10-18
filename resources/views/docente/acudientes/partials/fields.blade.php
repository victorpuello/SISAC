<div class="form-group row">
    <div class="col-lg-6">
        <div class="form-group">
            {!! Form::label('name', 'Nombres',['class'=>'control-label']) !!}
            {!! Form::text('name', null, ['class' => 'form-control','id'=>'inputDefault', 'placeholder' => 'Por favor introduzca el nombre']) !!}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            {!! Form::label('lastname', 'Apellidos',['class'=>'control-label']) !!}
            {!! Form::text('lastname', null, ['class' => 'form-control','id'=>'inputDefault', 'placeholder' => 'Por favor introduzca los apellidos']) !!}
        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-3">
        <div class="form-group">
            {!! Form::label('relationship', 'Parentesco',['class'=>'control-label']) !!}
            {!! Form::select('relationship',['Padre'=>'Padre','Madre' => 'Madre','Abuelo' => 'Abuelo','Hermano' => 'Hermano', 'Tío' => 'Tío', 'Conyuge' => 'Conyuge', 'Otro' => 'Otro'], null, ['class' => 'form-control mb-3','placeholder' =>'Selecciona el parentesco', 'id'=>'relationship','required']) !!}
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            {!! Form::label('document', 'Número de Identificación: ',['class'=>'control-label']) !!}
            {!! Form::number('document',null,['class' => 'form-control','id'=>'document','placeholder' => 'Por favor introduzca número de identidad']) !!}
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            {!! Form::label('address', 'Dirección',['class'=>'control-label']) !!}
            {!! Form::text('address', null, ['class' => 'form-control','id'=>'inputDefault', 'placeholder' => 'Por favor introduzca la dirección']) !!}
        </div>
    </div>
    <div class="col-lg-3">
        {!! Form::label('phone', 'Telefono',['class'=>'control-label']) !!}
        {!! Form::text('phone', null, ['class' => 'form-control','id'=>'inputDefault', 'placeholder' => 'Por favor introduzca el Telefono']) !!}
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-4">
        {!! Form::label('email', 'E-mail',['class'=>'control-label']) !!}
        {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'example@gmail.com']) !!}
    </div>
    @editar($estudiante)
        {!! Form::hidden('estudiante_id', $acudiente->estudiante_id) !!}
        @else
            {!! Form::hidden('estudiante_id', $estudiante->id) !!}
        @endeditar
</div>
