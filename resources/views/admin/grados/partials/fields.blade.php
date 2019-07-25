<div class="form-group row ml-4 mr-4">
            {!! Form::label('name', 'Nombre',['class'=>'control-label']) !!}
            {!! Form::text('name', null, ['class' => 'form-control','id'=>'name', 'placeholder' => 'Nombre del grado','required']) !!}
</div>
<div class="form-group row ml-4 mr-4">
            {!! Form::label('numero', 'Número',['class'=>'control-label']) !!}
            {!! Form::text('numero', null, ['class' => 'form-control','id'=>'numero', 'placeholder' => 'Número del grado','required']) !!}
</div>
<div class="form-group row ml-4 mr-4">
            {!! Form::label('nivel', 'Tipo documento de Identidad',['class'=>'control-label']) !!}
            {!! Form::select('nivel',['preescolar'=>'Pre - Escolar','primaria' => 'Primaria','secundaria' => 'Secundaria', 'media' => 'Media'], null, ['class' => 'form-control mb-3','placeholder' =>'Selecciona el nivel', 'id'=>'nivel','required']) !!}
</div>