$(document).ready(function () {
    //obtener la url para utilizarla cuando sea pertinente
    var url=$(this).obtenerVariable('url');
    
    $('#agregarNuevoUsuario').click(function(){
        window.location.href = url+"?controlador=usuario&accion=nuevo";
    });
    $('a.editar').click(function(e){
        e.preventDefault();
        var $rut =$(this).attr('href');
        window.location.href = url+"?controlador=usuario&accion=editar&id="+$rut;
    });
    $('a.eliminar').click(function(e){
        e.preventDefault();
        var $id =$(this).attr('href');
        var msg = confirm("¿Desea eliminar este dato?")
        if ( msg ) {
            $.ajax({
                url: url+"?controlador=usuario&accion=eliminar",
                type: "GET",
                data: "id="+$id,
                success: function(datos){
                    alert(datos);
                //$("#fila-"+cliente_id).remove();
                }
            });
        }
    });    
    $('a.activar').click(function(e){
        e.preventDefault();
        var $id =$(this).attr('href');
        var msg = confirm("¿Desea activar este dato?");
        if ( msg ) {
            $.ajax({
                url: url+"?controlador=usuario&accion=activar",
                type: "GET",
                data: "id="+$id,
                success: function(datos){
                    switch(datos){
                        case '0':
                            alert("Problemas al Activar. Intentelo más tarde!");
                            break;
                        case '1':
                            alert("Usuario Activado! Redireccionando...");
                            window.location.href = url+"?controlador=usuario&accion=listar";
                            break;
                        case '3':
                            alert("Problemas con el Usuario!!! Refrescando la pagina...");
                            window.location.href = url+"?controlador=usuario&accion=listar";
                            break;
                    }
                //$("#fila-"+cliente_id).remove();
                }
            });
        }
    });
});