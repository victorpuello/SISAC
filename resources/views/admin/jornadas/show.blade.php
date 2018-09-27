@extends('layouts.app')
@section('titulo', "Grupos")
@section('namePage', "Modulo: Grados - Grupos")
@section('styles')
    <link rel="stylesheet" href="{{asset('vendor/select2/css/select2.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/select2-bootstrap-theme/select2-bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/pnotify/pnotify.custom.css')}}" />
@endsection
@section('content')
    <div class="card card-transparent">
        <div class="row" id="ControlPanel">
            <div class="col-sm-6">
                <div class="mb-3">
                    <a href="{{route('grados.index')}}"  class="btn btn-primary on-default ">Regresar <i class="fas fa-backward"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($grado->grupos as $grupo)
                <div class="col-lg-3">
                    <section class="card">
                        <header class="card-header bg-{{Config::get('institucion.fondos.1')}}">
                            <div class="card-header-profile-picture">
                                <img src="{{url('/img')}}/{{$grupo->name}}.jpg">
                            </div>
                        </header>
                        <div class="card-body">
                            <h4 class="font-weight-semibold mt-3">{{$grupo->name_aula}}</h4>
                            <p><strong>Número de estudiantes: </strong>{{count($grupo->estudiantes)}}</p>
                            <hr class="solid short">
                        </div>
                    </section>
                </div>
            @endforeach
        </div>
    </div>
    @include('admin.grados.partials.modals')
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