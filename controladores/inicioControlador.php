<?php
class inicioControlador extends baseControladores{
    //Accion inicio
    public function inicio()
    {
        if (isset($_SESSION['tipo'])) {
            switch ($_SESSION['tipo']) {
                case 0:
                    $this->vista->desplegar("inicio","inicio.php");
                    break;
                case 1:
                    $this->vista->desplegar("inicio","usuario.php");
                    break;
                case 2:
                    $this->vista->desplegar("inicio","administrador.php");
                    break;
                default:
                    break;
            }
        }//*/
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
}
?>