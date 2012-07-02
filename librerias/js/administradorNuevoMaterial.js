$(document).ready(function () {
    //obtener la url para utilizarla cuando sea pertinente
    var url=$(this).obtenerVariable('url');
    
    $('#cancelarNuevoMaterial').click(function(){
        window.location.href = url+'?controlador=material&accion=listar';
    });

    var total_letras = 99;

    $('#resumenMaterial').keyup(function() {
        var longitud = $(this).val().length;
        var resto = total_letras - longitud;
        if(resto <= 0){
            $('#resumenMaterial').attr("maxlength", total_letras);
        }
    });

    
    $('#guardarNuevoMaterial').click(function(){
        /*valores a enviar*/
        var $clasificacion = $('#clasificacionMaterial').attr('value');
        var $nombre = $('#nombreMaterial').attr('value'); 
        var $tipo = $('#tipoMaterial option:selected').attr('value');
        var $autor = $('#autorMaterial').attr('value');
        var $edicion = $('#edicionMaterial').attr('value');
        var $anio = $('#anioMaterial').attr('value');
        var $editorial = $('#editorialMaterial').attr('value');
        var $copias = $('#copiasMaterial').attr('value');
        var $resumen = $('#resumenMaterial').val();
    
        $.ajax({
            url: url+'?controlador=material&accion=nuevo',
            type: 'POST',
            data: 'submit=&clasificacion='+$clasificacion+'&nombre='+$nombre+'&tipo='+$tipo+'&autor='+$autor+'&edicion='+$edicion+'&anio='+$anio+'&editorial='+$editorial+'&copias='+$copias+'&resumen='+$resumen,
            success: function(respuesta){
                alert(respuesta);
                switch(respuesta){
                    case '0': 
                        alert('Problemas Agregando el Material! Intentelo denuevo Mas tarde...');
                        break;
                    case '1':
                        alert('Material Agregado Correctamente! Redireccionando...');
                        window.location.href = url+'?controlador=material&accion=listar';
                        break;
                }
                
            //imprimir un mensaje de correcto o no xD
            },
            error: function(){
                alert('error');
            }
        });
    });
});