import VuetableFieldHandle from 'vuetable-2/src/components/VuetableFieldHandle.vue'

export default [
    {
        name: VuetableFieldHandle
    },
    {
        name: 'grado',
        title: '<span class="orange glyphicon glyphicon-user"></span> Grado',
        sortField: 'grado'
    },
    {
        name: 'asignatura',
        sortField: 'asignatura'
    },
    {
        name: 'periodo',
        sortField: 'periodo'
    },
    'categoria',
    'indicador',
    'descripcion',
    'acciones',
]