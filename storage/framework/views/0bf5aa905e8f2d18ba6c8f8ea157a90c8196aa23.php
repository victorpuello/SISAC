<?php $__env->startSection('titulo', "Alummnos"); ?>
<?php $__env->startSection('namePage', "Modulo: Alumnos - Ver "); ?>
<?php $__env->startSection('styles'); ?>
    <?php echo Html::style('vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-4 col-xl-3 mb-4 mb-xl-0">
            <section class="card">
                <div class="card-body">
                    <div class="thumb-info mb-3">
                        <img src="<?php echo e(url('/imgUsers/estudiantes/')); ?>/<?php echo e($estudiante->path); ?>" class="rounded img-fluid" alt="<?php echo e($estudiante->name); ?>">
                        <div class="thumb-info-title">
                            <span class="thumb-info-inner"><?php echo e($estudiante->name); ?></span>
                            <span class="thumb-info-type">Alumno</span>
                        </div>
                    </div>

                    <div class="widget-toggle-expand mb-3">
                        <div class="widget-content-expanded">
                            <ul class="simple-todo-list mt-3">
                                <li class="completed">Update Profile Picture</li>
                                <li class="completed">Change Personal Information</li>
                                <li>Update Social Media</li>
                                <li>Follow Someone</li>
                            </ul>
                        </div>
                    </div>
                    <hr class="dotted short">
                    <div class="clearfix">
                        <a class="text-uppercase text-muted float-right" href="#">(View All)</a>
                    </div>
                    <hr class="dotted short">
                    <div class="social-icons-list">
                        <a rel="tooltip" data-placement="bottom" target="_blank" href="http://www.facebook.com" data-original-title="Facebook"><i class="fab fa-facebook-f"></i><span>Facebook</span></a>
                        <a rel="tooltip" data-placement="bottom" href="http://www.twitter.com" data-original-title="Twitter"><i class="fab fa-twitter"></i><span>Twitter</span></a>
                        <a rel="tooltip" data-placement="bottom" href="http://www.linkedin.com" data-original-title="Linkedin"><i class="fab fa-linkedin-in"></i><span>Linkedin</span></a>
                    </div>

                </div>
            </section>
        </div>
        <div class="col-lg-8 col-xl-6">
            <div class="tabs">
                <ul class="nav nav-tabs tabs-primary">
                    <li class="nav-item active">
                        <a class="nav-link" href="#infPers" data-toggle="tab">Información Personal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#edit" data-toggle="tab">Observador</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#edit" data-toggle="tab">Acudiente</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="infPers" class="tab-pane active">
                        <span class="alternative-font"><?php echo e($estudiante->FullName); ?></span>
                        <hr class="dotted short">
                        <div class="row">
                            <table class=" ml-3 mr-3 table table-responsive-lg table-bordered table-striped table-sm mb-0">
                                <tbody>
                                <tr>
                                    <td><strong>Nombre: </strong></td>
                                    <td><?php echo e($estudiante->name); ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Apellidos: </strong></td>
                                    <td><?php echo e($estudiante->lastname); ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Tipo de ID: </strong></td>
                                    <td><?php echo e($estudiante->typeid); ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Número de ID: </strong></td>
                                    <td><?php echo e($estudiante->identification); ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Fecha de Nacimiento: </strong></td>
                                    <td><?php echo e($estudiante->birthday); ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Dpto. de Nacimiento: </strong></td>
                                    <td><?php echo e($municipio->departamento->name); ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Mpio. de Nacimiento: </strong></td>
                                    <td><?php echo e($municipio->name); ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Sexo: </strong></td>
                                    <td><?php echo e($estudiante->gender); ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Dirección: </strong></td>
                                    <td><?php echo e($estudiante->address); ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Fecha de Ingreso: </strong></td>
                                    <td><?php echo e($estudiante->datein); ?></td>
                                </tr>
                                <?php if(!$estudiante->getActiveAttribute()): ?>
                                    <tr>
                                        <td><strong>Fecha de Retiro: </strong></td>
                                        <td><?php echo e($estudiante->dateout); ?></td>
                                    </tr>
                                <?php endif; ?>
                                <tr>
                                    <td><strong>Estado en Sistema: </strong></td>
                                    <td><?php echo e($estudiante->stade); ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Situación academica: </strong></td>
                                    <td><?php echo e($estudiante->situation); ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Salón: </strong></td>
                                    <td><?php echo e($estudiante->salon->full_name); ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div id="edit" class="tab-pane">
                        <h4 class="mb-3">Acudiente</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3">

            <h4 class="mb-3 mt-0">Sale Stats</h4>
            <ul class="simple-card-list mb-3">
                <li class="primary">
                    <h3>488</h3>
                    <p class="text-light">Nullam quris ris.</p>
                </li>
                <li class="primary">
                    <h3>$ 189,000.00</h3>
                    <p class="text-light">Nullam quris ris.</p>
                </li>
                <li class="primary">
                    <h3>16</h3>
                    <p class="text-light">Nullam quris ris.</p>
                </li>
            </ul>
        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <?php echo Html::script('vendor/autosize/autosize.js'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>