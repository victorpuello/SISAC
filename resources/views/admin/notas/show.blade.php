@extends('layouts.app')
@section('titulo', "Calificar")
@section('namePage', "Modulo: Académico")
@section('styles')
    <link rel="stylesheet" href="{{asset('vendor/select2/css/select2.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/select2-bootstrap-theme/select2-bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/datatables/media/css/dataTables.bootstrap4.css')}}" />
@endsection
@section('content')
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">

            </div>
        </div>
        <table class="table table-bordered table-striped mb-0" id="datatable-editable">
            <thead>
            <tr>
                <th>N°</th>
                <th>Nombre</th>
                <th>Cognitivo</th>
                <th>Procedimental</th>
                <th>Actitudinal</th>
                <th>Inasistencias</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($estudiantes as $key => $estudiante)
                <tr data-item-id="{{$estudiante->id}}">
                    <td class="id">{{$key+1}}</td>
                    <td class="name">{{$estudiante->lastname}} {{$estudiante->name}}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="actions">
                        <a href="#" class="hidden on-editing save-row"><i class="fas fa-save"></i></a>
                        <a href="#" class="hidden on-editing cancel-row"><i class="fas fa-times"></i></a>
                        <a href="#" class="on-default edit-row"><i class="fas fa-pencil-alt"></i></a>
                        <a href="#" class="on-default remove-row"><i class="far fa-trash-alt"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @endsection
@section('script')
    <script src="{{asset('vendor/autosize/autosize.js')}}"></script>
    <script src="{{asset('vendor/select2/js/select2.js')}}"></script>
    <script src="{{asset('vendor/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/media/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('js/examples/examples.modals.js')}}"></script>
    <script src="{{asset('js/examples/notas.js')}}"></script>
@endsection
