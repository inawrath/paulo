<?php
$config = config::singleton();

/*base de datos de pruebas*/
$config->guardarVariable('dbhost', 'localhost');
$config->guardarVariable('dbname', 'prueba');
$config->guardarVariable('dbuser', 'root');
$config->guardarVariable('dbpass', '');//*/


/*url principal de la pagina por ahora es http://localhost/paulo despues pasara a ser http://www.dominio.algo*/
$config->guardarVariable('url','http://localhost/paulo/');

$config->guardarVariable('driver','mysql');

//Carpetas principales
$config->guardarVariable('carpetaControladores', 'controladores/');
$config->guardarVariable('carpetaModelos', 'modelos/');
$config->guardarVariable('carpetaVistas', 'vistas/');

//Carpetas de estilos y script propios y externos
$config->guardarVariable('carpetaCss',$config->obtenerVariable('url').'librerias/css/');
$config->guardarVariable('carpetaJs',$config->obtenerVariable('url').'librerias/js/');
$config->guardarVariable('carpetaExt',$config->obtenerVariable('url').'librerias/externas/');

$config->guardarVariable('Favicon',$config->obtenerVariable('url').'img/favicon.ico');
?>