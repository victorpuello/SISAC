@extends('layouts.app')
@section('titulo', "Asignación")
@section('namePage', "Modulo: Docentes -  Asignación ")
@section('styles')
    <link rel="stylesheet" href="{{asset('vendor/select2/css/select2.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/select2-bootstrap-theme/select2-bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/datatables/media/css/dataTables.bootstrap4.css')}}" />
@endsection
@section('content')
    <div class="card-body">
        @if(currentPerfil() <> 'docente')
        <div class="row">
            <div class="col-sm-6">
                <div class="mb-3">
                    <a href="#modalAdd"  class="btn btn-primary on-default modal-basic ">Agregar <i class="fas fa-plus"></i></a>
                </div>
            </div>
        </div>
        @endif
        <table class="table table-bordered table-striped mb-0" id="datatable-editable">
            <thead>
            <tr>
                <th>Asignatura</th>
                <th>Docente</th>
                <th>Grupo</th>
                <th>Director</th>
            </tr>
            </thead>
            <tbody>
            @foreach($asignaciones as $asignacion)
                <tr data-item-id="{{$asignacion->id}}">
                    <td>{{$asignacion->asignatura->name}}</td>
                    <td>{{$asignacion->docente->name}}</td>
                    <td>{{$asignacion->salon->full_name}}</td>
                    <td>{{$asignacion->direccion}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @include('docente.asignaciones.partials.modals')
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
        });
    </script>
    @endsection