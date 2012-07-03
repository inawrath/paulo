<?php

class baseVistas {

    public function desplegar($pagina, $nombre, $variables = array()) {
        //$pagina contendra el nombre de la pagina en la que estamos pr ej: para http://localhost/LAC/aula/curso/ contendra curso
        //$nombre es el nombre de nuestra vista, por ej, listado.php
        //$variables es el contenedor de nuestras variables, es un arreglo del tipo llave => valor, opcional.

        $config = config::singleton();

        //Armamos la ruta a la vistaHTML 
        $vistaHtml = $config->obtenerVariable('carpetaVistas') . $nombre;

        //Si no existe el fichero en cuestion, tiramos un 404
        if (file_exists($vistaHtml) == false) {
            header('Location:' . $config->obtenerVariable('carpetaVistas') . 'error404.php');
            return false;
        }

        //Si hay variables para asignar, las pasamos una a una.
        //aca traspasamos a $algo lo que en el controlador quedo dentro de $data['algo']
        if (is_array($variables)) {
            foreach ($variables as $key => $value) {
                $$key = $value;
            }
        }
        /* html */
        echo '<!DOCTYPE html>'
        . '<html>';
        echo '<head>';
        header::metasLibrerias($pagina);
        echo '</head>';
        /*         * ********************************** */
        echo '<body>';
        echo '<div class="container_20">';
        //incluimos el panelSuperior
        include $config->obtenerVariable('carpetaVistas') . 'partesFijas/panelSuperior.php';

        //incluimos el panel Menu, depende del usuario si esta registrado
        include $config->obtenerVariable('carpetaVistas') . 'partesFijas/panelMenu.php';

        //panel-cambiante lleva cada cosa distinta dependiendo del nombre
        echo '<section id="panelCambiante" class="grid_16 blue">';
        include $vistaHtml;
        echo '</section>';
        echo '<div class="clear"></div>';
        
        echo '</div>'; //fin container

        echo '</body>';
        /*         * **************************************** */

        echo '</html>';

        /* html */
    }

}
?>