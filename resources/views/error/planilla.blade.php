@extends('layouts.app')
@section('titulo', "Error")
@section('namePage', "Error")
@section('styles')
@endsection
@section('content')

<!-- start: page -->
<section class="body-error error-inside">
    <div class="center-error">

        <div class="row">
            <div class="col-lg-8">
                <div class="main-error mb-3">
                    <h2 class="error-code text-dark text-center font-weight-semibold m-0">404 <i class="fas fa-file"></i></h2>
                    <p class="error-explanation text-center">Lo sentimos, detectamos que aún no tienes los logros clompletos para esta planilla.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <h4 class="text">Te recomendamos lo siguiente: </h4>
                <ul class="nav nav-list flex-column primary">
                    <li class="nav-item">
                       <span class="nav-link"><i class="fas fa-caret-right text-dark"></i> Verifica tus logros para este gradro.</span>
                    </li>
                    <li class="nav-item">
                        <span class="nav-link"><i class="fas fa-caret-right text-dark"></i> Recuerda que son 4 logros por categoria</span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('logros.index')}}"><i class="fas fa-caret-right text-dark"></i> Ir a: Logros</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- end: page -->
@endsection
