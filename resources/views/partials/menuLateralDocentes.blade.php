<li class="nav-parent">
    <a class="nav-link" href="#">
        <i class="fas fa-book-open" aria-hidden="true"></i>
        <span>Academico</span>
    </a>
    <ul class="nav nav-children">
        <li>
            <a class="nav-link" href="{{route('logros.index')}}">
                Logros
            </a>
        </li>
    </ul>
    <ul class="nav nav-children">
        <li>
            <a class="nav-link" href="{{route('notas.index')}}">
                Calificar
            </a>
        </li>
    </ul>
    @director
    <ul class="nav nav-children">
        <li>
            <a class="nav-link" href="{{route('notas.index')}}">
                Dirección de grupo
            </a>
        </li>
    </ul>
    @enddirector
</li>
<li>
    <a class="nav-link" href="{{route('asignaciones.index')}}">
        <i class="fas fa-chalkboard-teacher" ></i>
        Asignación Academica
    </a>
</li>
