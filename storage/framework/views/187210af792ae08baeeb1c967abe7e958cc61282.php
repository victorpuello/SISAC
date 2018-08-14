

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
</div>
<div class="form-group row">

    <div class="col-lg-6">
        <?php echo Form::hidden('salon_id'); ?>

        <?php echo Form::hidden('dateout'); ?>

        <?php echo Form::hidden('stade'); ?>

        <?php echo Form::hidden('situation'); ?>

        <?php echo Form::hidden('datein'); ?>

    </div>
</div>
