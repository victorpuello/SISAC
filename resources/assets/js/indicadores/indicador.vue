<template>
    <div>
        <div class="row" id="ControlPanel">
            <div class="col-sm-6">
                <div class="mb-3" id="app">
                    <a href="#" v-on:click.prevent="showModal" class="btn btn-primary on-default  ">Agregar <i class="fas fa-plus"></i></a>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modalSelecMeth" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white" id="exampleModalCenterTitle">Selecciona un metodo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="align-content-sm-center center">
                            <a href="#" v-on:click.prevent="showAutomaticMode"class="btn btn-sm btn-primary">Automatico</a>
                            <a href="#" v-on:click.prevent="showManualMode" class="btn btn-sm btn-dark">Manual</a>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
        <!--Modal modo Manual-->
        <div class="modal fade bd-example-modal-lg" id="modalManual" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Nuevo Indicador</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" v-on:submit.prevent="newIndicador" class="form-horizontal form-bordered">
                        <div class="modal-body">
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <select class="form-control mb-3" name="asignatura_id" id="asignatura_id" v-model="asignatura_id" required>
                                            <option disabled value="">Seleccione una asignatura</option>
                                            <option v-for="(asignatura, key) in asignaturas" v-bind:value= "key">{{ asignatura }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <select class="form-control mb-3" name="periodo_id" id="periodo_id" v-model="periodo_id" required>
                                            <option disabled value="">Seleccione un periodo</option>
                                            <option v-for="(periodo, key) in periodos" v-bind:value= "key">{{ periodo }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <select class="form-control mb-3" name="grado_id" id="grado_id" v-model="grado_id" required>
                                                <option disabled value="">Seleccione un grado</option>
                                                <option v-for="(grado, key) in grados" v-bind:value= "key">{{ grado }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <select class="form-control mb-3"  id="category" v-model="category" required>
                                            <option disabled value="">Seleccione una categoria</option>
                                            <option value="cognitivo">Cognitivo</option>
                                            <option value="procedimental">Procedimental</option>
                                            <option value="actitudinal">Actitudinal</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <select class="form-control mb-3"  id="indicator" v-model="indicator" required>
                                            <option disabled value="">Seleccione un indicador</option>
                                            <option value="bajo">Bajo</option>
                                            <option value="basico">Básico</option>
                                            <option value="alto">Alto</option>
                                            <option value="superior">Superior</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <textarea class="form-control" v-model="description" placeholder="Agrega descripcion del indicador"></textarea>
                                    <span v-for="error in errors" class="text-danger">{{error}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" v-on:click="reloadPage" class="btn btn-secondary">Salir</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!--Modal modo Manual-->
        <!--Modal modo automatico-->
        <div class="modal fade bd-example-modal-lg " id="modalAutomatico" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white">Nuevo Indicador</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" v-on:submit.prevent="newIndicador" class="form-horizontal form-bordered">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-6 col-lg-6 col-sm-6">
                                    <button type="button" class="btn btn-sm btn-primary mb-2" v-on:click.prevent="getDBA">DBA</button>
                                    <button type="button" class=" btn btn-sm btn-primary mb-2">Estandares</button>
                                    <div class="form-group row d-none">
                                        <div class="col-lg-4 pr-1">
                                            <div class="form-group">
                                                <select class="form-control mb-4 p-1" name="asignatura_id"  v-model="asignatura_id" required>
                                                    <option disabled value="">Asignatura</option>
                                                    <option v-for="(asignatura, key) in asignaturas" v-bind:value= "key">{{ asignatura }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 pr-1">
                                            <div class="form-group">
                                                <select class="form-control mb-4 p-1" name="periodo_id"  v-model="periodo_id" required>
                                                    <option disabled value="">Periodo</option>
                                                    <option v-for="(periodo, key) in periodos" v-bind:value= "key">{{ periodo }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <select class="form-control mb-4 p-1" name="grado_id"  v-model="grado_id" required>
                                                        <option disabled value="">Grado</option>
                                                        <option v-for="(grado, key) in grados" v-bind:value= "key">{{ grado }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <input type="text" placeholder="Buscar" class="form-control">
                                        </li>
                                        <li class="list-group-item" v-for="dba in dbas"><a href="#" v-on:click.prevent="loadSugerencias(dba)">{{dba.description}}</a></li>
                                    </ul>
                                </div>
                                <div class="col-6 col-lg-6 col-sm-6 mt-4">
                                    <div class="nano">
                                        <div class="nano-content">
                                            <ul class="list-group mt-1">
                                                <li class="list-group-item" v-for="sugerencia in sugerencias"><a href="#">{{sugerencia.description}}</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" v-on:click="reloadPage" class="btn btn-secondary">Salir</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'
    import toastr from 'toastr'
    import nanoscroller from  'nanoscroller'
    export default {
        name: "indicador",
        data(){
          return{
              asignaturas : [],
              periodos : [],
              grados : [],
              asignatura_id: '',
              periodo_id: '',
              grado_id: '',
              category: '',
              indicator: '',
              description: '',
              docente_id:'',
              errors:[],
              dbas:[],
              estandares:[],
              sugerencias:[],
          }
        },

        created: function(){
            this.getDatos();
        },
        methods:{

            showModal:function () {
                $('#modalSelecMeth').modal('show');
            },
            showManualMode:function () {
                $('#modalSelecMeth').modal('hide');
                $('#modalManual').modal('show');
            },
            showAutomaticMode:function () {
                $('#modalSelecMeth').modal('hide');
                $('#modalAutomatico').modal('show');
            },
            getDatos:function () {
                var url = '/docente/indicadors/create';
                axios.get(url).then(response => {
                    this.asignaturas = response.data.asignaturas;
                    this.periodos = response.data.periodos;
                    this.grados = response.data.grados;
                    this.docente_id = response.data.docente.id;
                }).catch( error =>{
                    toastr.error('Upss!! ocurrio un error, intenta nuevamente');
                });
            },
            getDBA:function(){
              var url = '/docente/dbas';
              axios.get(url).then(response =>{
                  console.log(response.data);
                  this.dbas = response.data;
              }).catch(
                  error=>{
                      toastr.error('Upss!! ocurrio un error, intenta nuevamente');
                  }
              );
            },
            loadSugerencias: function(dba){
              this.sugerencias = [];
              this.sugerencias = dba.sugerencias;
                $(".nano").nanoScroller();
            },
            newIndicador: function () {
                var url = '/docente/indicadors';
                axios.post(url,{
                    code: this.grado_id+this.asignatura_id+this.grado_id+this.periodo_id+this.docente_id+this.category+this.indicator,
                    grado_id: this.grado_id,
                    asignatura_id: this.asignatura_id,
                    periodo_id: this.periodo_id,
                    docente_id: this.docente_id,
                    category: this.category,
                    indicator: this.indicator,
                    description: this.description,
                }).then(response => {
                    this.description = '';
                    this.errors = [];
                    toastr.success('Indicador registrado con exito');
                }).catch(error => {
                    this.errors = error.response.data;
                    toastr.error('Upss!! ocurrio un error, intenta nuevamente');
                });

            },
            reloadPage: function () {
                window.location.reload(true);
            }
        }
    }
</script>

<style >
    .nano { background: #bba; width: 398px; height: 398px; }
    .nano .nano-content { padding: 10px; }
    .nano .nano-pane   { background: #777; }
    .nano .nano-slider { background: #111; }
</style>