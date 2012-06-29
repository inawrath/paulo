<?php

class materialModelo extends baseModelos {

    public function listarMateriales() {
        //realizamos la consulta de todos los items
        //cambiar por la consulta a materiales
        $sentencia = 'SELECT m.descripcion.nombre, m.descripcion.tipo, m.descripcion.resumen, m.borrado_logico, m.clasificacion ' .
                'FROM materiales_tab m ' .
                'GROUP BY m.descripcion.nombre, m.descripcion.tipo, m.descripcion.resumen, m.borrado_logico, m.clasificacion';
        $consulta = $this->db->prepare($sentencia);
        $consulta->execute();
        //devolvemos la coleccion para que la vista la presente.
        return $consulta;
    }

    public function datosMaterial($clasificacion) {
        $sentencia = 'SELECT m.clasificacion, m.descripcion.nombre, m.descripcion.tipo, m.descripcion.autor, m.descripcion.edicion, m.descripcion.anio, m.descripcion.editorial, m.descripcion.resumen, COUNT(m.id_material) AS CANTIDAD FROM materiales_tab m WHERE m.clasificacion = :clasificacion GROUP BY m.clasificacion, m.descripcion.nombre, m.descripcion.tipo, m.descripcion.autor, m.descripcion.edicion, m.descripcion.anio, m.descripcion.editorial, m.descripcion.resumen';
        $consulta = $this->db->prepare($sentencia);
        $consulta->bindParam(":clasificacion", $clasificacion);
        $consulta->execute();
        return $consulta;
    }

    public function insertarMaterial($datos) {
        $sentencia = 'INSERT INTO materiales_tab ' .
                'VALUES(:clasificacion,auto_id_material.NextVal,' .
                'publicacion_t(:nombre,:tipoLibro,:autor, :edicion, :anio, :editorial, :resumen),1)';
        for ($i = 1; $i <= $datos['copias']; $i++) {
            try {
                $consulta = $this->db->prepare($sentencia);
                $consulta->bindParam(":clasificacion", $datos['clasificacion']);
                $consulta->bindParam(":nombre", $datos['nombre']);
                $consulta->bindParam(":tipoLibro", $datos['tipo']);
                $consulta->bindParam(":autor", $datos['autor']);
                $consulta->bindParam(":edicion", $datos['edicion']);
                $consulta->bindParam(":anio", $datos['anio']);
                $consulta->bindParam(":editorial", $datos['editorial']);
                $consulta->bindParam(":resumen", $datos['resumen']);
                $consulta->execute();
            } catch (PDOException $e) {
                echo $e->getMessage();
                return 0;
            }
        }
        return 1;
    }

    public function activarDesactivarMaterial($clasificacion, $estado) {
        $sentencia = 'UPDATE materiales_tab m ' .
                'SET m.borrado_logico = :estado ' .
                'WHERE m.clasificacion = :clasificacion';
        try {
            $consulta = $this->db->prepare($sentencia);
            $consulta->bindParam(":estado", $estado);
            $consulta->bindParam(":clasificacion", $clasificacion);
            $consulta->execute();
        } catch (PDOException $e) {
            return 0;
        }
        return 1;
    }

    public function listadoUsuarioPrestamo() {
        $sentencia = 'SELECT p.rut_u.rut, p.rut_u.nombre, p.rut_u.apellido_pat, p.rut_u.apellido_mat FROM prestamo_tab p GROUP BY p.rut_u.rut, p.rut_u.nombre, p.rut_u.apellido_pat, p.rut_u.apellido_mat';
        $consulta = $this->db->prepare($sentencia);
        $consulta->execute();

        $listadoUsuarioPrestamo = "";
        $i = 0;
        while ($item = $consulta->fetch()) {
            $listadoUsuarioPrestamo[$i]['rut'] = $item[0];
            $listadoUsuarioPrestamo[$i]['nombre'] = $item[1] . ' ' . $item[2] . ' ' . $item[3];
            $subsentencia = 'SELECT p.id_mat.descripcion.nombre FROM prestamo_tab p WHERE p.rut_u.rut = :rut';
            $subconsulta = $this->db->prepare($subsentencia);
            $subconsulta->bindParam(":rut", $item[0]);
            $subconsulta->execute();
            $j = 0;
            while ($subitem = $subconsulta->fetch()) {

                $listadoUsuarioPrestamo[$i][$j] = $subitem['ID_MAT.DESCRIPCION.NOMBRE'];
                $j++;
            }
            $listadoUsuarioPrestamo[$i]['cantidad'] = $j;
            $i++;
        }
        $listadoUsuarioPrestamo['cantidad'] = $i;

        return $listadoUsuarioPrestamo;
    }

}

?>