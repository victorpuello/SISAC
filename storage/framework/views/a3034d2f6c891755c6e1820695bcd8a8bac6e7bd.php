<?php $__env->startSection('titulo', "Alummnos"); ?>
<?php $__env->startSection('namePage', "Modulo: Alummnos - Editar "); ?>
<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('vendor/bootstrap-fileupload/bootstrap-fileupload.min.css')); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="card card-featured card-featured-primary mb-4">
        <header class="card-header">
            <h2 class="card-title">Editar alummno: <?php echo e($estudiante->name); ?> </h2>
        </header>
        <div class="card-body">
            <?php echo $__env->make('admin.users.partials.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo Form::model($estudiante,['route' => ['docente.estudiantes.update',$estudiante->id], 'method' => 'PUT','files' => true,'class' => 'form-horizontal form-bordered']); ?>

            <div class="form-group row">
                <div class="card-body col-lg-4">
                    <div class="thumb-info mb-3">
                        <img src="<?php echo e(url('/imgUsers/estudiantes/')); ?>/<?php echo e($estudiante->path); ?>" class="rounded img-fluid" alt="<?php echo e($estudiante->name); ?>">
                        <div class="thumb-info-title">
                            <span class="thumb-info-inner"><?php echo e($estudiante->name); ?></span>
                            <span class="thumb-info-type">Alumno</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="form-group row mt-4">
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
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?php echo Form::label('typeid', 'Tipo documento de Identidad',['class'=>'control-label']); ?>

                                <?php echo Form::select('typeid',['RC'=>'Registro civil','TI' => 'Tarjeta de identidad','CC' => 'Cedula de ciudadania', 'DE' => 'Documento de extranjero'], null, ['class' => 'form-control mb-3','placeholder' =>'Selecciona el tipo de ID', 'id'=>'typeid','required']); ?>

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?php echo Form::label('identification', 'Número de Identificación: ',['class'=>'control-label']); ?>

                                <?php echo Form::number('identification'); ?>

                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?php echo Form::label('gender', 'Sexo',['class'=>'control-label']); ?>

                                <?php echo Form::select('gender',['F'=>'Femenino','M' => 'Masculino'], null, ['class' => 'form-control','required','placeholder' =>'Selecciona el genero']); ?>

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?php echo Form::label('birthday', 'Fecha de Nacimiento: ',['class'=>'control-label']); ?>

                                <?php echo Form::date('birthday'); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-4">
                    <?php echo Form::label('birthstate', 'Departamento de nacimiento',['class'=>'control-label']); ?>

                    <?php echo Form::select('birthstate',$departamentos, null,['placeholder' =>'Selecciona un Departamento','class' => 'form-control mb-3', 'id'=>'birthstate','required','data-url'=>route('docente.municipios',':ID')]); ?>

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
            <div class="col-lg-6">
                <?php echo Form::hidden('salon_id'); ?>

                <?php echo Form::hidden('dateout'); ?>

                <?php echo Form::hidden('stade'); ?>

                <?php echo Form::hidden('situation'); ?>

                <?php echo Form::hidden('datein'); ?>

            </div>
            <div class="card-footer">
                <a href="<?php echo e(URL::previous()); ?>" class="btn btn-danger">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </div>
            <?php echo Form::close(); ?>

        </div>
    </section>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('vendor/autosize/autosize.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/bootstrap-fileupload/bootstrap-fileupload.min.js')); ?>"></script>
    <?php echo Html::script('js/municipios.js'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>