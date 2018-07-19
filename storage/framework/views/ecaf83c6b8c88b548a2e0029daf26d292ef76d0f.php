<?php $__env->startSection('titulo', "Aulas"); ?>
<?php $__env->startSection('namePage', "Modulo: Aulas"); ?>
<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <?php for($i = 0; $i < 12; $i++): ?>
            <div class="col-lg-4 col-xl-4">
                <section class="card card-featured-left card-featured-primary mb-4">
                    <div class="card-body">
                        <div class="widget-summary">
                    <div class="widget-summary-col widget-summary-col-icon">
                        <div class="summary-icon bg-<?php echo e($fondos[rand(0,3)]); ?>">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-square-o fa-stack-2x"></i>
                                <strong class="fa-stack-1x" style="font-size:80%; margin: -17%;"><?php echo e($salones->where('grade','=',$i)->count()); ?></strong>
                            </span>
                        </div>
                    </div>
                    <div class="widget-summary-col">
                        <div class="summary">
                            <h4 class="title">Aulas Grado <?php echo e($i); ?></h4>
                            <div class="info">
                                <strong >Ingresa para hacer modificaciones en las aulas de</strong>
                            </div>
                        </div>
                        <div class="summary-footer">
                            <a href="<?php echo e(route('aulas.show',$i)); ?>" class="text-muted text-uppercase">Ver Aulas</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
            </div>
        <?php endfor; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>