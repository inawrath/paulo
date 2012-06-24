$(document).ready(function () {
    //obtener la url para utilizarla cuando sea pertinente
    var url=$(this).obtenerVariable('url');
    
    $('#cancelarActualizarUsuario').click(function(){
        window.location.href = url+'?controlador=usuario&accion=listar';
    });
    
    $('#actualizarUsuario').click(function(){
        /*valores a enviar*/
        var $rut = $('#rutUsuario').attr('value');
        var $contrasena = $('#contrasenaUsuario').attr('value'); 
        var $tipo = $('#tipoUsuario option:selected').attr('value');
        var $nombre = $('#nombreUsuario').attr('value');
        var $apellidoPaterno = $('#apellidoPaternoUsuario').attr('value');
        var $apellidoMaterno = $('#apellidoMaternoUsuario').attr('value');
        var $fechaSuspension = '01/01/2011';
        var $borradoLogico = '11';
        
        $.ajax({
            url: url+'?controlador=usuario&accion=editar',
            type: 'POST',
            data: 'submit=&rut='+$rut+'&contrasena='+$contrasena+'&tipo='+$tipo+'&nombre='+$nombre,
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