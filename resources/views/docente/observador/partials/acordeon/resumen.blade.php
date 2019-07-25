<div class="text-center">
    <h3 class="title text-primary">Observador del alumno</h3>
</div>
<div class="row">
    <div class="col-4">
        <section class="card">
            <header class="card-header bg-transparent">
                <h2 class="card-title text-black-50">Información básica</h2>
            </header>
            <div class="card-content">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Estudiante: </strong><spang>{{$estudiante->full_name}}</spang></li>
                    <li class="list-group-item"><strong>Identificación: </strong><span>{{$estudiante->full_identidad}}</span></li>
                    <li class="list-group-item"><strong>Lugar de nacimiento: </strong><span>{{$estudiante->nac}}</span></li>
                    <li class="list-group-item"><strong>Edad: </strong><span>{{$estudiante->edad}}</span></li>
                </ul>
            </div>
        </section>
    </div>
    <div class="col-4">
        <section class="card">
            <header class="card-header bg-transparent">
                <h2 class="card-title text-black-50">Información de contacto</h2>
            </header>
            <div class="card-content">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Dirección: </strong><spang>{{$estudiante->address}}</spang></li>
                    <li class="list-group-item"><strong>Tel.: </strong><span>{{$estudiante->phone}}</span></li>
                    <li class="list-group-item"><strong>EPS: </strong><span>{{$estudiante->EPS}}</span></li>
                </ul>
            </div>
        </section>
    </div>
    <div class="col-4">
        <section class="card">
            <header class="card-header bg-transparent">
                <h2 class="card-title text-black-50">Información de academica</h2>
            </header>
            <div class="card-content">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Ingreso: </strong><spang>{{$estudiante->datein}}</spang></li>
                    <li class="list-group-item"><strong>Situación Ac.: </strong><span>{{$estudiante->situation}}</span></li>
                    <li class="list-group-item"><strong>Grado: </strong><span>{{$estudiante->grupo->grado->numero}}°</span></li>
                </ul>
            </div>
        </section>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-6">
        <section class="card">
            <header class="card-header bg-transparent">
                <h2 class="card-title text-center text-black-50">Aspectos Academicos: {{$observaciones->getNamePeriodo() }}</h2>
            </header>
            <div class="card-body">
                <table class="table table-responsive-md mb-0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Aspecto</th>
                        <th>Valoración</th>
                        <th>Valorar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($observaciones->getAcademicas() as $key => $observacion)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$observacion->aspecto->description}}</td>
                            <td>{{$observacion->valoracion}}</td>
                            <td class="actions">
                                <a class="btn btn-xs btn-primary text-white simple-ajax-modal" href="{{route('docente.observacions.edit',$observacion)}}">Valorar</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <p class="text-xs text-center text-black-50"><strong style="font-size: 10px;">Equivalencias escala: S = "Siempre" - CS = "Casi siempre" - AV = "Algunas veces" - N = "Nunca"</strong> </p>
        </section>
    </div>
    <div class="col-lg-6">
        <section class="card">
            <header class="card-header bg-transparent">
                <h2 class="card-title text-center text-black-50">Aspectos Convivencia: {{$observaciones->getNamePeriodo() }} </h2>
            </header>
            <div class="card-body">
                <table class="table table-responsive-md mb-0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Aspecto</th>
                        <th>Valoración</th>
                        <th>Valorar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($observaciones->getConvivencias() as $key => $observacion)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$observacion->aspecto->description}}</td>
                            <td>{{$observacion->valoracion}}</td>
                            <td class="actions">
                                <a class="btn btn-xs btn-primary text-white simple-ajax-modal" href="{{route('docente.observacions.edit',$observacion)}}">Valorar</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <p class="text-xs text-center text-black-50"><strong style="font-size: 10px;">Equivalencias escala: S = "Siempre" - CS = "Casi siempre" - AV = "Algunas veces" - N = "Nunca"</strong> </p>
        </section>
    </div>
</div>
