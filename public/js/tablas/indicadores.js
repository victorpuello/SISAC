(function($) {
    'use strict';
    var table = $('#indicadores');
    const inf = $('#inf');
    $(document).ready(function () {
            table.DataTable({
                // search: {
                //     smart: true
                // },
                lengthMenu: [[12, 24, 36, 48, -1], [12, 24, 48, 100, "All"]],
                responsive: true,
                processing: true,
                serverSide: true,
                searching:true,
                //select: true,
                sDom: '<"text-right mb-md"T><"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
                ajax: inf.data('urltabla'),
                dom: 'Bfrtip',
                columns: [
                    {data: null,defaultContent: '',className: 'control',orderable: false,searchable: false},
                    {data: "id", editField: "id", className: 'never', orderable: false, visible: false, searchable: false},
                    {data: "grado", orderable: true, searchable: true},
                    {data: "asignatura", orderable: true, searchable: true},
                    {data: "periodo", orderable: true, searchable: true },
                    {data: "docente", orderable: true, searchable: true },
                    {data: "categoria", orderable: true, searchable: true },
                    {data: "indicador", orderable: true, searchable: true },
                    {data: "descripcion", orderable: true, searchable: true },
                    {
                        data: "id", render: function (data, type, row) {
                            return '<a href="' + inf.data('url') + "/admin/indicadors/" + data + '/edit"' + ' class="on-default edit-row simple-ajax-modal"><i class="fas fa-pencil-alt"></i></a>  ' +
                                //'<a href="' + inf.data('url') + '/admin/areas/' + data +'" class="on-default show-row"><i class="far fa-eye"></i></a>   ' +
                                '<a href="#modalEliminar" data-nasg ="'+row.name+'" data-urldestroy = "' + inf.data('url') + '/admin/indicadors/' + data +'" class="on-default remove-row modal-basic " >' +
                                '<i class="far fa-trash-alt"></i>' +
                                '</a>';
                        },
                    }
                ],
                buttons: [
                    {
                        extend: 'collection',
                        text: 'Export',
                        buttons: [
                            'copy',
                            'excel',
                            'csv',
                            'pdf',
                            'print'
                        ],
                        className: 'dropdown-toggle btn-primary'
                    }
                ],
                language: {
                    lengthMenu: "_MENU_ Grupos por página",
                    search: "_INPUT_",
                    searchPlaceholder: "Buscar...",
                    zeroRecords: "Nada encontrado, lo sentimos",
                    info: "Mostrando página _PAGE_ de _PAGES_",
                    infoEmpty: "No hay registros disponibles",
                    infoFiltered: "(filtrado de _MAX_ registros totales)"
                }
            });
            $.fn.dataTable.ext.errMode = 'throw';

            $(document).on('click', '.edit-row', function (e) {
                e.preventDefault();
                $('.simple-ajax-modal').magnificPopup({
                    type: 'ajax',
                    modal: true
                });
            });
            $(document).on('click', '.remove-row', function (e) {
                $("#form-delete").attr('action', $(this).data('urldestroy') );
                $("#NombreArea").text( $(this).data('nasg') );
                $('.modal-basic').magnificPopup({
                    type: 'inline',
                    preloader: false,
                    modal: true
                });
            });
        }
    );
}).apply(this, [jQuery]);