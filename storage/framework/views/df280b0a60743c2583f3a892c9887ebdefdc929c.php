<div class="p-3">
    <h4 class="mb-3">Historico</h4>
    <div class="timeline timeline-simple mt-3 mb-3">
        <div class="tm-body">
            <?php $__currentLoopData = $periodos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $periodo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($estudiante->getAnotacionPeriodo($periodo)->count() > 0 ): ?>
                    <div class="tm-title">
                        <h5 class="m-0 pt-2 pb-2 text-uppercase"><?php echo e($periodo->name); ?></h5>
                    </div>
                    <ol class="tm-items">
                        <?php $__currentLoopData = $estudiante->getAnotacionPeriodo($periodo); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $anotacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <div class="tm-box">
                                    <p class="text-muted mb-0 fecha" data-fecha="<?php echo e($anotacion->created_at); ?>"></p>
                                    <p class="mb-1">
                                        <?php echo e($anotacion->annotation); ?>

                                    </p>
                                    <div class="float-md-right">
                                        <a class=" btn btn-xs btn-info " href="<?php echo e(url('/imgUsers/documentos/')); ?>/<?php echo e($anotacion->path); ?> " data-plugin-lightbox data-plugin-options='{ "type":"image" }' title="Acta de compromiso.">
                                            Generar Acta
                                        </a>
                                        <a class=" btn btn-xs btn-warning" href="<?php echo e(url('/imgUsers/documentos/')); ?>/<?php echo e($anotacion->path); ?> " data-plugin-lightbox data-plugin-options='{ "type":"image" }' title="Acta de compromiso.">
                                            Ver Acta
                                        </a>
                                        <a class="btn btn-xs btn-primary simple-ajax-modal" href="<?php echo e(route('docente.anotaciones.edit',$anotacion)); ?>">Editar</a>
                                        <?php echo Form::open(['method' => 'DELETE','class'=>'text-lg-right','route' => ['docente.anotaciones.destroy',$anotacion],'style' => 'display: inline-block;']); ?>

                                        <button class="btn btn-xs btn-danger" type="submit">Eliminar</button>
                                        <?php echo Form::close(); ?>

                                    </div>
                                </div>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ol>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>