@extends('layouts.app')
@section('titulo', "Calificar")
@section('namePage', "Modulo: Académico")
@section('styles')
    <link rel="stylesheet" href="{{asset('vendor/select2/css/select2.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/select2-bootstrap-theme/select2-bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/jquery.dataTables.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/responsive.dataTables.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/buttons.dataTables.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/select.dataTables.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/editor.dataTables.min.css')}}" />
@endsection
@section('content')
    <section class="card card-info mb-4">
    <header class="card-header">
        <h2 class="card-title">Planilla - Grado {{\Ngsoft\Salon::find($Idsalon)->full_name }}</h2>
    </header>
    <div class="card-body">
        <table class="display nowrap" cellspacing="0" width="100%" id="notas">
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Id_Nota_Cog</th>
                    <th>Cognitivo 60%</th>
                    <th>Id_Nota_Proc</th>
                    <th>Procedimental 30%</th>
                    <th>Id_Nota_Act</th>
                    <th>Actitudinal 10%</th>
                    <th>Inasistencias ID</th>
                    <th>Inasistencias</th>
                    <th>Definitiva</th>
                    <th>Desempeño</th>
                </tr>
            </thead>
        </table>
        <div id="inf" data-token ="{{csrf_token()}}" data-urlproces ="{{route('notas.store')}}" data-urltabla ="{{route('notas.loadplanilla',['Idsalon'=>$Idsalon,'Iddocente'=>$Iddocente,'Idasignatura'=>$Idasignatura,'Idperiodo'=>$Idperiodo])}}"></div>
    </div>
    </section>
@endsection
@section('script')
    <script src="{{asset('vendor/autosize/autosize.js')}}"></script>
    <script src="{{asset('vendor/select2/js/select2.js')}}"></script>
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('js/dataTables.select.min.js')}}"></script>
    <script src="{{asset('js/dataTables.editor.min.js')}}"></script>
    <script src="{{asset('js/examples/examples.modals.js')}}"></script>
    <script src="{{asset('js/jquery.numeric.js')}}"></script>
    <script src="{{asset('js/examples/notas.js')}}"></script>
    <script>

    </script>
@endsection
