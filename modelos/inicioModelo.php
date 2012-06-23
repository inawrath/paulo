<?php

class inicioModelo extends baseModelos {

    public function listarUsuarios() {
        //realizamos la consulta de todos los items
        $consulta = $this->db->prepare('SELECT t.rut, t.contrasena, t.nombre, t.apellido_pat, t.apellido_mat, t.direccion.calle, t.direccion.numero, t.direccion.ciudad, t.direccion.region, t.fecha_suspencion, t.borrado_logico FROM usuarios_tab t;');
        $consulta->execute();

        print_r($consulta);

        //devolvemos la coleccion para que la vista la presente.
        return $consulta;
    }

}

?>