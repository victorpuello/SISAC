@extends('layouts.app')
@section('titulo', "Usuarios")
@section('namePage', "Modulo: Docentes")
@section('content')
    <div class="row">
        @foreach($docentes as $docente)
            <div class="col-lg-3">
                <section class="card">

                    <header class="card-header {{$fondos[rand(0,3)]}}">
                        <div class="card-header-profile-picture">
                            <img src="{{asset('img/!logged-user.jpg')}}">
                        </div>
                    </header>
                    <div class="card-body">
                        <h4 class="font-weight-semibold mt-3">{{$docente->user->name}}</h4>
                        <p><strong>Asignaturas: </strong>{{$docente->getNameAsignaturasAttibute()}}</p>
                        <hr class="solid short">
                        <p class="mb-1"><a href="#"><i class="fas fa-user mr-1"></i> My Profile</a></p>
                        <p class="mb-1"><a href="#"><i class="fas fa-lock mr-1"></i> Lock Screen</a></p>
                        <p class="mb-1"><a href="#"><i class="fas fa-power-off mr-1"></i> Logout</a></p>
                    </div>
                </section>
            </div>
        @endforeach
    </div>
    @endsection
@section('script')
    <script src="{{asset('vendor/isotope/isotope.js')}}"></script>
    <script src="{{asset('js/examples/examples.mediagallery.js')}}"></script>
@endsection
