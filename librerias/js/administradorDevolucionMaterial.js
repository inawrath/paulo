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
                alert(respuesta);
                if(respuesta){
                    alert('se registro la devolución correctamente');
                }
            },
            error: function(){
                alert('error');
            }
        });
    });
});