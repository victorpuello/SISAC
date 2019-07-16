@extends('layouts.app')
@section('titulo', "Dirección de Grupo")
@section('namePage', "Observador ")
@section('styles')
    <link rel="stylesheet" href="{{asset('vendor/select2/css/select2.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/pnotify/pnotify.custom.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/animate/animate.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/bootstrap-fileupload/bootstrap-fileupload.min.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/magnific-popup/magnific-popup.css')}}" />
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-3 col-xl-2 mb-3 col-sm-12 ">
            <section class="card">
                <div class="card-body">
                    <div class="thumb-info mb-3">
                        <img src="{{asset("storage/usersdata/img/estudiantes/".$estudiante->path)}}" class="rounded img-fluid" alt="{{$estudiante->name}}">
                        <div class="thumb-info-title">
                            <span class="thumb-info-inner">{{substr($estudiante->name,0,15).'...'}}</span>
                            <span class="thumb-info-type">Alumno</span>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-lg-9 col-xl-10">

            <div class="tabs">
                <ul class="nav nav-tabs tabs-primary">
                    <li class="nav-item active">
                        <a class="nav-link" href="#resumen" data-toggle="tab">Resumen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#observaciones" data-toggle="tab">Anotaciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#edit" data-toggle="tab">Nueva anotación</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="resumen" class="tab-pane active">
                        @include('docente.observador.partials.acordeon.resumen')
                    </div>
                    <div id="observaciones" class="tab-pane">
                        @include('docente.observador.partials.acordeon.observaciones')
                    </div>
                    <div id="edit" class="tab-pane">
                        @include('docente.observador.partials.acordeon.editObservador')
                    </div>
                </div>
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
    <script src="{{asset('js/moment.js')}}"></script>
    <script src="{{asset('js/moment-timezone-with-data.js')}}"></script>
    <script src="{{asset('js/examples/examples.lightbox.js')}}"></script>
    <script>
        moment.locale('es');
        $( document ).ready(function() {
            var fecha = $(".fecha").data('fecha');
            var texto = moment(fecha).fromNow();
            $(".fecha").text(texto);
        });
    </script>
@endsection
