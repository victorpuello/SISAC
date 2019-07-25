<div id="custom-content" class="modal-block modal-block-primary modal-header-color">
    <section class="card">
        <header class="card-header">
            <h2 class="card-title">Ficha de matricula: <strong>{{$estudiante->full_name}}</strong> </h2>
        </header>
        <div class="card-body">
            <div class="row">
                <table class=" ml-3 mr-3 table table-responsive-lg table-bordered table-striped table-sm mb-0">
                    <tbody>
                    <tr>
                        <td><strong>Nombre: </strong></td>
                        <td>{{$estudiante->name}}</td>
                    </tr>
                    <tr>
                        <td><strong>Apellidos: </strong></td>
                        <td>{{$estudiante->lastname}}</td>
                    </tr>
                    <tr>
                        <td><strong>Tipo de ID: </strong></td>
                        <td>{{$estudiante->typeid}}</td>
                    </tr>
                    <tr>
                        <td><strong>Número de ID: </strong></td>
                        <td>{{$estudiante->identification}}</td>
                    </tr>
                    <tr>
                        <td><strong>Fecha de Nacimiento: </strong></td>
                        <td>{{$estudiante->birthday}}</td>
                    </tr>
                    <tr>
                        <td><strong>Dpto. de Nacimiento: </strong></td>
                        <td>{{$municipio->departamento->name}}</td>
                    </tr>
                    <tr>
                        <td><strong>Mpio. de Nacimiento: </strong></td>
                        <td>{{$municipio->name}}</td>
                    </tr>
                    <tr>
                        <td><strong>Sexo: </strong></td>
                        <td>{{$estudiante->gender}}</td>
                    </tr>
                    <tr>
                        <td><strong>Dirección: </strong></td>
                        <td>{{$estudiante->address}}</td>
                    </tr>
                    <tr>
                        <td><strong>Fecha de Ingreso: </strong></td>
                        <td>{{$estudiante->datein}}</td>
                    </tr>
                    <tr>
                        <td><strong>Estado en Sistema: </strong></td>
                        <td>{{$estudiante->stade}}</td>
                    </tr>
                    <tr>
                        <td><strong>Situación academica: </strong></td>
                        <td>{{$estudiante->situation}}</td>
                    </tr>
                    <tr>
                        <td><strong>Salón: </strong></td>
                        <td>{{$estudiante->grupo->name_aula}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <footer class="card-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                        <a class="btn btn-primary" href="{{route('docente.estudiantes.edit',$estudiante)}}" class="btn btn-primary ml-3"> Editar</a>
                        <button class="btn btn-danger modal-dismiss">Cerrar</button>
                </div>
            </div>
        </footer>
    </section>
</div>
