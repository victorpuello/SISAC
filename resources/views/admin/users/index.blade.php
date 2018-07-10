@extends('layouts.app')
@section('titulo', "Usuarios")
@section('namePage', "Modulo: Usuarios")
@section('styles')
    <link rel="stylesheet" href="{{asset('vendor/select2/css/select2.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/select2-bootstrap-theme/select2-bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/datatables/media/css/dataTables.bootstrap4.css')}}" />
    @endsection
@section('content')
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="mb-3">
                    <a href="{{route('users.create')}}"  class="btn btn-primary">Agregar <i class="fas fa-plus"></i></a>
                </div>
            </div>
        </div>
        <table class="table table-bordered table-striped mb-0" id="datatable-editable">
            <thead>
            <tr>
                <th>Usuario</th>
                <th>Email</th>
                <th>Tipo</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
            <tr data-item-id="{{$user->id}}">
                <td>{{$user->username}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->type}}</td>
                <td class="actions">
                    <a href="#" class="hidden on-editing save-row"><i class="fas fa-save"></i></a>
                    <a href="#" class="hidden on-editing cancel-row"><i class="fas fa-times"></i></a>
                    <a href="{{route('users.edit', $user->id)}}" class="on-default " > <i class="fas fa-pencil-alt"></i></a>
                    <a href="#modalEliminar" class="on-default deleted modal-basic" data-nuser="{{$user->username}}" data-url="{{ route('users.destroy', $user->id ) }}"><i class="far fa-trash-alt"></i></a>
                </td>
            </tr>
                @endforeach
            </tbody>
        </table>
        @include('admin.users.partials.modals')
    </div>
@endsection
@section('script')
    <script src="{{asset('vendor/select2/js/select2.js')}}"></script>
    <script src="{{asset('vendor/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/media/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('js/examples/examples.datatables.editable.js')}}"></script>
    <script src="{{asset('js/examples/examples.modals.js')}}"></script>
    <script type="text/javascript">
        $(".deleted").click(function (e) {
            $("#form-delete").attr('action', $(this).data('url') );
            $("#NombreUser").text( $(this).data('nuser') );
        });
    </script>
@endsection

