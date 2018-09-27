@extends('layouts.app')
@section('titulo', "Usuarios")
@section('namePage', "Modulo: Docentes")
@section('styles')
    <link rel="stylesheet" href="{{asset('vendor/select2/css/select2.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/select2-bootstrap-theme/select2-bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/pnotify/pnotify.custom.css')}}" />
@endsection
@section('content')
    <div class="row">
        @foreach($docentes as $docente)
            <div class="col-lg-3">
                <section class="card">
                    <header class="card-header {{Config::get('institucion.fondos.0')}}">
                        <div class="card-header-profile-picture">
                            <img src="{{asset("storage/usersdata/img/users/".$docente->user->path)}}">
                        </div>
                    </header>
                    <div class="card-body">
                        <h4 class="font-weight-semibold mt-3">{{$docente->name}}</h4>
                        <p><strong>Asignaturas: </strong>
                        <ul>
                            @foreach($docente->asignaciones as $asignacion)
                                <li>{{$asignacion->$asignatura->name }}</li>
                            @endforeach
                        </ul>
                        </p>
                        <hr class="solid short">
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
