<div class="form-group row">
    <div class="col-lg-6">
        <div class="form-group">
            {!! Form::label('name', 'Nombre: ',['class'=>'control-label']) !!}
            {!! Form::text('name', null, ['disabled','class' => 'form-control','id'=>'inputDefault', 'placeholder' => 'Por favor introduzca el nombre de la IE']) !!}
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            {!! Form::label('siglas', 'Siglas: ',['class'=>'control-label']) !!}
            {!! Form::text('siglas', null, ['disabled','class' => 'form-control','id'=>'inputDefault', 'placeholder' => 'Por favor introduzca la sigla de la IE']) !!}
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            {!! Form::label('resolucion', 'Resolución: ',['class'=>'control-label']) !!}
            {!! Form::text('resolucion', null, ['disabled','class' => 'form-control','id'=>'inputDefault', 'placeholder' => 'Resolución de la IE']) !!}
        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-4">
        <div class="form-group">
            {!! Form::label('dane', 'DANE: ',['class'=>'control-label']) !!}
            {!! Form::text('dane', null, ['disabled','class' => 'form-control','id'=>'inputDefault', 'placeholder' => 'Por favor introduzca el DANE de la IE']) !!}
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            {!! Form::label('nit', 'NIT: ',['class'=>'control-label']) !!}
            {!! Form::text('nit', null, ['disabled','class' => 'form-control','id'=>'inputDefault', 'placeholder' => 'Por favor introduzca el NIT de la IE']) !!}
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            {!! Form::label('slogan', 'Slogan',['class'=>'control-label']) !!}
            {!! Form::text('slogan', null, ['disabled','class' => 'form-control','id'=>'inputDefault', 'placeholder' => 'Slogan de la IE']) !!}
        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-4">
        <div class="form-group">
            {!! Form::label('address', 'Dirección: ',['class'=>'control-label']) !!}
            {!! Form::text('address', null, ['disabled','class' => 'form-control','id'=>'inputDefault', 'placeholder' => 'Por favor introduzca la dirección de la IE']) !!}
        </div>
    </div>
    <div class="col-lg-4">
        {!! Form::label('phone', 'Telefono: ',['class'=>'control-label']) !!}
        {!! Form::text('phone', null, ['disabled','class' => 'form-control','id'=>'inputDefault', 'placeholder' => 'Por favor introduzca el Telefono']) !!}
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            {!! Form::label('email', 'Email:  ',['class'=>'control-label']) !!}
            {!! Form::email('email',null,['disabled','class' => 'form-control','id'=>'inputDefault', 'placeholder' => 'Por favor introduzca el Email'])!!}
        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-4">
        <div class="form-group">
            {!! Form::label('idrector', 'Identifición Rector: ',['class'=>'control-label']) !!}
            {!! Form::text('idrector', null, ['disabled','class' => 'form-control','id'=>'inputDefault', 'placeholder' => 'Número de identidad del Rector']) !!}
        </div>
    </div>
    <div class="col-lg-8">
        <div class="form-group">
            {!! Form::label('rector', 'Nombre del Rector: ',['class'=>'control-label']) !!}
            {!! Form::text('rector', null, ['disabled','class' => 'form-control','id'=>'inputDefault', 'placeholder' => 'Nombre completo del Rector']) !!}
        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-12">
        <div class="form-group">
            <div class="thumb-info mb-4">
                <a href="{{asset("storage/".$institucion->path)}}" data-plugin-lightbox data-plugin-options='{ "type":"image" }' title="Escudo">
                    <img src="{{asset("storage/".$institucion->path)}}" class="rounded img-fluid" alt="{{$institucion->name}}">
                    <div class="thumb-info-title">
                        <span class="thumb-info-inner">Escudo</span>
                        <span class="thumb-info-type">Institución</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
