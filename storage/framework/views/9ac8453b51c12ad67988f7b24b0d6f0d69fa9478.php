;
<?php $__env->startSection('titulo', "Usuarios - Importar"); ?>
<?php $__env->startSection('namePage', "Importar: Usuarios"); ?>
<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href=<?php echo e(asset("vendor/bootstrap-fileupload/bootstrap-fileupload.min.css")); ?> />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="card-body">
        <?php echo Form::open(['route' => 'import-users.store', 'method' => 'post','files' => true,'class' => 'form-horizontal', 'novalidate' => "novalidate"]); ?>

        <div class="form-group row">
            <label class="col-lg-3 control-label text-lg-right pt-2">Archivo: </label>
            <div class="col-lg-5">
                <div class="fileupload fileupload-new" data-provides="fileupload">
                    <div class="input-append">
                        <div class="uneditable-input">
                            <i class="fas fa-file fileupload-exists"></i>
                            <span class="fileupload-preview"></span>
                        </div>
                            <span class="btn btn-default btn-file">
                            <span class="fileupload-exists">Cambiar</span>
							<span class="fileupload-new">Selecionar archivo</span>
                                <?php echo Form::file('archivo'); ?>

							</span>
                        <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remover</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <button type="submit" class=" btn btn-lg btn-primary editAsignatura">Importar</button>
            </div>
        </div>
        <?php echo Form::close(); ?>

        <p>Carga un archivo CSV para importar los usuarios con los siguientes campos:
            <ul>
                <li>name</li>
                <li>lastname</li>
                <li>email</li>
                <li>password</li>
                <li>username</li>
                <li>type: ['docente','admin','secretaria','coordinador']</li>
                <li>fullname: 'Este campo y los sigientes son obligatorio para docentes'</li>
                <li>typeid: ['CC','CE']</li>
                <li>numberid</li>
                <li>gender: ['M','F']</li>
        </ul>
        <strong>Recuerda que el archivo debe estar separado por (,) y que no se aceptan caracteres especiales</strong>
        </p>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset("vendor/autosize/autosize.js")); ?>"></script>
    <script src="<?php echo e(asset("vendor/bootstrap-fileupload/bootstrap-fileupload.min.js")); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>