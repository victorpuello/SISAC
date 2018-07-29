(function($) {

    'use strict';

    var editor; // use a global for the submit and return data rendering in the examples
    $(document).ready(function() {
        function trunc (x, posiciones = 0) {
            var s = x.toString()
            var l = s.length
            var decimalLength = s.indexOf('.') + 1
            var numStr = s.substr(0, decimalLength + posiciones)
            return Number(numStr)
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $("#inf").data('token')
            }
        });
        editor = new $.fn.dataTable.Editor( {
            ajax: $('#inf').data('urlproces'),
            type: 'POST',
            table: "#notas",
            idSrc: "id",
            fields: [ {
                type: "hidden",
                name: "id"
            },
                {
                    label: "Nota actitudinal:",
                    name: "notas.data.0.score"
                },{
                    label: "Nota cognitiva:",
                    name: "notas.data.1.score"
                },{
                    label: "Nota procedimental:",
                    name: "notas.data.2.score"
                },{
                    name: "notas.data.0.id",
                    type: "hidden"
                },{
                    name: "notas.data.1.id",
                    type: "hidden",
                }, {
                    name: "notas.data.2.id",
                    type: "hidden"
                },{
                    name: "inasistencias.data.0.id",
                    type: "hidden",
                }, {
                    name: "inasistencias.data.0.numero",
                    label: "Inasistencias:"
                },
                {
                    name:'grado',
                    type: "hidden",
                },
                {
                    name:'docente',
                    type: "hidden",
                },
                {
                    name:'asignatura',
                    type: "hidden",
                },
                {
                    name:'periodo',
                    type: "hidden",
                }
            ],i18n: {
                edit: {
                    button: "Editar",
                    title:  "Editar notas",
                    submit: "Guardar"
                },
                error: {
                    system: "Se ha presentado un error en el sistema intentalo nuevamente"
                }
            }
        } );
        // Activate an inline edit on click of a table cell
        // or a DataTables Responsive data cell
        $('#notas').on( 'click', 'tbody td:not(.child), tbody span.dtr-data', function (e) {
            // Ignore the Responsive control and checkbox columns
            if ( $(this).hasClass( 'control' ) || $(this).hasClass('select-checkbox') || $(this).hasClass('no-editable') ) {
                return;
            }
            editor.inline( this,{
                submit: 'allIfChanged'
            } );
        } );

        editor.on('preSubmit',function (e,o,action) {
            if (action !== 'remove'){
                var notaAct = this.field('notas.data.0.score');
                var notaCog = this.field('notas.data.1.score');
                var notaPro = this.field('notas.data.2.score');
                var expreg = /^[0-9]+([,][0-9]+)?$/;
                if (! notaAct.isMultiValue()){
                    if (! notaAct.val()){
                        notaAct.error( 'Debes ingresar una valoración');
                    }
                    if (notaAct.val() > 10 || notaAct.val() < 1){
                        notaAct.error( 'Solo se aceptan valores entre 1 y 10')
                    }
                }
                if (! notaCog.isMultiValue()){
                    if (! notaCog.val()){
                        notaCog.error( 'Debes ingresar una valoración');
                    }
                    if (notaCog.val() > 10 || notaCog.val() < 1){
                        notaCog.error( 'Solo se aceptan valores entre 1 y 10')
                    }

                }
                if (! notaPro.isMultiValue()){
                    if (! notaPro.val()){
                        notaPro.error( 'Debes ingresar una valoración');
                    }
                    if (notaPro.val() > 10 || notaPro.val() < 1){
                        notaPro.error( 'Solo se aceptan valores entre 1 y 10')
                    }

                }
                if (this.inError()){
                    return false;
                }
            }
        });

        $('#notas').DataTable( {
                responsive: true,
                lengthChange: false,
                serverSide: true,
                ajax: $('#inf').data('urltabla'),
                dom: "Bfrtip",
                columns: [
                    {   // Responsive control column
                        data: null,
                        defaultContent: '',
                        className: 'control',
                        orderable: false
                    },
                    {   // Checkbox select column
                        data: null,
                        defaultContent: '',
                        className: 'select-checkbox',
                        orderable: false
                    },
                    { data: "id",editField: "id" ,className: 'never', orderable: false  },
                    { data: "grado" ,className: 'never', orderable: false  },
                    { data: "docente" ,className: 'never', orderable: false  },
                    { data: "asignatura" ,className: 'never', orderable: false  },
                    { data: "periodo" ,className: 'never', orderable: false  },
                    { data: "name",className: 'no-editable' },
                    { data: "notas.data.0.id",className: 'never', orderable: false },
                    { data: "notas.data.0.score",className: 'editable', orderable: false },
                    { data: "notas.data.1.id",className: 'never', orderable: false },
                    { data: "notas.data.1.score",className: 'editable', orderable: false },
                    { data: "notas.data.2.id",className: 'never', orderable: false},
                    { data: "notas.data.2.score",className: 'editable', orderable: false},
                    { data: "inasistencias.data.0.id",className: 'never', orderable: false},
                    { data: "inasistencias.data.0.numero",className: 'editable', orderable: false},
                    { data: null,
                        render: function ( data, type, row ) {
                            var notaAct = row.notas.data[0].score * 0.1;
                            var notaCog = row.notas.data[1].score * 0.6;
                            var notaPro= row.notas.data[2].score * 0.3;
                            return trunc((notaPro+notaAct+notaCog),2);
                        },
                        orderable: false
                    },
                    {  data: null,
                        render: function ( data, type, row ) {
                            var notaAct = row.notas.data[0].score * 0.1;
                            var notaCog = row.notas.data[1].score * 0.6;
                            var notaPro= row.notas.data[2].score * 0.3;
                            var def = trunc((notaPro+notaAct+notaCog),2);
                            var indicador
                            if (def <= 5.9 ){
                                return "Bajo";
                            }
                            if (def >= 6 && def < 8){
                                    return "Basico";
                            }
                            if (def >= 8 && def < 9.5){
                                return "Alto";
                            }
                            if (def >= 9.5 && def <= 10){
                                return "Superior";
                            }
                        },
                        orderable: false
                    }
                ],
                order: [ 2, 'asc' ],
                select: {
                    style:    'os',
                    selector: 'td.select-checkbox'
                },
                buttons: [
                    { extend: "edit",   editor: editor },
                    { extend: "excel",   editor: editor },
                    { extend: "pdf",   editor: editor },

                ],
                language: {
                    processing:     "Procesando...",
                    lengthMenu:     "Afficher _MENU_ &eacute;l&eacute;ments",
                    info:           "Mostrando _START_ de _END_ en _TOTAL_ Estudiantes",
                    infoEmpty:      "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
                    infoFiltered:   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                    infoPostFix:    "",
                    loadingRecords: "Cargando...",
                    zeroRecords:    "No hay elementos para mostrar",
                    emptyTable:     "No hay datos disponibles",
                    paginate: {
                        first:      "Primero",
                        previous:   "Anterior",
                        next:       "Siguiente",
                        last:       "Ultima"
                    },
                    aria: {
                        sortAscending:  ": Ordenar la columna en orden ascendente",
                        sortDescending: ": Ordenar la columna en orden decendente"
                    }
                }

            }

        );
    } );

}).apply(this, [jQuery]);
