@extends('layouts.app')
@section('titulo')
    Bienvenido {{ Auth::user()->name }}
    @endsection
@section('namePage')
    Bienvenido
    @endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

        </div>
    </div>
</div>
@endsection
