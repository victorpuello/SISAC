<ul class="nav nav-main">
    <li>
        <a class="nav-link" href="{{route('home')}}">
            <i class="fas fa-home" aria-hidden="true"></i>
            <span>Escritorio</span>
        </a>
    </li>
    <li class="nav-parent">
        <a class="nav-link" href="#">
            <i class="fas fa-user-graduate" aria-hidden="true"></i>
            <span>Matricula</span>
        </a>
        <ul class="nav nav-children">
            <li>
                <a class="nav-link" href="{{route('secretaria.estudiantes.index')}}">
                    Estudiantes
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
                <a class="nav-link" href="{{route('secretaria.reportes.index')}}">
                    Reporte Academico
                </a>
            </li>
        </ul>
    </li>
</ul>





