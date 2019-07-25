@extends('layouts.app')
@section('titulo', "Docentes")
@section('namePage', "Modulo: Docentes")
@section('styles')
    <link rel="stylesheet" href="{{asset('vendor/select2/css/select2.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/select2-bootstrap-theme/select2-bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/pnotify/pnotify.custom.css')}}" />
@endsection
@section('content')
    <div class="row">
        @foreach($docentes as $docente)
            <div class="col-lg-3 col-xl-2">
                <section class="card">
                    <header class="card-header bg-{{Config::get('institucion.fondos.0')}}">
                        <div class="card-header-profile-picture">
                            <img src="{{asset("storage/usersdata/img/users/".$docente->user->path)}}">
                        </div>
                    </header>
                    <div class="card-body">
                        <h4 class="font-weight-semibold mt-3">{{substr($docente->name,0,20)}}...</h4>
                        <div class="accordion accordion-tertiary" id="accordion{{$docente->id}}Primary">
                            <div class="card card-default">
                                <div class="card-header">
                                    <h4 class="card-title m-0">
                                        <a class="accordion-toggle text-center" data-toggle="collapse" data-parent="#accordion{{$docente->id}}Primary" href="#collapse{{$docente->id}}PrimaryOne">
                                            Asignaturas
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse{{$docente->id}}PrimaryOne" class="collapse">
                                    <div class="card-body p-1">
                                        <ul class="pl-0 mb-0">
                                            @foreach($docente->asignaciones as $asignacion)
                                                <li class="badge badge-primary ml-1 p-1">{{$asignacion->asignatura->name }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <p class="mb-1"><a href="{{route('docentes.edit',$docente->id)}}"><i class="fas fa-user-edit mr-1"></i>Editar</a></p>
                            </div>
                            <div class="col-lg-6">
                                <p class="mb-1"><a href="#modalEliminar" class="deleted modal-basic" data-nuser="{{$docente->name}}" data-url="{{ route('docentes.destroy', $docente->id ) }}"><i class="fas fa-trash-alt mr-1"></i> Eliminar</a></p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        @endforeach
            @include('admin.docentes.partials.modals')
    </div>
    @endsection

@section('script')
    <script src="{{asset('vendor/select2/js/select2.js')}}"></script>
    <script src="{{asset('vendor/pnotify/pnotify.custom.js')}}"></script>
    <script src="{{asset('js/examples/examples.modals.js')}}"></script>
    <script type="text/javascript">
        $(".deleted").click(function (e) {
            $("#form-delete").attr('action', $(this).data('url') );
            $("#NombreDocente").text( $(this).data('nuser') );
        });

        $(".addAsignatura").click(function (e) {
            $("#form-addAsignaturas").attr('action', $(this).data('url'))
        });
    </script>
@endsection
