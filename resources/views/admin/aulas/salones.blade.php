@extends('layouts.app')
@section('titulo', "Aulas")
@section('namePage', "Modulo: Aulas")
@section('styles')
    <link rel="stylesheet" href="{{asset('vendor/select2/css/select2.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/select2-bootstrap-theme/select2-bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/datatables/media/css/dataTables.bootstrap4.css')}}" />
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-6">
            <div class="mb-3">
                <a href="#modalAdd"  class="btn btn-primary on-default modal-basic ">Agregar <i class="fas fa-plus"></i></a>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach($aulas as $aula)
            <div class="col-lg-4">
                    <section class="card">
                        <header class="card-header bg-{{$fondos[rand(0,3)]}}">
                            <div class="card-header-profile-picture">
                                <img src="{{url('/img')}}/{{$aula->name}}.jpg">
                            </div>
                        </header>
                        <div class="card-body">
                            <h4 class="font-weight-semibold mt-3">{{$aula->NameAula}}</h4>
                            <p><strong>Número de estudiantes: </strong>{{count($aula->estudiantes)}}</p>
                            <hr class="solid short">
                            <div class="row">
                                <div class="col-lg-6">
                                    <p class="mb-1"><a href="#modalEditar" data-urlupdate="{{ route('aulas.update', $aula->id ) }}" data-urledit="{{ route('aulas.edit', $aula->id ) }}" class="modal-basic edit"><i class="fas fa-edit mr-1"></i>Editar</a></p>
                                </div>
                                <div class="col-lg-6">
                                    <p class="mb-1"><a href="#modalEliminar" data-nsl ="{{$aula->NameAula}}" data-url="{{route('aulas.destroy',$aula->id)}}" class="deleted modal-basic" ><i class="fas fa-trash-alt mr-1"></i> Eliminar</a></p>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
        @endforeach
    </div>
    @include('admin.aulas.partials.modals')
    @endsection
@section('script')
    <script src="{{asset('vendor/select2/js/select2.js')}}"></script>
    <script src="{{asset('js/examples/examples.modals.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>
    <script type="text/javascript">
        $(".deleted").click(function (e) {
            $("#form-delete").attr('action', $(this).data('url') );
            $("#NombreSalon").text( $(this).data('nsl') );
        });

        $(".edit").click(function (e) {
            $("#form-edit").attr('action', $(this).data('urlupdate') );
            var ruta = $(this).data('urledit');
            $.get(ruta , function (data) {
                $("#id").val(data.id);
                $("#name").val(data.name);
                $("#grade").val(data.grade);
            });
        });
    </script>
    @endsection
