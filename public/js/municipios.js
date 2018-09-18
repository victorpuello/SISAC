$( document ).ready(function() {

    disableInput();




// Funcion para usar en crear el estudiante y hacer el change de estado


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
});
