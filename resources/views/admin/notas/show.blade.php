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
                    <td class="name">{{$estudiante->full_name}}</td>
                    <td>
                        <a  class="modal-basic btn btn-default w-100 edit"
                            data-img="{{ url('/imgUsers/estudiantes/')}}/{{$estudiante->path}}"
                            data-urledit="{{ url('/admin/notas/') }}"
                            data-user = "{{$estudiante->id}}"
                            data-category = "Nota logro cognitivo"
                            data-name = "{{$estudiante->full_name}}"
                            data-nota = "{{ $estudiante->currentNotaID('cognitivo',$grado,$Idasignatura,$Iddocente,$Idperiodo) }}"
                            href="#modalAdd">
                            {{ $estudiante->currentNotaScore('cognitivo',$grado,$Idasignatura,$Iddocente,$Idperiodo) }}
                        </a>
                    </td>
                    <td>
                        <a  class="modal-basic btn btn-default w-100 edit"
                            data-img="{{ url('/imgUsers/estudiantes/')}}/{{$estudiante->path}}"
                            data-urledit="{{ url('/admin/notas/') }}"
                            data-user = "{{$estudiante->id}}"
                            data-category = "Nota logro procedimental"
                            data-name = "{{$estudiante->full_name}}"
                            data-nota = "{{ $estudiante->currentNotaID('procedimental',$grado,$Idasignatura,$Iddocente,$Idperiodo) }}"
                            href="#modalAdd">
                            {{ $estudiante->currentNotaScore('procedimental',$grado,$Idasignatura,$Iddocente,$Idperiodo) }}
                        </a>
                    </td>
                    <td>
                        <a  class="modal-basic btn btn-default w-100 edit"
                            data-img="{{ url('/imgUsers/estudiantes/')}}/{{$estudiante->path}}"
                            data-urledit="{{ url('/admin/notas/') }}"
                            data-user = "{{$estudiante->id}}"
                            data-category = "Nota logro actitudinal"
                            data-name = "{{$estudiante->full_name}}"
                            data-nota = "{{ $estudiante->currentNotaID('actitudinal',$grado,$Idasignatura,$Iddocente,$Idperiodo) }}"
                            href="#modalAdd">
                            {{ $estudiante->currentNotaScore('actitudinal',$grado,$Idasignatura,$Iddocente,$Idperiodo) }}
                        </a>
                    </td>
                    <td></td>

                </tr>
            @endforeach
            </tbody>
        </table>
        @include('admin.notas.partials.modals')
    </div>
@endsection
@section('script')
    <script src="{{asset('vendor/autosize/autosize.js')}}"></script>
    <script src="{{asset('vendor/select2/js/select2.js')}}"></script>
    <script src="{{asset('vendor/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/media/js/dataTables.bootstrap4.min.js')}}"></script>
    <script>
        var idnota;
        $(".edit").on('click',function (e) {
            $("#imgEstudiante").attr('src', $(this).data('img') );
            $("#nameEstudiante").text( $(this).data('name') );
            $("#label-score").text( $(this).data('category') );
            $("#estudiante_id").val( $(this).data('user') );
            $("#category").val( $(this).data('category').replace('Nota logro ', '') );
            $("#form-edit").attr('action', $(this).data('urlupdate') );
            var ruta = $(this).data('urledit')+'/'+$(this).data('nota')+'/edit';
            idnota = $(this).data('nota');
            $.get(ruta , function (data) {
                $("#score").val(data.score);
                $("#estudiante_id").val(data.estudiante_id);
                $("#logro_id").val(data.logro_id);
            });
        });
        $("#update-nota").on('click',function (e) {
            e.preventDefault();
            var form = $('#form-edit');
            var url = form.attr('action').replace(':NOTA_ID', idnota);
            var data = form.serialize();
            console.log(data);
            var posting = $.post(url,data);
            posting.done(function (data) {
                console.log(data);
                $.magnificPopup.close();
                var sectionRender = "{{route('notas.loadplanilla',['Idsalon'=>$Idsalon,'Iddocente'=>$Iddocente,'Idasignatura'=>$Idasignatura,'Idperiodo'=>$Idperiodo])}}";
                ajaxRenderSection(sectionRender);
                //location.reload(true);
                new PNotify({
                    title: 'Exito!',
                    text: data.msg,
                    type: 'success'
                });
            });
        });

        function ajaxRenderSection(url) {
            $.ajax({
                type: 'GET',
                url: url,
                dataType: 'json',
                success: function (data) {
                    $('#principalPanel').empty().append($(data));
                },
                error: function (data) {
                    var errors = data.responseJSON;
                    if (errors) {
                        $.each(errors, function (i) {
                            console.log(errors[i]);
                        });
                    }
                }
            });
        }
    </script>
    <script src="{{asset('js/examples/examples.modals.js')}}"></script>
    <script src="{{asset('js/examples/notas.js')}}"></script>
@endsection
