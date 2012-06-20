<?php

class inicioControlador extends baseControladores {

    //Accion inicio
    public function inicio() {
        switch ($_SESSION['tipo']) {
            case 0:
                //Incluye el modelo que corresponde
                require 'modelos/inicioModelo.php';

                //Creamos una instancia de nuestro "modelo"
                $items = new inicioModelo();

                //Le pedimos al modelo todos los items usuarios
                $listado = $items->listarUsuarios();

                //Pasamos a la vista toda la informacion que se desea representar
                $data['listado'] = $listado;

                $this->vista->desplegar("inicio", "inicio.php", $data);
                break;
            case 1:
                $this->vista->desplegar("inicio", "usuario.php");
                break;
            case 2:
                $this->vista->desplegar("inicio", "administrador.php");
                break;
            default:
                break;
        }
    }

    public function nuevoUsuario() {
        $usuario = 'admin';
        $password = 'minda';
        $nombre = 'administrador';
        $tipo = 2;
        /* tipo:
         * 0=invitado
         * 1=usuarioNormal
         * 2=administrador
         */

        $encriptado = sha1(md5($password));

        echo "INSERT INTO `prueba`.`usuarios` (
            `usu_usuario` ,
            `usu_contrasena` ,
            `usu_tipo` ,
            `usu_nombre` )
        VALUES ('$usuario','$encriptado',$tipo,'$nombre')";
    }
    
    private static function prueba(){
        require_once 'modelos/inicioModelo.php';
        
        $consulta = new inicioModelo();
        
        return $consulta->listarUsuarios();
    }

}

?>