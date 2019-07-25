@extends('layouts.app')
@section('titulo', "Grupos")
@section('namePage', "Modulo: Grupos")
@section('styles')
    <link rel="stylesheet" href="{{asset('vendor/select2/css/select2.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/bootstrap-fileupload/bootstrap-fileupload.min.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/select2-bootstrap-theme/select2-bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/datatables/media/css/dataTables.bootstrap4.css')}}" />
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.6/css/select.bootstrap4.min.css" />
    <link rel="stylesheet" href="{{asset('css/editor.bootstrap4.min.css')}}" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.2/css/responsive.dataTables.min.css" />
@endsection
@section('content')
    <div class="card-body">
        <div class="row" id="ControlPanel">
            <div class="col-sm-6">
                <div class="mb-3">
                    <a href="{{route('grupos.create')}}"  class="btn btn-primary on-default ajax-estudiantes ">Agregar <i class="fas fa-plus"></i></a>
                </div>
            </div>
        </div>
        <table class="table table-bordered table-striped mb-0" id="grupos">
            <thead>
            <tr>
                <th></th>
                <th></th>
                <th>Nombre</th>
                <th>Grado</th>
                <th>Modelo</th>
                <th>Jornada</th>
                <th>Estudiantes</th>
                <th>Acciones</th>
            </tr>
            </thead>
        </table>
        {!! Form::open(['method' => 'DELETE', 'id' => "delete-form" ,'style' => 'display: none;']) !!}{!! Form::close() !!}
    </div>
    <div id="inf" data-urltabla ="{{route('grupos.index')}}"  data-url ="{{Config::get('app.url')}}"></div>
    @include('admin.grupos.partials.messages')
    @include('admin.grupos.partials.modals')
@endsection
@section('script')
    <script src="{{asset('vendor/autosize/autosize.js')}}"></script>
    <script src="{{asset('vendor/select2/js/select2.js')}}"></script>
    <script src="{{asset('vendor/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/media/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="{{asset('js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('js/dataTables.responsive.min.js')}}"></script>
    <script src="https://cdn.datatables.net/select/1.2.6/js/dataTables.select.min.js"></script>
    <script src="{{asset('js/dataTables.editor.min.js')}}"></script>
    <script src="{{asset('js/editor.bootstrap4.min.js')}}"></script>
    <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js')}}"></script>
    <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js')}}"></script>
    <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js')}}"></script>
    <script src="{{asset('https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>
@endsection
@section('scriptfin')
    <script src="{{asset('js/examples/examples.modals.js')}}"></script>
    <script src="{{asset('js/examples/examples.notifications.js')}}"></script>
    <script src="{{asset('js/tablas/grupos.js')}}"></script>
@endsection

