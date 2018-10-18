@extends('layouts.app')
@section('titulo', "Indicadores")
@section('namePage', "Modulo: Academico - Indicadores")
@section('styles')
    @include('partials.stilosdt')
@endsection
@section('content')
    <div class="card-body">
        <div class="row" id="ControlPanel">
            <div class="col-sm-6">
                <div class="mb-3">
                    <a href="{{route('docente.indicadors.create')}}"  class="btn btn-primary on-default simple-ajax-modal ">Agregar <i class="fas fa-plus"></i></a>
                </div>
            </div>
        </div>
        <table class="table table-bordered table-striped mb-0" id="indicadores">
            <thead>
            <tr>
                <th></th>
                <th></th>
                <th>Grado</th>
                <th>Asignatura</th>
                <th>Periodo</th>
                <th>Docente</th>
                <th>Categoria</th>
                <th>Desempeño</th>
                <th>Indicador</th>
                <th>Acciones</th>
            </tr>
            </thead>
        </table>
        {!! Form::open(['method' => 'DELETE', 'id' => "delete-form" ,'style' => 'display: none;']) !!}{!! Form::close() !!}
    </div>
    <div id="inf" data-urltabla ="{{route('docente.indicadors.index')}}"  data-url ="{{Config::get('app.url')}}"></div>
    @include('docente.indicadores.partials.messages')
    @include('docente.indicadores.partials.modals')
@endsection
@section('script')
    @include('partials.scriptdt')
@endsection
@section('scriptfin')
    <script src="{{asset('js/examples/examples.modals.js')}}"></script>
    <script src="{{asset('js/examples/examples.notifications.js')}}"></script>
    <script src="{{asset('js/tablas/docentes/indicadores.js')}}"></script>
@endsection