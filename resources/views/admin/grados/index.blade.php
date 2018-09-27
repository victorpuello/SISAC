@extends('layouts.app')
@section('titulo', "Grados")
@section('namePage', "Modulo: Grados")
@section('styles')
    <link rel="stylesheet" href="{{asset('vendor/select2/css/select2.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/select2-bootstrap-theme/select2-bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/pnotify/pnotify.custom.css')}}" />
@endsection
@section('content')
    <div class="card card-transparent">
        <div class="col-sm-6">
            <div class="mb-3">
                <a href="{{route('grados.create')}}"  class="btn btn-primary on-default simple-ajax-modal">Agregar grado <i class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="row">
        @foreach($grados as $grado)
            <div class="col-lg-4 col-xl-4">
                <section class="card card-featured-left card-featured-primary mb-4">
                    <div class="card-body">
                        <div class="widget-summary">
                    <div class="widget-summary-col widget-summary-col-icon">
                        <div class="summary-icon bg-{{Config::get('institucion.fondos.0')}}">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-square-o fa-stack-2x"></i>
                                <strong class="fa-stack-1x" style="font-size:80%; margin: -17%;">{{$grado->numero}}</strong>
                            </span>
                        </div>
                    </div>
                    <div class="widget-summary-col">
                        <div class="summary">
                            <h4 class="title">Grupos Grado {{$grado->numero}}</h4>
                            <div class="info">
                                <strong >Ingresa para ver los grupos de grado {{$grado->name}}</strong>
                            </div>
                        </div>
                        <div class="summary-footer">
                            <a href="{{ route('grados.edit',$grado) }}" class="btn btn-xs btn-primary simple-ajax-modal"><i class="fas fa-pencil-alt"></i> Editar</a>
                            <a href="#modalEliminar" class="btn btn-xs btn-primary deleted modal-basic" data-nasg="{{$grado->name}}" data-url="{{ route('grados.destroy', $grado->id ) }}"><i class="far fa-trash-alt"></i> Eliminar</a>
                            <a href="{{ route('grados.show',$grado) }}" class="btn btn-xs btn-primary "><i class="far fa-eye"></i> Grupos</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
            </div>
        @endforeach
    </div>
    </div>
    @include('admin.grados.partials.modals')
    @include('admin.grados.partials.messages')
@endsection
@section('script')
    <script src="{{asset('vendor/select2/js/select2.js')}}"></script>
    <script src="{{asset('vendor/pnotify/pnotify.custom.js')}}"></script>
    <script src="{{asset('js/examples/examples.modals.js')}}"></script>
    <script>
        $(".deleted").click(function (e) {
            $("#form-delete").attr('action', $(this).data('url') );
            $("#NombreGrado").text( $(this).data('nasg') );
        });
    </script>
    @endsection
@section('scriptfin')
    <script src="{{asset('js/examples/examples.notifications.js')}}"></script>
@endsection