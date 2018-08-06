@extends('layouts.app')
@section('titulo', "Dirección de Grupo")
@section('namePage', "Modulo: Dirección ")
@section('styles')
    <link rel="stylesheet" href="{{asset('vendor/select2/css/select2.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/select2-bootstrap-theme/select2-bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/pnotify/pnotify.custom.css')}}" />
@endsection
@section('content')
    <div class="row">
        @foreach($estudiantes as $estudiante)
            <div class="col-lg-3">
                <section class="card">

                    <header class="card-header {{$fondos[rand(0,3)]}}">
                        <div class="card-header-profile-picture">
                            <img src="{{ url('/imgUsers/')}}/{{$estudiante->path}}">
                        </div>
                    </header>
                    <div class="card-body">
                        <h4 class="font-weight-semibold mt-3">{{$estudiante->apellido_name}}</h4>
                        <hr class="solid short">
                        <div class="row">
                            <div class="col-lg-6">
                                <p class="mb-1"><a href="{{route('docentes.edit',$estudiante->id)}}"><i class="fas fa-user-edit mr-1"></i>Editar</a></p>
                                <p class="mb-1"><a href="#modalEliminar" class="deleted modal-basic" data-nuser="{{$estudiante->name}}" data-url="{{ route('docentes.destroy', $estudiante->id ) }}"><i class="fas fa-trash-alt mr-1"></i> Eliminar</a></p>
                                <p class="mb-1"><a href="#modalAddAsignaturas" data-url="{{route('docentes.addAsignaturas',$estudiante->id)}}" class="modal-basic addAsignatura"><i class="fas fa-share-square mr-1"></i> Asignaturas</a></p>
                            </div>
                            <div class="col-lg-6">
                                <p class="mb-1"><a href="#"><i class="fas fa-chalkboard mr-1"></i>Salones</a></p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        @endforeach
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
