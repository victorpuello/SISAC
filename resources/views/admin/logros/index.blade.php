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
          <h2 class="card-title">Buscar Logros</h2>
        </header>
    <div class="card-body">
        @include('admin.logros.partials.fields')
        <hr>
        @if(count($logros) > 0)
            @include('admin.logros.partials.resultados')
            @else
            <div class=".col-md-6 .offset-md-3">
                <h4 class="text-center">No hay resultados para la busqueda ...</h4>
            </div>
        @endif
    </div>
        @include('admin.logros.partials.modals')
    </section>
@endsection
@section('script')
    <script src="{{asset('vendor/autosize/autosize.js')}}"></script>
    <script src="{{asset('vendor/select2/js/select2.js')}}"></script>
    <script src="{{asset('vendor/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/media/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('js/examples/examples.modals.js')}}"></script>
    <script src="{{asset('js/examples/examples.datatables.editable.js')}}"></script>
    <script>
        $(".deleted").click(function (e) {
           /* $("#form-delete").attr('action', $(this).data('url') );
            $("#NombreUser").text( $(this).data('nuser') );*/
        });
    </script>
    @endsection
