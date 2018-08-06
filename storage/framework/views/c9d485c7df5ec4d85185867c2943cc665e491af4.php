<li class="nav-parent">
    <a class="nav-link" href="#">
        <i class="fas fa-book-open" aria-hidden="true"></i>
        <span>Academico</span>
    </a>
    <ul class="nav nav-children">
        <li>
            <a class="nav-link" href="<?php echo e(route('logros.index')); ?>">
                Logros
            </a>
        </li>
    </ul>
    <ul class="nav nav-children">
        <li>
            <a class="nav-link" href="<?php echo e(route('notas.index')); ?>">
                Calificar
            </a>
        </li>
    </ul>
    <?php if (\Illuminate\Support\Facades\Blade::check('director')): ?>
    <ul class="nav nav-children">
        <li>
            <a class="nav-link" href="<?php echo e(route('notas.index')); ?>">
                Dirección de grupo
            </a>
        </li>
    </ul>
    <?php endif; ?>
</li>
<li>
    <a class="nav-link" href="<?php echo e(route('asignaciones.index')); ?>">
        <i class="fas fa-chalkboard-teacher" ></i>
        Asignación Academica
    </a>
</li>
