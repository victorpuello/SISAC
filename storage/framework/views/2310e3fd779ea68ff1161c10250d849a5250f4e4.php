<div class="form-group row">
     <?php echo Form::label('name', 'Nombres',['class'=>'col-lg-3 control-label text-lg-right pt-2']); ?>

    <div class="col-lg-6">
        <?php echo Form::text('name', null, ['class' => 'form-control','id'=>'inputDefault', 'placeholder' => 'Por favor introduzca el nombre']); ?>

    </div>
</div>
<div class="form-group row">
     <?php echo Form::label('lastname', 'Apellidos',['class'=>'col-lg-3 control-label text-lg-right pt-2']); ?>

    <div class="col-lg-6">
        <?php echo Form::text('lastname', null, ['class' => 'form-control', 'placeholder' => 'Por favor introduzca los apellidos']); ?>

    </div>
</div>
<div class="form-group row">
     <?php echo Form::label('email', 'E-Mail',['class'=>'col-lg-3 control-label text-lg-right pt-2']); ?>

    <div class="col-lg-6">
        <?php echo Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'example@gmail.com']); ?>

    </div>
</div>
<div class="form-group row">
     <?php echo Form::label('username', 'Usuario',['class'=>'col-lg-3 control-label text-lg-right pt-2']); ?>

    <div class="col-lg-6">
        <?php echo Form::text('username', null, ['class' => 'form-control', 'placeholder' => '']); ?>

    </div>
</div>
<div class="form-group row">
     <?php echo Form::label('password', 'Contraseña',['class'=>'col-lg-3 control-label text-lg-right pt-2']); ?>

    <div class="col-lg-6">
        <input name="password" type="password"  class="form-control" required>
    </div>
</div>
<div class="form-group row">
    <?php echo Form::label('type', 'Tipo de usuario',['class'=>'col-lg-3 control-label text-lg-right pt-2']); ?>

    <div class="col-lg-6">
        <?php echo Form::select('type',[''=>'Seleccione Tipo','admin'=>'Administrador','coordinador'=>'Coordinador','docente'=>'Docente','secretaria'=>'Secretaria'], null, ['class' => 'form-control mb-3']); ?>

    </div>
</div>

