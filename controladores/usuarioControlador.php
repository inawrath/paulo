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
            $_SESSION['username'] = $item['NOMBRE'];
            $_SESSION['userid'] = $item['RUT'];
            $_SESSION['tipo'] = $item['TIPO'];
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
        require_once 'modelos/usuarioModelo.php';

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
            require_once 'modelos/usuarioModelo.php';
            require_once 'inicioControlador.php';

            if (inicioControlador::valida_rut($_POST['rut'])) {
                $insertar = new usuarioModelo();
                $insertado = $insertar->insertarUsuario($_POST);
                echo $insertado;
                //*/
            } else {
                echo 3;
            }
        } else {
            $this->vista->desplegar('administradorNuevoUsuario', 'administradorNuevoUsuario.php');
        }
    }

    public function editar($rut) {
        //echo $id;
        if (isset($_POST['submit'])) {
            if ($_POST['rut'] != "" && $_POST['rut'] == $rut) {
                require_once 'inicioControlador.php';
                if (inicioControlador::valida_rut($_POST['rut'])) {
                    require_once 'modelos/usuarioModelo.php';
                    $actualizar = new usuarioModelo();
                    $actualizado = $actualizar->actualizarUsuario($_POST);
                    echo $actualizado;
                } else {
                    echo 3;
                }
            }//*/
        } else {
            $_SESSION['fecha_suspencion'] = '-1';
            $_SESSION['estado'] = '-1';
            //Incluye el modelo que corresponde
            require 'modelos/usuarioModelo.php';

            //Creamos una instancia de nuestro 'modelo'
            $items = new usuarioModelo();

            //Le pedimos al modelo todos los items usuarios
            $listado = $items->editarUsuario($rut);

            //Pasamos a la vista toda la informacion que se desea representar
            $data['listado'] = $listado;

            $this->vista->desplegar('administradorEditarUsuario', 'administradorEditarUsuario.php', $data);
        }
    }

    public function eliminar($rut) {
        require_once 'inicioControlador.php';
        if (inicioControlador::valida_rut($rut)) {
            require_once 'modelos/usuarioModelo.php';
            $activar = new usuarioModelo();
            $activado = $activar->activarDesactivarUsuario($rut,0);
            echo $activado;
        } else {
            echo 3;
        }
    }

    public function activar($rut) {
        require_once 'inicioControlador.php';
        if (inicioControlador::valida_rut($rut)) {
            require_once 'modelos/usuarioModelo.php';
            $activar = new usuarioModelo();
            $activado = $activar->activarDesactivarUsuario($rut,1);
            echo $activado;
        } else {
            echo 3;
        }
    }

}

?>