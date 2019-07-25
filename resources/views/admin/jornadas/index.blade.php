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
                <a href="{{route('jornadas.create')}}"  class="btn btn-primary on-default simple-ajax-modal">Agregar jornada <i class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="row">
        @foreach($jornadas as $jornada)
            <div class="col-lg-2 col-xl-2">
                <section class="card card-featured-left card-featured-primary mb-4">
                    <div class="card-body">
                        <div class="widget-summary">
                            <div class="widget-summary-col">
                                <div class="summary">
                                    <h2 ><strong>{{$jornada->name}}</strong> </h2>
                                </div>
                                <div class="summary-footer">
                                    <a href="{{ route('jornadas.edit',$jornada) }}" class="btn btn-xs btn-primary simple-ajax-modal"><i class="fas fa-pencil-alt"></i> Editar</a>
                                    <a href="#modalEliminar" class="btn btn-xs btn-primary deleted modal-basic" data-nasg="{{$jornada->name}}" data-url="{{ route('jornadas.destroy', $jornada ) }}"><i class="far fa-trash-alt"></i> Eliminar</a>
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