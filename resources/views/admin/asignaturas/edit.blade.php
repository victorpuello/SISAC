@extends('layouts.app')
@section('titulo', "Usuarios")
@section('namePage', "Modulo: Usuarios - Editar ")
@section('content')
    <section class="card card-featured card-featured-primary mb-4">
        <header class="card-header">
            <h2 class="card-title">Editar usuario: {{$user->username}} </h2>
        </header>
        <div class="card-body">
            @include('admin.users.partials.messages')
            {!! Form::model($user,['route' => ['users.update',$user->id], 'method' => 'PUT','class' => 'form-horizontal form-bordered']) !!}
            @include('admin.users.partials.fields')
            <div class="card-footer">
                <a href="{{route('users.index')}}" class="btn btn-danger">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </div>
            {!! Form::close() !!}
        </div>
    </section>

@endsection
@section('script')
    <script src="{{asset('vendor/autosize/autosize.js')}}"></script>
    <script src="{{asset('vendor/bootstrap-fileupload/bootstrap-fileupload.min.js')}}"></script>
@endsection
