$( document ).ready(function() {
    disableInput();
    addAttibuteToDateOrNumberInput('date','#datein', 'Introduzca fecha de ingreso');
    addAttibuteToDateOrNumberInput('date','#dateout', 'Introduzca fecha de retiro');
    addAttibuteToDateOrNumberInput('date','#birthday', 'Introduzca fecha de nacimiento');
    addAttibuteToDateOrNumberInput('number','#identification', 'Introduzca número ID');
});

$("#birthstate").change(event => {
    const _url =  event.target.dataset.url;
    this._url = _url.replace(':ID',`${event.target.value}`);
    $.get(this._url, function (res, sta) {
        $("#birthcity").empty();
        res.forEach(element =>{
            $("#birthcity").append(`<option value=${element.id}> ${element.name}</option>`);
        });
    });
});
// Funcion para usar en crear el estudiante y hacer el change de estado
$("#stade").change(event => {
    const estado = `${event.target.value}`;
    const dateout = $('#dateout');
    switch(estado) {
        case 'retirado':
            dateout.prop({
                enable: true,
                disabled: false
            });
            break;
        default:
            dateout.prop({
                enable: false,
                disabled: true
            });
            break
    }
});

function disableInput(){
    var dateout = $('#dateout');
    var estado = $('#stade').val();
    switch(estado) {
        case 'retirado':
            dateout.prop({
                enable: true,
                disabled: false
            });
            break;
        default:
            dateout.prop({
                enable: false,
                disabled: true
            });
            break
    }
}
function addAttibuteToDateOrNumberInput (type, id, placeholder){
    var Input = $(id);
    Input.addClass( "form-control" );
    switch(type) {
        case 'number':
            Input.attr({
                placeholder: placeholder,
                min: 0,
            });
            break;
        case 'date':
            Input.attr({
                placeholder: placeholder,
            });
            break;
        default:
            break
    }
    Input.prop({
        required: true
    });
}

