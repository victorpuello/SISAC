@extends('layouts.app')
@section('titulo', "Logros")
@section('namePage', "Modulo: Académico")
@section('styles')
    <link rel="stylesheet" href="{{asset('vendor/select2/css/select2.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/select2-bootstrap-theme/select2-bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/datatables/media/css/dataTables.bootstrap4.css')}}" />
@endsection
@section('content')
    <section class="card">
        <header class="card-header ">
          <h2 class="card-title">Editar Logro: {{substr($logro->code,0,3)}}</h2>
        </header>
    <div class="card-body">
        @include('admin.logros.partials.messages')
        {!! Form::model($logro,['route' => ['logros.update', $logro->id ],'method' => 'PUT','class' => 'form-horizontal form-bordered', 'id'=>'form-edit']) !!}
        @include('admin.logros.partials.fieldsCreate')
        <footer class="card-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                    <button type="submit" class="btn btn-primary editAsignatura">Guardar</button>
                    <a href="{{route('logros.index')}}" class="btn btn-default">Cancelar</a>
                </div>
            </div>
        </footer>
        {!! Form::close() !!}
    </div>
    </section>
@endsection
@section('script')
    <script src="{{asset('vendor/autosize/autosize.js')}}"></script>
    <script src="{{asset('vendor/select2/js/select2.js')}}"></script>
    <script src="{{asset('vendor/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/media/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('js/logros.js')}}"></script>
    <script src="{{asset('js/examples/examples.modals.js')}}"></script>
    <script src="{{asset('js/examples/examples.datatables.editable.js')}}"></script>
    <script>

        var path = "{{\Illuminate\Support\Facades\Request::path()}}";
        if ( path != 'admin/logros/create'){
            console.log(path);
            var codigoDB = $("#code").val();
            var asignatura = $("#asignatura_id").val();
            if (codigoDB.indexOf(asignatura) >= 0) {
                var posicion =  codigoDB.indexOf(asignatura);

                $("#codeUser").val(codigoDB.substr(0,posicion));
            }
        }

        $("#codeUser").change(function (e) {updateCode();});
        $("#category").change(function (e) {updateCode();});
        $("#asignatura_id").change(function (e) {updateCode();});
        $("#grade").change(function (e) {updateCode();});
        $("#periodo_id").change(function (e) {updateCode();});
        $("#docente_id").change(function (e) {updateCode();});
        $("#indicador").change(function (e) {updateCode();});
        function updateCode() {
            var category = $("#category").val();
            var asignatura_id = $("#asignatura_id").val();
            var docente_id = $("#docente_id").val();
            var grade = $("#grade").val();
            var periodo_id = $("#periodo_id").val();
            var indicador =$("#indicador").val();
            var codeorg =$("#codeUser").val();
            var code = codeorg+category+indicador+grade+asignatura_id+docente_id+periodo_id;
            $("#code").val(code);
            console.log(code);
        }

    </script>
    @endsection
