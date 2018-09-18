@extends('layouts.app')
@section('titulo')
    Institución
@endsection
@section('namePage')
    @institucion($institucion)
        Institución
    @else
        {{$institucion->name}}
    @endinstitucion
@endsection
@section('styles')
    <link rel="stylesheet" href="{{asset('vendor/select2/css/select2.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/pnotify/pnotify.custom.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/animate/animate.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/font-awesome/css/fontawesome-all.min.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/magnific-popup/magnific-popup.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/bootstrap-fileupload/bootstrap-fileupload.min.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/magnific-popup/magnific-popup.css')}}" />
@endsection
@section('content')
    <div class="card-body">
        @institucion($institucion)
            <a class="mb-1 mt-1 mr-1 btn btn-primary btn-lg btn-block simple-ajax-modal" href="{{route('institucion.create')}}">Agregar institución</a>
        @else
            {!! Form::model($institucion,['route' => ['institucion.update',$institucion], 'method' => 'PUT','files' => true,'class' => 'form-horizontal form-bordered']) !!}
            @include('admin.institucion.partials.fieldshow')
            {!! Form::close() !!}
    </div>
    <div class="card-footer">
        <div class="row">
            <div class="offset-10 col-md-2 text-right">
                <a href="{{route('institucion.edit',$institucion)}}" class="btn btn-primary  btn-block simple-ajax-modal">Editar</a>
            </div>
        </div>
    </div>
    @endinstitucion
@endsection
@section('script')
    <script src="{{asset('vendor/autosize/autosize.js')}}"></script>
    <script src="{{asset('vendor/bootstrap-fileupload/bootstrap-fileupload.min.js')}}"></script>
    <script src="{{asset('js/examples/examples.modals.js')}}"></script>
    <script src="{{asset('vendor/pnotify/pnotify.custom.js"')}}"></script>
    <script src="{{asset('vendor/jquery-placeholder/jquery-placeholder.js')}}"></script>
@endsection

