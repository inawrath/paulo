<?php

class materialModelo extends baseModelos {

    public function listarMateriales() {
        //realizamos la consulta de todos los items
        //cambiar por la consulta a materiales
        $consulta = $this->db->prepare('SELECT m.descripcion.nombre, m.descripcion.tipo, m.descripcion.resumen, m.borrado_logico, m.id_material, m.cantidad FROM materiales_tab m');
        $consulta->execute();
        //devolvemos la coleccion para que la vista la presente.
        return $consulta;
    }
    
    public function datosMaterial($id) {
        $sentencia = 'SELECT m.id_material FROM materiales_tab m WHERE m.id_material = :id ';
        $consulta = $this->db->prepare($sentencia);
        $consulta->bindParam(":id", $id);
        $consulta->execute();
        return $consulta;
    }

}

?>