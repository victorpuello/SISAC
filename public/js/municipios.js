$("#birthstate").change(event => {
    $.get(`municipios/${event.target.value}`, function (res, sta) {
        $("#birthcity").empty();
        res.forEach(element =>{
            $("#birthcity").append(`<option value=${element.id}> ${element.name}</option>`);
        });
    });
});
