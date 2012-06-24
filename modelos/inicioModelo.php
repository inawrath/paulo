<?php

class inicioModelo extends baseModelos {

    public function listarMateriales() {
        //realizamos la consulta de todos los items
        $consulta = $this->db->prepare('SELECT * FROM materiales_tab;');
        $consulta->execute();
        //devolvemos la coleccion para que la vista la presente.
        return $consulta;
    }

}

?>