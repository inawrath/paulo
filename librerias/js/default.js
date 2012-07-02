$(document).ready(function () {
        
    jQuery.fn.obtenerVariable = function(nombre){
        switch (nombre) {
            case 'url':
                //alert('http://'+window.location.hostname+window.location.pathname);
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