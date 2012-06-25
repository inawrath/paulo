<?php

class usuarioModelo extends baseModelos {

    public function encontrarUsuario($rut, $contrasena) {
        //realizamos la consulta de todos los items
        //SELECT t.rut, t.contrasena FROM usuarios_tab t where t.rut = 173947755;
        $consulta = $this->db->prepare('SELECT t.rut, t.contrasena, t.tipo,t.nombre FROM usuarios_tab t WHERE t.rut= :rut && t.contrasena=:contrasena');
        $consulta->bindParam(":rut", $rut);
        $encriptada = sha1(md5($contrasena));
        $consulta->bindParam(":contrasena", $encriptada);
        $consulta->execute();
        //devolvemos la coleccion para que la vista la presente.
        return $consulta;
    }

    public function usuarioEditar($rut) {
        $sentencia = 'SELECT * FROM usuarios_tab t WHERE t.rut = :rut';
        $consulta = $this->db->prepare($sentencia);
        $consulta->bindParam(":rut", $rut);
        $consulta->execute();
        return $consulta;
    }
    
    public function listarUsuarios() {
        //realizamos la consulta de todos los items
        $consulta = $this->db->prepare('SELECT * FROM usuarios_tab');
        $consulta->execute();
        //devolvemos la coleccion para que la vista la presente.
        return $consulta;
    }
}

?>