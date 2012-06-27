$(document).ready(function () {
    //obtener la url para utilizarla cuando sea pertinente
    var url=$(this).obtenerVariable('url');
    
    $('#cancelarNuevoUsuario').click(function(){
        window.location.href = url+'?controlador=usuario&accion=listar';
    });
    
    $('#guardarNuevoUsuario').click(function(){
        /*valores a enviar*/
        var $rut = $('#rutUsuario').attr('value');
        var $contrasena = $('#contrasenaUsuario').attr('value'); 
        var $tipo = $('#tipoUsuario option:selected').attr('value');
        var $nombre = $('#nombreUsuario').attr('value');
        var $apellidoPaterno = $('#apellidoPaternoUsuario').attr('value');
        var $apellidoMaterno = $('#apellidoMaternoUsuario').attr('value');
        var $calleDireccion = $('#calleDireccionUsuario').attr('value');
        var $numeroDireccion = $('#numeroDireccionUsuario').attr('value');
        var $ciudadDireccion = $('#ciudadDireccionUsuario').attr('value');
        var $regionDireccion = $('#regionDireccionUsuario').attr('value');
        var $telefono = $('#telefonoUsuario').attr('value');
        
        $.ajax({
            url: url+'?controlador=usuario&accion=nuevo',
            type: 'POST',
            data: 'submit=&rut='+$rut+'&contrasena='+$contrasena+'&tipo='+$tipo+'&nombre='+$nombre+'&apellidoPaterno='+$apellidoPaterno+'&apellidoMaterno='+$apellidoMaterno+'&calleDireccion='+$calleDireccion+'&numeroDireccion='+$numeroDireccion+'&ciudadDireccion='+$ciudadDireccion+'&regionDireccion='+$regionDireccion+'&telefono='+$telefono,
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