<ul class="nav nav-main">
    <li>
        <a class="nav-link" href="<?php echo e(route('home')); ?>">
            <i class="fas fa-home" aria-hidden="true"></i>
            <span>Escritorio</span>
        </a>
    </li>
    <li class="nav-parent nav-active">
        <a class="nav-link" href="#">
            <i class="fas fa-user" aria-hidden="true"></i>
            <span>Usuarios</span>
        </a>
        <ul class="nav nav-children">
            <li>
                <a class="nav-link" href="<?php echo e(route('users.index')); ?>">
                    Ver usuarios
                </a>
            </li>
        </ul>
        <ul class="nav nav-children">
            <li>
                <a class="nav-link" href="<?php echo e(route('import-users.index')); ?>">
                    Importar usuarios
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-parent nav-active">
        <a class="nav-link" href="#">
            <i class="fas fa-user-graduate" aria-hidden="true"></i>
            <span>Estudiantes</span>
        </a>
        <ul class="nav nav-children">
            <li>
                <a class="nav-link" href="<?php echo e(route('estudiantes.index')); ?>">
                    Ver Estudiantes
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-parent">
        <a class="nav-link" href="#">
            <i class="fas fa-chalkboard-teacher" aria-hidden="true"></i>
            <span>Docentes</span>
        </a>
        <ul class="nav nav-children">
            <li>
                <a class="nav-link" href="<?php echo e(route('docentes.index')); ?>">
                    Ver Docentes
                </a>
            </li>
        </ul>
        <ul class="nav nav-children">
            <li>
                <a class="nav-link" href="<?php echo e(route('docentes.create')); ?>">
                    Agregar Docente
                </a>
            </li>
        </ul>
        <ul class="nav nav-children">
            <li>
                <a class="nav-link" href="<?php echo e(route('asignaciones.index')); ?>">
                    Asignación Academica
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-parent">
        <a class="nav-link" href="#">
            <i class="fas fa-book" aria-hidden="true"></i>
            <span>Asignaturas</span>
        </a>
        <ul class="nav nav-children">
            <li>
                <a class="nav-link" href="<?php echo e(route('asignaturas.index')); ?>">
                    Ver Asignaturas
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-parent">
        <a class="nav-link" href="#">
            <i class="fas fa-book-open" aria-hidden="true"></i>
            <span>Academia</span>
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
        <?php if(currentPerfil() === 'docente'): ?>
            <?php if(\Illuminate\Support\Facades\Auth::user()->docente->is_director): ?>
                <ul class="nav nav-children">
                    <li>
                        <a class="nav-link" href="<?php echo e(route('notas.index')); ?>">
                            Dirección de grupo
                        </a>
                    </li>
                </ul>
            <?php endif; ?>
        <?php endif; ?>

    </li>
    <li >
        <a class="nav-link" href="<?php echo e(route('aulas.index')); ?>">
            <i class="fas fa-school" aria-hidden="true"></i>
            <span>Aulas</span>
        </a>
    </li>


    <li class="nav-parent">
        <a class="nav-link" href="#">
            <i class="fas fa-print" aria-hidden="true"></i>
            <span>Reportes</span>
        </a>
            <ul class="nav nav-children">
                <li>
                    <a class="nav-link" href="<?php echo e(route('reportes.index')); ?>">
                        Reporte Academico
                    </a>
                </li>
            </ul>
    </li>

</ul>
