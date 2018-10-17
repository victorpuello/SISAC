<div class="form-group row">
    <div class="col-lg-6">
        <?php echo Form::label('name', 'Nombres',['class'=>'col-lg-6 control-label text-lg-left pt-2']); ?>

        <?php echo Form::text('name', null, ['class' => 'form-control','id'=>'inputDefault', 'placeholder' => 'Por favor introduzca el nombre']); ?>

    </div>
    <div class="col-lg-6">
        <?php echo Form::label('lastname', 'Apellidos',['class'=>'col-lg-6 control-label text-lg-left pt-2']); ?>

        <?php echo Form::text('lastname', null, ['class' => 'form-control', 'placeholder' => 'Por favor introduzca los apellidos']); ?>

    </div>
</div>
<div class="form-group row">
    <div class="col-lg-6">
        <?php echo Form::label('email', 'E-Mail',['class'=>'col-lg-6 control-label text-lg-left pt-2']); ?>

        <?php echo Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'example@gmail.com']); ?>

    </div>
    <div class="col-lg-6">
        <?php echo Form::label('username', 'Usuario',['class'=>'col-lg-6 control-label text-lg-left pt-2']); ?>

        <?php echo Form::text('username', null, ['class' => 'form-control', 'placeholder' => '']); ?>

    </div>
</div>
<div class="form-group row">
    <div class="col-lg-6">
        <?php echo Form::label('password', 'Contraseña',['class'=>'col-lg-6 control-label text-lg-left pt-2']); ?>

        <input name="password" type="password"  class="form-control" required>
    </div>
    <div class="col-lg-6">
        <?php echo Form::label('password-confirm', 'Confirmar contraseña',['class'=>'col-lg-8 control-label text-lg-left pt-2']); ?>

        <input name="password-confirm" type="password"  class="form-control" required>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-4">
        <?php echo Form::label('type', 'Tipo de usuario',['class'=>'col-lg-12 control-label text-lg-left']); ?>

        <?php echo Form::select('type',[''=>'Seleccione Tipo','admin'=>'Administrador','coordinador'=>'Coordinador','docente'=>'Docente','secretaria'=>'Secretaria'], null, ['class' => 'form-control mb-3']); ?>

    </div>
    <div class="col-lg-8">
        <div class="form-group">
            <label class=" control-label">Foto</label>
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
                        <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remover</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>