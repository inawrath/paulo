<?php

class usuarioControlador extends BaseControladores {

    public function ingresar() {
        //Incluye el modelo que corresponde
        require 'modelos/usuarioModelo.php';

        //Creamos una instancia de nuestro "modelo"
        $usuarios = new usuarioModelo();

        //Le pedimos al modelo todos los items
        $datosUsuario = $usuarios->encontrarUsuario($_POST['usuario'], $_POST['contrasena']);
        $n = 0;
        while ($item = $datosUsuario->fetch()) {
            $_SESSION['username'] = $item['usu_usuario'];
            $_SESSION['userid'] = $item['usu_id'];
            $_SESSION['tipo'] = $item['usu_tipo'];
            $_SESSION['acceso'] = true;

            $n++;
        }
        echo $n;
    }

    public function salir() {
        $config = Config::singleton();
        session_destroy();
        session_unset();
        $_SESSION['acceso'] = false;
        //al salir nos vamos a la pagina inicial
        header('Location:' . $config->obtenerVariable('url'));
        exit(0);
    }

    public function nuevo() {
        $this->vista->desplegar("inicio", "administradorNuevoUsuario.php");
    }

    public function editar() {   
        $this->vista->desplegar("inicio", "administradorEditarUsuario.php");
    }

    public function elimina() {
        //borrado logico
    }

}

?>