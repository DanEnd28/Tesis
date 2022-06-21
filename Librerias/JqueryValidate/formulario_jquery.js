$(document).ready(function() {
    if ($('#mostrar_contrasena').is(':checked')) {
        $('contrasena').attr('type', 'text');
    } else {
        $('#contrasena').attr('type', 'password');
    }
})