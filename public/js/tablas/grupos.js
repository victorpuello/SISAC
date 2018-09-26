(function($) {

    'use strict';
    var table = $('#grupos');
    const inf = $('#inf');
    $(document).ready(function () {
            table.DataTable({
                search: {
                    smart: true
                },
                lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
                responsive: true,
                processing: true,
                serverSide: true,
                //select: true,
                sDom: '<"text-right mb-md"T><"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
                ajax: inf.data('urltabla'),
                dom: 'Bfrtip',
                columns: [
                    {   // Responsive control column
                        data: null,
                        defaultContent: '',
                        className: 'control',
                        orderable: false,
                        searchable: false
                    },
                    {data: "id", editField: "id", className: 'never', orderable: false, visible: false, searchable: false},
                    {data: "name", orderable: true, searchable: true},
                    {data: "grado", orderable: true, searchable: true},
                    {data: "modelo", orderable: true, searchable: true},
                    {data: "jornada", orderable: true, searchable: true},
                    {data: "estudiantes", orderable: false},
                    {
                        data: "id", render: function (data, type, row) {
                            return '<a href="' + inf.data('url') + "/admin/grupos/" + data + '/edit"' + ' class="on-default edit-row simple-ajax-modal"><i class="fas fa-pencil-alt"></i></a>  ' +
                                '<a href="' + inf.data('url') + '/admin/grupos/' + data +'" class="on-default show-row"><i class="far fa-eye"></i></a>   ' +
                                '<a href="#modalEliminar" data-nasg ="'+row.grado+' '+row.name+'" data-urldestroy = "' + inf.data('url') + '/admin/grupos/' + data +'" class="on-default remove-row modal-basic " >' +
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
                $("#NombreGrupo").text( $(this).data('nasg') );
                $('.modal-basic').magnificPopup({
                    type: 'inline',
                    preloader: false,
                    modal: true
                });
            });
        }
    );
}).apply(this, [jQuery]);