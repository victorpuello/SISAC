<?php $__env->startSection('titulo', "Docentes"); ?>
<?php $__env->startSection('namePage', "Modulo: Docentes - Editar "); ?>
<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('vendor/bootstrap-fileupload/bootstrap-fileupload.min.css')); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="card card-featured card-featured-primary mb-4">
        <header class="card-header">
            <h2 class="card-title">Editar Docente: <?php echo e($docente->user->FullName); ?> </h2>
        </header>
        <div class="card-body">
            <?php echo $__env->make('admin.docentes.partials.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo Form::model($docente,['route' => ['docentes.update',$docente->id], 'method' => 'PUT','files' => true,'class' => 'form-horizontal form-bordered']); ?>

            <div class="form-group row">
                <div class="thumb-info mb-3 col-lg-3">
                    <img src="<?php echo e(url('/imgUsers/')); ?>/<?php echo e($docente->path); ?>" class="rounded img-fluid" alt="<?php echo e($docente->user->FullName); ?>">
                    <div class="thumb-info-title">
                        <span class="thumb-info-inner"><?php echo e($docente->user->name); ?></span>
                        <span class="thumb-info-type">Docente</span>
                    </div>
                </div>
            </div>
            <?php echo Form::number('user_id', null, ['class' => 'form-control', 'placeholder' => '','id'=>'user_id','style'=>'display:none']); ?>

            <div class="form-group row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="col-form-label" for="typeid">Tipo de Identificación: </label>
                        <?php echo Form::select('typeid',['CC'=>'Cedula de ciudadania','CE' => 'Cedula de extranjeria','PT' => 'Pasaporte'], null, ['class' => 'form-control mb-3', 'id'=>'typeid','required']); ?>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="col-form-label" for="numberid">Número de Identificación: </label>
                        <?php echo Form::number('numberid', null, ['class' => 'form-control', 'placeholder' => '','id'=>'numberid']); ?>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="col-form-label" for="fnac">Fecha de Nacimiento: </label>
                        <?php echo Form::date('fnac', null, ['class' => 'form-control', 'placeholder' => '','id'=>'fnac']); ?>

                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="col-form-label" for="gender">Genero: </label>
                        <?php echo Form::select('gender',['M'=>'Masculino','F' => 'Femenino'], null, ['class' => 'form-control mb-3', 'id'=>'gender','required']); ?>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="col-form-label" for="address">Dirección: </label>
                        <?php echo Form::text('address', null, ['class' => 'form-control', 'placeholder' => '','id'=>'address']); ?>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="col-form-label" for="phone">Telefono: </label>
                        <?php echo Form::tel('phone', null, ['class' => 'form-control', 'placeholder' => '','id'=>'phone']); ?>

                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-6">
                    <label for="path" >Fotografia del Docente</label>
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
            <div class="card-footer">
                <a href="<?php echo e(route('docentes.index')); ?>" class="btn btn-danger">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </div>
            <?php echo Form::close(); ?>

        </div>
    </section>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('vendor/autosize/autosize.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/bootstrap-fileupload/bootstrap-fileupload.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>