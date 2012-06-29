<?php

class materialControlador extends baseControladores {

    public function inicio() {
        
    }

    public function listar() {
        //Incluye el modelo que corresponde
        require 'modelos/materialModelo.php';

        //Creamos una instancia de nuestro "modelo"
        $items = new materialModelo();

        switch ($_SESSION['tipo']) {
            case 1:
                //Le pedimos al modelo todos los items usuarios
                $listado = $items->listarMateriales(1);

                //Pasamos a la vista toda la informacion que se desea representar
                $data['listado'] = $listado;
                $this->vista->desplegar("usuarioBuscaMaterial", "usuarioBuscaMaterial.php", $data);
                break;
            case 2:
                //Le pedimos al modelo todos los items usuarios
                $listado = $items->listarMateriales(2);

                //Pasamos a la vista toda la informacion que se desea representar
                $data['listado'] = $listado;
                $this->vista->desplegar("administradorMateriales", "administradorMateriales.php", $data);
                break;
            default:
                break;
        }
    }

    public function nuevo() {
        if (isset($_POST['submit'])) {
            require_once 'modelos/materialModelo.php';

            $insertar = new materialModelo();
            $insertado = $insertar->insertarMaterial($_POST);

            echo $insertado;
            //print_r($_POST);
        } else {
            $this->vista->desplegar("administradorNuevoMaterial", "administradorNuevoMaterial.php");
        }
    }

    public function editar($id) {
        if (isset($_POST['submit'])) {
            //aca hacemos el update
            print_r($_POST);
        } else {
            //Incluye el modelo que corresponde
            require 'modelos/materialModelo.php';

            //Creamos una instancia de nuestro "modelo"
            $items = new materialModelo();

            //Le pedimos al modelo todos los items usuarios
            $listado = $items->datosMaterial($id);

            //Pasamos a la vista toda la informacion que se desea representar
            $data['listado'] = $listado;

            $this->vista->desplegar("administradorEditarMaterial", "administradorEditarMaterial.php", $data);
        }
    }

    public function eliminar($id) {
        //Incluye el modelo que corresponde
        require 'modelos/materialModelo.php';

        //Creamos una instancia de nuestro "modelo"
        $items = new materialModelo();

        $estado = $items->activarDesactivarMaterial($id, 0);
        echo $estado;
    }

    public function activar($id) {
        //Incluye el modelo que corresponde
        require 'modelos/materialModelo.php';

        //Creamos una instancia de nuestro "modelo"
        $items = new materialModelo();

        $estado = $items->activarDesactivarMaterial($id, 1);
        echo $estado;
    }

    public function solicitarPrestamo($id) {
        //Incluye el modelo que corresponde
        require 'modelos/materialModelo.php';

        //Creamos una instancia de nuestro "modelo"
        $items = new materialModelo();

        echo $items->prestamoMaterial($id, $_SESSION['userid']);
    }

    public function devolucion() {
        if (isset($_POST['submit'])) {
            //Incluye el modelo que corresponde
            require 'modelos/materialModelo.php';

            //Creamos una instancia de nuestro "modelo"
            $items = new materialModelo();


            echo $items->devolucionPrestamo($_POST['id']);
        } else {
            $this->vista->desplegar("administradorDevolucionMaterial", "administradorDevolucionMaterial.php");
        }
    }

    public function listarPrestamos() {
        //Incluye el modelo que corresponde
        require 'modelos/materialModelo.php';

        //Creamos una instancia de nuestro "modelo"
        $items = new materialModelo();

        $listado = $items->listadoUsuarioPrestamo();

        $data['listado'] = $listado;
        $this->vista->desplegar("administradorListarPrestamos", "administradorListarPrestamos.php", $data);
    }

}

?>