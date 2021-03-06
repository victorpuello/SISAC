<ul class="nav nav-main">
    <li>
        <a class="nav-link" href="<?php echo e(route('home')); ?>">
            <i class="fas fa-home" aria-hidden="true"></i>
            <span>Escritorio</span>
        </a>
    </li>
    <li class="nav-parent">
        <a class="nav-link" href="#">
            <i class="fas fa-book-open" aria-hidden="true"></i>
            <span>Academico</span>
        </a>
        <ul class="nav nav-children">
            <li>
                <a class="nav-link" href="<?php echo e(route('docente.indicadors.index')); ?>">
                    Indicadores
                </a>
            </li>
        </ul>
        <ul class="nav nav-children">
            <li>
                <a class="nav-link" href="<?php echo e(route('docente.planillas.index')); ?>">
                    Calificar
                </a>
            </li>
            <?php if (\Illuminate\Support\Facades\Blade::check('multilogros')): ?>
                <li>
                    <a class="nav-link" href="<?php echo e(route('docente.planillas.index')); ?>">
                        Asistencias
                    </a>
                </li>
            <?php endif; ?>
        </ul>
        <?php if (\Illuminate\Support\Facades\Blade::check('director')): ?>
        <ul class="nav nav-children">
            <li>
                <a class="nav-link" href="<?php echo e(route('docente.direccion.index')); ?>">
                    Dirección de grupo
                </a>
            </li>
        </ul>
        <?php endif; ?>
    </li>
    <li>
        <a class="nav-link" href="<?php echo e(route('docente.asignacions.index')); ?>">
            <i class="fas fa-chalkboard-teacher" aria-hidden="true"></i>
            <span>Asignación Academica</span>
        </a>
    </li>
    <li class="nav-parent">
        <a class="nav-link" href="#">
            <i class="fas fa-print" aria-hidden="true"></i>
            <span>Reportes</span>
        </a>
        <ul class="nav nav-children">
            <li>
                <a class="nav-link" href="<?php echo e(route('docente.reportes.index')); ?>">
                    Reporte Academico
                </a>
            </li>
        </ul>
    </li>
</ul>





<?php /**PATH /var/www/SISAC/resources/views/partials/menuLateralDocentes.blade.php ENDPATH**/ ?>