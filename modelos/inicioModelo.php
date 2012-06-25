<?php

class inicioModelo extends baseModelos {

    public function listarMateriales() {
        //realizamos la consulta de todos los items
        $sentencia = 'SELECT m.nombre, m.tipo, m.resumen FROM materiales_tab m';
        $consulta = $this->db->prepare($sentencia);
        $consulta->execute();
        //devolvemos la coleccion para que la vista la presente.
        return $consulta;
    }

}

?>