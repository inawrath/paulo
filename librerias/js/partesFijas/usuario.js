$(document).ready(function(){
    //obtener la url para utilizarla cuando sea pertinente
    var url=$(this).obtenerVariable('url');
    
    var timeSlide = 1000;
    var $cargando = $('#cargandoIngreso');
    var $usuario = $('#usuarioIngreso');
    var $contrasena = $('#contrasenaIngreso');
    var $alerta = $('#alertaIngreso');
    $cargando.hide(0);
    $cargando.css('display','none');
    $('#botonIngreso').click(function(){
        $cargando.fadeIn(300);
        $('.cajaInformacion, .cajaCorrecta, .cajaAlertas, .cajaError').slideUp(timeSlide);
        setTimeout(function(){
            if ( $usuario.val() != "" && $contrasena.val() != "" ){
				
                $.ajax({
                    type: 'POST',
                    url: url+'usuario/ingresar',
                    data: 'usuario=' + $usuario.val() + '&contrasena=' + $contrasena.val(),
                    success:function(msj){
                        //probar resultado que devuelve
                        //alert(msj);
                        if ( msj == 1 ){
                            $alerta.html('<div class="cajaCorrecta"></div>');
                            $('.cajaCorrecta').hide(0).html('Espera un momento&#133;');
                            $('.cajaCorrecta').slideDown(timeSlide);
                            setTimeout(function(){
                                //document.URL me toma la direccion en la que estoy, asi no pierdo la posicion en la WEB
                                window.location.href = document.URL;
                            },(timeSlide + 500));
                        }
                        else{
                            $alerta.html('<div class="cajaError"></div>');
                            $('.cajaError').hide(0).html('Lo sentimos, pero los datos son incorrectos');
                            $('.cajaError').slideDown(timeSlide);
                        }
                        $cargando.fadeOut(300);
                    },
                    error:function(){
                        $cargando.fadeOut(300);
                        $alerta.html('<div class="cajaError"></div>');
                        $('.cajaError').hide(0).html('Ha ocurrido un error durante la ejecución');
                        $('.cajaError').slideDown(timeSlide);
                    }
                });
				
            }
            else{
                $alerta.html('<div class="cajaError"></div>');
                $('.cajaError').hide(0).html('Los campos estan vacios');
                $('.cajaError').slideDown(timeSlide);
                $cargando.fadeOut(300);
            }
        },timeSlide);
		
        return false;
		
    });
	
	
	
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
            window.location.href = url+"usuario/salir?pagina="+document.URL;
        //},2500);
    });	
    
});