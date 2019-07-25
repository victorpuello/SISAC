@extends('layouts.app')
@section('titulo', "Asignaturas")
@section('namePage', "Modulo: Asignaturas")
@section('styles')
    @include('partials.stilosdt')
@endsection
@section('content')
    <div class="card-body">
        <div class="row" id="ControlPanel">
            <div class="col-sm-6">
                <div class="mb-3">
                    <a href="{{route('asignaturas.create')}}"  class="btn btn-primary on-default ajax-estudiantes ">Agregar <i class="fas fa-plus"></i></a>
                </div>
            </div>
        </div>
        <table class="table table-bordered table-striped mb-0" id="asignaturas">
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                    <th>Nombre</th>
                    <th>Abreviatura</th>
                    <th>Porcentaje</th>
                    <th>Nivel</th>
                    <th>Área</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
        {!! Form::open(['method' => 'DELETE', 'id' => "delete-form" ,'style' => 'display: none;']) !!}{!! Form::close() !!}
    </div>
    <div id="inf" data-urltabla ="{{route('asignaturas.index')}}"  data-url ="{{Config::get('app.url')}}"></div>
    @include('admin.asignaturas.partials.messages')
    @include('admin.asignaturas.partials.modals')
@endsection
@section('script')
    @include('partials.scriptdt')
@endsection
@section('scriptfin')
    <script src="{{asset('js/examples/examples.modals.js')}}"></script>
    <script src="{{asset('js/examples/examples.notifications.js')}}"></script>
    <script src="{{asset('js/tablas/asignaturas.js')}}"></script>
@endsection