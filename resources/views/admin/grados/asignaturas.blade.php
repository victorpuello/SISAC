@extends('layouts.app')
@section('titulo', "Grupos")
@section('namePage', "Modulo: Grados - Asignaturas")
@section('styles')
    <link rel="stylesheet" href="{{asset('vendor/select2/css/select2.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/select2-bootstrap-theme/select2-bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/pnotify/pnotify.custom.css')}}" />
@endsection
@section('content')
    <div class="card card-transparent">
        <div class="row" id="ControlPanel">
            <div class="col-sm-1 ml-0">
                <div class="mb-3">
                    <a href="{{route('grados.index')}}"  class="btn btn-warning on-default "><i class="fas fa-backward"></i> Regresar</a>
                </div>
            </div>
            <div class="col-sm-1 pl-0">
                <div class="mb-3">
                    <a href="{{route('vincular.gradosasignaturas',$grado)}}"  class="btn btn-primary on-default simple-ajax-modal"><i class="fas fa-plus"></i> Agregar</a>
{{--                    <a href="#modalAddAsg"  class="btn btn-primary modal-basic "><i class="fas fa-plus"></i> Agregar</a>--}}
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($grado->asignaturas as $asignatura)
                <div class="col-lg-3 col-xl-3">
                    <section class="card card-horizontal mb-4">
                        <header class="card-header bg-primary">
                            <div class="card-header-icon">
                                <i class="fas fa-music"></i>
                            </div>
                        </header>
                        <div class="card-body p-4">
                            <h3 class="font-weight-semibold mt-3">Simple Block Title</h3>
                            <p>Nullam quiris risus eget urna mollis ornare vel eu leo. Soccis natoque penatibus et magnis dis parturient montes.</p>
                        </div>
                    </section>
                </div>
            @endforeach
        </div>
    </div>
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
