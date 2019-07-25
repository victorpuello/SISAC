@extends('layouts.app')
@section('titulo', "Aspectos")
@section('namePage', "Modulo: Observador - Aspectos")
@section('styles')
    @include('partials.stilosdt')
@endsection
@section('content')
    <div class="card-body">
        <div class="row" id="ControlPanel">
            <div class="col-sm-6">
                <div class="mb-3">
                    <a href="{{route('aspectos.create')}}"  class="btn btn-primary on-default simple-ajax-modal ">Agregar <i class="fas fa-plus"></i></a>
                </div>
            </div>
        </div>
        <table class="table table-bordered table-striped mb-0" id="aspectos">
            <thead>
            <tr>
                <th></th>
                <th></th>
                <th>Categoria</th>
                <th>Escala</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
            </thead>
        </table>
        {!! Form::open(['method' => 'DELETE', 'id' => "delete-form" ,'style' => 'display: none;']) !!}{!! Form::close() !!}
    </div>
    <div id="inf" data-urltabla ="{{route('aspectos.index')}}"  data-url ="{{Config::get('app.url')}}"></div>
    @include('admin.aspectos.partials.messages')
    @include('admin.aspectos.partials.modals')
@endsection
@section('script')
    @include('partials.scriptdt')
@endsection
@section('scriptfin')
    <script src="{{asset('js/examples/examples.modals.js')}}"></script>
    <script src="{{asset('js/examples/examples.notifications.js')}}"></script>
    <script src="{{asset('js/tablas/aspectos.js')}}"></script>
@endsection