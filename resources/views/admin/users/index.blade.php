@extends('layouts.app')
@section('titulo', "Usuarios")
@section('namePage', "Modulo: Usuarios")
@section('styles')
    @include('partials.stilosdt')
@endsection
@section('content')
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="mb-3">
                    <a href="{{route('users.create')}}"  class="btn btn-primary on-default simple-ajax-modal ">Agregar <i class="fas fa-plus"></i></a>
                </div>
            </div>
        </div>
        <table class="table table-bordered table-striped mb-0" id="usuarios">
            <thead>
            <tr>
                <th></th>
                <th></th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Usuario</th>
                <th>Email</th>
                <th>Tipo</th>
                <th>Acciones</th>
            </tr>
            </thead>
        </table>
        {!! Form::open(['method' => 'DELETE', 'id' => "delete-form" ,'style' => 'display: none;']) !!}{!! Form::close() !!}
    </div>
    <div id="inf" data-urltabla ="{{route('users.index')}}"  data-url ="{{Config::get('app.url')}}"></div>
    @include('admin.users.partials.messages')
    @include('admin.users.partials.modals')
@endsection
@section('script')
    @include('partials.scriptdt')
@endsection
@section('scriptfin')
    <script src="{{asset('js/examples/examples.modals.js')}}"></script>
    <script src="{{asset('js/examples/examples.notifications.js')}}"></script>
    <script src="{{asset('js/tablas/usuarios.js')}}"></script>
@endsection
