$(document).ready(function () {
    //obtener la url para utilizarla cuando sea pertinente
    var url=$(this).obtenerVariable('url');
    
    (function($) {
        $.QueryString = (function(a) {
            if (a == "") return {};
            var b = {};
            for (var i = 0; i < a.length; ++i)
            {
                var p=a[i].split('=');
                if (p.length != 2) continue;
                b[p[0]] = decodeURIComponent(p[1].replace(/\+/g, " "));
            }
            return b;
        })(window.location.search.substr(1).split('&'))
    })(jQuery);
    
    $('#cancelarActualizarMaterial').click(function(){
        window.location.href = url+'?controlador=material&accion=listar';
    });
    
    $('#guardarActualizarMaterial').click(function(){
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
            url: url+'?controlador=material&accion=editar&id='+$.QueryString['id'],
            type: 'POST',
            data: 'submit=&clasificacion='+$clasificacion+'&nombre='+$nombre+'&tipo='+$tipo+'&autor='+$autor+'&edicion='+$edicion+'&anio='+$anio+'&editorial='+$editorial+'&copias='+$copias+'&resumen='+$resumen,
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