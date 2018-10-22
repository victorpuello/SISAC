@extends('layouts.app')
@section('titulo', "Indicadores")
@section('namePage', "Modulo: Academico - Indicadores")
@section('styles')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    @include('partials.stilosdt')
@endsection
@section('content')
    <div class="card-body" id="app">
        <indicador></indicador>
    </div>

        {{--{!! Form::open(['method' => 'DELETE', 'id' => "delete-form" ,'style' => 'display: none;']) !!}{!! Form::close() !!}--}}
    {{--<div id="inf" data-urltabla ="{{route('docente.indicadors.index')}}"  data-url ="{{Config::get('app.url')}}"></div>--}}
    {{--@include('docente.indicadores.partials.messages')--}}
    {{--@include('docente.indicadores.partials.modals')--}}
@endsection
@section('script')
    @include('partials.scriptdt')
@endsection
@section('scriptfin')
    <script src="{{asset('js/examples/examples.modals.js')}}"></script>
    <script src="{{asset('js/examples/examples.notifications.js')}}"></script>
    <script src="{{asset('js/tablas/docentes/indicadores.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>
@endsection
