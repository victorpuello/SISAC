@extends('layouts.app')
@section('titulo', "Error 404")
@section('namePage', "Error 404 ")
@section('styles')

@endsection
@section('content')
    <section class="body-error error-inside">
        <div class="center-error">

            <div class="row">
                <div class="col-lg-8">
                    <div class="main-error mb-3">
                        <h2 class="error-code text-dark text-center font-weight-semibold m-0">404 <i class="fas fa-file"></i></h2>
                        <p class="error-explanation text-center">Lo sentimos, pero la página que estabas buscando no existe</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <h4 class="text">Aquí hay algunos enlaces útiles</h4>
                    <ul class="nav nav-list flex-column primary">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('home')}}"><i class="fas fa-caret-right text-dark"></i> Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('indicadors.index')}}"><i class="fas fa-caret-right text-dark"></i> Logros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{URL::previous()}}"><i class="fas fa-caret-right text-dark"></i> Regresar</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')

@endsection
