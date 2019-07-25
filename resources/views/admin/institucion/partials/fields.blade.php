<div class="form-group row">
    <div class="col-lg-6">
        <div class="form-group">
            {!! Form::label('name', 'Nombre: ',['class'=>'control-label']) !!}
            {!! Form::text('name', null, ['class' => 'form-control','id'=>'inputDefault', 'placeholder' => 'Por favor introduzca el nombre de la IE']) !!}
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            {!! Form::label('siglas', 'Siglas: ',['class'=>'control-label']) !!}
            {!! Form::text('siglas', null, ['class' => 'form-control','id'=>'inputDefault', 'placeholder' => 'Por favor introduzca la sigla de la IE']) !!}
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            {!! Form::label('resolucion', 'Resolución: ',['class'=>'control-label']) !!}
            {!! Form::text('resolucion', null, ['class' => 'form-control','id'=>'inputDefault', 'placeholder' => 'Resolución de la IE']) !!}
        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-4">
        <div class="form-group">
            {!! Form::label('dane', 'DANE: ',['class'=>'control-label']) !!}
            {!! Form::text('dane', null, ['class' => 'form-control','id'=>'inputDefault', 'placeholder' => 'Por favor introduzca el DANE de la IE']) !!}
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            {!! Form::label('nit', 'NIT: ',['class'=>'control-label']) !!}
            {!! Form::text('nit', null, ['class' => 'form-control','id'=>'inputDefault', 'placeholder' => 'Por favor introduzca el NIT de la IE']) !!}
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            {!! Form::label('slogan', 'Slogan',['class'=>'control-label']) !!}
            {!! Form::text('slogan', null, ['class' => 'form-control','id'=>'inputDefault', 'placeholder' => 'Slogan de la IE']) !!}
        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-4">
        <div class="form-group">
            {!! Form::label('address', 'Dirección: ',['class'=>'control-label']) !!}
            {!! Form::text('address', null, ['class' => 'form-control','id'=>'inputDefault', 'placeholder' => 'Por favor introduzca la dirección de la IE']) !!}
        </div>
    </div>
    <div class="col-lg-4">
        {!! Form::label('phone', 'Telefono: ',['class'=>'control-label']) !!}
        {!! Form::text('phone', null, ['class' => 'form-control','id'=>'inputDefault', 'placeholder' => 'Por favor introduzca el Telefono']) !!}
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            {!! Form::label('email', 'Email:  ',['class'=>'control-label']) !!}
            {!! Form::email('email',null,['class' => 'form-control','id'=>'inputDefault', 'placeholder' => 'Por favor introduzca el Email'])!!}
        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-4">
        <div class="form-group">
            {!! Form::label('idrector', 'Identifición Rector: ',['class'=>'control-label']) !!}
            {!! Form::text('idrector', null, ['class' => 'form-control','id'=>'inputDefault', 'placeholder' => 'Número de identidad del Rector']) !!}
        </div>
    </div>
    <div class="col-lg-8">
        <div class="form-group">
            {!! Form::label('rector', 'Nombre del Rector: ',['class'=>'control-label']) !!}
            {!! Form::text('rector', null, ['class' => 'form-control','id'=>'inputDefault', 'placeholder' => 'Nombre completo del Rector']) !!}
        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-12">
        <div class="form-group">
            <label class=" control-label">Escudo</label>
            <div >
                <div class="fileupload fileupload-new" data-provides="fileupload">
                    <div class="input-append">
                        <div class="uneditable-input">
                            <i class="fas fa-file fileupload-exists"></i>
                            <span class="fileupload-preview"></span>
                        </div>
                        <span class="btn btn-default btn-file">
                            <span class="fileupload-exists">Cambiar</span>
                            <span class="fileupload-new">Selecionar archivo</span>
                            {!! Form::file('path') !!}
                        </span>
                        <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remover</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
