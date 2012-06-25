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
    
    $('.bordered tr').mouseover(function(){
        $(this).addClass('highlight');
    }).mouseout(function(){
        $(this).removeClass('highlight');
    });
    $(".bordered tbody tr:even").addClass('alternate');
});