<?php

class inicioModelo extends baseModelos {

    public function listarMateriales() {
        //realizamos la consulta de todos los items
        $sentencia = 'SELECT m.descripcion.nombre, m.descripcion.tipo, m.descripcion.resumen FROM materiales_tab m';

        try {
            $consulta = $this->db->prepare($sentencia);
            $consulta->execute();
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
        //devolvemos la coleccion para que la vista la presente.
        return $consulta;
    }

}

?>