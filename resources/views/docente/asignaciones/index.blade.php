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
                    <td>{{$asignacion->grupo->name_aula}}</td>
                    <td>{{$asignacion->direccion}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @endsection
@section('script')
    <script src="{{asset('vendor/select2/js/select2.js')}}"></script>
    <script src="{{asset('vendor/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/media/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('js/examples/examples.datatables.editable.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>
    @endsection
