<?php

class inicioModelo extends baseModelos {

    public function listarMateriales() {
        //realizamos la consulta de todos los items
        $sentencia = 'SELECT t.rut, t.nombre, t.apellido_pat, t.apellido_mat, t.direccion.calle, t.direccion.numero, t.direccion.ciudad, t.direccion.region, t.fecha_suspencion, t.borrado_logico FROM usuarios_tab t';
        $consulta = $this->db->prepare($sentencia);
        $consulta->execute();
        //devolvemos la coleccion para que la vista la presente.
        return $consulta;
    }

}

?>