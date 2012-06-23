<?php

class usuarioModelo extends baseModelos {

    public function encontrarUsuario($rut, $contrasena) {
        //realizamos la consulta de todos los items
        //SELECT t.rut, t.contrasena FROM usuarios_tab t where t.rut = 173947755;
        $consulta = $this->db->prepare('SELECT t.rut, t.contrasena, t.tipo,t.nombre FROM usuarios_tab WHERE t.rut= :rut && t.contrasena=:contrasena LIMIT 1');
        $consulta = $this->db->prepare('SELECT FROM usuarios WHERE usu_usuario= :usuario && usu_contrasena=:contrasena LIMIT 1');
        $consulta->bindParam(":usuario", $usuario);
        $encriptada = sha1(md5($contrasena));
        $consulta->bindParam(":contrasena", $encriptada);
        $consulta->execute();
        //devolvemos la coleccion para que la vista la presente.
        return $consulta;
    }

    public function datosUsuario($idUsuario) {
        $sentencia = 'SELECT * FROM usuarios WHERE usu_id = :id ';
        $consulta = $this->db->prepare($sentencia);
        $consulta->bindParam(":id", $idUsuario);
        $consulta->execute();
        return $consulta;
    }
    
    public function listarUsuarios() {
        //realizamos la consulta de todos los items
        $consulta = $this->db->prepare('SELECT * FROM usuarios');
        $consulta->execute();
        //devolvemos la coleccion para que la vista la presente.
        return $consulta;
    }
}

?>