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
        {!! Form::model($logro,['route' => ['docente.logros.update', $logro->id ],'method' => 'PUT','class' => 'form-horizontal form-bordered', 'id'=>'form-edit']) !!}
        @include('docente.logros.partials.fieldsCreate')
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

    @endsection
