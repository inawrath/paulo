<?php

class usuarioControlador extends BaseControladores {

    public function ingresar() {
        //Incluye el modelo que corresponde
        require 'modelos/usuarioModelo.php';

        //Creamos una instancia de nuestro 'modelo'
        $usuarios = new usuarioModelo();

        //Le pedimos al modelo todos los items
        $datosUsuario = $usuarios->encontrarUsuario($_POST['rut'], $_POST['contrasena']);
        $n = 0;
        while ($item = $datosUsuario->fetch()) {
            $_SESSION['username'] = $item['nombre'];
            $_SESSION['userid'] = $item['rut'];
            $_SESSION['tipo'] = $item['tipo'];
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

    public function listar() {
        //Incluye el modelo que corresponde
        require 'modelos/usuarioModelo.php';

        //Creamos una instancia de nuestro 'modelo'
        $items = new usuarioModelo();

        //Le pedimos al modelo todos los items usuarios
        $listado = $items->listarUsuarios();

        //Pasamos a la vista toda la informacion que se desea representar
        $data['listado'] = $listado;

        $this->vista->desplegar('administradorUsuarios', 'administradorUsuarios.php', $data);
    }

    public function nuevo() {
        if (isset($_POST['submit'])) {
            //crear insert
            echo $_POST['rut'] . $_POST['contrasena'] . $_POST['tipo'] . $_POST['nombre'];
        } else {
            $this->vista->desplegar('administradorNuevoUsuario', 'administradorNuevoUsuario.php');
        }
    }

    public function editar($id) {
        echo $id;
        if (isset($_POST['submit'])) {
            //crear update
        } else {
            $this->vista->desplegar('administradorEditarUsuario', 'administradorEditarUsuario.php');
        }
    }

    public function eliminar($id) {
        //borrado logico
        echo $id;
    }

}

?>