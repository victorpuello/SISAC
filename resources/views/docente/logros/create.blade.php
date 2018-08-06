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
          <h2 class="card-title">Crear Logro</h2>
        </header>
    <div class="card-body">
        @include('docente.logros.partials.messages')
        {!! Form::open(['route' => 'docente.logros.store', 'method' => 'post','class' => 'form-horizontal form-bordered', 'id' => 'form-create']) !!}
            @include('docente.logros.partials.fieldsCreate')
        <footer class="card-footer">
            <div class="row">
                    <div class="col-lg-8">
                        <div class="form-group radio">
                            <label for="" class="checkbox-inline">
                                Deseas crear el Logro para los demás indicadores
                                {!! Form::radios('multiple', ['0' => 'Si', '1' => 'No']) !!}
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <button type="submit" class="mb-1 mt-1 mr-1 btn btn-lg btn-primary editAsignatura">Guardar</button>
                    </div>
                    <div class="col-lg-2">
                        <a href="{{route('docente.logros.index')}}" class="mb-1 mt-1 mr-1 btn btn-lg btn-default">Cancelar</a>
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
    @endsection
