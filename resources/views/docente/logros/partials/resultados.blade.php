<div class="row m-1">
    <div class="table-responsive">
        <table class="table table-bordered table-striped mb-0 dataTable no-footer" id="datatable-editable">
            <thead>
            <tr>
                <th>Codigo</th>
                <th>Logro</th>
                <th>Categoria</th>
                <th>Indicador</th>
                <th>Grado</th>
                <th>Periodo</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($logros as $key => $logro)

                <tr data-item-id="{{$logro->id}}">
                    <td>{{substr($logro->code,0,3)}}</td>
                    <td>{{substr($logro->description,0,40).' ...'}}</td>
                    <td>{{$logro->category}}</td>
                    <td>{{$logro->indicador}}</td>
                    <td>{{$logro->grade}}</td>
                    <td>{{$logro->periodo->name}}</td>
                    <td class="actions">
                        <a href="#" class="hidden on-editing save-row"><i class="fas fa-save"></i></a>
                        <a href="#" class="hidden on-editing cancel-row"><i class="fas fa-times"></i></a>
                        <a href="{{ route('docente.logros.edit', $logro->id ) }}" class="on-default edit " > <i class="fas fa-pencil-alt"></i></a>
                        <a href="#modalEliminar" data-url="{{route('docente.logros.destroy',$logro->id)}}" data-nlogro="{{$logro->category}}" class="on-default deleted modal-basic" data-nuser="#" data-url="#"><i class="far fa-trash-alt"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
