<template>
    <div>
        <div class="row" id="ControlPanel">
            <div class="col-sm-6">
                <div class="mb-3" id="app">
                    <a href="#" v-on:click.prevent="showModal" class="btn btn-primary on-default  ">Agregar <i class="fas fa-plus"></i></a>
                </div>
            </div>
        </div>
        <vuetable ref="vuetable" :api-mode="false" :fields="fields" :per-page="perPage" :data="data" :data-manager="dataManager" pagination="pagination"  @vuetable:pagination-data="onPaginationData">
            <div slot="actions" slot-scope="props">
                <button class="ui small button" @click="onActionClicked('view-item', props.rowData)">
                    <i class="zoom icon"></i>
                </button>
                <button class="ui small button" @click="onActionClicked('edit-item', props.rowData)">
                    <i class="edit icon"></i>
                </button>
                <button class="ui small button" @click="onActionClicked('delete-item', props.rowData)">
                    <i class="delete icon"></i>
                </button>
            </div>
        </vuetable>
        <div style="padding-top:10px">
            <vuetable-pagination ref="pagination" @vuetable-pagination:change-page="onChangePage"></vuetable-pagination>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="modalSelecMeth" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Selecciona un metodo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="align-content-sm-center center">
                            <a href="#" class="btn btn-sm btn-primary">Automatico</a>
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
                                            <option disabled value="">Seleccione una categoria</option>
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
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
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
    import Vuetable from 'vuetable-2'
    import VuetablePagination from  'vuetable-2/src/components/VuetablePagination';
    import FieldsDef from "./FieldsDef.js";
    import _ from "lodash";
    export default {
        components: {
            Vuetable,
            VuetablePagination

        },
        name: "indicadors",
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
              data:[],
              fields: FieldsDef,
              perPage: 12,
          }
        },
        watch: {
            data(newVal, oldVal) {
                this.$refs.vuetable.refresh();
            }
        },
        mounted() {
            axios.get('/docente/indicadors').then(response => {
                this.data = response.data;
            });
        },
        created: function(){
            // this.getDataTable();
            this.getDatos();
        },
        methods:{
            onPaginationData(paginationData) {
                this.$refs.pagination.setPaginationData(paginationData);
            },
            onChangePage(page) {
                this.$refs.vuetable.changePage(page);
            },
            dataManager(sortOrder, pagination) {
                if (this.data.length < 1) return;

                let local = this.data;

                // sortOrder can be empty, so we have to check for that as well
                if (sortOrder.length > 0) {
                    console.log("orderBy:", sortOrder[0].sortField, sortOrder[0].direction);
                    local = _.orderBy(
                        local,
                        sortOrder[0].sortField,
                        sortOrder[0].direction
                    );
                }

                pagination = this.$refs.vuetable.makePagination(
                    local.length,
                    this.perPage
                );
                console.log('pagination:', pagination);
                let from = pagination.from - 1;
                let to = from + this.perPage;

                return {
                    pagination: pagination,
                    data: _.slice(local, from, to)
                };
            },
            onActionClicked(action, data) {
                console.log("slot actions: on-click", data.name);
            },
            showModal:function () {
                $('#modalSelecMeth').modal('show');
            },
            showManualMode:function () {
                $('#modalSelecMeth').modal('hide');
                $('#modalManual').modal('show');
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
                    Vuetable.refresh();
                    toastr.success('Indicador registrado con exito');
                }).catch(error => {
                    this.errors = error.response.data;
                    toastr.error('Upss!! ocurrio un error, intenta nuevamente');
                });

            }
        }
    }
</script>

<style >
    button.ui.button {
        padding: 8px 3px 8px 10px;
        margin-top: 1px;
        margin-bottom: 1px;
    }
</style>