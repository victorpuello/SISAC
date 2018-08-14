@extends('layouts.app')
@section('titulo', "Alummnos - Editar acudiente")
@section('namePage', "Modulo: Alummnos - Editar Acudiente ")
@section('styles')
    <link rel="stylesheet" href="{{asset('vendor/bootstrap-fileupload/bootstrap-fileupload.min.css')}}" />
@endsection
@section('content')
    <section class="card card-featured card-featured-primary mb-4">
        <header class="card-header">
            <h2 class="card-title">Editar acudiente: {{$acudiente->name}} </h2>
        </header>
        <div class="card-body">
            @include('admin.users.partials.messages')
            {!! Form::model($acudiente,['route' => ['docente.acudiente.update',$acudiente->id], 'method' => 'PUT','class' => 'form-horizontal form-bordered']) !!}
            @include('docente.acudientes.partials.fields')
            <div class="card-footer">
                <a href="{{URL::previous()}}" class="btn btn-danger">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </div>
            {!! Form::close() !!}
        </div>
    </section>

@endsection
@section('script')
    <script src="{{asset('vendor/autosize/autosize.js')}}"></script>
    <script src="{{asset('vendor/bootstrap-fileupload/bootstrap-fileupload.min.js')}}"></script>
    {!! Html::script('js/municipios.js') !!}
@endsection
