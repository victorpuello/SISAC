<div class="form-group row">
    <label class="col-sm-2 control-label text-sm-right pt-1" for="w1-username">Descripción: </label>
    <div class="col-sm-10">
        {!! Form::textarea('annotation',null, array('class'=>'form-control','id' => 'compromises','required','rows' => 3, 'cols' => 50,'placeholder'=>'Ingrese unca corta descripción de lo sucedido.')) !!}

    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 control-label text-sm-right pt-1" for="w1-username">Compromisos: </label>
    <div class="col-sm-10">
        {!! Form::textarea('compromises',null, array('class'=>'form-control','id' => 'compromises','required','rows' => 3, 'cols' => 50,'placeholder'=>'Ingrese los compromisos adquiridos.')) !!}
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 control-label text-sm-right pt-1" for="w1-username">Tipo de anotación: </label>
    <div class="col-sm-10">
        {!! Form::select('type',['academico'=>'Academico','convivencia'=>'Convivencia'], null, ['class' => 'form-control mb-3', 'id'=>'type','required', 'placeholder'=>'Seleccione una opción']) !!}
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 control-label text-sm-right pt-1" for="w1-username">Tipo de anotación: </label>
    <div class="col-sm-10">
        {!! Form::select('periodo_id',$periodos->pluck('name','id'), null, ['class' => 'form-control mb-3', 'id'=>'periodo','required', 'placeholder'=>'Seleccione un periodo']) !!}
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-12">
        <div class="form-group">
            <label class="col-sm-2 control-label text-sm-right pt-1">Acta Firmada</label>
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
                            {!! Form::file('path')!!}
                        </span>
                        <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{!! Form::hidden('estudiante_id',$estudiante->id) !!}
{!! Form::hidden('docente_id',auth()->user()->docente->id) !!}

