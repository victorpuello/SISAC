@extends('layouts.app')
@section('titulo', "Aulas")
@section('namePage', "Modulo: Aulas")
@section('styles')
@endsection
@section('content')
    <div class="row">
        @foreach($aulas as $aula)
            <div class="col-lg-3">
                <section class="card">
                    <header class="card-header bg-{{$fondos[rand(0,3)]}}">
                        <div class="card-header-profile-picture">
                            <img src="{{url('/img')}}/{{$aula->name}}.jpg">
                        </div>
                    </header>
                    <div class="card-body">
                        <h4 class="font-weight-semibold mt-3">{{$aula->NameAula}}</h4>
                        <p><strong>Número de estudiantes: </strong>{{count($aula->estudiantes)}}</p>
                        <hr class="solid short">
                        <div class="row">
                            <div class="col-lg-6">
                                <p class="mb-1"><a href="#"><i class="fas fa-user-edit mr-1"></i>Editar</a></p>
                                <p class="mb-1"><a href="#modalEliminar" class="deleted modal-basic" ><i class="fas fa-trash-alt mr-1"></i> Eliminar</a></p>
                                <p class="mb-1"><a href="#modalAddAsignaturas"  class="modal-basic addAsignatura"><i class="fas fa-share-square mr-1"></i> Asignaturas</a></p>
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
