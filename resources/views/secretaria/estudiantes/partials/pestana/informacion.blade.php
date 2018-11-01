<span class="alternative-font">{{$estudiante->FullName}}</span>
<hr class="dotted short">
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
        @if (!$estudiante->getActiveAttribute())
            <tr>
                <td><strong>Fecha de Retiro: </strong></td>
                <td>{{$estudiante->dateout}}</td>
            </tr>
        @endif
        <tr>
            <td><strong>Estado en Sistema: </strong></td>
            <td>{{$estudiante->stade}}</td>
        </tr>
        <tr>
            <td><strong>Situación academica: </strong></td>
            <td>{{$estudiante->situation}}</td>
        </tr>
        <tr>
            <td><strong>Grupo: </strong></td>
            <td>{{$estudiante->grupo->name_aula}}</td>
        </tr>
        </tbody>
    </table>
</div>