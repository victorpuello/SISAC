<div id="custom-content" class="modal-block modal-block-primary modal-header-color">
    <section class="card">
        <header class="card-header">
            <h2 class="card-title">Acudiente de: <strong>{{$estudiante->full_name}}</strong> </h2>
        </header>
        <div class="card-body">
            <div class="row">
                @acudiente($estudiante)
                <div class="mt-3">
                    <a href="{{route('docente.acudiente.create',$estudiante)}}" class="btn btn-primary ml-3"> Agregar acudiente</a>
                </div>
                @else
                    <table class=" ml-3 mr-3 table table-responsive-lg table-bordered table-striped table-sm mb-0">
                        <tbody>
                        <tr>
                            <td><strong>Nombre: </strong></td>
                            <td>{{$estudiante->acudiente->name}}</td>
                        </tr>
                        <tr>
                            <td><strong>Apellidos: </strong></td>
                            <td>{{$estudiante->acudiente->lastname}}</td>
                        </tr>
                        <tr>
                            <td><strong>Parentesco: </strong></td>
                            <td>{{$estudiante->acudiente->relationship}}</td>
                        </tr>
                        <tr>
                            <td><strong>Tel. : </strong></td>
                            <td>{{$estudiante->acudiente->phone}}</td>
                        </tr>
                        <tr>
                            <td><strong>Email: </strong></td>
                            <td>{{$estudiante->acudiente->email}}</td>
                        </tbody>
                    </table>
                    @endacudiente
            </div>
        </div>
        <footer class="card-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                    @acudiente($estudiante)
                    <div></div>
                    @else
                         <a class="btn btn-primary" href="{{route('docente.acudiente.edit',$estudiante->acudiente)}}" class="btn btn-primary ml-3"> Editar</a>
                    @endacudiente
                    <button class="btn btn-default modal-dismiss">Cerrar</button>
                </div>
            </div>
        </footer>
    </section>
</div>



