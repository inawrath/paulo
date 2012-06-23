<?php

class materialControlador extends baseControladores {

    public function inicio() {
        
    }

    public function listar() {
        switch ($_SESSION['tipo']) {
            case 1:
                $this->vista->desplegar("usuario", "usuario.php");
                break;
            case 2:
                //Incluye el modelo que corresponde
                require 'modelos/materialModelo.php';

                //Creamos una instancia de nuestro "modelo"
                $items = new materialModelo();

                //Le pedimos al modelo todos los items usuarios
                $listado = $items->listarMaterial();

                //Pasamos a la vista toda la informacion que se desea representar
                $data['listado'] = $listado;

                $this->vista->desplegar("administradorMateriales", "administradorMateriales.php",$data);
                break;
            default:
                break;
        }
    }

    public function nuevo() {
        $this->vista->desplegar("administradorEditarMaterial", "administradorNuevoMaterial.php");
    }

    public function editar() {
        $this->vista->desplegar("administradorEditarMaterial", "administradorEditarMaterial.php");
    }

    public function elimina() {
        //borrado logico
    }

}

?>