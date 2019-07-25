@extends('layouts.app')
@section('titulo')
    Institución
@endsection
@section('namePage')
    @institucion($institucion)
        Institución
    @else
        {{$institucion->name}}
    @endinstitucion
@endsection
@section('styles')
    <link rel="stylesheet" href="{{asset('vendor/select2/css/select2.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/pnotify/pnotify.custom.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/animate/animate.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/font-awesome/css/fontawesome-all.min.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/magnific-popup/magnific-popup.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/bootstrap-fileupload/bootstrap-fileupload.min.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/magnific-popup/magnific-popup.css')}}" />
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-body">
                    @institucion($institucion)
                        <a class="mb-1 mt-1 mr-1 btn btn-primary btn-lg btn-block simple-ajax-modal" href="{{route('institucions.create')}}">Agregar institución</a>
                        @else
                            {!! Form::model($institucion,['route' => ['institucions.update',$institucion], 'method' => 'PUT','files' => true,'class' => 'form-horizontal form-bordered']) !!}
                                @include('admin.institucion.partials.fieldshow')
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="offset-10 col-md-2 text-right">
                                            <a href="{{route('institucions.edit',$institucion)}}" class="btn btn-primary  btn-block">Editar</a>
                                            {{--{!! Form::submit('Editar',['class'=>'btn btn-primary  btn-block']) !!}--}}
                                        </div>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                    @endinstitucion
                </div>
            </div>
        </div>
        <div class="col-lg-2">
            <section class="card card-info mb-4">
                <header class="card-header">
                    <h2 class="card-title">Configuraciones</h2>
                </header>
                <div class="card-body">
                    <a href="{{route('areas.index')}}" class="mb-1 mt-1 mr-1 btn btn-primary btn-block"><span>Áreas</span></a>
                    <a href="{{route('grados.index')}}" class="mb-1 mt-1 mr-1 btn btn-primary btn-block"><span>Grados</span></a>
                    <a href="{{route('jornadas.index')}}" class="mb-1 mt-1 mr-1 btn btn-primary btn-block"><span>Jornadas</span></a>
                </div>
            </section>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{asset('vendor/autosize/autosize.js')}}"></script>
    <script src="{{asset('vendor/bootstrap-fileupload/bootstrap-fileupload.min.js')}}"></script>
    <script src="{{asset('js/examples/examples.modals.js')}}"></script>
    <script src="{{asset('vendor/pnotify/pnotify.custom.js"')}}"></script>
    <script src="{{asset('vendor/jquery-placeholder/jquery-placeholder.js')}}"></script>
    <script src="{{asset('js/examples/examples.notifications.js')}}"></script>
@endsection

