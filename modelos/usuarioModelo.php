<?php

class usuarioModelo extends baseModelos {

    public function encontrarUsuario($rut, $contrasena) {
//realizamos la consulta de todos los items
//SELECT t.rut, t.contrasena FROM usuarios_tab t where t.rut = 173947755;

        $sentencia = 'SELECT t.rut, t.contrasena, t.tipo, t.nombre FROM usuarios_tab t WHERE t.rut= :rut AND t.contrasena=:contrasena AND t.borrado_logico = 1 ';
        $consulta = $this->db->prepare($sentencia);
        $consulta->bindParam(":rut", $rut);
        $encriptada = sha1(md5($contrasena));
        $consulta->bindParam(":contrasena", $encriptada);
        $consulta->execute();
//devolvemos la coleccion para que la vista la presente.
        return $consulta;
    }

    public function insertarUsuario($datos) {
        $sentencia = 'INSERT INTO usuarios_tab ' .
                'VALUES (:rut,:contrasena,:tipoUsuario,:nombre,:apellidoPaterno,:apellidoMaterno,' .
                'direccion_t(:calleDireccion,:numeroDireccion,:ciudadDireccion,:regionDireccion),telefono_t(:telefono),:suspencion,1)';

        if ($this->existeUsuario($datos['rut']) == 1) {
            return 0;
        } else {
            try {
                $consulta = $this->db->prepare($sentencia);
                $consulta->bindParam(":rut", $datos['rut']);
                $encriptada = sha1(md5($datos['contrasena']));
                $consulta->bindParam(":contrasena", $encriptada);
                $consulta->bindParam(":tipoUsuario", $datos['tipo']);
                $consulta->bindParam(":nombre", $datos['nombre']);
                $consulta->bindParam(":apellidoPaterno", $datos['apellidoPaterno']);
                $consulta->bindParam(":apellidoMaterno", $datos['apellidoMaterno']);
                $consulta->bindParam(":calleDireccion", $datos['calleDireccion']);
                $consulta->bindParam(":numeroDireccion", $datos['numeroDireccion']);
                $consulta->bindParam(":ciudadDireccion", $datos['ciudadDireccion']);
                $consulta->bindParam(":regionDireccion", $datos['regionDireccion']);
                $consulta->bindParam(":telefono", $datos['telefono']);
                $suspencion = '01/01/1990';
                $consulta->bindParam(":suspencion", $suspencion);
                $consulta->execute();
            } catch (PDOException $e) {
                return 0;
            }

            return 1;
        }
    }

    public function editarUsuario($rut) {
        $sentencia = 'SELECT t.rut, t.contrasena, t.nombre, t.tipo,' .
                ' t.apellido_pat, t.apellido_mat, t.direccion.calle,' .
                ' t.direccion.numero, t.direccion.ciudad, t.direccion.region,' .
                ' t.fecha_suspencion, tel.*,' .
                ' TO_CHAR(t.fecha_suspencion,\'DD\'), TO_CHAR(t.fecha_suspencion,\'MM\'), TO_CHAR(t.fecha_suspencion,\'YYYY\') ' .
                'FROM usuarios_tab t, TABLE(t.telefono) tel WHERE t.rut = :rut';
        $consulta = $this->db->prepare($sentencia);
        $consulta->bindParam(":rut", $rut);
        $consulta->execute();
        return $consulta;
    }

    public function actualizarUsuario($datos) {
        $sentencia = '';
        $sentencia .= 'UPDATE usuarios_tab u ';
        $sentencia .= 'SET u.tipo = :tipo, ';
        if ($datos['contrasena'] != "") {
            $sentencia .= 'u.contrasena = :contrasena, ';
        }
        $sentencia .= 'u.nombre = :nombre, ';
        $sentencia .= 'u.apellido_pat = :apellidoPaterno, ';
        $sentencia .= 'u.apellido_mat = :apellidoMaterno, ';
        $sentencia .= 'u.direccion  =  direccion_t(:calleDireccion,:numeroDireccion,:ciudadDireccion,:regionDireccion), ';
        $sentencia .= 'u.telefono = telefono_t(:telefono)';
        $sentencia .= ', u.fecha_suspencion = :suspencion ';
        $sentencia .= 'WHERE u.rut = :rut';
        if ($this->existeUsuario($datos['rut']) == 0) {
            return 0;
        } else {
            try {
                $consulta = $this->db->prepare($sentencia);
                $consulta->bindParam(":rut", $datos['rut']);
                if ($datos['contrasena'] != "") {
                    $encriptada = sha1(md5($datos['contrasena']));
                    $consulta->bindParam(":contrasena", $encriptada);
                }
                $consulta->bindParam(":tipo", $datos['tipo']);
                $consulta->bindParam(":nombre", $datos['nombre']);
                $consulta->bindParam(":apellidoPaterno", $datos['apellidoPaterno']);
                $consulta->bindParam(":apellidoMaterno", $datos['apellidoMaterno']);
                $consulta->bindParam(":calleDireccion", $datos['calleDireccion']);
                $consulta->bindParam(":numeroDireccion", $datos['numeroDireccion']);
                $consulta->bindParam(":ciudadDireccion", $datos['ciudadDireccion']);
                $consulta->bindParam(":regionDireccion", $datos['regionDireccion']);
                $consulta->bindParam(":telefono", $datos['telefono']);
                if ($datos['estadoUsuario'] == '1') {
                    $suspencion = '01/01/1990 00:00:00';
                } elseif ($datos['estadoUsuario'] == '0') {
                    if ($_SESSION['estado'] == 2) {
                        $fechaHoy = getdate();
                        $suspencion = '01/01/' . ($fechaHoy['year'] + 10).' 00:00:00';
                    }
                } else {
                    $suspencion = $_SESSION['fecha_suspencion'];
                }
                $consulta->bindParam(":suspencion", $suspencion);
                $consulta->execute();
            } catch (PDOException $e) {
                return 0;
            }

            return 1;
        }
    }

    public function listarUsuarios() {
//realizamos la consulta de todos los items
        $sentencia = 'SELECT u.rut, u.nombre, u.tipo, u.borrado_logico FROM usuarios_tab u';
        $consulta = $this->db->prepare($sentencia);
        $consulta->execute();
//devolvemos la coleccion para que la vista la presente.
        return $consulta;
    }

    private function existeUsuario($rut) {
        $sentencia = 'SELECT COUNT(u.rut) FROM usuarios_tab u WHERE u.rut = :rut';
        $consulta = $this->db->prepare($sentencia);
        $consulta->bindParam(':rut', $rut);
        $consulta->execute();

        $valor = $consulta->fetch();
        return $valor[0];
    }

    public function activarDesactivarUsuario($rut, $estado) {

        $sentencia = 'UPDATE usuarios_tab u ' .
                'SET u.borrado_logico = :estado ' .
                'WHERE u.rut = :rut';
        if ($this->existeUsuario($rut) == 0) {
            return 3;
        } else {
            try {
                $consulta = $this->db->prepare($sentencia);
                $consulta->bindParam(':rut', $rut);
                $consulta->bindParam(':estado', $estado);
                $consulta->execute();
            } catch (PDOException $e) {
                return 0;
            }

            return 1;
        }
    }

}

?>