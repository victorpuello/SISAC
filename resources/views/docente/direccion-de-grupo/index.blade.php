@extends('layouts.app')
@section('titulo', "Dirección de Grupo")
@section('namePage', "Modulo: Dirección ")
@section('styles')
    <link rel="stylesheet" href="{{asset('vendor/select2/css/select2.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/select2-bootstrap-theme/select2-bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/datatables/media/css/dataTables.bootstrap4.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/pnotify/pnotify.custom.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/animate/animate.css')}}" />
@endsection
@section('content')
    <div class="row">
        @foreach($estudiantes as $estudiante)
            <div class="col-lg-3">
                <section class="card">
                    <header class="card-header bg-{{Config::get('institucion.fondos.2')}}">
                        <div class="card-header-profile-picture">
                            <img src="{{asset("storage/usersdata/img/estudiantes/".$estudiante->path)}}">
                        </div>
                    </header>
                    <div class="card-body">
                        <h4 class="font-weight-semibold mt-3">{{$estudiante->apellido_name}}</h4>
                        <hr class="solid short">
                        <div class="row">
                            <div class="col-lg-6">
                                <p class="mb-1">
                                    <a class=" simple-ajax-modal" href="{{route('docente.direccion.getacudiente',$estudiante)}}">
                                        <i class="fas fa-user-tie mr-1"></i>Acudiente
                                    </a>
                                </p>
                                <p class="mb-1">
                                    <a class=" simple-ajax-modal" href="{{route('docente.direccion.getmatricula',$estudiante)}}">
                                        <i class="fas fa-clipboard-check mr-1"></i>Matricula
                                    </a>
                                </p>
                            </div>
                            <div class="col-lg-6">
                                <p class="mb-1"><a class="simple-ajax-modal" href="{{route('docente.direccion.getdefinitivas',$estudiante)}}"><i class="fas fa-list-alt mr-1"></i>Notas</a></p>
                                <p class="mb-1"><a href="{{route('docente.direccion.observador',$estudiante)}}"><i class="fas fa-eye mr-1"></i>Observador</a></p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        @endforeach
        @include('docente.direccion-de-grupo.partials.modals')
    </div>
@endsection

@section('script')
    <script src="{{asset('vendor/jquery-browser-mobile/jquery.browser.mobile.js')}}"></script>
    <script src="{{asset('vendor/popper/umd/popper.min.js')}}"></script>
    <script src="{{asset('vendor/select2/js/select2.js')}}"></script>
    <script src="{{asset('vendor/datatables/media/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('js/examples/examples.modals.js')}}"></script>
    <script src="{{asset('vendor/pnotify/pnotify.custom.js"')}}"></script>
    <script src="{{asset('vendor/jquery-placeholder/jquery-placeholder.js')}}"></script>

@endsection
