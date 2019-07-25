@extends('layouts.app')
@section('titulo', "Alummnos")
@section('namePage', "Modulo: Alummnos - Editar ")
@section('styles')
    <link rel="stylesheet" href="{{asset('vendor/bootstrap-fileupload/bootstrap-fileupload.min.css')}}" />
@endsection
@section('content')
    <section class="card card-featured card-featured-primary mb-4">
        <header class="card-header">
            <h2 class="card-title">Editar alummno: {{$estudiante->name}} </h2>
        </header>
        <div class="card-body">
            @include('admin.users.partials.messages')
            {!! Form::model($estudiante,['route' => ['docente.estudiantes.update',$estudiante], 'method' => 'PUT','files' => true,'class' => 'form-horizontal form-bordered']) !!}
            <div class="form-group row">
                <div class="card-body col-lg-4">
                    <div class="thumb-info mb-3">
                        <img src="{{asset("storage/usersdata/img/estudiantes/".$estudiante->path)}}" class="rounded img-fluid" alt="{{$estudiante->name}}">
                        <div class="thumb-info-title">
                            <span class="thumb-info-inner">{{$estudiante->name}}</span>
                            <span class="thumb-info-type">Alumno</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="form-group row mt-4">
                        <div class="col-lg-6">
                            <div class="form-group">
                                {!! Form::label('name', 'Nombres',['class'=>'control-label']) !!}
                                {!! Form::text('name', null, ['class' => 'form-control','id'=>'inputDefault', 'placeholder' => 'Por favor introduzca el nombre']) !!}
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                {!! Form::label('lastname', 'Apellidos',['class'=>'control-label']) !!}
                                {!! Form::text('lastname', null, ['class' => 'form-control','id'=>'inputDefault', 'placeholder' => 'Por favor introduzca los apellidos']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                {!! Form::label('typeid', 'Tipo documento de Identidad',['class'=>'control-label']) !!}
                                {!! Form::select('typeid',['RC'=>'Registro civil','TI' => 'Tarjeta de identidad','CC' => 'Cedula de ciudadania', 'DE' => 'Documento de extranjero'], null, ['class' => 'form-control mb-3','placeholder' =>'Selecciona el tipo de ID', 'id'=>'typeid','required']) !!}
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                {!! Form::label('identification', 'Número de Identificación: ',['class'=>'control-label']) !!}
                                {!! Form::number('identification',null,['class' => 'form-control','id'=>'identification', 'placeholder' => 'Por favor introduzca N° Identificación']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                {!! Form::label('gender', 'Sexo',['class'=>'control-label']) !!}
                                {!! Form::select('gender',['F'=>'Femenino','M' => 'Masculino'], null, ['class' => 'form-control','required','placeholder' =>'Selecciona el genero']) !!}
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                {!! Form::label('birthday', 'Fecha de Nacimiento: ',['class'=>'control-label']) !!}
                                {!! Form::date('birthday',null,['class' => 'form-control','id'=>'birthday', 'placeholder' => 'Fecha de nacimiento','required']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-4">
                    {!! Form::label('birthstate', 'Departamento de nacimiento',['class'=>'control-label']) !!}
                    {!! Form::select('birthstate',$departamentos, null,['placeholder' =>'Selecciona un Departamento','class' => 'form-control mb-3', 'id'=>'birthstate','required','data-url'=>route('docente.municipios',':ID')]) !!}
                </div>
                <div class="col-lg-4">
                    {!! Form::label('birthcity', 'Municipio de nacimiento',['class'=>'control-label']) !!}
                    {!! Form::select('birthcity', $municipios,null,['class' => 'form-control mb-3', 'id'=>'birthcity','required']) !!}
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        {!! Form::label('address', 'Dirección',['class'=>'control-label']) !!}
                        {!! Form::text('address', null, ['class' => 'form-control','id'=>'inputDefault', 'placeholder' => 'Por favor introduzca la dirección del estudiante']) !!}
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-4">
                    {!! Form::label('EPS', 'EPS',['class'=>'control-label']) !!}
                    {!! Form::text('EPS', null, ['class' => 'form-control','id'=>'inputDefault', 'placeholder' => 'Por favor introduzca el nombre de la EPS']) !!}
                </div>
                <div class="col-lg-4">
                    {!! Form::label('phone', 'Telefono',['class'=>'control-label']) !!}
                    {!! Form::text('phone', null, ['class' => 'form-control','id'=>'inputDefault', 'placeholder' => 'Por favor introduzca el Telefono']) !!}
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class=" control-label">Fotografia del Estudiante</label>
                        <div >
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="input-append">
                                    <div class="uneditable-input">
                                        <i class="fas fa-file fileupload-exists"></i>
                                        <span class="fileupload-preview"></span>
                                    </div>
                                    <span class="btn btn-default btn-file">
                            <span class="fileupload-exists">Cambiar</span>
                            <span class="fileupload-new">Selecionar archivo</span>
                                        {!! Form::file('path')!!}
                                    </span>
                                    <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                {!! Form::hidden('grupo_id') !!}
                {!! Form::hidden('dateout') !!}
                {!! Form::hidden('stade') !!}
                {!! Form::hidden('situation') !!}
                {!! Form::hidden('datein')!!}
            </div>
            <div class="card-footer">
                <a href="{{ URL::previous() }}" class="btn btn-danger">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </div>
            {!! Form::close() !!}
        </div>
    </section>

@endsection
@section('script')
    <script src="{{asset('vendor/autosize/autosize.js')}}"></script>
    <script src="{{asset('vendor/bootstrap-fileupload/bootstrap-fileupload.min.js')}}"></script>
    <script src="{{asset('js/examples/examples.notifications.js')}}"></script>
@endsection
