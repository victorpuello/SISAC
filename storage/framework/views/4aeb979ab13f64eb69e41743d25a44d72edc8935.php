<?php $__env->startSection('titulo', "Alummnos"); ?>
<?php $__env->startSection('namePage', "Modulo: Alumnos - Ver "); ?>
<?php $__env->startSection('styles'); ?>
    <?php echo Html::style('vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-2 col-xl-2">
            <section class="card">
                <div class="card-body">
                    <div class="thumb-info mb-3">
                        <img src="<?php echo e(asset("storage/usersdata/img/estudiantes/".$estudiante->path)); ?>" class="rounded img-fluid" alt="<?php echo e($estudiante->name); ?>">
                        <div class="thumb-info-title">
                            <span class="thumb-info-inner"><?php echo e($estudiante->name); ?></span>
                            <span class="thumb-info-type">Alumno</span>
                        </div>
                    </div>
                    <hr class="dotted short">
                    <div class="clearfix">
                        <a class="text-uppercase text-muted float-right" href="<?php echo e(route('secretaria.estudiantes.edit', $estudiante)); ?>">(Editar)</a>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-lg-10 col-xl-10">
            <div class="tabs">
                <ul class="nav nav-tabs tabs-primary">
                    <li class="nav-item active">
                        <a class="nav-link" href="#informacion" data-toggle="tab">Información Personal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#acudiente" data-toggle="tab">Acudiente</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#certificado" data-toggle="tab">Certificados</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="informacion" class="tab-pane active">
                       <?php echo $__env->make('secretaria.estudiantes.partials.pestana.informacion', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                    <div id="acudiente" class="tab-pane">
                       <?php echo $__env->make('secretaria.estudiantes.partials.pestana.acudiente', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                    <div id="certificado" class="tab-pane">

                    </div>
                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <?php echo Html::script('vendor/autosize/autosize.js'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>