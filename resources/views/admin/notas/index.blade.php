@extends('layouts.app')
@section('titulo', "Calificar")
@section('namePage', "Modulo: Académico - Calificar")
@section('styles')
    <link rel="stylesheet" href="{{asset('vendor/select2/css/select2.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/select2-bootstrap-theme/select2-bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/datatables/media/css/dataTables.bootstrap4.css')}}" />
@endsection
@section('content')
    <section class="card">
        <header class="card-header bg-primary ">
            <h2 class="card-title text-color-light">Grupos disponibles para calificar</h2>
        </header>
            <div class="row">
            @foreach( $salones as $salon)
            <div class="col-lg-3 mt-2 mb-2">
                <section class="card">
                    <header class="card-header bg-{{$fondos[rand(0,3)]}}">
                        <div class="card-header-profile-picture">
                            <img src="{{url('/img')}}/{{$salon->grade}}.jpg">
                        </div>
                    </header>
                    <div class="card-body">
                        <h4 class="font-weight-semibold mt-3">{{$salon->NameAula}}</h4>
                        <hr class="solid short">
                        <div class="row">
                            <div class="col-lg-6">
                                <p class="mb-1"><a href="{{route('notas.show',$salon->id)}}" class="edit"><i class="fas fa-check mr-1"></i>Calificar</a></p>
                            </div>
                            <div class="col-lg-6">
                                <p class="mb-1"><a href="#" class="deleted modal-basic" ><i class="fas fa-download mr-1"></i>Bajar planilla</a></p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
                @endforeach
            </div>
        @include('admin.notas.partials.modals')
    </section>
    @endsection
@section('script')
    <script src="{{asset('vendor/autosize/autosize.js')}}"></script>
    <script src="{{asset('vendor/select2/js/select2.js')}}"></script>
    <script src="{{asset('vendor/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/media/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('js/examples/examples.modals.js')}}"></script>
    <script src="{{asset('js/examples/examples.datatables.editable.js')}}"></script>
    @endsection
