<div class="form-group row">
    <div class="col-lg-6">
        <div class="form-group">
            <?php echo Form::label('name', 'Nombres',['class'=>'control-label']); ?>

            <?php echo Form::text('name', null, ['class' => 'form-control','id'=>'inputDefault', 'placeholder' => 'Por favor introduzca el nombre']); ?>

        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <?php echo Form::label('lastname', 'Apellidos',['class'=>'control-label']); ?>

            <?php echo Form::text('lastname', null, ['class' => 'form-control','id'=>'inputDefault', 'placeholder' => 'Por favor introduzca los apellidos']); ?>

        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-3">
        <div class="form-group">
            <?php echo Form::label('typeid', 'Tipo documento de Identidad',['class'=>'control-label']); ?>

            <?php echo Form::select('typeid',['RC'=>'Registro civil','TI' => 'Tarjeta de identidad','CC' => 'Cedula de ciudadania', 'DE' => 'Documento de extranjero'], null, ['class' => 'form-control mb-3','placeholder' =>'Selecciona el tipo de ID', 'id'=>'typeid','required']); ?>

        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            <?php echo Form::label('identification', 'Número de Identificación: ',['class'=>'control-label']); ?>

            <?php echo Form::number('identification'); ?>

        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            <?php echo Form::label('gender', 'Sexo',['class'=>'control-label']); ?>

            <?php echo Form::select('gender',['F'=>'Femenino','M' => 'Masculino'], null, ['class' => 'form-control','required','placeholder' =>'Selecciona el genero']); ?>

        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            <?php echo Form::label('birthday', 'Fecha de Nacimiento: ',['class'=>'control-label']); ?>

            <?php echo Form::date('birthday'); ?>

        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-4">
        <?php echo Form::label('birthstate', 'Departamento de nacimiento',['class'=>'control-label']); ?>

        <?php echo Form::select('birthstate',$departamentos, null,['placeholder' =>'Selecciona un Departamento','class' => 'form-control mb-3', 'id'=>'birthstate','required','data-url'=>route('municipios',':ID')]); ?>

    </div>
    <div class="col-lg-4">
        <?php echo Form::label('birthcity', 'Municipio de nacimiento',['class'=>'control-label']); ?>

        <?php echo Form::select('birthcity', [],null,['class' => 'form-control mb-3', 'id'=>'birthcity','required']); ?>

    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <?php echo Form::label('address', 'Dirección',['class'=>'control-label']); ?>

            <?php echo Form::text('address', null, ['class' => 'form-control','id'=>'inputDefault', 'placeholder' => 'Por favor introduzca la dirección del estudiante']); ?>

        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-4">
        <?php echo Form::label('EPS', 'EPS',['class'=>'control-label']); ?>

        <?php echo Form::text('EPS', null, ['class' => 'form-control','id'=>'inputDefault', 'placeholder' => 'Por favor introduzca el nombre de la EPS']); ?>

    </div>
    <div class="col-lg-4">
        <?php echo Form::label('phone', 'Telefono',['class'=>'control-label']); ?>

        <?php echo Form::text('phone', null, ['class' => 'form-control','id'=>'inputDefault', 'placeholder' => 'Por favor introduzca el Telefono']); ?>

    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <?php echo Form::label('datein', 'Fecha de Ingreso: ',['class'=>'control-label']); ?>

            <?php echo Form::date('datein'); ?>

        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-4">
        <div class="form-group">
            <?php echo Form::label('dateout', 'Fecha de Retiro: ',['class'=>'control-label']); ?>

            <?php echo Form::date('dateout'); ?>

        </div>
    </div>
    <div class="col-lg-4">
        <?php echo Form::label('stade', 'Estado',['class'=>'control-label']); ?>

        <?php echo Form::select('stade',['activo'=>'Activo','retirado'=>'Retirado','graduado'=>'Graduado'], null,['placeholder' =>'Selecciona un Estado','class' => 'form-control mb-3', 'id'=>'stade','required']); ?>

    </div>
    <div class="col-lg-4">
        <?php echo Form::label('situation', 'Situación',['class'=>'control-label']); ?>

        <?php echo Form::select('situation', ['nuevo'=>'Nuevo','repitente'=>'Repitente','promovido'=>'Promovido','normal'=>'Normal'],null,['placeholder' =>'Selecciona una situación','class' => 'form-control mb-3', 'id'=>'birthcity','required']); ?>

    </div>
</div>
<div class="form-group row">
    <div class="col-lg-6">
        <div class="form-group">
            <label class=" control-label">Fotografia del Estudiante</label>
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
                            <?php echo Form::file('path'); ?>

                        </span>
                        <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <?php echo Form::label('salon_id', 'Salón al que pertenece: ',['class'=>'control-label']); ?>

        <?php echo Form::select('salon_id', $grados,null,['placeholder' =>'Selecciona un Salón','class' => 'form-control mb-3', 'id'=>'birthcity','required']); ?>

    </div>
</div>
