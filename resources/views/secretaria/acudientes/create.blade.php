@extends('layouts.app')
@section('titulo', "Acudiente")
@section('namePage', "Modulo: Estudiante - Acudiente ")
@section('styles')
    <link rel="stylesheet" href="{{asset('vendor/bootstrap-fileupload/bootstrap-fileupload.min.css')}}" />
@endsection
@section('content')
    <section class="card card-featured card-featured-primary mb-4">
        <header class="card-header">
            <h2 class="card-title">Crear acudiente nuevo para: <span class="text-color-secondary">{{$estudiante->full_name}} </span>   </h2>
        </header>
        <div class="card-body">
            @include('secretaria.acudientes.partials.messages')
            {!! Form::open(['route' => 'secretaria.acudiente.store', 'method' => 'post','files' => true,'class' => 'form-horizontal form-bordered']) !!}
            @include('secretaria.acudientes.partials.fields')
            <div class="card-footer">
                <a href="{{ URL::previous() }}" class="btn btn-danger">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </div>
            {!! Form::close() !!}
        </div>
    </section>

@endsection

@section('script')
    <script src="{{asset('vendor/autosize/autosize.js')}}"></script>
    <script src="{{asset('js/examples/examples.notifications.js')}}"></script>
    {!! Html::script('js/municipios.js') !!}
@endsection
