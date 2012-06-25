$(document).ready(function () {
    //obtener la url para utilizarla cuando sea pertinente
    var url=$(this).obtenerVariable('url');
    
    $('a.solicitarPrestamo').click(function(e){
        e.preventDefault();
        var $id =$(this).attr('href');
        var msg = confirm("¿Seguro desea solicitar prestamo?");
        if ( msg ) {
            $.ajax({
                url: url+"?controlador=material&accion=solicitarPrestamo&id="+$id,
                type: "GET",
                data: "id="+$id,
                success: function(respuesta){
                    if(respuesta){
                        alert('El prestamo fue realizado correctamente tiene 24 hrs. para retirar el material');
                    }
                    window.location.href = url+"?controlador=material&accion=listar";
                }
            });
        }
    });
});