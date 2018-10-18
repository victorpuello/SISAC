<ul class="nav nav-main">
    <li>
        <a class="nav-link" href="{{route('home')}}">
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
                <a class="nav-link" href="{{route('docente.indicadors.index')}}">
                    Indicadores
                </a>
            </li>
        </ul>
        <ul class="nav nav-children">
            <li>
                <a class="nav-link" href="{{route('docente.planillas.index')}}">
                    Calificar
                </a>
            </li>
        </ul>
        @director
        <ul class="nav nav-children">
            <li>
                <a class="nav-link" href="{{route('docente.direccion.index')}}">
                    Dirección de grupo
                </a>
            </li>
        </ul>
        @enddirector
    </li>
    <li>
        <a class="nav-link" href="{{route('docente.asignacions.index')}}">
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
                <a class="nav-link" href="{{route('docente.reportes.index')}}">
                    Reporte Academico
                </a>
            </li>
        </ul>
    </li>
</ul>





