@extends('layouts.app')
@section('titulo', "Planillas")
@section('namePage', "Modulo: Académico - Planillas")
@section('styles')
    <link rel="stylesheet" href="{{asset('vendor/select2/css/select2.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/select2-bootstrap-theme/select2-bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/datatables/media/css/dataTables.bootstrap4.css')}}" />
@endsection
@section('content')
    <section class="card">
        <header class="card-header bg-primary ">
            <h2 class="card-title text-color-light"><strong>{{count($planillas)}}</strong> - Planillas disponibles para calificar - <strong>Lic. {{$docente->name}}</strong></h2>
        </header>
        <div class="row">
            @foreach( $planillas as $planilla)
                <div class="col-lg-2 mt-2 mb-2">
                    <section class="card">
                        <header class="card-header bg-{{Config::get('institucion.fondos.2')}}">
                            <div class="card-header-profile-picture">
                                <img src="{{url('/img')}}/{{$planilla->asignacion->grupo->grado->numero}}.jpg">
                            </div>
                        </header>
                        <div class="card-body p-2">
                            <ul class="pl-3">
                                <li><span><strong>Asignatura: </strong>{{$planilla->asignacion->asignatura->name}}</span></li>
                                <li><span><strong>Grupo: </strong>{{$planilla->asignacion->grupo->name}}</span></li>
                            </ul>
                            <hr class="solid short">
                            <div class="row">
                                <div class="col-lg-3 offset-3 d-block">
                                    <a href="{{Route('planillas.show',$planilla)}}" class="btn btn-sm btn-info center" ><i class="fas fa-pencil-alt mr-1"></i>Calificar</a>
                                </div>
                            </div>
                            <div class="row mt-1">
                                    {!! Form::open() !!}
                                        <div class="col-sm-7 col-lg-6 col-xl-6  switch switch-sm switch-primary">
                                            {!! Form::checkbox('modificada',null,false,['class'=>'form-comtrol','data-plugin-ios-switch']) !!}
                                        </div>
                                    {!! Form::close() !!}
                            </div>
                        </div>
                    </section>
                </div>
            @endforeach
        </div>
    </section>
@endsection
@section('script')
    <script src="{{asset('vendor/autosize/autosize.js')}}"></script>
    <script src="{{asset('vendor/select2/js/select2.js')}}"></script>
    <script src="{{asset('js/examples/examples.modals.js')}}"></script>
    <script src="{{asset('vendor/ios7-switch/ios7-switch.js')}}"></script>
@endsection
