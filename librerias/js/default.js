$(document).ready(function () {
        
    jQuery.fn.obtenerVariable = function(nombre){
        switch (nombre) {
            case 'url':
                    return 'http://localhost/paulo/';
                break;
            default:
                break;
        }

    };
    
});