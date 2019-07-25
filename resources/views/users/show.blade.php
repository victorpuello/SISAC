@extends('layouts.app')
@section('titulo', "Perfil")
@section('namePage', "Perfil  de usuario:  ". $user->full_name)
@section('styles')
    <link rel="stylesheet" href="{{asset('vendor/bootstrap-fileupload/bootstrap-fileupload.min.css')}}" />
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-2 col-xl-2 mb-3 mb-xl-0 col-sm-12">
            <section class="card">
                <div class="card-body">
                    <div class="thumb-info mb-3">
                        <img src="{{asset("storage/usersdata/img/users/".Auth::user()->path)}}" class="rounded img-fluid" alt="{{Auth::user()->name}}">
                        <div class="thumb-info-title">
                            <span class="thumb-info-inner">{{Auth::user()->name}}</span>
                            <span class="thumb-info-type">{{Auth::user()->type}}</span>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-lg-10 col-xl-10">
            <section class="card card-featured card-featured-info mb-4">
                <header class="card-header">
                    <div class="card-actions">
                        <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                        <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                    </div>

                    <h2 class="card-title">Información de Usuario</h2>
                </header>
                {!! Form::model($user,['route'=>['user.update',$user],'method' => 'PUT','class' => 'form-horizontal form-bordered', 'files' =>true ,'id'=>'form-edit']) !!}
                    <div class="card-body">
                        @include('users.partials.fields')
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                {!! Form::close() !!}
            </section>
            @docente
            <section class="card card-featured card-featured-info mb-4">
                <header class="card-header">
                    <div class="card-actions">
                        <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                        <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                    </div>

                    <h2 class="card-title">Datos del Docente</h2>
                </header>
                <div class="card-body">
                    @include('users.partials.partials-docente')
                </div>
            </section>
            @enddocente
        </div>

    </div>
@endsection
@section('script')
    @include('partials.scriptdt')
@endsection
@section('scriptfin')
    <script src="{{asset('vendor/bootstrap-fileupload/bootstrap-fileupload.min.js')}}"></script>
    <script src="{{asset('js/examples/examples.notifications.js')}}"></script>
@endsection

