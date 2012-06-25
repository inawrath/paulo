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
    
    public function datosMaterial($id) {
        $sentencia = 'SELECT * FROM materiales_tab WHERE id = :id ';
        $consulta = $this->db->prepare($sentencia);
        $consulta->bindParam(":id", $id);
        $consulta->execute();
        return $consulta;
    }

}

?>