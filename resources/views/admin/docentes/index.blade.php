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
                            <img src="{{ url('/imgUsers/')}}/{{$docente->path}}">
                        </div>
                    </header>
                    <div class="card-body">
                        <h4 class="font-weight-semibold mt-3">{{$docente->user->name}}</h4>
                        <p><strong>Asignaturas: </strong>{{$docente->getNameAsignaturasAttibute()}}</p>
                        <hr class="solid short">
                        <div class="row">
                            <div class="col-lg-6">
                                <p class="mb-1"><a href="#"><i class="fas fa-user-edit mr-1"></i>Editar</a></p>
                                <p class="mb-1"><a href="#"><i class="fas fa-trash-alt mr-1"></i> Eliminar</a></p>
                                <p class="mb-1"><a href="#"><i class="fas fa-share-square mr-1"></i> Asignaturas</a></p>
                            </div>
                            <div class="col-lg-6">
                                <p class="mb-1"><a href="#"><i class="fas fa-chalkboard mr-1"></i>Salones</a></p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        @endforeach
    </div>
    @endsection
