<div class="tab-content">
    <div id="w1-account" class="tab-pane p-3 active">
        <div class="form-group row">
            <label class="col-sm-4 control-label text-sm-right pt-1" for="w1-username">Nombre del docente: </label>
            <div class="col-sm-8">
                {!! Form::select('user_id',array_pluck($users,'name','id'), null, ['class' => 'form-control mb-3', 'id'=>'w1-username','required', 'placeholder'=>'Seleccione un docente']) !!}
                <span class="help-block">Selecciona el nombre del docente al que deseas completar el perfil, y presiona siguiente</span>
            </div>
        </div>
    </div>
    <div id="w1-profile" class="tab-pane p-3">
        <div class="form-group row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label class="col-form-label" for="typeid">Tipo de Identificación: </label>
                    {!! Form::select('typeid',['CC'=>'Cedula de ciudadania','CE' => 'Cedula de extranjeria','PT' => 'Pasaporte'], null, ['class' => 'form-control mb-3', 'id'=>'typeid','required']) !!}
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label class="col-form-label" for="numberid">Número de Identificación: </label>
                    <input type="number" name="numberid" class="form-control" id="numberid" min="0" placeholder="" required>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label class="col-form-label" for="fnac">Fecha de Nacimiento: </label>
                    <input type="date" class="form-control" name="fnac" id="fnac" placeholder="" required>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label class="col-form-label" for="gender">Genero: </label>
                    {!! Form::select('gender',['M'=>'Masculino','F' => 'Femenino'], null, ['class' => 'form-control mb-3', 'id'=>'gender','required']) !!}
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label class="col-form-label" for="address">Dirección: </label>
                    <input type="text" name="address" class="form-control" id="address" placeholder="" required>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label class="col-form-label" for="phone">Telefono: </label>
                    <input type="tel" class="form-control" name="phone" id="phone" placeholder="" required>
                </div>
            </div>
        </div>
    </div>
    <div id="w1-confirm" class="tab-pane p-3">
        <div class="form-group row">
            <label class="col-lg-6 control-label text-lg-right pt-2">Fotografia del Docente</label>
            <div class="col-lg-6">
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
                        <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Cambiar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
