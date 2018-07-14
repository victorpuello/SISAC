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
            {!! Form::label('typeid', 'Tipo documento de Identidad',['class'=>'control-label']) !!}
            {!! Form::select('typeid',['RC'=>'Registro civil','TI' => 'Tarjeta de identidad','CC' => 'Cedula de ciudadania', 'DE' => 'Documento de extranjero'], null, ['class' => 'form-control mb-3','placeholder' =>'Selecciona el tipo de ID', 'id'=>'typeid','required']) !!}
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            {!! Form::label('identification', 'Número de Identificación: ',['class'=>'control-label']) !!}
            <input type="number" placeholder="Ingresa el número de ID" name="identification" class="form-control " id="numberid" min="0" placeholder="" required>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            {!! Form::label('gender', 'Sexo',['class'=>'control-label']) !!}
            {!! Form::select('gender',['F'=>'Femenino','M' => 'Masculino'], null, ['class' => 'form-control','required','placeholder' =>'Selecciona el genero']) !!}
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            {!! Form::label('birthday', 'Fecha de Nacimiento: ',['class'=>'control-label']) !!}
            <input type="date" class="form-control" name="birthday" id="fnac" placeholder="" required>
        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-4">
        {!! Form::label('birthstate', 'Departamento de nacimiento',['class'=>'control-label']) !!}
        {!! Form::select('birthstate',$departamentos, null,['placeholder' =>'Selecciona un Departamento','class' => 'form-control mb-3', 'id'=>'birthstate','required']) !!}
    </div>
    <div class="col-lg-4">
        {!! Form::label('birthcity', 'Municipio de nacimiento',['class'=>'control-label']) !!}
        {!! Form::select('birthcity', ['placeholder' =>'Selecciona un Municipio'],null,['class' => 'form-control mb-3', 'id'=>'birthcity','required']) !!}
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            {!! Form::label('address', 'Dirección',['class'=>'control-label']) !!}
            {!! Form::text('address', null, ['class' => 'form-control','id'=>'inputDefault', 'placeholder' => 'Por favor introduzca la dirección del estudiante']) !!}
        </div>
    </div>
</div>
<div class="form-group row">

</div>
