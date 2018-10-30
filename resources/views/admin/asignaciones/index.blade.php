@extends('layouts.app')
@section('titulo', "Asignación")
@section('namePage', "Modulo: Docentes -  Asignación ")
@section('styles')
    @include('partials.stilosdt')
@endsection
@section('content')
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="mb-3">
                    <a href="{{route('asignacions.create')}}"  class="btn btn-primary on-default simple-ajax-modal ">Agregar <i class="fas fa-plus"></i></a>
                </div>
            </div>
        </div>
        <table class="table table-bordered table-striped mb-0" id="asignaciones">
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                    <th>Asignatura</th>
                    <th>Docente</th>
                    <th>Grupo</th>
                    <th>Director</th>
                    <th>Año</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
        {!! Form::open(['method' => 'DELETE', 'id' => "delete-form" ,'style' => 'display: none;']) !!}{!! Form::close() !!}
    </div>
    <div id="inf" data-urltabla ="{{route('asignacions.index')}}"  data-url ="{{Config::get('app.url')}}"></div>
    @include('admin.asignaciones.partials.messages')
    @include('admin.asignaciones.partials.modals')
    @endsection
@section('script')
    @include('partials.datatablescript')
@endsection
@section('scriptfin')
    <script src="{{asset('js/examples/examples.modals.js')}}"></script>
    <script src="{{asset('js/examples/examples.notifications.js')}}"></script>
    <script src="{{asset('js/tablas/asignaciones.js')}}"></script>
@endsection
