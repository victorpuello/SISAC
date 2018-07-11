@extends('layouts.app')
@section('titulo', "Docentes")
@section('styles')
    <link rel="stylesheet" href="{{asset('vendor/bootstrap-fileupload/bootstrap-fileupload.min.css')}}" />
@endsection
@section('namePage', "Modulo: Docentes - Crear ")
@section('content')
        <section class="card form-wizard" id="w1">
            <header class="card-header">
                <h2 class="card-title">Crear docente nuevo</h2>
            </header>
            <div class="card-body card-body-nopadding">
                <div class="wizard-tabs">
                    <ul class="nav wizard-steps">
                        <li class="nav-item active">
                            <a href="#w1-account" data-toggle="tab" class="nav-link text-center">
                                <span class="badge">1</span>
                                Usuario
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#w1-profile" data-toggle="tab" class="nav-link text-center">
                                <span class="badge">2</span>
                                Información de contacto
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#w1-confirm" data-toggle="tab" class="nav-link text-center">
                                <span class="badge">3</span>
                                Otros
                            </a>
                        </li>
                    </ul>
                </div>
                @include('admin.docentes.partials.messages')
                {!! Form::open(['route' => 'docentes.store', 'method' => 'post','files' => true,'class' => 'form-horizontal', 'novalidate' => "novalidate"]) !!}
                    @include('admin.docentes.partials.fields')

            <div class="card-footer">
                <ul class="pager">
                    <li class="previous disabled">
                        <a><i class="fas fa-angle-left"></i> Anterior</a>
                    </li>
                    <li class="finish hidden float-right">
                        <button type="submit">Finalizar</button>
                    </li>
                    {!! Form::close() !!}
                    <li class="next">
                        <a>Siguiente <i class="fas fa-angle-right"></i></a>
                    </li>
                </ul>
            </div>
            </div>
        </section>
@endsection

@section('script')
    <script src="{{asset('vendor/autosize/autosize.js')}}"></script>
    <script src="{{asset('vendor/bootstrap-fileupload/bootstrap-fileupload.min.js')}}"></script>
    <script src="{{asset('vendor/jquery-validation/jquery.validate.js')}}"></script>
    <script src="{{asset('vendor/bootstrap-wizard/jquery.bootstrap.wizard.js')}}"></script>
    <script src="{{asset('js/examples/examples.wizard.js')}}"></script>
@endsection
