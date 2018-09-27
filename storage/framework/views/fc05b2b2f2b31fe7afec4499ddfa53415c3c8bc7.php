<ul class="nav nav-main">
    <li>
        <a class="nav-link" href="<?php echo e(route('home')); ?>">
            <i class="fas fa-home" aria-hidden="true"></i>
            <span>Escritorio</span>
        </a>
    </li>
    <li class="nav-parent">
        <a class="nav-link" href="#">
            <i class="fas fa-school" aria-hidden="true"></i>
            <span>Institución</span>
        </a>
        <ul class="nav nav-children">
            <li>
                <a class="nav-link" href="<?php echo e(route('institucion.index')); ?>">
                    <i class="fas fa-cog" aria-hidden="true"></i>
                    <span>Configuración</span>
                </a>
            </li>
        </ul>
        <ul class="nav nav-children">
            <li>
                <a class="nav-link" href="<?php echo e(route('grupos.index')); ?>">
                    <i class="fas fa-chalkboard-teacher" aria-hidden="true"></i>
                    <span>Grupos</span>
                </a>
            </li>
        </ul>
        <ul class="nav nav-children">
            <li>
                <a class="nav-link" href="<?php echo e(route('asignaturas.index')); ?>">
                    <i class="fas fa-book" aria-hidden="true"></i>
                    Asignaturas
                </a>
            </li>
        </ul>

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
    <li class="nav-parent">
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
                <a class="nav-link" href="<?php echo e(route('asignacions.index')); ?>">
                    Asignación Academica
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-parent">
        <a class="nav-link" href="#">
            <i class="fas fa-book-open" aria-hidden="true"></i>
            <span>Academico</span>
        </a>
        <ul class="nav nav-children">
            <li class="nav-parent">
                <a class="nav-link" href="#">
                    Logros
                </a>
                <ul class="nav nav-children">
                    <li>
                        <a href="<?php echo e(route('logros.index')); ?>">
                           Logros Individuales
                        </a>
                    </li>
                    <li class="nav-parent">
                        <a class="nav-link" href="#">
                            Paquetes de Logros
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="<?php echo e(route('logros.import')); ?>">
                                    Cargar Logros
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
        <ul class="nav nav-children">
            <li>
                <a class="nav-link" href="<?php echo e(route('notas.index')); ?>">
                    Calificar
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-parent">
        <a class="nav-link" href="#">
            <i class="fas fa-clock" aria-hidden="true"></i>
            <span>Periodos</span>
        </a>
            <ul class="nav nav-children">
                <li>
                    <a class="nav-link" href="<?php echo e(route('periodos.index')); ?>">
                        Ver Periodos
                    </a>
                </li>
            </ul>
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
            <ul class="nav nav-children">
                <li>
                    <a class="nav-link" href="<?php echo e(route('logs')); ?>">
                        Logs
                    </a>
                </li>
            </ul>
    </li>
</ul>
