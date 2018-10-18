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
        <div class="col-lg-4 col-xl-3 mb-4 mb-xl-0">
            <section class="card">
                <div class="card-body">
                    <div class="thumb-info mb-3">
                        <img src="{{asset("storage/usersdata/img/estudiantes/".$estudiante->path)}}" class="rounded img-fluid" alt="{{$estudiante->name}}">
                        <div class="thumb-info-title">
                            <span class="thumb-info-inner">{{$estudiante->name}}</span>
                            <span class="thumb-info-type">Alumno</span>
                        </div>
                    </div>
                    <hr class="dotted short">
                    <div class="widget-toggle-expand mb-3">
                        <div class="widget-content-expanded">
                            <ul class="simple-todo-list mt-3">
                                <li class="completed"><a href="#">Formato compromiso academico</a></li>
                                <li class="completed"><a href="#">Formato compromiso convivencia</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-lg-8 col-xl-9">

            <div class="tabs">
                <ul class="nav nav-tabs tabs-primary">
                    <li class="nav-item active">
                        <a class="nav-link" href="#overview" data-toggle="tab">Observaciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#edit" data-toggle="tab">Nueva</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="overview" class="tab-pane active">
                        <div class="p-3">
                            <h4 class="mb-3">Historico</h4>
                            <div class="timeline timeline-simple mt-3 mb-3">
                                <div class="tm-body">
                                    @foreach($periodos as $periodo)
                                        @if($estudiante->getAnotacionPeriodo($periodo)->count() > 0 )
                                            <div class="tm-title">
                                                <h5 class="m-0 pt-2 pb-2 text-uppercase">{{$periodo->name}}</h5>
                                            </div>
                                            <ol class="tm-items">
                                                @foreach($estudiante->getAnotacionPeriodo($periodo) as $anotacion)
                                                    <li>
                                                        <div class="tm-box">
                                                            <p class="text-muted mb-0 fecha" data-fecha="{{$anotacion->created_at}}"></p>
                                                            <p class="mb-1">
                                                                {{$anotacion->annotation}}
                                                            </p>
                                                            <div class="float-md-right">
                                                                <a class=" btn btn-xs btn-warning" href="{{ url('/imgUsers/documentos/')}}/{{$anotacion->path}} " data-plugin-lightbox data-plugin-options='{ "type":"image" }' title="Acta de compromiso.">
                                                                    Ver Acta
                                                                </a>
                                                                <a class="btn btn-xs btn-primary simple-ajax-modal" href="{{route('docente.anotaciones.edit',$anotacion)}}">Editar</a>
                                                                {!! Form::open(['method' => 'DELETE','class'=>'text-lg-right','route' => ['docente.anotaciones.destroy',$anotacion],'style' => 'display: inline-block;']) !!}
                                                                    <button class="btn btn-xs btn-danger" type="submit">Eliminar</button>
                                                                {!! Form::close() !!}
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ol>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>
                    <div id="edit" class="tab-pane">
                        @include('admin.estudiantes.partials.messages')
                        {!! Form::open(['route' => 'docente.anotaciones.store', 'method' => 'post','files' => true,'class' => 'form-horizontal form-bordered']) !!}
                            @include('docente.observador.partials.fields')
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        {!! Form::close() !!}
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
