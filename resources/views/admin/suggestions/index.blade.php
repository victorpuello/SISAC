@extends('layouts.app')
@section('titulo', "Banco de Indicadores")
@section('namePage', "Modulo: Academico -  Banco de Indicadores")
@section('styles')
    @include('partials.stilosdt')
@endsection
@section('content')
    <div class="card-body">
        <div class="row">
            <div class="col-sm-1 pr-0">
                <div class="mb-3">
                    <a href="{{route('suggestions.create')}}"  class="btn btn-primary on-default simple-ajax-modal ">Agregar <i class="fas fa-plus"></i></a>
                </div>
            </div>
            <div class="col-sm-1 pl-0">
                <div class="mb-3">
                    <a href="{{route('suggestions.import')}}"  class="btn btn-primary on-default simple-ajax-modal ">Importar Indicadores <i class="fas fa-upload"> </i></a>
                </div>
            </div>
        </div>
        <table class="table table-bordered table-striped mb-0" id="suggestions">
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                    <th>Asignatura</th>
                    <th>Grado</th>
                    <th>Categoria</th>
                    <th>Indicador</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
        {!! Form::open(['method' => 'DELETE', 'id' => "delete-form" ,'style' => 'display: none;']) !!}{!! Form::close() !!}
    </div>
    <div id="inf" data-urltabla ="{{route('suggestions.index')}}"  data-url ="{{Config::get('app.url')}}"></div>
    @include('admin.suggestions.partials.messages')
    @include('admin.suggestions.partials.modals')
    @endsection
@section('script')
    @include('partials.datatablescript')
@endsection
@section('scriptfin')
    <script src="{{asset('js/examples/examples.modals.js')}}"></script>
    <script src="{{asset('js/examples/examples.notifications.js')}}"></script>
    <script src="{{asset('js/tablas/suggestions.js')}}"></script>
@endsection
