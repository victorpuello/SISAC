<div class="form-group row">
    {!! Form::label('name', 'Nombre del grupo',['class'=>'col-lg-4 control-label text-lg-right pt-2']) !!}
    <div class="col-lg-8">
        {!! Form::select('name',['1' => '1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6'], null, ['class' => 'form-control mb-3','placeholder'=>'Seleccione el Número de Salón', 'id'=>'typeid','required']) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('grade', 'Grado: ',['class'=>'col-lg-4 control-label text-lg-right pt-2']) !!}
    <div class="col-lg-8">
        {!! Form::select('grado_id',$grados, null, ['class' => 'form-control mb-3','placeholder'=>'Seleccione un Grado', 'id'=>'grado_id','required']) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('modelo', 'Modelo educativo: ',['class'=>'col-lg-4 control-label text-lg-right pt-2']) !!}
    <div class="col-lg-8">
        {!! Form::select('modelo',['tradicional'=>'Tradicional','escuela nueva'=>'Escuela nueva','etnoeducación'=>'Etno-educación','Aceleración'=>'Aceleración','decreto 3011'=>'Decreto 3011'], null, ['class' => 'form-control mb-3','placeholder'=>'Seleccione un modelo', 'id'=>'modelo','required']) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('jornada_id', 'Jornada: ',['class'=>'col-lg-4 control-label text-lg-right pt-2']) !!}
    <div class="col-lg-8">
        {!! Form::select('jornada_id',$jornadas, null, ['class' => 'form-control mb-3','placeholder'=>'Seleccione una jornada', 'id'=>'jornada_id','required']) !!}
    </div>
</div>