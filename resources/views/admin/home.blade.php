@extends('layouts.app')
@section('titulo')
    Bienvenido {{ Auth::user()->name }}
    @endsection
@section('namePage')
    Bienvenido
    @endsection
@section('styles')
    <link rel="stylesheet" href="{{asset('vendor/morris/morris.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/chartist/chartist.min.css')}}" />
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-3">
            <section class="card card-featured-left card-featured-primary mb-4">
                <div class="card-body">
                    <div class="widget-summary">
                        <div class="widget-summary-col widget-summary-col-icon">
                            <div class="summary-icon bg-primary">
                                <i class="fas fa-user-graduate"  data-appear-animation="bounceIn" data-appear-animation-delay="0" data-appear-animation-duration="1s"></i>
                            </div>
                        </div>
                        <div class="widget-summary-col mt-3">
                            <div class="summary" style="min-height: 48px;">
                                <h4 class="title">Estudiantes</h4>
                                <div class="info">
                                    <strong class="timer amount count-title count-number" data-to="{{$Nestudiantes}}" data-speed="3500"></strong>
                                </div>
                            </div>
                            <div class="summary-footer">
                                <a href="{{route('estudiantes.index')}}" class="text-muted text-uppercase">(Ver Todos)</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-lg-3">
            <section class=" card card-featured-left card-featured-secondary mb-4">
                <div class="card-body">
                    <div class="widget-summary">
                        <div class="widget-summary-col widget-summary-col-icon">
                            <div class="summary-icon bg-secondary">
                                <i class="fas fa-chalkboard-teacher" data-appear-animation="bounceIn" data-appear-animation-delay="0" data-appear-animation-duration="1s"></i>
                            </div>
                        </div>
                        <div class="widget-summary-col  mt-3">
                            <div class="summary" style="min-height: 48px;">
                                <h4 class="title">Docentes</h4>
                                <div class="info">
                                    <strong class="timer amount count-title count-number" data-to="{{$Ndocentes}}" data-speed="3500"></strong>
                                </div>
                            </div>
                            <div class="summary-footer">
                                <a href="{{route('docentes.index')}}" class="text-muted text-uppercase">(Ver Todos)</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-lg-3">
            <section class=" card card-featured-left card-featured-tertiary mb-4">
                <div class="card-body">
                    <div class="widget-summary">
                        <div class="widget-summary-col widget-summary-col-icon">
                            <div class="summary-icon bg-tertiary">
                                <i class="fas fa-book-open" data-appear-animation="bounceIn" data-appear-animation-delay="0" data-appear-animation-duration="1s"></i>
                            </div>
                        </div>
                        <div class="widget-summary-col mt-3">
                            <div class="summary" style="min-height: 48px;">
                                <h4 class="title">Indicadores</h4>
                                <div class="info">
                                    <strong class="timer amount count-title count-number" data-to="{{$Nlogros}}" data-speed="3500"></strong>
                                </div>
                            </div>
                            <div class="summary-footer">
                                <a class="text-muted text-uppercase" href="{{route('indicadors.index')}}">(Ver Todos)</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-lg-3">
            <section class=" card card-featured-left card-featured-quaternary mb-4">
                <div class="card-body">
                    <div class="widget-summary">
                        <div class="widget-summary-col widget-summary-col-icon">
                            <div class="summary-icon bg-quaternary">
                                <i class="fas fa-user" data-appear-animation="bounceIn" data-appear-animation-delay="0" data-appear-animation-duration="1s"></i>
                            </div>
                        </div>
                        <div class="widget-summary-col mt-3">
                            <div class="summary" style="min-height: 48px;">
                                <h4 class="title">Usuarios</h4>
                                <div class="info">
                                    <strong class="timer amount count-title count-number" data-to="{{$Nusers}}" data-speed="3500"></strong>
                                </div>
                            </div>
                            <div class="summary-footer">
                                <a href="{{route('users.index')}}" class="text-muted text-uppercase">(Ver Todos)</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script src="{{asset('vendor/jquery-appear/jquery-appear.js')}}"></script>
    <script src="{{asset('vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.js')}}"></script>
    <script src="{{asset('vendor/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('vendor/flot.tooltip/flot.tooltip.js')}}"></script>
    <script src="{{asset('vendor/flot/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('vendor/flot/jquery.flot.categories.js')}}"></script>
    <script src="{{asset('vendor/flot/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('vendor/jquery-sparkline/jquery-sparkline.js')}}"></script>
    <script src="{{asset('vendor/raphael/raphael.js')}}"></script>
    <script src="{{asset('vendor/morris/morris.js')}}"></script>
    <script src="{{asset('vendor/gauge/gauge.js')}}"></script>
    <script src="{{asset('vendor/snap.svg/snap.svg.js')}}"></script>
    <script src="{{asset('vendor/liquid-meter/liquid.meter.js')}}"></script>
    <script src="{{asset('vendor/chartist/chartist.js')}}"></script>
    @endsection
@section('scriptfin')
    <script src="{{asset('js/count.js')}}"></script>
    <script src="{{asset('js/examples/examples.charts.js')}}"></script>
    @endsection
