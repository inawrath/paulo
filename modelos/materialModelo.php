<?php

class materialModelo extends baseModelos {

    public function listarMateriales() {
        //realizamos la consulta de todos los items
        //cambiar por la consulta a materiales
        $consulta = $this->db->prepare('SELECT * FROM materiales_tab');
        $consulta->execute();
        //devolvemos la coleccion para que la vista la presente.
        return $consulta;
    }

}

?>