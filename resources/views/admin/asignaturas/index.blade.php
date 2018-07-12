@extends('layouts.app')
@section('titulo', "Asignaturas")
@section('namePage', "Modulo: Asignaturas")
@section('styles')
    <link rel="stylesheet" href="{{asset('vendor/select2/css/select2.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/select2-bootstrap-theme/select2-bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/datatables/media/css/dataTables.bootstrap4.css')}}" />
    @endsection
@section('content')
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="mb-3">
                    <a href="#modalAdd"  class="btn btn-primary on-default modal-basic ">Agregar <i class="fas fa-plus"></i></a>
                </div>
            </div>
        </div>
        <table class="table table-bordered table-striped mb-0" id="datatable-editable">
            <thead>
            <tr>
                <th>Id</th>
                <th>Asignatura</th>
                <th>Docentes</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($asignaturas as $asignatura)
            <tr data-item-id="{{$asignatura->id}}">
                <td>{{$asignatura->id}}</td>
                <td>{{$asignatura->name}}</td>
                <td>{{$asignatura->docentes->count()}}</td>
                <td class="actions">
                    <a href="#modalEditar" class="on-default edit modal-basic" data-urlupdate="{{ route('asignaturas.update', $asignatura->id ) }}" data-urledit="{{ route('asignaturas.edit', $asignatura->id ) }}"> <i class="fas fa-pencil-alt"></i></a>
                    <a href="#modalEliminar" class="on-default deleted modal-basic" data-nasg="{{$asignatura->name}}" data-url="{{ route('asignaturas.destroy', $asignatura->id ) }}"><i class="far fa-trash-alt"></i></a>
                </td>
            </tr>
                @endforeach
            </tbody>
        </table>
        @include('admin.asignaturas.partials.modals')
    </div>
@endsection
@section('script')
    <script src="{{asset('vendor/select2/js/select2.js')}}"></script>
    <script src="{{asset('vendor/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/media/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('js/examples/examples.datatables.editable.js')}}"></script>
    <script src="{{asset('js/examples/examples.modals.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>
    <script src="{{asset('js/ModalsAsignaturas.js')}}"></script>
    <script type="text/javascript">
        $(".deleted").click(function (e) {
            $("#form-delete").attr('action', $(this).data('url') );
            $("#NombreAsg").text( $(this).data('nasg') );
        });

        $(".edit").click(function (e) {
            $("#form-edit").attr('action', $(this).data('urlupdate') );
            var ruta = $(this).data('urledit');
            $.get(ruta , function (data) {
                $("#idEditAsg").val(data.id);
                $("#nameEditAsg").val(data.name);
            });
        });
    </script>
@endsection

