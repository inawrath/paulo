$(document).ready(function () {
    //obtener la url para utilizarla cuando sea pertinente
    var url=$(this).obtenerVariable('url');
    
    $('#agregarNuevoMaterial').click(function(){
        window.location.href = url+"?controlador=material&accion=nuevo";
    });
    $('a.editar').click(function(e){
        e.preventDefault();
        var $id =$(this).attr('href');
        window.location.href = url+"?controlador=material&accion=editar&id="+$id;
    });
    $('a.eliminar').click(function(e){
        e.preventDefault();
        var $id =$(this).attr('href');
        var msg = confirm("¿Desea eliminar este dato?")
		if ( msg ) {
			$.ajax({
				url: url+"?controlador=material&accion=eliminar",
				type: "GET",
				data: "id="+$id,
				success: function(datos){
					alert(datos);
					//$("#fila-"+cliente_id).remove();
				}
			});
		}
    });
    $('input[@type=checkbox].activo').click(function(){
        var $activo = $(this).is(':checked');
        var $id = $(this).attr('value');
        if($activo){
            var msg = confirm("¿Desea activar este material?")
            if(msg){
                alert('activo el material con id'+$id);
            }else{
                $(this).attr('checked',false);
            }
        }else{
            alert('bloqueado');
        }
    });
});