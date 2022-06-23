$(document).ready(function() {
    $("#close").click(function() {
        $("#msg").slideUp();
    });

    $("#trigger").click(function(){
        $("#etiqueta-create").slideToggle();
    })

    $("#close-etiqueta-create").click(function(){
        $("#etiqueta-create").slideUp()
    })
});