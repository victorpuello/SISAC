<div class="row m-1">
    <div class="table-responsive">
        <table class="table table-bordered table-striped mb-0 dataTable no-footer" id="datatable-editable">
            <thead>
            <tr>
                <th>Codigo</th>
                <th>Logro</th>
                <th>Categoria</th>

                @if(Auth::user()->type <> 'docente')
                    <th>Docente</th>
                    <th>Grado</th>
                @endif
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($logros as $key => $logro)
                <tr data-item-id="{{$logro->id}}">
                    <td>{{$logro->code}}</td>
                    <td>{{$logro->description}}</td>
                    <td>{{$logro->category}}</td>
                    @if(Auth::user()->type <> 'docente')
                        <td>{{$logro->name}}</td>
                        <td>{{$logro->grade}}</td>
                    @endif
                    <td class="actions">
                        <a href="#" class="hidden on-editing save-row"><i class="fas fa-save"></i></a>
                        <a href="#" class="hidden on-editing cancel-row"><i class="fas fa-times"></i></a>
                        <a href="#modalEditar" class="on-default edit modal-basic" data-urlupdate="{{ route('logros.update', $logro->id ) }}" data-urledit="{{ route('logros.edit', $logro->id ) }}" > <i class="fas fa-pencil-alt"></i></a>
                        <a href="#modalEliminar" data-url="{{route('logros.destroy',$logro->id)}}" data-nlogro="{{$logro->code}}" class="on-default deleted modal-basic" data-nuser="#" data-url="#"><i class="far fa-trash-alt"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
