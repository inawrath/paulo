<?php

class materialModelo extends baseModelos {

    public function listarMateriales($tipo = 1) {
        //realizamos la consulta de todos los items
        //cambiar por la consulta a materiales
        $sentencia = 'SELECT m.descripcion.nombre, m.descripcion.tipo, m.descripcion.resumen, m.borrado_logico, m.clasificacion, COUNT(*) AS CANTIDAD ';
        $sentencia .= 'FROM materiales_tab m ';
        if ($tipo == 1) {
            $sentencia .= 'WHERE m.prestado = 0 ';
        }
        $sentencia .= 'GROUP BY m.descripcion.nombre, m.descripcion.tipo, m.descripcion.resumen, m.borrado_logico, m.clasificacion';
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
                'VALUES(:clasificacion,auto_id_material.NextVal,0,' .
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

    public function editarMaterial($datos) {
        if($this->existeMaterial($datos['clasificacion']) == 0){
            return 2;
        }
        $sentencia = 'UPDATE materiales_tab m ' .
                'SET m.descripcion = publicacion_t(:nombre,:tipoLibro,:autor, :edicion, :anio, :editorial, :resumen) ' .
                'WHERE m.clasificacion = :clasificacion';
        try {
            $consulta = $this->db->prepare($sentencia);
            $consulta->bindParam(":nombre", $datos['nombre']);
            $consulta->bindParam(":tipoLibro", $datos['tipo']);
            $consulta->bindParam(":autor", $datos['autor']);
            $consulta->bindParam(":edicion", $datos['edicion']);
            $consulta->bindParam(":anio", $datos['anio']);
            $consulta->bindParam(":editorial", $datos['editorial']);
            $consulta->bindParam(":resumen", $datos['resumen']);
            $consulta->bindParam(":clasificacion", $datos['clasificacion']);
            $consulta->execute();
        } catch (PDOException $e) {
            return 0;
        }
        $item = $this->datosMaterial($datos['clasificacion']);

        $objeto = $item->fetch();
        if ($objeto['CANTIDAD'] > $datos['copias']) {
            $sentencia1 = 'DELETE FROM materiales_tab m ' .
                    'WHERE m.clasificacion = :clasificacion AND ' .
                    'm.id_material IN (SELECT MAX(m1.id_material) ' .
                    'FROM materiales_tab m1 WHERE m1.prestado = 0 AND ' .
                    'm1.clasificacion = :clasificacion)';
            for ($i = 0; $i < ($objeto['CANTIDAD'] - $datos['copias']); $i++) {
                try {
                    $consulta1 = $this->db->prepare($sentencia1);
                    $consulta1->bindParam(":clasificacion", $datos['clasificacion']);
                    $consulta1->execute();
                } catch (PDOException $e) {
                    return 0;
                }
            }
        } elseif ($objeto['CANTIDAD'] < $datos['copias']) {
            $sentencia1 = 'INSERT INTO materiales_tab ' .
                    'VALUES(:clasificacion,auto_id_material.NextVal,0,' .
                    'publicacion_t(:nombre,:tipoLibro,:autor, :edicion, :anio, :editorial, :resumen),1)';
            for ($i = 0; $i < ($datos['copias'] - $objeto['CANTIDAD']); $i++) {
                try {
                    $consulta1 = $this->db->prepare($sentencia1);
                    $consulta1->bindParam(":nombre", $datos['nombre']);
                    $consulta1->bindParam(":tipoLibro", $datos['tipo']);
                    $consulta1->bindParam(":autor", $datos['autor']);
                    $consulta1->bindParam(":edicion", $datos['edicion']);
                    $consulta1->bindParam(":anio", $datos['anio']);
                    $consulta1->bindParam(":editorial", $datos['editorial']);
                    $consulta1->bindParam(":resumen", $datos['resumen']);
                    $consulta1->bindParam(":clasificacion", $datos['clasificacion']);
                    $consulta1->execute();
                } catch (PDOException $e) {
                    return 0;
                }
            }
        }
        return 1;
    }

    public function activarDesactivarMaterial($clasificacion, $estado) {
        if ($this->existeMaterial($clasificacion) == 0) {
            return 2;
        } else {
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
    }

    private function existeMaterial($clasificacion) {
        $sentencia = 'SELECT COUNT(m.id_material) ' .
                'FROM materiales_tab m ' .
                'WHERE m.clasificacion = :clasificacion';
        $consulta = $this->db->prepare($sentencia);
        $consulta->bindParam(":clasificacion", $clasificacion);
        $consulta->execute();
        $item = $consulta->fetch();
        return $item[0];
    }

    public function listadoUsuarioPrestamo() {
        $sentencia = 'SELECT p.rut_u.rut, p.rut_u.nombre, p.rut_u.apellido_pat, p.rut_u.apellido_mat, p.devolucion FROM prestamo_tab p WHERE p.devolucion = 0 GROUP BY p.rut_u.rut, p.rut_u.nombre, p.rut_u.apellido_pat, p.rut_u.apellido_mat, p.devolucion';
        $consulta = $this->db->prepare($sentencia);
        $consulta->execute();

        $listadoUsuarioPrestamo = "";
        $i = 0;
        while ($item = $consulta->fetch()) {
            $listadoUsuarioPrestamo[$i]['rut'] = $item[0];
            $listadoUsuarioPrestamo[$i]['nombre'] = $item[1] . ' ' . $item[2] . ' ' . $item[3];
            $subsentencia = 'SELECT p.id_mat.descripcion.nombre, p.id_mat.id_material FROM prestamo_tab p WHERE p.rut_u.rut = :rut AND p.devolucion = 0';
            $subconsulta = $this->db->prepare($subsentencia);
            $subconsulta->bindParam(":rut", $item[0]);
            $subconsulta->execute();
            $j = 0;
            while ($subitem = $subconsulta->fetch()) {

                $listadoUsuarioPrestamo[$i][$j][0] = $subitem['ID_MAT.DESCRIPCION.NOMBRE'];
                $listadoUsuarioPrestamo[$i][$j][1] = $subitem['ID_MAT.ID_MATERIAL'];

                $j++;
            }
            $listadoUsuarioPrestamo[$i]['cantidad'] = $j;
            $i++;
        }
        $listadoUsuarioPrestamo['cantidad'] = $i;

        return $listadoUsuarioPrestamo;
    }

    public function prestamoMaterial($clasificacion, $rut) {

        if ($this->verificarUsuarioPrestamo($clasificacion, $rut) != 0) {
            return 2;
        }

        $sentencia = 'SELECT m.clasificacion, MIN(m.id_material) FROM materiales_tab m WHERE m.clasificacion = :clasificacion AND m.prestado = 0 GROUP BY m.clasificacion';
        $consulta = $this->db->prepare($sentencia);
        $consulta->bindParam(":clasificacion", $clasificacion);
        $consulta->execute();

        $i = 0;
        while ($item = $consulta->fetch()) {
            $objeto['clasificacion'] = $item[0];
            $objeto['id_material'] = $item[1];
            $i++;
        }
        if ($i == 0) {
            return 0;
        } else {
            $fecha = getdate();
            $subsentencia2 = 'INSERT INTO prestamo_tab ' .
                    'VALUES(auto_id_prestamo.NextVal,:fecha,:devolucion,0,(SELECT REF(m) FROM materiales_tab m WHERE m.id_material = :id_material), (SELECT REF(u) FROM usuarios_tab u WHERE u.rut = :rut))';

            $inicial = $fecha['mday'] . '-' . $this->mes($fecha['mon']) . '-' . $fecha['year'] . ' ' . $fecha['hours'] . ':' . $fecha['minutes'] . ':' . $fecha['seconds'];
            if (($fecha['mday'] + 7) > 28 && $fecha['mon'] == 2) {
                $fecha['mday'] = ($fecha['mday'] + 7) - 28;
                $fecha['mon'] = 3;
            } elseif (($fecha['mday'] + 7) > 30) {
                $fecha['mday'] = ($fecha['mday'] + 7) - 30;
                $fecha['mon']++;
            } elseif (($fecha['mday'] + 7) > 30 && $fecha['mon'] == 12) {
                $fecha['mday'] = ($fecha['mday'] + 7) - 30;
                $fecha['mon'] = 1;
                $fecha['year']++;
            }
            $devolucion = $fecha['mday'] . '-' . $this->mes($fecha['mon']) . '-' . $fecha['year'] . ' ' . $fecha['hours'] . ':' . $fecha['minutes'] . ':' . $fecha['seconds'];
            try {
                $subconsulta2 = $this->db->prepare($subsentencia2);
                $subconsulta2->bindParam(":id_material", $objeto['id_material']);
                $subconsulta2->bindParam(":rut", $rut);
                $subconsulta2->bindParam(":fecha", $inicial);
                $subconsulta2->bindParam(":devolucion", $devolucion);
                $subconsulta2->execute();
            } catch (PDOException $e) {
                return 0;
            }

            $subsentencia1 = 'UPDATE materiales_tab m ' .
                    'SET m.prestado = 1 ' .
                    'WHERE m.id_material = :id_material';
            try {
                $subconsulta = $this->db->prepare($subsentencia1);
                $subconsulta->bindParam(":id_material", $objeto['id_material']);
                $subconsulta->execute();
            } catch (PDOException $e) {
                return 0;
            }
            return 1;
        }
    }

    public function devolucionPrestamo($idMaterial) {
        $sentencia1 = 'SELECT p.rut_u.rut, TO_CHAR(p.fecha_devolucion,\'DD\') AS dia_devolucion,' .
                ' TO_CHAR(p.fecha_devolucion,\'MM\') AS mes_devolucion, TO_CHAR(p.fecha_devolucion,\'YYYY\') AS anio_devolucion, p.id ' .
                'FROM prestamo_tab p WHERE p.id_mat.id_material = :id_material AND p.devolucion = 0';
        $consulta1 = $this->db->prepare($sentencia1);
        $consulta1->bindParam(":id_material", $idMaterial);
        $consulta1->execute();
        $i = 0;
        while ($item = $consulta1->fetch()) {
            $objeto['rut'] = $item[0];
            $objeto['mday'] = $item[1];
            $objeto['mon'] = $item[2];
            $objeto['year'] = $item[3];
            $objeto['id'] = $item[4];
            $i++;
        }

        if ($i == 0) {
            return 2;
        } else {
            require_once 'controladores/inicioControlador.php';
            $fechaActual = getdate();
            $estado = inicioControlador::compararFechas($objeto, $fechaActual);
            /* valores de $estado
             * 1: devuelve antes de la fecha
             * 0: devuelve en la misma fecha
             * 2: devuelve atrasado
             */

            $sentencia2 = 'UPDATE prestamo_tab p ' .
                    'SET p.devolucion = 1 ' .
                    'WHERE p.id_mat.id_material = :id_material AND p.devolucion = 0';
            try {
                $consulta2 = $this->db->prepare($sentencia2);
                $consulta2->bindParam(":id_material", $idMaterial);
                $consulta2->execute();
            } catch (PDOException $e) {
                return 0;
            }

            $sentencia3 = 'UPDATE materiales_tab m ' .
                    'SET m.prestado = 0 ' .
                    'WHERE m.id_material = :id_material';
            try {
                $consulta3 = $this->db->prepare($sentencia3);
                $consulta3->bindParam(":id_material", $idMaterial);
                $consulta3->execute();
            } catch (PDOException $e) {
                return 0;
            }

            $devolucion = $fechaActual['mday'] . '-' . $this->mes($fechaActual['mon']) . '-' . $fechaActual['year'] . ' ' . $fechaActual['hours'] . ':' . $fechaActual['minutes'] . ':' . $fechaActual['seconds'];

            $sentencia4 = 'INSERT INTO devolucion_tab ' .
                    'VALUES(auto_id_devolucion.NextVal,:devolucion,' .
                    '(SELECT p.id_mat FROM prestamo_tab p WHERE p.id = :idPrestamo),' .
                    '(SELECT p.rut_u FROM prestamo_tab p WHERE p.id = :idPrestamo))';
            try {
                $consulta4 = $this->db->prepare($sentencia4);
                $consulta4->bindParam(":devolucion", $devolucion);
                $consulta4->bindParam(":idPrestamo", $objeto['id']);
                $consulta4->execute();
            } catch (PDOException $e) {
                return 0;
            }
            if ($estado == 2) {
                $fecha = $fechaActual;
                if (($fecha['mday'] + 14) > 28 && $fecha['mon'] == 2) {
                    $fecha['mday'] = ($fecha['mday'] + 14) - 28;
                    $fecha['mon'] = 3;
                } elseif (($fecha['mday'] + 14) > 30) {
                    $fecha['mday'] = ($fecha['mday'] + 14) - 30;
                    $fecha['mon']++;
                } elseif (($fecha['mday'] + 14) > 30 && $fecha['mon'] == 12) {
                    $fecha['mday'] = ($fecha['mday'] + 14) - 30;
                    $fecha['mon'] = 1;
                    $fecha['year']++;
                }
                $castigo = $fecha['mday'] . '-' . $this->mes($fecha['mon']) . '-' . $fecha['year'] . ' ' . $fecha['hours'] . ':' . $fecha['minutes'] . ':' . $fecha['seconds'];
                $sentencia5 = 'UPDATE usuarios_tab u ' .
                        'SET u.fecha_suspencion = :suspencion ' .
                        'WHERE u.rut = :rut';
                $consulta5 = $this->db->prepare($sentencia5);
                $consulta5->bindParam(":suspencion", $castigo);
                $consulta5->bindParam(":rut", $objeto['rut']);
                $consulta5->execute();

                return '3,' . $fecha['mday'] . '-' . $fecha['mon'] . '-' . $fecha['year'];
            }
        }
        return 1;
    }

    private function verificarUsuarioPrestamo($clasificacion, $rut) {
        $sentencia = 'SELECT COUNT(id) FROM prestamo_tab p WHERE p.rut_u.rut = :rut AND p.id_mat.clasificacion = :clasificacion AND p.devolucion = 0';

        $consulta = $this->db->prepare($sentencia);
        $consulta->bindParam(":rut", $rut);
        $consulta->bindParam(":clasificacion", $clasificacion);
        $consulta->execute();

        $item = $consulta->fetch();
        return $item[0];
    }

    private function mes($nroMes) {
        switch ($nroMes) {
            case 1: return 'ene';
                break;
            case 2: return 'feb';
                break;
            case 3: return 'mar';
                break;
            case 4: return 'abr';
                break;
            case 5: return 'may';
                break;
            case 6: return 'jun';
                break;
            case 7: return 'jul';
                break;
            case 8: return 'ago';
                break;
            case 9: return 'sep';
                break;
            case 10: return 'oct';
                break;
            case 11: return 'nov';
                break;
            case 12: return 'dic';
                break;
        }
    }

}

?>