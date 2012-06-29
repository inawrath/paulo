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
        var $calleDireccion = $('#calleDireccionUsuario').attr('value');
        var $numeroDireccion = $('#numeroDireccionUsuario').attr('value');
        var $ciudadDireccion = $('#ciudadDireccionUsuario').attr('value');
        var $regionDireccion = $('#regionDireccionUsuario').attr('value');
        var $telefono = $('#telefonoUsuario').attr('value');
        var $estado = $('#estadoUsuario option:selected').attr('value')
        
        $.ajax({
            url: url+'?controlador=usuario&accion=editar&id='+$.QueryString['id'],
            type: 'POST',
            data: 'submit=&rut='+$rut+'&contrasena='+$contrasena+'&tipo='+$tipo+'&nombre='+$nombre+'&apellidoPaterno='+$apellidoPaterno+'&apellidoMaterno='+$apellidoMaterno+'&calleDireccion='+$calleDireccion+'&numeroDireccion='+$numeroDireccion+'&ciudadDireccion='+$ciudadDireccion+'&regionDireccion='+$regionDireccion+'&telefono='+$telefono+'&estadoUsuario='+$estado,
            success: function(datos){
                switch(datos){
                    case '0':
                        alert("Problemas al Actualizar. Intentelo más tarde!");
                        break;
                    case '1':
                        alert("Usuario Actualizado! Redireccionando...");
                        window.location.href = url+"?controlador=usuario&accion=listar";
                        break;
                    case '3':
                        alert("Problemas con el Usuario!!! Refrescando la pagina...");
                        window.location.href = url+"?controlador=usuario&accion=listar";
                        break;
                    default:
                        alert(datos);
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