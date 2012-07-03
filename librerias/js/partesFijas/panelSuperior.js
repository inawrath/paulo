$(document).ready(function(){
    //obtener la url para utilizarla cuando sea pertinente
    var url=$(this).obtenerVariable('url');
    
    $('#salir').click(function(){
        window.location.href = url+"?controlador=usuario&accion=salir";
    });	
    
});