$( document ).ready(function() {

    disableInput();
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
