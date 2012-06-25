<?php
$config = config::singleton();

/*Base de Datos ORACLE*/
/*$config->guardarVariable('driver', 'oci');
$config->guardarVariable('dbhost', 'localhost');
$config->guardarVariable('dbname', 'XE');
$config->guardarVariable('dbuser', 'SYSTEM');
$config->guardarVariable('dbpass', 'oracle');
//*/

/*base de datos de pruebas*/
$config->guardarVariable('driver', 'mysql');
$config->guardarVariable('dbhost', 'localhost');
$config->guardarVariable('dbname', 'prueba');
$config->guardarVariable('dbuser', 'root');
$config->guardarVariable('dbpass', '');
//*/

//PUERTO SOLO PARA ORACLE
$config->guardarVariable('port', '1521');

//MODO DEBUG ON
$config->guardarVariable('options', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
//*/

//MODO DEBUG OFF
//$config->guardarVariable('options', array());
//*/

/*url principal de la pagina por ahora es http://localhost/paulo despues pasara a ser http://www.dominio.algo*/
$config->guardarVariable('url','http://localhost/paulo/');


//Carpetas principales
$config->guardarVariable('carpetaControladores', 'controladores/');
$config->guardarVariable('carpetaModelos', 'modelos/');
$config->guardarVariable('carpetaVistas', 'vistas/');

//Carpetas de estilos y script propios y externos
$config->guardarVariable('carpetaCss',$config->obtenerVariable('url').'librerias/css/');
$config->guardarVariable('carpetaJs',$config->obtenerVariable('url').'librerias/js/');
$config->guardarVariable('carpetaExt',$config->obtenerVariable('url').'librerias/ext/');

$config->guardarVariable('Favicon',$config->obtenerVariable('url').'img/favicon.ico');
?>