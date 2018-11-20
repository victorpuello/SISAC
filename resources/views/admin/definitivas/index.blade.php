@extends('layouts.app')
@section('titulo', "Asignación")
@section('namePage', "Modulo: Academico -  Definitivas ")
@section('styles')
    @include('partials.stilosdt')
@endsection
@section('content')
    <div class="card-body">
        <table class="table table-bordered table-striped mb-0" id="definitivas">
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                    <th>Estudiante</th>
                    <th>Grado</th>
                    <th>Grupo</th>
                    <th>Asignatura</th>
                    <th>Periodo</th>
                    <th>Score</th>
                    <th>Indicador</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
        {!! Form::open(['method' => 'DELETE', 'id' => "delete-form" ,'style' => 'display: none;']) !!}{!! Form::close() !!}
    </div>
    <div id="inf" data-urltabla ="{{route('definitivas.index')}}"  data-url ="{{Config::get('app.url')}}"></div>
    @include('admin.definitivas.partials.messages')
    @include('admin.definitivas.partials.modals')
    @endsection
@section('script')
    @include('partials.datatablescript')
@endsection
@section('scriptfin')
    <script src="{{asset('js/examples/examples.modals.js')}}"></script>
    <script src="{{asset('js/examples/examples.notifications.js')}}"></script>
    <script src="{{asset('js/tablas/definitivas.js')}}"></script>
@endsection
