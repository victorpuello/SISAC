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
    <div class="row">
            <div class="card col-12 col-lg-12 col-sm-12 col-md-12">
                <div class="card-body">
                    {!! Form::model($institucion,['route' => ['institucions.update',$institucion], 'method' => 'PUT','files' => true,'class' => 'form-horizontal form-bordered']) !!}
                            <header class="card-header">
                                <h2 class="card-title">Actualizar datos de la institución </h2>
                            </header>
                            <div class="card-body">
                                @include('admin.institucion.partials.messages')
                                @include('admin.institucion.partials.fields')
                            </div>
                            <footer class="card-footer">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <a  href="{{route('institucions.index')}}" class="btn btn-danger ml-3"> Cancelar</a>
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                                </div>
                            </footer>
                    {!! Form::close() !!}
                </div>
            </div>
    </div>
@endsection
@section('script')
    <script src="{{asset('vendor/autosize/autosize.js')}}"></script>
    <script src="{{asset('vendor/bootstrap-fileupload/bootstrap-fileupload.min.js')}}"></script>
    <script src="{{asset('js/examples/examples.modals.js')}}"></script>
    <script src="{{asset('vendor/pnotify/pnotify.custom.js"')}}"></script>
    <script src="{{asset('vendor/jquery-placeholder/jquery-placeholder.js')}}"></script>
    <script src="{{asset('js/examples/examples.notifications.js')}}"></script>
@endsection