@extends('layouts.app')
@section('titulo', "Grupos")
@section('namePage', "Modulo: Grupos")
@section('styles')
@endsection
@section('content')
    <div class="row">
        @foreach($grados as $grado)
            <div class="col-lg-4 col-xl-4">
                <section class="card card-featured-left card-featured-primary mb-4">
                    <div class="card-body">
                        <div class="widget-summary">
                    <div class="widget-summary-col widget-summary-col-icon">
                        <div class="summary-icon bg-{{Config::get('institucion.fondos.0')}}">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-square-o fa-stack-2x"></i>
                                <strong class="fa-stack-1x" style="font-size:80%; margin: -17%;">{{$grado->numero}}</strong>
                            </span>
                        </div>
                    </div>
                    <div class="widget-summary-col">
                        <div class="summary">
                            <h4 class="title">Grupos Grado {{$grado->numero}}</h4>
                            <div class="info">
                                <strong >Ingresa para ver los grupos de grado {{$grado->name}}</strong>
                            </div>
                        </div>
                        <div class="summary-footer">
                            <a href="{{ route('grupos.show',$grado) }}" class="btn btn-sm btn-primary text-uppercase">Ver Grupos</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
            </div>
        @endforeach
    </div>
@endsection
