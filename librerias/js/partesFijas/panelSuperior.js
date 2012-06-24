$(document).ready(function(){
    //obtener la url para utilizarla cuando sea pertinente
    var url=$(this).obtenerVariable('url');
    
    $('#salir').click(function(){
        /*$('#cargando').fadeIn(200);
        $('#alertasUsuario').html('<div class="cajaCorrecta"><img src="'+url+'img/cargando.gif"/> Espera un momento&#133;</div>');
        //$('.cajaCorrecta').slideDown(timeSlide);
        //muestro la cajaCorrecta de salida al estilo modal
        $('#alertasUsuario').modal({
            //nombre para el container
            containerId:'modalTiempo',
            //funcion de animacion al abrir la cajaCorrecta
            onOpen: function (dialog) {
                dialog.overlay.fadeIn('fast', function () {
                    dialog.container.fadeIn('fast', function () {
                        dialog.data.slideDown('fast');
                    });
                });
            }
        });//*/
        //setTimeout(function(){
        window.location.href = url+"?controlador=usuario&accion=salir";
    //},2500);
    });	
    
});