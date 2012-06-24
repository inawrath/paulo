<?php

class materialControlador extends baseControladores {

    public function inicio() {
        
    }

    public function listar() {
        switch ($_SESSION['tipo']) {
            case 1:
                $this->vista->desplegar("usuario", "usuarioBuscaMaterial.php");
                break;
            case 2:
                //Incluye el modelo que corresponde
                require 'modelos/materialModelo.php';

                //Creamos una instancia de nuestro "modelo"
                $items = new materialModelo();

                //Le pedimos al modelo todos los items usuarios
                $listado = $items->listarMateriales();

                //Pasamos a la vista toda la informacion que se desea representar
                $data['listado'] = $listado;

                $this->vista->desplegar("administradorMateriales", "administradorMateriales.php",$data);
                break;
            default:
                break;
        }
    }

    public function nuevo() {
        if(isset($_POST['submit'])){
            //crear insert
            echo $_POST['nombre'].$_POST['tipo'].$_POST['resumen'];
        }else{
            $this->vista->desplegar("administradorNuevoMaterial", "administradorNuevoMaterial.php");
        }
    }

    public function editar($id) {
        if(isset($_POST['submit'])){
            //aca hacemos el update
        }else{
            //buscar el material a editar e insertarlo en la tabla xD
            $this->vista->desplegar("administradorEditarMaterial", "administradorEditarMaterial.php");
        }
    }

    public function eliminar($id) {
        //borrado logico y respuesta resultado
        echo $id;
    }

}

?>