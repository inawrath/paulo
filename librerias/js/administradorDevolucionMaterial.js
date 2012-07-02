$(document).ready(function () {
    //obtener la url para utilizarla cuando sea pertinente
    var url=$(this).obtenerVariable('url');
    
    $('#confirmarDevolucion').click(function(){
        /*valores a enviar*/
        var $id = $('#idMaterial').attr('value');
    
        $.ajax({
            url: url+'?controlador=material&accion=devolucion',
            type: 'POST',
            data: 'submit=&id='+$id,
            success: function(respuesta){
                switch(respuesta.substring(0,1)){
                    case '0':
                        alert('Problemas al devolver! Intentelo mas tarde...');
                        break;
                    case '1':
                        alert('Material Devuelto Exitosamente');
                        break;
                    case '2':
                        alert('El material no a sido prestado');
                        break;
                    case '3':
                        alert('Usuario suspendido hasta el '+respuesta.substring(2,respuesta.length));
                        break;
                }
            },
            error: function(){
                alert('error');
            }
        });
    });
});