@extends('layouts.app')
@section('titulo', "Alummnos")
@section('namePage', "Modulo: Alumnos - Ver ")
@section('styles')
    {!! Html::style('vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css') !!}
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-2 col-xl-2">
            <section class="card">
                <div class="card-body">
                    <div class="thumb-info mb-3">
                        <img src="{{asset("storage/usersdata/img/estudiantes/".$estudiante->path)}}" class="rounded img-fluid" alt="{{$estudiante->name}}">
                        <div class="thumb-info-title">
                            <span class="thumb-info-inner">{{$estudiante->name}}</span>
                            <span class="thumb-info-type">Alumno</span>
                        </div>
                    </div>
                    <hr class="dotted short">
                    <div class="clearfix">
                        <a class="text-uppercase text-muted float-right" href="{{route('secretaria.estudiantes.edit', $estudiante)}}">(Editar)</a>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-lg-10 col-xl-10">
            <div class="tabs">
                <ul class="nav nav-tabs tabs-primary">
                    <li class="nav-item active">
                        <a class="nav-link" href="#informacion" data-toggle="tab">Información Personal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#acudiente" data-toggle="tab">Acudiente</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#certificado" data-toggle="tab">Certificados</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="informacion" class="tab-pane active">
                       @include('secretaria.estudiantes.partials.pestana.informacion')
                    </div>
                    <div id="acudiente" class="tab-pane">
                       @include('secretaria.estudiantes.partials.pestana.acudiente')
                    </div>
                    <div id="certificado" class="tab-pane">

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('script')
    {!! Html::script('vendor/autosize/autosize.js') !!}
@endsection
