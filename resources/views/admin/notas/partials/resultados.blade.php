<div class="row mt-4">
    <table class="table table-bordered table-striped mb-0" id="datatable-editable">
        <thead>
        <tr>
            <th>Codigo</th>
            <th>Logro</th>
            <th>Categoria</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($logros as $logro)
            <tr data-item-id="{{$logro->id}}">
                <td>{{$logro->code}}</td>
                <td>{{$logro->description}}</td>
                <td>{{$logro->category}}</td>
                <td class="actions">
                    <a href="#" class="hidden on-editing save-row"><i class="fas fa-save"></i></a>
                    <a href="#" class="hidden on-editing cancel-row"><i class="fas fa-times"></i></a>
                    <a href="#" class="on-default " > <i class="fas fa-pencil-alt"></i></a>
                    <a href="#modalEliminar" class="on-default deleted modal-basic" data-nuser="#" data-url="#"><i class="far fa-trash-alt"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
