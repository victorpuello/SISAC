@extends('layouts.app')
@section('titulo', "Áreas")
@section('namePage', "Modulo: Áreas")
@section('styles')
    @include('partials.stilosdt')
@endsection
@section('content')
    <div class="card-body">
        <div class="row" id="ControlPanel">
            <div class="col-sm-6">
                <div class="mb-3">
                    <a href="{{route('areas.create')}}"  class="btn btn-primary on-default ajax-estudiantes ">Agregar <i class="fas fa-plus"></i></a>
                </div>
            </div>
        </div>
        <table class="table table-bordered table-striped mb-0" id="areas">
            <thead>
            <tr>
                <th></th>
                <th></th>
                <th>Nombre</th>
                <th>Porcentaje</th>
                <th>Asignaturas</th>
                <th>Acciones</th>
            </tr>
            </thead>
        </table>
        {!! Form::open(['method' => 'DELETE', 'id' => "delete-form" ,'style' => 'display: none;']) !!}{!! Form::close() !!}
    </div>
    <div id="inf" data-urltabla ="{{route('areas.index')}}"  data-url ="{{Config::get('app.url')}}"></div>
    @include('admin.areas.partials.messages')
    @include('admin.areas.partials.modals')
@endsection
@section('script')
    @include('partials.scriptdt')
@endsection
@section('scriptfin')
    <script src="{{asset('js/examples/examples.modals.js')}}"></script>
    <script src="{{asset('js/examples/examples.notifications.js')}}"></script>
    <script src="{{asset('js/tablas/areas.js')}}"></script>
@endsection