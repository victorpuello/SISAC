@extends('layouts.app');
@section('titulo', "Logros - Importar")
@section('namePage', "Importar: Logros")
@section('styles')
    <link rel="stylesheet" href={{asset("vendor/bootstrap-fileupload/bootstrap-fileupload.min.css")}} />
@endsection
@section('content')
    <div class="card-body">
        {!! Form::open(['route' => 'import-logros', 'method' => 'post','files' => true,'class' => 'form-horizontal', 'novalidate' => "novalidate"]) !!}
        <div class="form-group row">
            <label class="col-lg-3 control-label text-lg-right pt-2">Archivo: </label>
            <div class="col-lg-5">
                <div class="fileupload fileupload-new" data-provides="fileupload">
                    <div class="input-append">
                        <div class="uneditable-input">
                            <i class="fas fa-file fileupload-exists"></i>
                            <span class="fileupload-preview"></span>
                        </div>
                            <span class="btn btn-default btn-file">
                            <span class="fileupload-exists">Cambiar</span>
							<span class="fileupload-new">Selecionar archivo</span>
                                {!! Form::file('archivo')!!}
							</span>
                        <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remover</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <button type="submit" class=" btn btn-lg btn-primary editAsignatura">Importar</button>
            </div>
        </div>
        {!! Form::close() !!}
        <p>Carga un archivo CSV para importar los logros con los siguientes campos:
            <ul>
                <li>code</li>
                <li>description</li>
                <li>indicador: ['bajo','basico','alto','superior']</li>
                <li>category: ['cognitivo','procedimental','actitudinal']</li>
                <li>grade: ['0' to '11']</li>
                <li>asignatura</li>
                <li>docente</li>
                <li>periodo</li>
        </ul>
        <strong>Recuerda que el archivo debe estar separado por (,) y que no se aceptan caracteres especiales</strong>
        </p>
    </div>
@endsection
@section('script')
    <script src="{{ asset("vendor/autosize/autosize.js") }}"></script>
    <script src="{{asset("vendor/bootstrap-fileupload/bootstrap-fileupload.min.js")}}"></script>
@endsection
