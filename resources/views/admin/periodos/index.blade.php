@extends('layouts.app')
@section('titulo', "Periodos")
@section('namePage', "Modulo: Periodos")
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
                    <a href="{{route('periodos.create')}}"  class="btn btn-primary on-default simple-ajax-modal ">Agregar <i class="fas fa-plus"></i></a>
                </div>
            </div>
        </div>
        <table class="table table-bordered table-striped mb-0" id="datatable-editable">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Fecha de inicio</th>
                    <th>Fecha de fin</th>
                    <th>Fecha de cierre</th>
                    <th>Estado</th>
                    <th>Año</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach($periodos as $periodo)
                <tr data-item-id="{{$periodo->id}}">
                    <td>{{$periodo->name}} - {{$periodo->anio->name}}</td>
                    <td>{{$periodo->datestart}}</td>
                    <td>{{$periodo->dateend}}</td>
                    <td>{{$periodo->cierre}}</td>
                    <td>{{$periodo->estado}}</td>
                    <td>{{$periodo->is_anio}}</td>
                    <td class="actions">
                        <a href="{{route('periodos.edit',$periodo)}}" class="on-default edit simple-ajax-modal" > <i class="fas fa-pencil-alt"></i></a>
                        <a href="#modalEliminar" class="on-default deleted simple-ajax-modal"  ><i class="far fa-trash-alt"></i></a>
                    </td>
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
    <script src="{{asset('js/examples/examples.modals.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>
@endsection

