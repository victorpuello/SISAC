<ul class="nav nav-main">
    <li>
        <a class="nav-link" href="{{route('home')}}">
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
                <a class="nav-link" href="{{route('institucions.index')}}">
                    <i class="fas fa-cog" aria-hidden="true"></i>
                    <span>Configuración</span>
                </a>
            </li>
        </ul>
        <ul class="nav nav-children">
            <li>
                <a class="nav-link" href="{{route('grupos.index')}}">
                    <i class="fas fa-chalkboard-teacher" aria-hidden="true"></i>
                    <span>Grupos</span>
                </a>
            </li>
        </ul>
        <ul class="nav nav-children">
            <li>
                <a class="nav-link" href="{{route('asignaturas.index')}}">
                    <i class="fas fa-book" aria-hidden="true"></i>
                    Asignaturas
                </a>
            </li>
        </ul>

    </li>
    <li class="nav-parent {{ request()->is('admin/users') ? 'nav-active' : '' }}">
        <a class="nav-link" href="#">
            <i class="fas fa-user" aria-hidden="true"></i>
            <span>Usuarios</span>
        </a>
        <ul class="nav nav-children">
            <li>
                <a class="nav-link" href="{{route('users.index')}}">
                    Ver usuarios
                </a>
            </li>
        </ul>
        <ul class="nav nav-children">
            <li>
                <a class="nav-link" href="{{route('import-users.index')}}">
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
                <a class="nav-link" href="{{route('estudiantes.index')}}">
                    Ver Estudiantes
                </a>
            </li>
        </ul>
        <ul class="nav nav-children">
            <li>
                <a class="nav-link" href="{{route('import-estudiantes.index')}}">
                    Importar Estudiantes
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
                <a class="nav-link" href="{{route('docentes.index')}}">
                    Ver Docentes
                </a>
            </li>
        </ul>
        <ul class="nav nav-children">
            <li>
                <a class="nav-link" href="{{route('asignacions.index')}}">
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
            <li>
                <a class="nav-link" href="{{route('indicadors.index')}}">
                    <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                    Indicadores
                </a>
            </li>
        </ul>
        <ul class="nav nav-children">
            <li>
                <a class="nav-link" href="{{route('aspectos.index')}}">
                    <i class="fas fa-eye" aria-hidden="true"></i>
                    Aspectos Observador
                </a>
            </li>
        </ul>
        <ul class="nav nav-children">
            <li>
                <a class="nav-link simple-ajax-modal" href="{{route('planillas.getfiltro')}}">
                    <i class="fas fa-check-square"></i>
                    Calificar
                </a>
            </li>
        </ul>
        <ul class="nav nav-children">
            <li>
                <a class="nav-link" href="{{route('definitivas.index')}}">
                    <i class="fas fa-check"></i>
                    Definitivas
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
                    <a class="nav-link" href="{{route('periodos.index')}}">
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
                    <a class="nav-link" href="{{route('reportes.index')}}">
                        Reporte Academico
                    </a>
                </li>
            </ul>
            <ul class="nav nav-children">
                <li>
                    <a class="nav-link" href="{{route('logs')}}">
                        Logs
                    </a>
                </li>
            </ul>
    </li>
</ul>
