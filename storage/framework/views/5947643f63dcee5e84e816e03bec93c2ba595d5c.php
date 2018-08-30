<ul class="nav nav-main">
    <li>
        <a class="nav-link" href="<?php echo e(route('home')); ?>">
            <i class="fas fa-home" aria-hidden="true"></i>
            <span>Escritorio</span>
        </a>
    </li>
    <li class="nav-parent">
        <a class="nav-link" href="#">
            <i class="fas fa-print" aria-hidden="true"></i>
            <span>Reportes</span>
        </a>
        <ul class="nav nav-children">
            <li>
                <a class="nav-link" href="<?php echo e(route('secretaria.reportes.index')); ?>">
                    Reporte Academico
                </a>
            </li>
        </ul>
    </li>
</ul>





