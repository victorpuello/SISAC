@extends('layouts.app')
@section('titulo', "Calificar")
@section('namePage', "Modulo: Académico")
@section('styles')
    <link rel="stylesheet" href="{{asset('vendor/select2/css/select2.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/select2-bootstrap-theme/select2-bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/datatables/media/css/dataTables.bootstrap4.css')}}" />
@endsection
@section('content')
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">

            </div>
        </div>
        <table class="table table-bordered table-striped mb-0" id="datatable-editable">
            <thead>
            <tr>
                <th>N°</th>
                <th>Nombre</th>
                <th>Cognitivo</th>
                <th>Procedimental</th>
                <th>Actitudinal</th>
                <th>Inasistencias</th>

            </tr>
            </thead>
            <tbody>
            @foreach($estudiantes as $key => $estudiante)
                <tr data-item-id="{{$estudiante->id}}">
                    <td class="id">{{$key+1}}</td>
                    <td class="name">
                            {{$estudiante->lastname}} {{$estudiante->name}}
                    </td>
                    <td><a  class="modal-basic addNote"
                            data-img="{{ url('/imgUsers/estudiantes/')}}/{{$estudiante->path}}"
                            data-user = {{$estudiante->id}}
                            href="#modalAdd">
                            <ul>
                                @foreach($estudiante->logros->where('category','=','cognitivo') as $logro)
                                    <li>$logro->id</li>
                                @endforeach
                            </ul>

                        </a>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @include('admin.notas.partials.modals')
    @endsection
@section('script')
    <script src="{{asset('vendor/autosize/autosize.js')}}"></script>
    <script src="{{asset('vendor/select2/js/select2.js')}}"></script>
    <script src="{{asset('vendor/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/media/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('js/examples/examples.modals.js')}}"></script>
    <script src="{{asset('js/examples/notas.js')}}"></script>
    <script>
        $(".addNote").click(function (e) {
            $("#imgEstudiante").attr('src', $(this).data('img') );
            $("#nameEstudiante").text( $(this).text() );
            $("#estudiante_id").val( $(this).data('user') );
        });
    </script>
@endsection
