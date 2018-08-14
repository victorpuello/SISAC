<div id="custom-content" class="modal-block modal-block-primary modal-header-color">
    <section class="card">
        <header class="card-header">
            <h2 class="card-title">Notas de: <strong><?php echo e($estudiante->full_name); ?></strong> </h2>
        </header>
        <div class="card-body">
        <div class="row">
            <div class="col-lg-12 accordion accordion-primary" id="accordion2Primary">
                <?php $__currentLoopData = $periodos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $periodo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card card-default">
                    <div class="card-header">
                        <h4 class="card-title m-0">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2Primary" href="#<?php echo e(classAcordeon($periodo->id)); ?>">
                               <?php echo e($periodo->name); ?>

                            </a>
                        </h4>
                    </div>
                    <div id="<?php echo e(classAcordeon($periodo->id)); ?>" class="collapse">
                        <div class="card-body row">
                            <?php $__currentLoopData = $estudiante->definitivas->where('periodo_id','=',$periodo->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $definitiva): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <table class="table col-lg-4">
                                <tbody>
                                    <tr>
                                        <td><?php echo e($definitiva->asignatura->name); ?></td>
                                        <td><strong><?php echo e($definitiva->score); ?></strong></td>
                                    </tr>
                                </tbody>
                            </table>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        </div>
        <footer class="card-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                    <button class="btn  btn-danger modal-dismiss">Cerrar</button>
                </div>
            </div>
        </footer>
    </section>
</div>
