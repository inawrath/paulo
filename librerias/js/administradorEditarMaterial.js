$(document).ready(function () {
    //obtener la url para utilizarla cuando sea pertinente
    var url=$(this).obtenerVariable('url');
    
    $('#cancelarActualizarMaterial').click(function(){
        window.location.href = url+'?controlador=material&accion=listar';
    });
    
    $('#guardarActualizarMaterial').click(function(){
        /*valores a enviar*/
        var $id = $('#idMaterial').attr('value');
        var $nombre = $('#nombreMaterial').attr('value'); 
        var $tipo = $('#tipoMaterial option:selected').attr('value');
        var $autor = $('#autorMaterial').attr('value');
        var $edicion = $('#edicionMaterial').attr('value');
        var $editorial = $('#editoralMaterial').attr('value');
        var $resumen = $('#resumenMaterial').val();
    
        $.ajax({
            url: url+'?controlador=material&accion=editar',
            type: 'POST',
            data: 'submit=&nombre='+$nombre+'&tipo='+$tipo+'&resumen='+$resumen,
            success: function(datos){
                alert(datos);
                //imprimir un mensaje de correcto o no xD
            },
            error: function(){
                alert('error');
            }
        });
    });
});