<?php

class materialControlador extends baseControladores {

    public function inicio() {
        
    }

    public function listar() {
        //Incluye el modelo que corresponde
        require 'modelos/materialModelo.php';

        //Creamos una instancia de nuestro "modelo"
        $items = new materialModelo();

        //Le pedimos al modelo todos los items usuarios
        $listado = $items->listarMateriales();

        //Pasamos a la vista toda la informacion que se desea representar
        $data['listado'] = $listado;

        switch ($_SESSION['tipo']) {
            case 1:
                $this->vista->desplegar("usuarioBuscaMaterial", "usuarioBuscaMaterial.php", $data);
                break;
            case 2:
                $this->vista->desplegar("administradorMateriales", "administradorMateriales.php", $data);
                break;
            default:
                break;
        }
    }

    public function nuevo() {
        if (isset($_POST['submit'])) {
            //crear insert
            echo $_POST['nombre'] . $_POST['tipo'] . $_POST['resumen'];
        } else {
            $this->vista->desplegar("administradorNuevoMaterial", "administradorNuevoMaterial.php");
        }
    }

    public function editar($id) {
        if (isset($_POST['submit'])) {
            //aca hacemos el update
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
        //borrado logico y respuesta resultado
        echo $id;
    }

    public function activar($id) {
        //borrado logico y respuesta resultado
        echo $id;
    }

    public function solicitarPrestamo($id) {
        /* realizar las acciones pertinentes al prestamo */
        echo 1;
    }

    public function devolucion() {
        if (isset($_POST['submit'])) {
            /* realizar las acciones pertinentes a la devolucion */
            echo $_POST['id'];
        } else {
            $this->vista->desplegar("administradorDevolucionMaterial", "administradorDevolucionMaterial.php");
        }
    }

    public function listarPrestamos(){
        $this->vista->desplegar("administradorListarPrestamos", "administradorListarPrestamos.php");
    }
}

?>